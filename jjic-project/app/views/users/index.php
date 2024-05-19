<?php include PATH . "partials/header.php" ?>

<div class="container-fluid  p-4 shadow-5 mx-auto" style = "max-width: 1000px; background-color: rgb(45, 45, 45);">

  <?php include PATH . "partials/crumbs.php" ?>
  <div class="mt-5 d-flex justify-content-between align-items-center">
    <h2 class="text-white"><i class="fa">List of Users</i></h2>
    <a href="<?= ROOT ?>/users/create" class="btn bg-black bg-gradient text-white"><i class="fa fa-plus"></i> Add New</a>
  </div>
  <nav class="navbar rounded-3" data-bs-theme="dark">
      <form method="POST" class="form-inline m-1">
        <div class="input-group">
          <span class="input-group-text" id="basic-addon1"><i class = "fa fa-search"></i></span>
          <input type="text" name="user_name" class="form-control" placeholder="Search Name" aria-label="Search" aria-describedby="basic-addon1">
          <button class="btn btn-dark btn-outline-secondary" name="search">Search</button>
        </div>
      </form>
    </nav>

  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 p-5 shadow-lg border-top border-bottom border-secondary">

    <?php if($users != null) { ?>
      <?php foreach ($users as $item) { ?>

        <?php include(views_path('user-tab/user')); ?>

      <?php } ?>
    <?php } else { ?>

      <div class="container-fluid" style = "background-color: rgba(255, 51, 51, 0.5);">
        <h1 class = "text-white">That Profile Not Found!!</h1>
      </div>

    <?php } ?>

  </div>

  <?php if($banned_users != null){?>
    <div class="mt-5 d-flex justify-content-between align-items-center">
      <h2 class="text-white"><i class="fa">List of Banned Users</i></h2>
    </div>
    <nav class="navbar rounded-3" data-bs-theme="dark">
        <form method="POST" class="form-inline m-1">
          <div class="input-group">
            <span class="input-group-text" id="basic-addon1"><i class = "fa fa-search"></i></span>
            <input type="text" name="user_banned" class="form-control" placeholder="Search Banned Name" aria-label="Search" aria-describedby="basic-addon1">
            <button class="btn btn-dark btn-outline-secondary" name="bansearch">Search</button>
          </div>
        </form>
      </nav>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 p-5 shadow-lg border-top border-bottom border-secondary">

      <?php if($banned_users != null) { ?>
        <?php foreach ($banned_users as $item) { ?>

          <?php include(views_path('user-tab/user')); ?>

        <?php } ?>
      <?php } else { ?>

        <div class="container-fluid" style = "background-color: rgba(255, 51, 51, 0.5);">
          <h1 class = "text-white">That Profile Not Found!!</h1>
        </div>

      <?php } ?>

    </div>
  <?php }?>
</div>

<?php include PATH . "partials/footer.php" ?>