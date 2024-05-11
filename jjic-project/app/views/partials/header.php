<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Yaku MC Parts</title>
  <link rel="stylesheet" href="<?= ROOT ?>/assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= ROOT ?>/assets/fontawesome/all.min.css">
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style.css">
</head>
<header>
<nav class="navbar navbar-expand-xl sticky-top"  style = "background-color: rgba(255, 255, 255, 0.9);">
    <div class="container my-3">
      <a class="navbar-brand" href="#"><i class="fa">Yaku Motorcycle Parts</i></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

          <?php if (!empty($_SESSION['USER'])): ?>

            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="<?= ROOT ?>/home"><i class="fa fa-house-chimney"></i> Home</a>
            </li>
            <?php if(Auth::access('Super Admin')):?>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="<?= ROOT ?>/users"><i class="fa fa-users"></i> Users</a>
            </li>
            <?php endif; ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-cart-shopping"></i> Product</a>
              <ul class="dropdown-menu" arial-labelledby="navbarDropdownMenuLink">
                <li class="nav-item">
                  <small><a class="nav-link active p-2 mx-2" aria-current="page" href="<?= ROOT ?>/products"><i class="fa fa-expand"></i> View Product</a></small>
                </li>
                <?php if(Auth::access('Admin')):?>
                <li class="nav-item">
                  <small><a class="nav-link active p-2 mx-2" aria-current="page" href="<?= ROOT ?>/products/select/"><i class="fa fa-screwdriver-wrench"></i> Modify Product</a></small>
                </li>
                <?php endif; ?>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="<?= ROOT ?>/appointment"><i class="fa fa-calendar-check"></i> Appointment</a>
            </li>

          <?php endif;?>
        </ul>

        <?php if (empty($_SESSION['USER'])): ?>

          <a href="<?= ROOT ?>/login" class="btn rounded-5 text-white border border-white" style = "background-color: rgb(45, 45, 45);"><i class="fa fa-right-to-bracket"></i> Login</a>

        <?php else: ?>

            <a class="nav-link me-2 p-2 rounded-5 border border-white active text-white" style="background-color: rgb(45, 45, 45);" href="<?= ROOT ?>/profile">
              <img class="rounded-circle border border-warning" height="30px" width="30px" src="<?= ROOT ?>/<?= $_SESSION['USER']->image ?>"
                alt="">
              <?= $_SESSION['USER']->firstname ?>
              <?= $_SESSION['USER']->lastname ?>
            </a>
            <a class="nav-link me-2 p-2 rounded-5 border border-white active text-white" style="background-color: rgb(45, 45, 45);" href="<?= ROOT ?>/profile">
              <small><small><i class="fa fa-cart-flatbed"></i> View Cart</small></small>
            </a>

          <a href="<?= ROOT ?>/logout" class="btn rounded-5 text-white border border-white" style = "background-color: rgb(45, 45, 45);"><i class="fa fa-right-from-bracket"></i> Logout</a>

        <?php endif; ?>

      </div>
    </div>
  </nav>
</header>
<body style ="height: 100%; background-image: url(<?=ROOT?>/assets/images/yakuback.png); background-size: cover; background-position: center; background-repeat: no-repeat;">
