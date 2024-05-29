<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Article $article)
    {
        $request->validate([
            'name' => 'required',
            'content' => 'required'
        ]);

        $comment = new Comment();
        $comment->name = $request->input('name');
        $comment->content = $request->input('content');
        $comment->article_id = $article->id;
        $comment->save();

        return redirect()->route('articles.show', $article->id)->with('success', 'Commentaire ajouté');
    }
}
