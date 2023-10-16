<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ChallengeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $challenges = Challenge::get();

        foreach ($challenges as $challenge) {
            $timestamp = $challenge->created_at; // or any other timestamp column
            $duration = now()->diffForHumans($timestamp, true);
            $challenge->duration = $duration;
        }

        return view("website.challenge")->with('data', $challenges);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('challenge.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif'
        ], [
                'title.required' => 'Enter the challenge title',
                'image.required' => 'Insert the challenge image',
                'description.required' => 'Enter the challenge description',
                'image.mimes' => 'Image supported is only JPEG, JPG, PNG, GIF',
            ]);

        $image_file = $request->file('image');
        $image_ekstensi = $image_file->extension();
        $image_title = 'img/challenge/'. date('ymdhis') . "." . $image_ekstensi;
        $image_file->move(public_path('img/challenge'), $image_title);

        $data = [
            'id' => $request->input('id'),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image' => $image_title
        ];
        Challenge::create($data);
        return redirect('/admin/challenges')->with('success', 'Data created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Challenge::find($id);
        $author = $data->author;

        return view('challenge.showchallenge')->with([
            'id' => $id,
            'image' => $data->image,
            'title' => $data->title,
            'description' => $data->description,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Challenge::where('id', $id)->first();
        return view('challenge.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ], [
                'title.required' => 'Enter the challenge title',
                'description.required' => 'Enter the challenge description',
            ]);

        $data = [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ];

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|mimes:jpeg,jpg,png,gif'
            ], [
                    'image.required' => 'Insert the challenge image',
                    'image.mimes' => 'Image supported is only JPEG, JPG, PNG, GIF'
                ]);
            $image_file = $request->file('image');
            $image_ekstensi = $image_file->extension();
            $image_title = date('ymdhis') . "." . $image_ekstensi;
            $image_file->move(public_path('img/challenge'), $image_title);

            $data_image = Challenge::where('id', $id)->first();
            File::delete(public_path('img/challenge') . '/' . $data_image->image);

            $data['image'] = $image_title;
        }
        Challenge::where('id', $id)->update($data);
        return redirect('/admin/challenges')->with('success', 'Data updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Challenge::where('id', $id)->first();
        File::delete(public_path('img/challenge') . '/' . $data->image);
        Challenge::where('id', $id)->delete();
        return redirect('/admin/challenges')->with('success', 'Data deleted');
    }
}
