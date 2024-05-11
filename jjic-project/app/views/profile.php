<?php include "partials/header.php" ?>

    <div class="container-fluid  p-4 shadow-5 mx-auto" style = "max-width: 1000px; background-color: rgb(45, 45, 45);">
        <?php include "partials/crumbs.php" ?>
        <h1 class="text-white"><i class="fa">Profile Account</i></h1>

        <?php if (!empty($_SESSION['USER'])): ?>
        <div class="row mx-2 p-3 shadow-lg rounded-4 border-top border-bottom border-secondary">
            <div class="col-sm-4 col-md-3">
                <img src="<?= ROOT ?>/<?= $_SESSION['USER']->image ?>" alt="" class="d-block border border-warning mx-auto rounded-circle" style="width: 150px; height: 150px;">
                <h3 class = "text-center text-white"><?= $_SESSION['USER']->firstname ?> <?= $_SESSION['USER']->lastname ?></h3>
            </div>
            <div class="col-sm-8 col-md-9 p-2 mt-1">
                <table class="table table-dark table-hover table-striped table-bordered">
                    <tr>
                        <th>First Name:</th><td><?= $_SESSION['USER']->firstname ?></td>
                    </tr>
                    <tr>
                        <th>Last Name:</th><td><?= $_SESSION['USER']->lastname ?></td>
                    </tr>
                    <tr>
                        <th>Username:</th><td><?= $_SESSION['USER']->username ?></td>
                    </tr>
                    <tr>
                        <th>Email:</th><td><?= $_SESSION['USER']->email ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <br>
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md bg-dark border-bottom border-body rounded-3" data-bs-theme="dark">
                <div  class="container justify-content-center">
                    <ul class="navbar-nav text-center ">
                    <li class="nav-item mx-5">
                            <a class="nav-link <?=$page_tab=='carts'?'active':''; ?>" href="<?=ROOT?>/profile/<?=$_SESSION['USER']->user_id?>?tab=carts">View Cart</a>
                        </li>
                        <li class="nav-item mx-5">
                            <a class="nav-link <?=$page_tab=='reserves'?'active':''; ?>" href="<?=ROOT?>/profile/<?=$_SESSION['USER']->user_id?>?tab=reserves">Items Reserved</a>
                        </li>
                        <li class="nav-item mx-5">
                            <a class="nav-link <?=$page_tab=='appointments'?'active':''; ?>" href="<?=ROOT?>/profile/<?=$_SESSION['USER']->user_id?>?tab=appointments">Appointment</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <nav class="navbar bg-dark rounded-3 mt-2" data-bs-theme="dark">
                <form class="form-inline m-1">
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1"><i class = "fa fa-search"></i></span>
                        <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon1">
                    </div>
                </form>
            </nav>

            <div class="card-group mt-2 justify-content-center p-3 shadow-lg mx-1 border-top border-bottom border-secondary rounded">
    

    <?php if($row_cart != null) { ?>
      <?php foreach ($row_cart as $item) { ?>

        <div class="card m-2 shadow-lg text-bg-dark border border-white rounded" style="max-width: 18rem; min-width: 15rem; min-height: 25rem; ">
          <img src="<?= ROOT ?>/<?= $item->image ?>" class="card-img" alt="..." style="min-height: 25rem; height: 100%;">
          <div class="card-img-overlay">
            <div class="card-group">
              <div class="row">
                <div class="col-12">
                  <h5 class="card-title p-2 border border-dark rounded-4" style = "background-color: rgba(64, 64, 64, 0.5);"><i class="fa fa-product-hunt"></i> <?= $item->product_name?></h5>
                </div>
                <div class="col-12">
                  <small><p class="card-text p-1 border border-dark rounded-3" style = "background-color: rgba(64, 64, 64, 0.5);"><i class="fa fa-message"></i> <?= $item->product_description?></p></small>
                </div>
              </div>
            </div>
            
            <div class="card-group">
              <p class="card-text text-success m-1 px-2 border border-success rounded-5" style = "background-color: rgba(255, 255, 255, 0.7);"><small><small><i class="fa fa-peso-sign"></i> <?= $item->product_price?></small></small></p>
              <p class="card-text text-primary m-1 px-2 border border-primary rounded-5" style = "background-color: rgba(255, 255, 255, 0.7);"><small><small><i class="fa fa-boxes-stacked"></i> <?= $item->product_qty?></small></small></p>
              <p class="card-text text-danger m-1 px-2 border border-danger rounded-5" style = "background-color: rgba(255, 255, 255, 0.7);"><small><small><i class="fa fa-t"></i> <?= $item->product_type?></small></small></p>
            </div>
            <div class="card-group justify-content-center position-absolute bottom-0 start-50 translate-middle-x">
              <a href="<?= ROOT ?>/products/add/<?= $item->product_id ?>" class="btn m-1 border border-white text-white" style = "background-color: rgba(255, 128, 0, 0.7);"><small><small><i class="fa fa-cart-plus"></i> Add to Cart</small></small></a>
              <a href="<?= ROOT ?>/products<?= $item->id ?>" class="btn m-1 border border-white text-white" style = "background-color: rgba(102, 102, 255, 0.7);"><small><small><i class="fa fa-basket-shopping"></i> Reserve Item</small></small></a>
            </div>
          </div>
        </div>

      <?php } ?>
    <?php } else { ?>

      <div class="container-fluid rounded-3" style = "background-color: rgba(255, 51, 51, 1);">
        <h1 class = "text-white text-center">That Product Not Found!!</h1>
      </div>

    <?php } ?>
        </div>
        <?php else:?>
            <div class="container-fluid rounded-3" style = "background-color: rgba(255, 51, 51, 1);">
                <h1 class = "text-white text-center">That Profile Not Found!!</h1>
            </div>
        <?php endif; ?>
    </div>

<?php include "partials/footer.php" ?>