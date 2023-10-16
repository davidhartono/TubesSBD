<?php

namespace App\Http\Controllers;

use App\Models\Tip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TipsController extends Controller
{
    public function index()
    {
        $userId = auth()->id();
        $tips = Tip::where('author_id', '!=', $userId)->get();

        foreach ($tips as $tip) {
            $timestamp = $tip->created_at;
            $duration = now()->diffForHumans($timestamp, true);
            $tip->duration = $duration;
        }

        return view("tips.index")->with('data', $tips);
    }

    public function create()
    {
        return view('tips.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'step' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif'
        ], [
                'title.required' => 'Title is required',
                'step.required' => 'Steps is required',
                'image.mimes' => 'Image supported is only JPEG, JPG, PNG, GIF',
            ]);

        $data = [
            'id' => $request->input('id'),
            'author_id' => auth()->user()->id,
            'title' => $request->input('title'),
            'step' => $request->input('step'),
        ];

        if ($request->hasFile('image')) {
            $image_file = $request->file('image');
            $image_ekstensi = $image_file->extension();
            $image_title = date('ymdhis') . "." . $image_ekstensi;
            $image_file->move(public_path('img/tip'), $image_title);
            $data['image'] = $image_title;
        }

        Tip::create($data);
        return redirect('/profile/tips')->with('success', 'Tips created');
        /*
        INSERT INTO tips (author_id, image, title, step)
        VALUES (<author_id>, '<image>', '<title>','<step>');
        */
    }

    public function show($id)
    {
        $data = Tip::findOrFail($id);
        $author = $data->author;
        $comments = $data->comments()->with('author')->get();

        return view('tips.showtips')->with([
            'id' => $id,
            'author_id' => $author->id,
            'author' => $author->name,
            'username' => $author->username,
            'author_image' => $author->image,
            'image' => $data->image,
            'title' => $data->title,
            'step' => $data->step,
            'comments' => $comments,
        ]);
        /*
        SELECT t.id, t.author_id, t.image, t.title, t.step, c.id AS comment_id, c.author_id AS comment_author_id, c.comment
        FROM tips AS t
        LEFT JOIN tipcomments AS c ON t.id = c.tip_id
        WHERE t.id = $id;

        */
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Tip::where('id', $id)->first();
        return view('tips.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'step' => 'required',
        ], [
                'title.required' => 'Enter the tip title',
                'step.required' => 'Enter the tip steps',
            ]);

        $data = [
            'title' => $request->input('title'),
            'step' => $request->input('step'),
        ];

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'mimes:jpeg,jpg,png,gif'
            ], [
                    'image.mimes' => 'Image supported is only JPEG, JPG, PNG, GIF'
                ]);
            $image_file = $request->file('image');
            $image_ekstensi = $image_file->extension();
            $image_title = date('ymdhis') . "." . $image_ekstensi;
            $image_file->move(public_path('img/tip'), $image_title);

            $data_image = Tip::where('id', $id)->first();
            File::delete(public_path('img/tip') . '/' . $data_image->image);

            $data['image'] = $image_title;
        }
        tip::where('id', $id)->update($data);
        return redirect('/profile/tips')->with('success', 'Data updated');
        /*
        UPDATE tips
        SET title = '<title>', image = <image>,  step = '<step>'
        WHERE id = $id;
        */
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Tip::where('id', $id)->delete();
        return redirect('/admin/tips')->with('success', 'Data deleted');
        /*
        DELETE FROM tips WHERE id = $id;
        */
    }

}