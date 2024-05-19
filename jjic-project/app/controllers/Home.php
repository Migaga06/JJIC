<?php

class Home extends Controller
{
  public function index()
  {
    if (!Auth::logged_in()) {
      redirect('login');
    }

    $post = new Post();
    $rows = $post->loadPost();
    if(isset($_POST['btnPost'])){
      $data = $_POST;
      $files = $_FILES['files'];
      $post->postInsert($data, $files);
    }

    $this->view('home',[
      'rows'=>$rows
    ]);
  }
}