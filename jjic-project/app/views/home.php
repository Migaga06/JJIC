<?php include "partials/header.php" ?>

<div class="container-fluid  p-4 shadow-5 mx-auto" style = "max-width: 1100px; background-color: rgb(45, 45, 45);">
  <div class="row">
    <div class="col-8 text-center">
    <h1 class="text-white my-2 bg-dark rounded-5 border border-white p-3" ><i class="fa fa-hand"></i> Hello <?= $_SESSION['USER']->firstname ?> how's your day today?</h1>
    </div>
  </div>
  <form action="" method="post" enctype="multipart/form-data" data-bs-theme="dark" class ="text-white mt-3">

    <?php if(Auth::access('Staff')){?>

    <div class="row p-4 rounded-3 border border-dark mx-5 shadow" style = "background-color: rgb(55, 55, 55);">
      <div class="col-sm-12 col-md-1 col-lg-1">
        <img src="<?= ROOT ?>/<?= $_SESSION['USER']->user_image ?>" class="d-block border border-dark mx-auto rounded-circle" alt="" style="width: 40px; height: 40px;">
      </div>
      <div class="col-sm-12 p-1 col-md-11 col-lg-11">
        <button class="btn border border-dark rounded-5 text-start" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" style="width: 100%; background-color: rgb(75, 75, 75);">
          <i class="fa fa-circle-plus"></i> Create New Post
        </button>
      </div>
    </div>

    <div class="collapse p-4 rounded-3 border border-dark mx-5 mt-2  shadow" id="collapseExample" style = "background-color: rgb(55, 55, 55);">
      <div class="row">
        <div class="col-lg-12 mb-1">
          <div class="row">
            <label for="title" class="form-label">Title</label>
            <div class="col-sm-8 col-md-7 col-lg-6">
              <input type="hidden" class="form-control" name="user_id" value="<?= $_SESSION['USER']->user_id?>">
              <input name="post_title" id="title" class="form-control" placeholder="What's title do you want?" style="background-color: rgb(75, 75, 75);" required></input>
            </div>
            <div class="col-sm-4 col-md-5 col-lg-6">
              <div class="form-text" for="title">Enter title of your post</div></div>
            </div>
        </div>
        <div class="col-lg-12 mb-1">
          <label for="tdesc" class="form-label">Description</label>
          <input type="hidden" class="form-control" name="user_id" value="<?= $_SESSION['USER']->user_id?>">
          <textarea name="post_description" class="form-control" placeholder="What's on your mind?" style="background-color: rgb(75, 75, 75);"></textarea>
        </div>
        <div class="col-lg-12 mt-1">
          <div class="row">
            <div class="col-sm-3 col-md-5 col-lg-6"></div>
            <div class="col-sm-6 col-md-5 col-lg-4">
              <input type="file" name="files[]" class="form-control" multiple style="background-color: rgb(75, 75, 75);">
              <div class="form-text" id="basic-addon4">Upload only jpeg/png you can also upload mp4</div>
            </div>
            <div class="col-sm-3 col-md-2 col-lg-2">
              <button type="submit" name="btnPost" class="form-control" style="background-color: rgb(75, 75, 75);">Post</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php }?>
  </form>
  <?php if($rows_p != null){?>
  <div class="row justify-content-center mt-3 mb-5">
      <div class="col-2"></div>
      <div class="col-8">

          <?php include(views_path('home-post/post-format/pinned'));?>

      </div>
      <div class="col-2"></div>
  </div>

  <hr class="text-white">
  <?php }?>
  <?php if($rows != null){ ?>


      <h1 class="text-white my-2 mb-5 mt-5  text-center" ><i class="fa fa-hand"></i> Hello <?= $_SESSION['USER']->firstname ?> here what's new today</h1>


  <div class="row justify-content-center mt-3">
      <div class="col-2"></div>
      <div class="col-8">

          <?php include(views_path('home-post/post-format/format'));?>

      </div>
      <div class="col-2"></div>
  </div>
  <?php }?>
</div>


<?php include "partials/footer.php" ?>