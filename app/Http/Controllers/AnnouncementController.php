<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Http\Requests\StoreAnnouncementRequest;
use App\Http\Requests\UpdateAnnouncementRequest;
use App\Models\Category;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $announcements = Announcement::orderBy('created_at', 'DESC')->paginate(8);
        // $announcements = Announcement::oldest()->paginate(8); DAL PIù VECCHIO
        $announcements = Announcement::where('is_accepted', true)->latest()->paginate(8);
        return view('announcements.index', compact('announcements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('announcements.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAnnouncementRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($uri)
    {
        $announcements = Announcement::all();
        foreach ($announcements as $announcement)
        {
            if ($announcement->uri == $uri)
            {   
                $relatedAnnouncements = Announcement::where('category_id', $announcement->category_id)
                ->where('id', '!=', $announcement->id)
                ->where('is_accepted', true)->latest()->take(4)->get();

                return view('announcements.show', compact('announcement', 'relatedAnnouncements'));
            }
        }
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Announcement $announcement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAnnouncementRequest $request, Announcement $announcement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Announcement $announcement)
    {
        //
    }
}
