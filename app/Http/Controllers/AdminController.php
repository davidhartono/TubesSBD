<?php

namespace App\Http\Controllers;

use App\Models\Tip;
use App\Models\User;
use App\Models\Recipe;
use App\Models\Activity;
use App\Models\Challenge;
use App\Models\Ingredient;
use App\Models\TipComment;
use Illuminate\Http\Request;
use App\Models\RecipeComment;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userCount = User::count();
        $recipeCount = Recipe::count();
        $tipCount = Tip::count();
        $ingredientCount = Ingredient::count();
        // $challengeCount = Challenge::count();
        $activityCount = Activity::count();

        return view('admin.index', compact('userCount', 'recipeCount', 'tipCount', 'ingredientCount', 'activityCount'));
        /*
        SELECT COUNT(*) AS userCount FROM users;

        SELECT COUNT(*) AS recipeCount FROM recipes;

        SELECT COUNT(*) AS tipCount FROM tips;

        SELECT COUNT(*) AS ingredientCount FROM ingredients;

        SELECT COUNT(*) AS activityCount FROM activity;

        */

    }

    public function user()
    {
        $data = User::paginate(5);
        return view('admin.user')->with('data', $data);
    }
    // SELECT * FROM users LIMIT 10;

    public function recipe()
    {
        $data = Recipe::with('author')->paginate(5);
        return view('admin.recipe')->with('data', $data);
    }
    /*
    SELECT a.*, b.*
    FROM recipes AS a
    LEFT JOIN users AS b ON a.author_id = b.id
    LIMIT 5;
    */
    public function ingredient()
    {
        $data = Ingredient::with('author')->paginate(5);
        return view('admin.ingredient')->with('data', $data);
    }
    /*
    SELECT a.*, b.*
    FROM ingredients AS a
    LEFT JOIN users AS b ON a.author_id = b.id
    LIMIT 5;
    */
    public function tips()
    {
        $data = Tip::with('author')->paginate(5);
        return view('admin.tips')->with('data', $data);
    }
    /*
    SELECT a.*, b.*
    FROM tips AS a
    LEFT JOIN users AS b ON a.author_id = b.id
    LIMIT 5;
    */
    public function challenge()
    {
        // $data = Challenge::paginate(5);
        // return view('admin.challenge')->with('data', $data);
    }

    public function comment()
    {
        $recipeComments = RecipeComment::with('author', 'recipe')->paginate(5);
        $tipComments = TipComment::with('author', 'tip')->paginate(5);

        return view('admin.comment')->with([
            'recipeComments' => $recipeComments,
            'tipComments' => $tipComments,
        ]);
    }
    /*
    SELECT a.*, b.*, c.*
    FROM recipecomments AS a
    LEFT JOIN users AS b ON a.user_id = b.id
    LEFT JOIN recipes AS c ON a.recipe_id = c.id
    LIMIT 5
    */
    public function activity()
    {
        $data = Activity::with('author')->paginate(5);

        return view('admin.activity')->with('data', $data);
    }
    /*
    SELECT a.*, b.*
    FROM activity AS a
    LEFT JOIN users AS b ON a.author_id = b.id
    LIMIT 5;
    */


}