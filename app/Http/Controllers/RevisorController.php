<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\BecomeRevisor;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    public function index()
    {   
        return view('revisor.index');
    }

    public function show($uri)
    {

        $announcements_to_check = Announcement::all();
        foreach ($announcements_to_check as $announcement_to_check)
        {
            if ($announcement_to_check->uri == $uri)
            {   
                return view('revisor.show', compact('announcement_to_check'));
            }
        }
        abort(404);
        // $announcements_to_check = Announcement::where('is_accepted', null)->first();
        // return view('revisor.show', compact('announcement_to_check'));
    }

    public function acceptAnnouncement(Announcement $announcement)
    {
        $flash= '';
        if (Config::get('app.locale') == 'it')
        {
            $flash = 'Annuncio accettato';
        } elseif (Config::get('app.locale') == 'en')
        {
            $flash = 'Announcement accepted';
        } elseif (Config::get('app.locale') == 'es')
        {
            $flash = 'Anuncio aceptado';
        }

        $announcement->setAccepted(true);
        return redirect()->route('revisor.index')->with('success', $flash);
    }

    public function rejectAnnouncement(Announcement $announcement)
    {
        $flash= '';
        if (Config::get('app.locale') == 'it')
        {
            $flash = 'Annuncio rifiutato';
        } elseif (Config::get('app.locale') == 'en')
        {
            $flash = 'Ad rejected';
        } elseif (Config::get('app.locale') == 'es')
        {
            $flash = 'Anuncio rechazado';
        }

        $announcement->setAccepted(false);
        return redirect()->route('revisor.index')->with('success', $flash);
    }

    public function becomeRevisor(Request $request)
    {
        $request->validate([
            'aboutYou' => 'required|min:10'
        ]);

        $data = [
            'aboutYou' => $request->aboutYou
        ];

        Mail::to('admin@cardbazaar.it')->send(new BecomeRevisor(Auth::user(), $data));

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

        return redirect('/')->with('send.ok', $flash);
    }

    public function makeRevisor(User $user)
    {   
        $flash= '';
        if (Config::get('app.locale') == 'it')
        {
            $flash = "L'utente è diventato revisore";
        } elseif (Config::get('app.locale') == 'en')
        {
            $flash = 'The user became a reviewer';
        } elseif (Config::get('app.locale') == 'es')
        {
            $flash = 'El usuario se convirtió en revisor';
        }

        Artisan::call('bazaar:makeUserRevisor', ["email"=>$user->email]);
        return redirect('/')->with('send.ok', $flash);
    }
}
