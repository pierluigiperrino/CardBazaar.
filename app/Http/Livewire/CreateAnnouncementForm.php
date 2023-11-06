<?php

namespace App\Http\Livewire;

use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\ResizeImage;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Config;
use App\Jobs\RemoveFaces;

class CreateAnnouncementForm extends Component
{
    use WithFileUploads;

    public $title, $body, $price, $category, $temporary_images, $images = [];

    public $announcement;

    public $iteration;

    protected $rules = [
        'title'=> 'required|min:4',
        'body' => 'required|min:8',
        'price' => 'required|numeric',
        'category' => 'required',
        'temporary_images.*' => 'image',
        'images.*' => 'image|mimes:png,jpeg,jpg,bmp|max:1024'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updatedTemporaryImages()
    {
        if($this->validate(['temporary_images.*' => 'image']))
        {
            foreach ($this->temporary_images as $image)
            {
                $this->images[] = $image;
            }
        }
    }

    public function removeImage($key)
    {
        if (in_array($key, array_keys($this->images)))
        {
            unset($this->images[$key]);
        }
    }

    public function store()
    {
        $this->validate();

        $this->announcement = Category::find($this->category)->announcements()->create([
                'title' => $this->title,
                'body' => $this->body,
                'price' => $this->price,
                'uri' => Str::slug($this->title . ' ' . Str::password(6,false,true,false,false), '-'),
                'temporary_images.*' => $this->temporary_images,
                'images.*' => $this->images
            ]);
        if (count($this->images))
        {
            foreach ($this->images as $image)
            {
                // $this->announcement->images()->create(['path'=>$image->store('images', 'public')]);
                $newFileName = "announcements/{$this->announcement->id}";
                $newImage = $this->announcement->images()->create(['path'=>$image->store($newFileName, 'public')]);

                dispatch(new GoogleVisionSafeSearch($newImage->id));
                dispatch(new GoogleVisionLabelImage($newImage->id));
                dispatch(new ResizeImage($newImage->path, 200, 300));

                // RemoveFaces::withChain([
                //     new GoogleVisionSafeSearch($newImage->id),
                //     new GoogleVisionLabelImage($newImage->id),
                //     new ResizeImage($newImage->path, 200, 300)
                // ])->dispatch($newImage->id);
            }

            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }
        $this->announcement->user()->associate(Auth::user());
        $this->announcement->save();

        // $this->validate($this->rules);

        // $category = Category::find($this->category);
        // $announcement = $category->announcements()->create([
        //     'title' => $this->title,
        //     'body' => $this->body,
        //     'price' => $this->price,
        //     'uri' => Str::slug($this->title . ' ' . Str::password(6,false,true,false,false), '-')
        // ]);
        // Auth::user()->announcements()->save($announcement);

        $flash= '';
        if (Config::get('app.locale') == 'it')
        {
            $flash = 'Creato, attendi la conferma';
        } elseif (Config::get('app.locale') == 'en')
        {
            $flash = 'Created, wait for confirmation';
        } elseif (Config::get('app.locale') == 'es')
        {
            $flash = 'Creado, esperar confirmación';
        }

        session()->flash('success', $flash);
        $this->cleanForm();
    }

    public function render()
    {
        return view('livewire.create-announcement-form');
    }

    public function cleanForm()
    {
        $this->title = '';
        $this->body = '';
        $this->price = '';
        $this->category = '';
        $this->temporary_images = [];
        $this->iteration++;
        $this->images = [];
    }
}
