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

                            {{--                            <input type="text" name="user_id" value="{{ Auth::user()->id }}" hidden>--}}

                            <div class="form-group row">
                                <label for="heading" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                                <div class="col-md-6">
                                    <input id="heading" type="text" class="form-control @error('heading') is-invalid @enderror" name="heading" value="{{ old('heading', $article->heading) }}" required autocomplete="heading" autofocus>

                                    @error('heading')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="subheading" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <textarea id="subheading" type="text" class="form-control @error('subheading') is-invalid @enderror" name="subheading" required autocomplete="subheading" autofocus>{{ $article->subheading }}</textarea>

                                    @error('subheading')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="text" class="col-md-4 col-form-label text-md-right">{{ __('Content') }}</label>

                                <div class="col-md-6">
                                    <textarea id="text" type="text" class="form-control @error('text') is-invalid @enderror" name="text"  required autocomplete="text">{{ $article->text }}
                                    </textarea>
                                    @error('text')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="article_images" class="col-md-4 col-form-label text-md-right">{{ __('Add cover image') }}</label>

                                <div class="col-md-6">
                                    <input type="file" name="article_images">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Create article') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
