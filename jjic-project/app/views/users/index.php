<?php include PATH . "partials/header.php" ?>

<div class="container-fluid  p-4 shadow-5 mx-auto" style = "max-width: 1000px; background-color: rgb(45, 45, 45);">

  <?php include PATH . "partials/crumbs.php" ?>
  <div class="mt-5 d-flex justify-content-between align-items-center">
    <h2 class="text-white"><i class="fa">List of Users</i></h2>
    <a href="<?= ROOT ?>/users/create" class="btn bg-black bg-gradient text-white"><i class="fa fa-plus"></i> Add New</a>
  </div>
  <nav class="navbar rounded-3" data-bs-theme="dark">
      <form class="form-inline m-1">
        <div class="input-group">
          <span class="input-group-text" id="basic-addon1"><i class = "fa fa-search"></i></span>
          <input type="text" class="form-control" placeholder="Search Product" aria-label="Search" aria-describedby="basic-addon1">
        </div>
      </form>
    </nav>

  <div class="card-group justify-content-center p-5 shadow-lg border-top border-bottom border-secondary">

    <?php if($users != null) { ?>
      <?php foreach ($users as $item) { ?>

        <div class="card m-2 bg-dark rounded border border-white" style="max-width: 13rem; min-width: 13rem;">
          <img src="<?= ROOT ?>/<?= $item->image ?>" class="card-img-top rounded-top border border-white" alt="..." style="max-width: 100%; min-width: 100%; max-height: 13rem; min-height: 13rem;">
          <div class="card-body h-100">
            <a href="" class="btn btn-secondary " style = "max-width: 1000px; background-color: rgba(255, 255, 255, 0.9);">
              <h5 class="card-title text-black">
                <i class="fa fa-id-card"></i> <?= $item->firstname ?> <?= $item->lastname ?>
              </h5>
            </a>
            <p class="card-text text-white mt-1 text-center"><i class="fa fa-circle-user"></i> <?= $item->role ?></p>
          </div>
          <div class="card-body text-center">
            <a href="<?= ROOT ?>/users/edit/<?= $item->user_id ?>" class="btn btn-success my-1"><i class="fa fa-edit"></i> Edit</a>
            <a href="<?= ROOT ?>/users/delete/<?= $item->user_id ?>" class="btn btn-danger my-1"><i class="fa fa-trash"></i> Delete</a>
          </div>
        </div>

      <?php } ?>
    <?php } else { ?>

      <div class="container-fluid" style = "background-color: rgba(255, 51, 51, 0.5);">
        <h1 class = "text-white">That Profile Not Found!!</h1>
      </div>

    <?php } ?>

  </div>

</div>

<?php include PATH . "partials/footer.php" ?>