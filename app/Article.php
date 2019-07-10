<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    protected $fillable = [
        'title', 'description', 'text', 'article_images', 'user_id'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
