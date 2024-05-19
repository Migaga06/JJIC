<?php

class Home extends Controller
{
  public function index()
  {
    if (!Auth::logged_in()) {
      redirect('login');
    }

    $post = new Post();
    $likes = new Like();
    $rows = $post->loadPost();
    $rows_p = $post->loadPinnedPost();

    if (isset($_POST['btnPost'])) {
      $data = $_POST;
      $files = $_FILES['files'];
      $post->postInsert($data, $files);
      redirect('home');
    }

    if (isset($_POST['btnHeart'])) {

      $likeCount = $likes->submitLike($_POST['btnHeart'], $_SESSION['USER']->user_id);

      redirect('home?likeCount=' . $likeCount);
    }

    if (isset($_POST['pinPost'])) {

      $postIdToPin = $_POST['pinPost'];

      $unpinQuery = "UPDATE posts SET is_pinned = '' WHERE is_pinned = 'Pinned'";
      $post->query($unpinQuery);

      $pinQuery = "UPDATE posts SET is_pinned = 'Pinned' WHERE post_id = :post_id";
      $post->query($pinQuery, ['post_id' => $postIdToPin]);

      redirect('home');
    }

    if (isset($_POST['unpinPost'])) {

      $postIdToUnpin = $_POST['unpinPost'];

      $unpinQuery = "UPDATE posts SET is_pinned = '' WHERE post_id = :post_id";
      $post->query($unpinQuery, ['post_id' => $postIdToUnpin]);

      redirect('home');
    }

    if (isset($_POST['deletePinPost'])) {

      $deletePinPost = $_POST['deletePinPost'];

      $deleteImageQuery = "DELETE FROM post_images WHERE post_id = '$deletePinPost'";
      $post->query($deleteImageQuery);

      $deletePostQuery = "DELETE FROM posts WHERE post_id = '$deletePinPost'";
      $post->query($deletePostQuery);

      redirect('home');
    }

    if (isset($_POST['deletePost'])) {

      $deletePost = $_POST['deletePost'];

      $deleteImageQuery = "DELETE FROM post_images WHERE post_id = '$deletePost'";
      $post->query($deleteImageQuery);

      $deletePostQuery = "DELETE FROM posts WHERE post_id = '$deletePost'";
      $post->query($deletePostQuery);

      redirect('home');
    }
    $this->view('home',[
      'rows'=>$rows,
      'rows_p'=>$rows_p,
    ]);
  }

}