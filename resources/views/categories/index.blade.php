<a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>

@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
 　　　　　　　　　　　　　  　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　
@endsection

 Auth::user()
 {{Auth::user()}}
 Auth::user()->name 
 {{Auth::user()->name}}