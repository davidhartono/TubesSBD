<?php

namespace App\Http\Controllers;

use auth;
use App\Models\Tip;
use App\Models\Recipe;
use App\Models\Challenge;
use App\Models\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HalamanController extends Controller
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

        // $data = Challenge::all();
        return view('website.create');

        // SELECT * FROM challenges;

    }

    /**
     * Store a newly created resource in storage.
     */
    public function result(Request $request)
    {
        $query = $request->input('query');

        $recipes = Recipe::with('author')
            ->where('title', 'like', "%$query%")
            ->select('id', 'title', 'image', 'author_id');

        $tips = Tip::with('author')
            ->where('title', 'like', "%$query%")
            ->select('id', 'title', 'image', 'author_id');

        $unionQuery = $recipes->unionAll($tips);

        $recipeCount = Recipe::where('title', 'like', '%' . $query . '%')->count();
        $tipCount = Tip::where('title', 'like', '%' . $query . '%')->count();

        $totalResults = $recipeCount + $tipCount;

        $results = $unionQuery->paginate(10);

        $results->appends(['query' => $query]);

        return view('website.result', compact('query', 'results', 'totalResults'));

        /*
        SELECT COUNT(*) AS totalResults
        FROM (
            SELECT id, title, image, author_id
            FROM recipes
            WHERE title LIKE '%{query}%'
            
            UNION ALL
            
            SELECT id, title, image, author_id
            FROM tips
            WHERE title LIKE '%{query}%'
        ) AS sub;

        SELECT id, title, image, author_id
        FROM recipes
        WHERE title LIKE '%{query}%'

        UNION ALL

        SELECT id, title, image, author_id
        FROM tips
        WHERE title LIKE '%{query}%'
        LIMIT 10;


        */
    }


    public function search()
    {
        $data = Recipe::inRandomOrder()->get();

        return view("website.search")->with('data', $data);

        /*
        SELECT *
        FROM recipes
        ORDER BY RAND();
        */
    }



    public function recipe()
    {
        return view("recipe.create");
    }


    public function tips()
    {
        return view("tips.create");
    }


}