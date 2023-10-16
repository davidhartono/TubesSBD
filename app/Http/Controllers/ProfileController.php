<?php

namespace App\Http\Controllers;

use App\Models\Tip;
use App\Models\User;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recipes = Recipe::where('author_id', auth()->user()->id)->get();

        foreach ($recipes as $recipe) {
            $timestamp = $recipe->created_at;
            $duration = now()->diffForHumans($timestamp, true);
            $recipe->duration = $duration;
        }

        return view('profile.index')->with([
            'data' => $recipes,
            'id' => auth()->user()->id
        ]);
    }

    public function recipes()
    {
        $recipes = Recipe::where('author_id', auth()->id())->get();

        foreach ($recipes as $recipe) {
            $timestamp = $recipe->created_at;
            $duration = now()->diffForHumans($timestamp, true);
            $recipe->duration = $duration;
        }

        return view("profile.recipes")->with([
            'data' => $recipes,
            'id' => $recipes->pluck('id')
        ]);
    }
    public function tips()
    {
        $recipes = Tip::where('author_id', auth()->id())->get();

        foreach ($recipes as $recipe) {
            $timestamp = $recipe->created_at;
            $duration = now()->diffForHumans($timestamp, true);
            $recipe->duration = $duration;
        }

        return view("profile.tips")->with([
            'data' => $recipes,
            'id' => $recipes->pluck('id')
        ]);
    }
    public function cooksnaps()
    {
        $recipes = Tip::where('author_id', auth()->id());

        return view("profile.tips")->with([
            'data' => $recipes,
            'id' => $recipes->pluck('id')
        ]);
    }

    /**
     * Display the specified resource.
     */

    public function show(string $id)
    {
        $recipes = Recipe::where('author_id', auth()->id())->get();

        return view("profile.recipes")->with([
            'data' => $recipes,
            'id' => $recipes->pluck('id')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = user::where('id', $id)->first();
        return view('profile.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Auth::user();
        $request->validate([
            'name' => 'required',
            'username' => [
                'required',
                'unique:users,username,' . $user->id,
                'min:6',
                'max:12',
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
        ], [
                'name.required' => 'Name is required',
                'username.required' => 'Username is required',
                'username.unique' => 'Username is already taken',
                'username.min' => 'Username is too short',
                'username.max' => 'Username is too long',
                'email.required' => 'Email is required',
                'email.unique' => 'Email has already been used',
            ]);

        $data = [
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
        ];

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|mimes:jpeg,jpg,png,gif'
            ], [
                    'image.mimes' => 'Photo extension supported are JPEG, JPG, PNG, GIF'
                ]);
            $image_file = $request->file('image');
            $image_ekstensi = $image_file->extension();
            $image_name = date('ymdhis') . "." . $image_ekstensi;
            $image_file->move('img/user', $image_name);
            $data_image = User::where('id', $id)->first();
            File::delete(public_path('img') . '/user/' . $data_image->image);
            $data['image'] = $image_name;
        }
        User::where('id', $id)->update($data);
        return redirect('/profile')->with('success', 'Profile edit successfully');
    }
    /*
    UPDATE users
    SET name = '$request->name', username = '$request->username', email = '$request->email', image = '$request->image'
    WHERE id = Auth::user()->id;
    */

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        File::delete(public_path('img/user') . '/' . $user->image);
        $user->delete();

        return redirect('/admin/users')->with('success', 'Data deleted');
    }
    /*
    DELETE FROM users WHERE id = $id;
    */
    public function deleteImage(User $id)
    {
        if ($id->image) {
            File::delete(public_path('img/user/') . $id->image);

            // Set the image column to null
            $id->image = null;
            $id->save();

            return redirect()->back()->with('success', 'Image deleted successfully');
        } else {
            return redirect()->back()->with('error', 'No image to delete');
        }
    }






}