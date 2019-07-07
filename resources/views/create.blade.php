@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('New article') }}</div>

                    <div class="card-body">
                        <form method="POST" action="/articles/store" enctype="multipart/form-data">
                            @csrf

                            <input type="text" name="user_id" value="{{ Auth::user()->id }}" hidden>

                            <div class="form-group row">
                                <label for="heading" class="col-md-4 col-form-label text-md-right">{{ __('Article heading') }}</label>

                                <div class="col-md-6">
                                    <input id="heading" type="text" class="form-control @error('heading') is-invalid @enderror" name="heading" value="{{ old('heading') }}" required autocomplete="heading" autofocus>

                                    @error('heading')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="text" class="col-md-4 col-form-label text-md-right">{{ __('Article content') }}</label>

                                <div class="col-md-6">
                                    <textarea id="text" type="text" class="form-control @error('text') is-invalid @enderror" name="text" value="{{ old('text') }}" required autocomplete="text"></textarea>
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
