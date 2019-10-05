<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\post;
class postscontroller extends Controller
{
  public function __construct()
  {
      $this->middleware('auth')->except(['index','show']);
  }


  // index page
  public function index(){
    // $posts= post::take(5)->get();

    // $posts=DB::select('select * from posts');
    $posts= post::orderBy('id', 'DESC')->paginate(5);
    $count=post::count();

    return view('posts.index',compact('posts','count'));
  }
// show page

public function show($id){

$post= post::find($id);
return view('posts.show',compact('post'));}

// create post

public function create(){
  return view('posts.create');
}

// store post
public function store(Request $request){

  $request->validate([
'title'=>'required|max:200',
'body'=>'required|max:500',
'coverImage'=>'image|mimes:jpeg,bmp,png|max:1999']);

if ($request->hasFile('coverImage')) {
  $file=$request->file('coverImage');
  $ext=$file->getclientOriginalExtension();
  $filename='cover_image' . '_' . time() . '.' . $ext;
   $file->storeAS('public/coverImages',$filename);
  
}else {
  $filename = 'noimage.png';
}

  $post= new post();
  $post->title=$request->title;
  $post->body=$request->body;
  $post->image=$filename;
  $post->user_id=auth()->user()->id;
  $post->save();

  return redirect('/posts')->with('status','post was created !');
  
}

// edit post form

public function edit($id){
$post= post::find($id);
if (auth()->user()->id !== $post->user_id) {
return redirect('/posts')->with('error','you are not authorized');
}
return view('posts.edit',compact('post'));
}

// update post form

 public function update(Request $request,$id)
{

  $request->validate([
    'title'=>'required|max:200',
    'body'=>'required|max:500']);

    $post= post::find($id);
    $post->title = $request->title;
    $post->body = $request->body;
    $post->save();
    return redirect('/posts')->with('status','post was Updated !');
}

// destroy post

 public function destroy($id)
 {
$post= post::find($id);

$post->delete();

return redirect('/posts')->with('status','post was Deleted !');
 }

}
