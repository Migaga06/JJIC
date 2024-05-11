<?php include PATH . "partials/header.php" ?>

<div class="container-fluid  p-4 shadow-5 mx-auto" style = "max-width: 1000px; background-color: rgb(45, 45, 45);">
    <?php include PATH . "partials/crumbs.php" ?>

    <div class="card-group justify-content-center">
        <form action="" method="POST" enctype="multipart/form-data" class="mt-5 mb-5 w-50 mx-auto  p-5 shadow-lg mx-auto border-top border-bottom border-secondary">

            <!-- ALERT MESSAGE -->
            <?php if (!empty($errors)): ?>

                <div class="alert alert-dark alert-dismissible fade show" role="alert">

                    <?php foreach ($errors as $error): ?>

                        <?= $error . "<br>" ?>

                    <?php endforeach; ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

            <?php endif; ?>

            <h2 class="text-white text-center"><i class="fa">Create Product</i></h2>
                <input type="hidden" name="product_id">
                <input type="hidden" name="make_user_id">

            <div class="mb-2">
                <img src="<?= ROOT ?>/assets/images/icons8-default-image-96.png" alt=" empty" class="d-block border border-warning mx-auto rounded-4" style="width: 150px; height: 150px;">
                <div class="text-center">
                    <label for="image_browser"  class="btn-sm btn bg-black bg-gradient text-white mt-2">
                        <input onchange="display_image_name(this.files[0].name)" id="image_browser" type="file" name="image" style="display: none;">
                        <i class="fa fa-upload"></i> Browse image
                    </label>
                    <p class = "file_info text-muted bg-white rounded mt-1"></p>
                </div>
            </div>
            <div class="mb-2">
                <label for="" class="text-white">Product Name</label>
                <input class="form-control" value="<?= get_var('product_name')?>"type="text" name="product_name" placeholder="Product Name">
            </div>
            <div class="mb-2">
                <label for="" class="text-white">Product Description</label>
                <input class="form-control" value="<?= get_var('product_description')?>"type="text" name="product_description" placeholder="Product Description">
            </div>
            <div class="mb-2">
                <label for="" class="text-white">Product Price</label>
                <input class="form-control" value="<?= get_var('product_price')?>"type="text" name="product_price" placeholder="Product Price">
            </div>
            <div class="mb-2">
                <label for="" class="text-white">Product Quantity</label>
                <input class="form-control" value="<?= get_var('product_qty')?>"type="text" name="product_qty" placeholder="Product Quantity">
            </div>
            <div class="mb-2">
                <label for="" class="text-white">Product Type</label>
                <input class="form-control" value="<?= get_var('product_type')?>"type="text" name="product_type" placeholder="Product Type">
            </div>
            <div class="d-grid gap-2 col-6 mx-auto">
                <button type="submit" class="btn bg-black bg-gradient text-white">Create Product</button>
                <a href="<?= ROOT ?>/products/select" class="btn bg-dark bg-gradient text-white">Cancel</a>
            </div>
        </form>
    </div>

</div>
<script>
    function display_image_name(file_name){
            document.querySelector(".file_info").innerHTML = '<b>Selected file:</b><br>' + file_name;
    }
</script>

<?php include PATH . "partials/footer.php" ?>