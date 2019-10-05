<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pagescontroller extends Controller
{


    public function About(){ return view('pages.About');}


  public function index(){ $title='Welcom to home page test';
      return view('pages.index',compact('title'));}




  public function serves(){
    $data = [
        'title' => 'the following serves are aprovide:',
        'services' => ['programing','web design','automation']
    ];

    return view('pages.Serves')->with($data);}

}

?>
