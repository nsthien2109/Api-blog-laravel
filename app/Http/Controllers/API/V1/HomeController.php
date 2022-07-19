<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use App\Models\V1\Post;
use App\Models\V1\CategoryPost;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller {

  public function slide(){
    $posts = Post::orderBy('id_post', 'DESC')->limit(5)->get();
    return $posts;
  }

  public function exchange(){
    $response = Http::accept('application/json')->get('https://www.dongabank.com.vn/exchange/export');
    $jsonString = trim($response->body(),"()");
    $exchangeData = json_decode($jsonString, true);
    return $exchangeData;
  }

  public function weather(){
    $response = Http::accept('application/json')->get('http://api.weatherstack.com/current?access_key=10486ec0aa170edc0ee34fed0a54b564&query=Da%20Nang');
    $weather = json_decode($response->body(), true);
    return $weather;
  }

  public function latest(){
    $posts = Post::orderBy('id_post', 'DESC')->limit(20)->get();
    return $posts;
  }

  public function postsByCategory(Post $id){
      //$result = Post::where('id_category',$id)->get();
      $result = DB::table('posts')->where('id_category',$id)->get();
      return new PostResource($result);
  }
}
