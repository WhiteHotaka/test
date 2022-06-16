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
    <h1>西洋絵画</h1>
        <form action="/posts" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="title">
                <h2>画家名</h2>
                <input type="text" name="post[title]" placeholder="画家名" value="{{ old('post.title') }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
            </div>
            <div class="body">
                <h2>タイトル</h2>
                <input type="text" name="post[body]" placeholder="タイトル" {{ old('post.body') }}/>
                <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
            </div>
            <div class="country">
                <h2>国名</h2>
                <input type="text" name="post[country]" placeholder="国名" value="{{ old('post.country') }}"/>
                <p class="country__error" style="color:red">{{ $errors->first('post.country') }}</p>
            </div>    
            <div class="category">
                 <h2>年代</h2>
                 <select name="post[category_id]">
                     @foreach($categories as $category)
                          <option value="{{ $category->id }}">{{ $category->name }}</option>
                     @endforeach
                 </select>
            </div>
            <input type="file" name="westernart">
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/">back</a>]</div>

    </body>
     @endsection
</html>
