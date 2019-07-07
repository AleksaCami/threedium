@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div >
        <a href="/articles/create"><button class="btn btn-primary">Create Article</button></a>
    </div>
    <div class="row justify-content-center">
        @if(count($articles) == 0)
            <span>No articles. Try adding one!</span>
        @else

                @foreach($articles as $article)
                    <div  class="col-md-4 col-lg-4 mt-3">
                        <figure class="card card-product p-3 flex-fixed-width-item h-100">
                            <div class="d-flex m-4"><img class="img-fluid" style="object-fit: cover; height: 35vh; width: auto" src="/storage/article_images/{{$article->article_images}}"></div>
                            <figcaption class="info-wrap">
                                <h2 id="" class="title">{{$article->heading}}</h2>
                            </figcaption>
                            <figcaption class="info-wrap mb-2">
                                <h5 id="" class="card-text">{{$article->subheading}}</h5>
                            </figcaption>
                            <div class="bottom-wrap">
                                <a href="/articles/article/{{$article->id}}">
                                    <button  class="btn btn-block btn-primary float-right">
                                        Open
                                    </button>
                                </a>
                            </div> <!-- bottom-wrap.// -->
                        </figure>
                    </div> <!-- col // -->
                @endforeach
            @endif
    </div>
</div>
@endsection
