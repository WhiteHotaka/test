<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests\PostRequest; 
use App\Category;
use Storage;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Post $post)
    {
        $client = new \GuzzleHttp\Client();
        $url = 'https://teratail.com/api/v1/questions';
        $response = $client->request(
            'GET',
            $url,
            ['Bearer' => config('services.teratail.token')]
        );
        $questions = json_decode($response->getBody(), true);

        return view('index')->with([
            'posts' => $post->getPaginateByLimit(),
            'questions' => $questions['questions'],
        ]);
    }

    public function show(Post $post)
    {
        return view('show')->with(['post' => $post]);
    }

   
    public function store(Post $post, PostRequest $request) 
    {
      $post = new Post;
      $form = $request->all();

      //s3アップロード開始
      $image = $request->file('westernart');
      // バケットの`test`フォルダへアップロード
      $path = Storage::disk('s3')->putFile('test', $image, 'public');
      // アップロードした画像のフルパスを取得
      $post->image = Storage::disk('s3')->url($path);
      
      
        $input = $request['post'];
        $post->fill($input)->save();
        
        return redirect('/posts/' . $post->id);
    }
    
    public function edit(Post $post, Category $category)
    {
    return view('edit')->with(['categories' => $category->get(), 'post'=> $post]);
    }
    
    public function update(PostRequest $request, Post $post)
    {
    $input_post = $request['post'];
    $post->fill($input_post)->save();

    return redirect('/posts/' . $post->id);
    }
    
    public function delete(Post $post)
    {
    $post->delete();
    return redirect('/');
    }
    
    public function create(Category $category)
    {
    return view('create')->with(['categories' => $category->get()]);;
    }
   
     public function add()
    {
      return view('posts.create');
    } 
}