<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $user->name }}}</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12 my-3 pt-3 shadow">
              
                    @if( isset($user->image->url) )
                        <img src="{{ $user->image->url }}" alt="" class="float-left rounded-circle mr-2">
                    @endif
                    <h2> Nombre : {{ $user->name }} </h2>
                    <h3> Correo Electronico {{ $user->email }} </h3>
                    <br>
                    <p> <b>Instagram</b> {{ $user->profile->instagram }}</p>
                    <p> <b>Github</b> {{ $user->profile->github }}</p>
                    <p> <b>Web</b> {{ $user->profile->web }}</p>
                    <hr>
                    <p>

                        <b>País</b> {{ $user->location->country }} <br>

                       
                        @if($user->level) 
                            <b>Nivel</b>  <a href="{{ route('level' ,['id'=>$user->level->id]) }}">{{ $user->level->name }}</a> 
                        @else
                            <span>Aún no perteneces a un nivel</span>
                        @endif
                    </p>
                    <hr>
                    <p>
                        @forelse($user->groups as $group)
                            <span class="badge badge-primary">{{ $group->name }}</span>
                        @empty
                            <span> Aún no perteneces a un grupo</span>
                        @endforelse
                    </p>

                    <hr>

                    <h3>Post</h3>
                    <div class="row">
                        @foreach($posts as $post)
                            <div class="col-6">
                                <div class="card mb-3">
                                    <div class="row no gutters">
                                        <div class="col-md-4">
                                            <img src="{{ $post->image->url }}" alt="" class="card-img">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $post->name }}</h5>
                                                <h6 class="card-subtitle text-muted">
                                                    {{ $post->category->name }} |
                                                    {{ $post->comments_count }}
                                                    {{ Str::plural('comentario', $post->comments_count) }}

                                                </h6>
                                                <p class="card-text small">
                                                    @foreach($post->tags as $tag)
                                                        <span class="badge badge-light">
                                                            #{{ $tag->name }}
                                                        </span>
                                                    @endforeach

                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <hr>

                    <h3>Videos</h3>
                    <div class="row">
                        @foreach($videos as $video)
                            <div class="col-6">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <img src="{{ $video->image->url }}" alt="" class="card-img">
                                            </div>
                                            <div class="col-md-8">
                                                <h5 class="card-title">{{ $video->name }}</h5>
                                                <h6 class="card-subtitle text-muted">
                                                    {{ $video->category->name }} |
                                                    {{ $video->comments_count }}
                                                    {{ Str::plural('comentario', $video->comments_count) }}

                                                </h6>
                                                <p class="card-text small">
                                                    @foreach($video->tags as $tag)
                                                        <span class="badge badge-light">
                                                            #{{ $tag->name }}
                                                        </span>
                                                    @endforeach

                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </body>
</html>
