<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Mail\DeleteAnnouncements;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;
use GPBMetadata\Google\Api\Annotations;

class FrontController extends Controller
{
    public function homepage()
    {
        $announcements = Announcement::where('is_accepted', true)->latest()->take(4)->get();
        return view('homepage', compact('announcements'));
    }

    public function AboutUs()
    {
        return view('about_us2');
    }

    public function workWithUs(){
        return view('lavora');
    }

    public function searchAnnouncements(Request $request)
    {
        $announcements_search = Announcement::search($request->searched)->get()->pluck('id');
        $announcements = Announcement::whereIn('id', $announcements_search)->latest()->paginate(8)->withQueryString();
        return view('search', compact('announcements'));
    }

    public function setLanguage($lang){
        session()->put('locale', $lang);
        return redirect()->back();
    }

    public function userAnnouncements()
    {
        $announcements = Auth::user()->announcements()->where('is_accepted', true)->orderBy('created_at', 'DESC')->paginate(8);
        return view('users.index', compact('announcements'));
    }

    public function userAnnouncementsDelete(Announcement $id)
    {
        Mail::to('admin@cardbazaar.it')->send(new DeleteAnnouncements(Auth::user(), $id));

        $flash= '';
        if (Config::get('app.locale') == 'it')
        {
            $flash = 'Richiesta inviata con successo';
        } elseif (Config::get('app.locale') == 'en')
        {
            $flash = 'Request sent successfully';
        } elseif (Config::get('app.locale') == 'es')
        {
            $flash = 'Solicitud enviada correctamente';
        }

        return back()->with('send.ok', $flash);
    }
}