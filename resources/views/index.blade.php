<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Art reserch</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    </head>
    @extends('layouts.app')　　　　　　　　　　　　　　　　　　

    @section('content')
    
    
    
    <body>
        <h1>西洋絵画</h1>
        [<a href='/posts/create'>create</a>]
        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post'>
                   <h2 class='body'>
                       <a href="/posts/{{ $post->id }}">{{ $post->body }}</a>
                   </h2>
                   <p class='title'>{{ $post->title }}</p>
                   <p class='country'>{{ $post->country }}</p>
                   <p class='cotegory_id'>{{ $post->category->name }}</a>
                   <img src="{{ $post->image}}">
                </div>
            @endforeach    
        </div>
        <div>
            @foreach($questions as $question)
              <div>
                <a href="https://teratail.com/questions/{{ $question['id'] }}">
                 {{ $question['title'] }}
                </a>
             </div>
            @endforeach
        </div>
    </body>
    @endsection
</html>
   