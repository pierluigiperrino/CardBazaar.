<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Announcement;
use Illuminate\Support\Facades\Config;

class IndexRevisor extends Component
{
    public $search;

    protected $announcements_to_check;

    public function destroy(Announcement $announcement_to_check)
    {
        $flash= '';
        if (Config::get('app.locale') == 'it')
        {
            $flash = 'Annuncio Eliminato';
        } elseif (Config::get('app.locale') == 'en')
        {
            $flash = 'Announcement Deleted';
        } elseif (Config::get('app.locale') == 'es')
        {
            $flash = 'Anuncio Eliminado';
        }

        $announcement_to_check->delete();
        session()->flash('success', $flash);
        $this->mount();
    }

    public function render()
    {   
        return view('livewire.index-revisor', ['announcements_to_check' => $this->announcements_to_check]);
    }

    public function updatedSearch()
    {
        if ($this->search) {
            $this->announcements_to_check = Announcement::search($this->search)->orderBy('created_at', 'DESC')->paginate(8);
        } else {
            $this->announcements_to_check=Announcement::all()->toQuery()->orderBy('created_at', 'DESC')->paginate(8);
        }
    }

    public function mount()
    {
        $var = Announcement::all()->toQuery()->orderBy('created_at', 'DESC')->paginate(8);
        $this->announcements_to_check= $var;
    }
}
