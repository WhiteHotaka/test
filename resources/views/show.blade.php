<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Art search</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    </head>
    @extends('layouts.app')　　　　　　　　　　　　　　　　　　

    @section('content')
    
    
    
 　 　　　　　　　　　　　　  　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　
    <body>
        <h1 class="body">
            {{ $post->body }}
        </h1>
    
        <div class="content">
            <div class="content__post">
                
             <p>{{ $post->title }}</p>  
             
             <p>{{ $post->country }}</p> 
       
        
             <p>{{ $post->category->name }}</p>
             
             <img src="{{ $post->image }}">
            </div>
        </div>
        <p class="edit">[<a href="/posts/{{ $post->id }}/edit">edit</a>]</p>
        <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post" style="display:inline">
            @method('DELETE')
            @csrf    
           <button type="submit">delete</button> 
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
     @endsection
</html>

