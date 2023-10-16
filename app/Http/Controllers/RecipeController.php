<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = auth()->id();
        $recipes = Recipe::where('author_id', '!=', $userId)->get();

        foreach ($recipes as $recipe) {
            $timestamp = $recipe->created_at;
            $duration = now()->diffForHumans($timestamp, true);
            $recipe->duration = $duration;
        }

        return view("website.index")->with('data', $recipes);
        /*
        SELECT *
        FROM recipes
        WHERE author_id != <user_id>;
        */
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'ingredient' => 'required',
            'step' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif',
            'description' => 'required'
        ], [
                'title.required' => 'Title is required',
                'ingredient.required' => 'Ingredient is required',
                'step.required' => 'Steps is required',
                'description.required' => 'Description is required',
                'image.mimes' => 'Image supported is only JPEG, JPG, PNG, GIF',
            ]);
        if ($request->hasFile('image')) {
            $image_file = $request->file('image');
            $image_ekstensi = $image_file->extension();
            $image_title = date('ymdhis') . "." . $image_ekstensi;
            $image_file->move(public_path('img/recipe'), $image_title);
            $data['image'] = $image_title;
        }
        $data = [
            'author_id' => auth()->user()->id,
            'image' => $image_title,
            'title' => $request->title,
            'description' => $request->description,
            'portion' => $request->portion,
            'time' => $request->time,
            'ingredient' => $request->ingredient,
            'step' => $request->step,
        ];

        Recipe::create($data);

        return redirect('/profile/recipes')->with('success', 'Recipe created');
        /*
        INSERT INTO recipes (author_id, image, title, description, portion, time, ingredient, step)
        VALUES (<author_id>, '<image>', '<title>', '<description>', <portion>, <time>, '<ingredient>', '<step>');
        */

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $recipe = Recipe::findOrFail($id);
        $author = $recipe->author;
        $comments = $recipe->comments()->with('author')->get();

        return view('recipe.showrecipe')->with([
            'id' => $id,
            'author_id' => $author->id,
            'author' => $author->name,
            'username' => $author->username,
            'author_image' => $author->image,
            'image' => $recipe->image,
            'comment_image' => $author->image,
            'title' => $recipe->title,
            'description' => $recipe->description,
            'portion' => $recipe->portion,
            'time' => $recipe->time,
            'step' => $recipe->step,
            'ingredient' => $recipe->ingredient,
            'comments' => $comments,
        ]);

        /*
        SELECT r.id, r.author_id, r.image, r.title, r.description, r.portion, r.time, r.step, r.ingredient, 
        c.id AS comment_id, c.author_id AS comment_author_id, c.comment
        FROM recipes AS r
        LEFT JOIN recipecomments AS c ON r.id = c.recipe_id
        WHERE r.id = $id;


        */
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Recipe::where('id', $id)->first();
        return view('recipe.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'step' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif',
            'description' => 'required'
        ], [
                'title.required' => 'Title is required',
                'step.required' => 'Step is required',
                'description.required' => 'Description is required',
                'image.mimes' => 'Image supported is only JPEG, JPG, PNG, GIF',
            ]);

        $data = [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'portion' => $request->input('portion'),
            'time' => $request->input('time'),
            'ingredient' => $request->input('ingredient'),
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
            $image_file->move(public_path('img/recipe'), $image_title);

            $data_image = Recipe::where('id', $id)->first();
            File::delete(public_path('img/recipe') . '/' . $data_image->image);

            $data['image'] = $image_title;
        }

        Recipe::where('id', $id)->update($data);
        return redirect('/profile/recipes')->with('success', 'Data updated');
        /*
        UPDATE recipes
        SET title = '<title>', description = '<description>', image = <image>, portion = <portion>,
        time = <time>, ingredient = '<ingredient>', step = '<step>'
        WHERE id = $id;
        */

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Recipe::where('id', $id)->first();
        File::delete(public_path('img/recipe') . '/' . $data->image);
        Recipe::where('id', $id)->delete();
        return redirect('/admin/recipes')->with('success', 'Data deleted');

        /*
        DELETE FROM recipes WHERE id = $id;
        */
    }
}