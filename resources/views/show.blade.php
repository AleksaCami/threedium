@extends('layouts.app')

@section('content')
    <div class="p-0" style="background-image: url('/storage/article_images/{{$article->article_images}}'); background-size:100% 100%; height: 435px; background-position: center top; background-attachment: fixed; background-repeat: no-repeat;"></div>
    <div class="container py-5">
        <div class="row justify-content-center py-3">
            <h1 style="font-size: 35px">{{$article->heading}}</h1>
        </div>
        <div class="row justify-content-center py-2">
            <h3 style="font-size: 20px">{{$article->subheading}}</h3>
        </div>
        <div class="row justify-content-center py-4">
           <span style="font-size: 15px">{!! $article->text !!}</span>
        </div>
    </div>
@endsection
