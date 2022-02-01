<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1 class="my-4">{{ __('Posts') }}</h1>

                @foreach($posts as $post)
                    <div class="card mb-4">
                        <div class="card-body">
                            <h2 class="card-title">{{ $post->title }}</h2>
                            <p class="card-text">{{ Str::limit($post->body, 200) }}</p>
                            <a href="{{ route('post', $post) }}" class="btn btn-primary">{{ __('Read More') }} &rarr;</a>
                        </div>
                        <div class="card-footer text-muted">
                            {{ __('Posted') }} {{ $post->created_at->diffForHumans() }}
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="col-md-4">
                @auth
                    <div class="card my-4">
                        <h5 class="card-header">{{ __('New Post') }}</h5>
                        <div class="card-body">
                            <form method="POST" action="{{ route('create') }}">
                                @csrf
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="french-tab" data-toggle="tab" href="#french" role="tab" aria-controls="french" aria-selected="true">{{ __('Français') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="english-tab" data-toggle="tab" href="#english" role="tab" aria-controls="english" aria-selected="false">{{ __('Anglais') }}</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="french" role="tabpanel" aria-labelledby="french-tab">
                                        <div class="form-group">
                                            <label for="title_fr">{{ __('Title') }}:</label>
                                            <input type="text" class="form-control" required id="title_fr" name="title[fr]"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="body_fr">{{ __('Content') }}:</label>
                                            <textarea class="form-control" rows="5" required id="body_fr" name="body[fr]"></textarea>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="english" role="tabpanel" aria-labelledby="english-tab">
                                        <div class="form-group">
                                            <label for="title_en">{{ __('Title') }}:</label>
                                            <input type="text" class="form-control" required id="title_en" name="title[en]"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="body_en">{{ __('Content') }}:</label>
                                            <textarea class="form-control" rows="5" required id="body_en" name="body[en]"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-primary" type="submit">{{ __('Post') }}</button>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="card my-4 p-4">
                        <p class="text-center"><a href="{{  route('login') }}">{{ __('Login') }}</a> {{ __('to make a post') }}</p>
                    </div>
                @endauth
            </div>
        </div>
    </div>

</x-app-layout>
