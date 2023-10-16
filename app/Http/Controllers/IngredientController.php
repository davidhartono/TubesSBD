<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;    


class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ingredients = Ingredient::get();

        foreach ($ingredients as $ingredient) {
            $timestamp = $ingredient->created_at;
            $duration = now()->diffForHumans($timestamp, true);
            $ingredient->duration = $duration;
        }

        return view("ingredient.index")->with('data', $ingredients);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ingredient.add');
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
                'title.required' => 'Enter the ingredient title',
                'image.required' => 'Insert the ingredient image',
                'description.required' => 'Enter the ingredient description',
                'image.mimes' => 'Image supported is only JPEG, JPG, PNG, GIF',
            ]);

        $image_file = $request->file('image');
        $image_ekstensi = $image_file->extension();
        $image_title = date('ymdhis') . "." . $image_ekstensi;
        $image_file->move(public_path('img/ingredient'), $image_title);

        $data = [
            'id' => $request->input('id'),
            'author_id' => auth()->user()->id,
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image' => $image_title
        ];
        Ingredient::create($data);
        return redirect('/admin/ingredients')->with('success', 'Data created');
        /*
        INSERT INTO ingredients (id, author_id, title, description, image)
        VALUES (<id>, <author_id>, '<title>', '<description>', '<image>');

        */

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Ingredient::find($id);
        $author = $data->author;

        return view('ingredient.showingredient')->with([
            'id' => $id,
            'author' => $author->name,
            'username'=> $author->username,
            'image' => $data->image,
            'title' => $data->title,
            'description' => $data->description,
        ]);
        /*
        SELECT id, author_id, image, title, description
        FROM ingredients
        WHERE id = $id;
        */

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Ingredient::where('id', $id)->first();
        return view('ingredient.edit')->with('data', $data);
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
                'title.required' => 'Enter the ingredient title',
                'description.required' => 'Enter the ingredient description',
            ]);

        $data = [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ];

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|mimes:jpeg,jpg,png,gif'
            ], [
                    'image.required' => 'Insert the ingredient image',
                    'image.mimes' => 'Image supported is only JPEG, JPG, PNG, GIF'
                ]);
            $image_file = $request->file('image');
            $image_ekstensi = $image_file->extension();
            $image_title = date('ymdhis') . "." . $image_ekstensi;
            $image_file->move(public_path('img/ingredient'), $image_title);
            $data_image = Ingredient::where('id', $id)->first();
            File::delete(public_path('img/ingredient') . '/' . $data_image->image);
            $data['image'] = $image_title;
        }
        Ingredient::where('id', $id)->update($data);
        return redirect('/admin/ingredients')->with('success', 'Data updated');
        /*
        UPDATE ingredients
        SET title = '<title>', description = '<description>', image = <image>
        WHERE id = $id;
        */
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Ingredient::where('id', $id)->first();
        File::delete(public_path('img/ingredient') . '/' . $data->image);
        Ingredient::where('id', $id)->delete();
        return redirect('/admin/ingredients')->with('success', 'Data deleted');
        /*
        DELETE FROM ingredients WHERE id = $id;
        */
    }
}