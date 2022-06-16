<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Art research</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    </head>
    @extends('layouts.app')　　　　　　　　　　　　　　　　　　

    @section('content')
    　
   <body>
    <h1 class="title">西洋絵画</h1>
    <div class="content">
        <form action="/posts/{{ $post->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class='content__title'>
                <h2>画家名</h2>
                <input type='text' name='post[title]' value="{{ $post->title }}">
            </div>
            <div class='content__body'>
                <h2>タイトル</h2>
                <input type='text' name='post[body]' value="{{ $post->body }}">
            </div>
            <div class='content__body'>
                <h2>国名</h2>
                <input type='text' name='post[country]' value="{{ $post->country }}">
            </div>
            <div class="category">
                 <h2>年代</h2>
                 <select name="post[category_id]">
                     @foreach($categories as $category)
                          <option value="{{ $category->id }}">{{ $category->name }}</option>
                     @endforeach
                 </select>
            </div>
            <input type="submit" value="保存">
        </form>
     
    </div>
    </body>
    @endsection
</html>
