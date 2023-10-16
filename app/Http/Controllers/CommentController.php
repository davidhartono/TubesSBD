<?php

namespace App\Http\Controllers;

use App\Models\TipComment;
use Illuminate\Http\Request;
use App\Models\RecipeComment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class CommentController extends Controller
{
    public function recipe(Request $request)
    {
        // Validate the comment data
        $validatedData = $request->validate([
            'komentarresep' => 'required|string|max:255',
        ], [
                'komentarresep.required' => 'Comment cannot blank.',
                'komentarresep.max' => 'Comment is too long .'
            ]);

        $user = Auth::user();

        $recipeId = $request->input('recipe_id');
        $commentCount = RecipeComment::where('user_id', $user->id)
            ->where('recipe_id', $recipeId)
            ->count();
        $maxCommentCount = 3;

        if ($commentCount >= $maxCommentCount) {
            throw ValidationException::withMessages([
                'komentarresep' => "You have reached the maximum limit of {$maxCommentCount} comments.",
            ]);
        }

        $comment = new RecipeComment();
        $comment->user_id = $user->id;
        $comment->recipe_id = $recipeId;
        $comment->comment = $validatedData['komentarresep'];

        $comment->save();

        Session::flash('success_message', 'Comment submitted successfully.');

        return redirect()->back();
        /*
        INSERT INTO recipecomments (user_id, recipe_id, comment)
        VALUES (Auth::user()->id, '$recipeId', '<comment>');
        */
    }
    public function tips(Request $request)
    {
        // Validate the comment data
        $validatedData = $request->validate([
            'komentartips' => 'required|string|max:255',
        ], [
                'komentartips.required' => 'Comment cannot blank.',
                'komentartips.max' => 'Comment is too long .'
            ]);

        $user = Auth::user();

        $tipsId = $request->input('tips_id');
        $commentCount = TipComment::where('user_id', $user->id)
            ->where('tips_id', $tipsId)
            ->count();
        $maxCommentCount = 3;

        if ($commentCount >= $maxCommentCount) {
            throw ValidationException::withMessages([
                'komentartips' => "You have reached the maximum limit of {$maxCommentCount} comments.",
            ]);
        }

        $comment = new TipComment();
        $comment->user_id = $user->id;
        $comment->tips_id = $tipsId;
        $comment->comment = $validatedData['komentartips'];

        $comment->save();

        Session::flash('success_message', 'Comment submitted successfully.');

        return redirect()->back();
        /*
        INSERT INTO tipscomments (user_id, tips_id, comment)
        VALUES (Auth::user()->id, '$tipsId', '<comment>');
        */
    }
    public function destroyRecipeComment($id)
    {
        $comment = RecipeComment::find($id);
        $comment->delete();
        return redirect()->back()->with('success', 'Recipe comment deleted successfully.');
        /*
        DELETE FROM recipecomments WHERE id = $id;
        */
    }

    public function destroyTipComment($id)
    {
        $comment = TipComment::find($id);
        $comment->delete();
        return redirect()->back()->with('success', 'Tip comment deleted successfully.');
        /*
        DELETE FROM tipscomments WHERE id = $id;
        */
    }


}