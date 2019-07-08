@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Update article') }}</div>

                    <div class="card-body">
                        <form method="POST" action="/articles/update/{{$article->id}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="heading" class="col">{{ __('Title') }}</label>

                                <div class="col">
                                    <input id="heading" type="text" class="form-control @error('heading') is-invalid @enderror" name="heading" value="{{ old('heading', $article->heading) }}" required autocomplete="heading" autofocus>

                                    @error('heading')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="subheading" class="col">{{ __('Description') }}</label>

                                <div class="col">
                                    <textarea id="subheading" type="text" class="form-control @error('subheading') is-invalid @enderror" name="subheading" required autocomplete="subheading" autofocus>{{ $article->subheading }}</textarea>

                                    @error('subheading')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="text" class="col">{{ __('Content') }}</label>

                                <div class="col">
                                    <textarea id="summary-ckeditor" type="text" class="form-control @error('text') is-invalid @enderror" name="text"  required autocomplete="text">{{ $article->text }}
                                    </textarea>
                                    @error('text')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="article_images" class="col">{{ __('Add cover image') }}</label>

                                <div class="col">
                                    <input type="file" name="article_images">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update article') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'summary-ckeditor' );
    </script>
@endsection
