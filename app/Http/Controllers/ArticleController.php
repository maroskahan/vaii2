<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function create()
    {
        return view('article.create', ['action' => route('article.store'),
            'method' => 'post']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'text' => 'required']);

        $article = Article::create($request->all());
        $article->user_id = Auth::user()->getAuthIdentifier();
        $article->save();
        return redirect()->route('home');
    }

    public function edit(Request $request, Article $article)
    {
        return view('article.edit', [
            'action' => route('article.update', $article->id),
            'method' => 'put',
            'model' => $article
        ]);
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required',
            'text' => 'required'
        ]);

        $article->update($request->all());
        return redirect()->route('home');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return response()->json(['success'=>'Článok bol vymazaný.']);
    }
}
