<?php

namespace App\Http\Controllers;

use App\Article;
use App\User;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function create(){
        $users  = User::all();
        return view('create')->with('users', $users);
    }

    public function store(Request $request){
        $this->validate($request, [
            'heading' => 'required',
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
        $articles->text = $request->input('text');
        $articles->user_id = $request->input('user_id');
        $articles->article_images = $fileNameToStore;

        $articles->save();

        return redirect('/articles')->with('success', 'Successfully added a new article');
    }
}
