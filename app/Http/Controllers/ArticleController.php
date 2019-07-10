<?php

namespace App\Http\Controllers;

use App\Article;
use App\User;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(){
        $articles = Article::all();
        return view('home')->with('articles', $articles);
    }

    public function create(){
        $users  = User::all();
        return view('create')->with('users', $users);
    }

    public function store(Request $request){
        $this->validate($request, [
            'heading' => 'required',
            'subheading' => 'required',
            'text' => 'required',
            'article_images' => 'image|nullable|max:1999'
        ]);

        if($request->hasFile('article_images')) {
            // Naziv slike sa ekstenzijom
            $filenameWithExt = $request->file('article_images')->getClientOriginalName();
            // Naziv slike bez ekstenzije
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Naziv ekstenzije
            $extension = pathinfo($filenameWithExt, PATHINFO_EXTENSION);
            // Napravi naziv fotografije u formatu  "imeslike_vreme.ekstenzija"
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Dodaj fotografiju na putanju public/article_images
            $path = $request->file('article_images')->storeAs('public/article_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.png';
        }

        $articles = new Article;
        $articles->heading = $request->input('heading');
        $articles->subheading = $request->input('subheading');
        $articles->text = $request->input('text');
        $articles->user_id = $request->input('user_id');
        $articles->article_images = $fileNameToStore;

        $articles->save();

        return redirect('/articles')->with('success', 'Successfully added a new article');
    }

    public function show($id){
        $article = Article::find($id);
        $users = User::all();

        $article_userid = $article->user_id;
        return view('show',[
            'article' => $article,
            'article_userid' => $article_userid,
            'users' => $users
        ]);
    }

    public function edit($id){
        $article = Article::find($id);
        $users = User::all();

        $article_userid = $article->user_id;
        return view('update', [
            'article' => $article,
            'article_userid' => $article_userid,
            'users' => $users
        ]);
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'heading' => 'required',
            'subheading' => 'required',
            'text' => 'required',
            'article_images' => 'image|nullable|max:1999'
        ]);

        if($request->hasFile('article_images')) {
            // Naziv slike sa ekstenzijom
            $filenameWithExt = $request->file('article_images')->getClientOriginalName();
            // Naziv slike bez ekstenzije
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Naziv ekstenzije
            $extension = pathinfo($filenameWithExt, PATHINFO_EXTENSION);
            // Napravi naziv fotografije u formatu  "imeslike_vreme.ekstenzija"
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Dodaj fotografiju na putanju public/article_images
            $path = $request->file('article_images')->storeAs('public/article_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.png';
        }

        $article = Article::find($id);
        $article->heading = $request->input('heading');
        $article->subheading = $request->input('subheading');
        $article->text = $request->input('text');
        $article->article_images = $fileNameToStore;

        $article->save();

        return redirect('/articles')->with('success', 'Successfully updated article');
    }

    public function destroy(Request $request, $id){
        $article = Article::find($id);
        $article->delete();

        return response()->json($article);
    }

    public function getData(){
        $articles = Article::all();
        return response()->json($articles);
    }

}
