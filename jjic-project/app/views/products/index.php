<?php include PATH . "partials/header.php" ?>

<div class="container-fluid  p-4 shadow-5 mx-auto" style = "max-width: 1000px; background-color: rgb(45, 45, 45);">

  <!--for later--><?php include PATH . "partials/crumbs.php" ?>
    <h2 class="text-white text-center mb-2"><i class="fa">Products</i></h2>
    <nav class="navbar rounded-3" data-bs-theme="dark">
      <form class="form-inline m-1">
        <div class="input-group">
          <span class="input-group-text" id="basic-addon1"><i class = "fa fa-search"></i></span>
          <input type="text" class="form-control" placeholder="Search Product" aria-label="Search" aria-describedby="basic-addon1">
        </div>
      </form>
    </nav>

  <div class="card-group justify-content-center p-3 shadow-lg mx-1 border-top border-bottom border-secondary">
    

    <?php if($gets != null) { ?>
      <?php foreach ($gets as $item) { ?>

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

</div>

<?php include PATH . "partials/footer.php" ?>