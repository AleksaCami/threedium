@extends('layouts.app')

@section('content')
    <div class="p-0" style="background-image: url('/storage/article_images/{{$article->article_images}}'); background-size:100% 100%; height: 435px; background-position: center top; background-attachment: fixed; background-repeat: no-repeat;"></div>
    <div class="container">
        <div class="row justify-content-center py-3">
            <h1>{{$article->heading}}</h1>
        </div>
        <div class="row justify-content-center py-2">
            <p>{{$article->text}}</p>
        </div>
    </div>
@endsection
