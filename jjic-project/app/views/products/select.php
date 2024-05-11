<?php include PATH . "partials/header.php" ?>

<div class="container-fluid  p-4 shadow-5 mx-auto" style = "max-width: 1000px; background-color: rgb(45, 45, 45);">

  <!--for later--><?php include PATH . "partials/crumbs.php" ?>
  <div class="mt-5 mx-5 d-flex justify-content-between align-items-center">
    <h2 class="text-white "><i class="fa">Modify Products</i></h2>
    <a href="<?= ROOT ?>/products/create" class="btn bg-black bg-gradient text-white"><i class="fa fa-plus"></i> Add New</a>
  </div>
  <nav class="navbar rounded-3 ms-5" data-bs-theme="dark">
      <form class="form-inline m-1">
        <div class="input-group">
          <span class="input-group-text" id="basic-addon1"><i class = "fa fa-search"></i></span>
          <input type="text" class="form-control" placeholder="Search Product" aria-label="Search" aria-describedby="basic-addon1">
        </div>
      </form>
    </nav>

  <div class="row">
    <div class="col-sm-0 col-md-1"></div>
    <div class="col-sm-12 col-md-10 justify-content-center p-5 shadow-lg  border-top border-bottom border-secondary">
        <div class="card-group justify-content-center">

        <?php if($gets != null) { ?>
            <?php foreach ($gets as $item) { ?>

            <div class="card m-2 bg-dark rounded text-center border border-white" style="max-width: 12rem; min-width: 12rem;">
                <img src="<?= ROOT ?>/<?= $item->image ?>" class="card-img-top rounded-top border border-white" alt="..." style="max-width: 100%; min-width: 100%; max-height: 11rem; min-height: 11rem;">
                <div class="card-body">
                    <div class="p-1 rounded-2 border border-white" style = "background-color: rgb(24, 24, 24);"><h5 class="card-title text-white text-center"><i class="fa fa-product-hunt"></i> <?= $item->product_name?></h5></div>
                    <div class="mt-1 p-1 rounded-4 border border-white" style = "background-color: rgb(24, 24, 24);"><p class="card-text text-center text-white "><small><i class="fa fa-message"></i> <?= $item->product_description?></small></p></div>
                    <div class="card-group justify-content-center">
                        <div class="card-group rounded justify-content-center p-1 border border-white my-1" style = "background-color: rgb(24, 24, 24);">
                            <p class="card-text text-white text-center m-1 px-2 border border-white bg-dark rounded"><small><small><i class="fa fa-t"></i> <?= $item->product_type?></small></small></p>
                            <p class="card-text text-white text-center m-1 px-2 border border-white bg-dark rounded"><small><small><i class="fa fa-person-circle-plus"></i> <?= $item->user->firstname?> <?= $item->user->lastname?></small></small></p>
                        </div>
                        <div class="card-group">
                            <p class="card-text text-success m-1 px-2 border border-success rounded-5"  style = "background-color: rgb(255, 255, 255);"><small><small><i class="fa fa-peso-sign"></i> <?= $item->product_price?></small></small></p>
                            <p class="card-text text-primary m-1 px-2 border border-success rounded-5"  style = "background-color: rgb(255, 255, 255);"><small><small><i class="fa fa-boxes-stacked"></i> <?= $item->product_qty?></small></small></p>
                        </div>
                    </div>
                </div>
                <div class="card-group justify-content-center">
                <a href="<?= ROOT ?>/products/edit/<?= $item->product_id ?>" class="btn btn-success m-1 border border-white"><i class="fa fa-edit"></i> Edit</a>
                <a href="<?= ROOT ?>/products/delete/<?= $item->product_id ?>" class="btn btn-danger m-1 border border-white"><i class="fa fa-trash"></i> Delete</a>
                </div>
            </div>

            <?php } ?>
        <?php } else { ?>

            <div class="container-fluid rounded-3" style = "background-color: rgba(255, 51, 51, 1);">
                <h1 class = "text-white text-center">That Product Not Found!!</h1>
            </div>

        <?php } ?>

        </div>
    </div>
    <div class="col-sm-0 col-md-1"></div>
  </div>

</div>

<?php include PATH . "partials/footer.php" ?>