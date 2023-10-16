<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activitys = Activity::get();

        foreach ($activitys as $activity) {
            $timestamp = $activity->created_at;
            $duration = now()->diffForHumans($timestamp, true);
            $activity->duration = $duration;
        }

        return view("website.activity")->with('data', $activitys);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('activity.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'message' => 'required',
        ], [
                'title.required' => 'Enter the title',
                'message.required' => 'Enter the message',
            ]);

        $data = [
            'id' => $request->input('id'),
            'author_id' => auth()->user()->id,
            'title' => $request->input('title'),
            'message' => $request->input('message'),
        ];
        Activity::create($data);
        return redirect('/admin/activity')->with('success', 'Data created');
    }
    /*
    INSERT INTO activity (id, author_id, title, message)
    VALUES ('{id}', '{author_id}', '{title}', '{message}');
     */
    public function show(string $id)
    {
        $data = Activity::find($id);
        $author = $data->author;

        return view('activity.showactivity')->with([
            'id' => $id,
            'title' => $data->title,
            'author_id' => $author->id,
            'author' => $author->name,
            'author_image' => $author->image,
            'username' => $author->username,
            'image' => $author->image,
            'message' => $data->message,
        ]);
    }

    /*
    SELECT a.id, a.title, a.message, u.id AS author_id, u.name AS author_name, 
    u.image AS author_image, u.username AS author_username
    FROM activity AS a
    LEFT JOIN users AS u ON a.author_id = u.id
    WHERE a.id = $id;

     */
    public function edit(string $id)
    {
        $data = activity::where('id', $id)->first();
        return view('activity.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'message' => 'required',
        ], [
                'title.required' => 'Enter the title',
                'message.required' => 'Enter the message',
            ]);

        $data = [
            'title' => $request->input('title'),
            'message' => $request->input('message'),
        ];

        Activity::where('id', $id)->update($data);
        return redirect('/admin/activity')->with('success', 'Data updated');
    }
    /*
    UPDATE activity
    SET title = '{title}', message = '{message}'
    WHERE id = '$id';
     */
    public function destroy(string $id)
    { 
        Activity::where('id', $id)->delete();
        return redirect('/admin/activity')->with('success', 'Data deleted');
    }
    /*
    DELETE FROM activity WHERE id = $id;
    */
}
