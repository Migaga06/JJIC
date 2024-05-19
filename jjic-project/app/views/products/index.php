<?php include PATH . "partials/header.php" ?>

<div class="container-fluid  p-4 shadow-5 mx-auto" style = "max-width: 1000px; background-color: rgb(45, 45, 45);">

  <!--for later--><?php include PATH . "partials/crumbs.php" ?>
    <h2 class="text-white text-center mb-2"><i class="fa">Products</i></h2>
    <nav class="navbar rounded-3" data-bs-theme="dark">
      <form method="POST" class="form-inline m-1">
        <div class="input-group">
          <span class="input-group-text" id="basic-addon1"><i class = "fa fa-search"></i></span>
          <input type="text" name="product_name" class="form-control" placeholder="Search Product" aria-label="Search" aria-describedby="basic-addon1">
          <button class="btn btn-dark btn-outline-secondary" name="search">Search</button>
        </div>
      </form>
    </nav>

  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 justify-content-center mt-2 p-3 shadow-lg mx-1 border-top border-bottom border-secondary">


    <?php if($gets != null) { ?>
      <?php foreach ($gets as $item) { ?>

        <?php include(views_path('product-tab/index')); ?>

      <?php } ?>
    <?php } else { ?>

      <div class="container-fluid rounded-3" style = "background-color: rgba(255, 51, 51, 1);">
        <h1 class = "text-white text-center">That Product Not Found!!</h1>
      </div>

    <?php } ?>

  </div>

</div>

<?php include PATH . "partials/footer.php" ?>