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

  
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 p-5 shadow-lg  border-top border-bottom border-secondary mt-3">

        <?php if($gets != null) { ?>
            <?php foreach ($gets as $item) { ?>

              <?php include(views_path('product-tab/select'));?>

            <?php } ?>
        <?php } else { ?>

            <div class="container-fluid rounded-3" style = "background-color: rgba(255, 51, 51, 1);">
                <h1 class = "text-white text-center">That Product Not Found!!</h1>
            </div>

        <?php } ?>

        </div>

</div>

<?php include PATH . "partials/footer.php" ?>