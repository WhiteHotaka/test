<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    </head>
    <body>
        <h1 class="title">
            {{ $post->title }}
        </h1>
        <p class="edit">[<a href="/posts/{{ $post->id }}/edit">edit</a>]</p>
        <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post" style="display:inline">
    @csrf
    @method('DELETE')
    <button type="submit">delete</button> 
    　　<p class='delete'>[<span onclick="return deletePost(this);">delete</span>]</p>
        </form>
        <div class="content">
            <div class="content__post">
                <h3>本文</h3>
                <p>{{ $post->body }}</p>    
            </div>
        </div>
        <div class="footer">
            <a href="/">戻る</a>
    <script>
        function deletePost(e) {
           'use strict';
           if(confirm('削除すると復元できません。\n本当に削除しますか？')){
               document.getElementById('form_delete').submit();
           }
        }
    </script>        
        </div>
    </body>
</html>
