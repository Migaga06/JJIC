<nav class="navbar mt-2 " data-bs-theme="dark">
                <form class="form-inline">
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1"><i class = "fa fa-search"></i></span>
                        <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon1">
                    </div>
                </form>
                <a href="<?=ROOT?>/products/index" class="btn btn-sm btn-dark mt-1"><i class="fa fa-cart-plus"></i> View All Product</a>
            </nav>

<h1 class="text-white mt-2"><i class="fa">View Cart</i></h1>
<?php if($row_cart != null) { ?>
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 mt-3 p-3 shadow-lg mx-1 border-top border-bottom border-secondary rounded row">
                
                   
                    <?php foreach ($row_cart as $item) { ?>
                        
                            <div class="col">
                                <div class="card h-100" style="min-height: 22rem; height: 100%;">
                                <img src="<?= ROOT ?>/<?= $item->image ?>" class="card-img-top rounded" alt="..." style="min-height: 22rem; height: 100%;">
                                <div class="card-img-overlay">
                                    <h5 class="card-title p-2 border border-dark rounded-4 text-white" style = "background-color: rgba(64, 64, 64, 0.5);"><i class="fa fa-product-hunt"></i> <?= $item->product_name?></h5>
                                    <small>
                                            <p class="card-text p-1 border border-dark rounded-3 text-white" style = "background-color: rgba(64, 64, 64, 0.5);"><i class="fa fa-message"></i> <?= $item->product_description?></p>
                                    </small>
                                    <div class="card-group">
                                        <p class="card-text text-success m-1 px-2 border border-success rounded-5" style = "background-color: rgba(255, 255, 255, 0.7);">
                                            <small>
                                                <small>
                                                    <i class="fa fa-peso-sign"></i> <?= $item->product_price?>
                                                </small>
                                            </small>
                                        </p>
                                        <p class="card-text text-primary m-1 px-2 border border-primary rounded-5" style = "background-color: rgba(255, 255, 255, 0.7);">
                                            <small>
                                                <small>
                                                    <i class="fa fa-boxes-stacked"></i> <?= $item->product_qty?>
                                                </small>
                                            </small>
                                        </p>
                                        <p class="card-text text-danger m-1 px-2 border border-danger rounded-5" style = "background-color: rgba(255, 255, 255, 0.7);">
                                            <small>
                                                <small>
                                                    <i class="fa fa-t"></i> <?= $item->product_type?>
                                                </small>
                                            </small>
                                        </p>
                                    </div>
                                </div>
                                <div class="card-group justify-content-center position-absolute bottom-0 start-50 translate-middle-x mb-2 text-center" style="max-width: 19rem; width:100%;">
                                
                                <a href="<?=ROOT?>/profile/<?=$item->cart_id?>?tab=cart-reserve" class="btn border border-black text-white m-1" style = "background-color: rgba(102, 102, 255, 0.7);"><small><small><i class="fa fa-basket-shopping"></i> Reserve Item</small></small></a>
                                <a href="<?= ROOT ?>/profile/<?=$item->cart_id?>?tab=cart-remove" class="btn border border-black text-white m-1" style = "background-color: rgba(255, 102, 102, 0.7);"><small><small><i class="fa fa-basket-shopping"></i> Remove Item</small></small></a>
                                </div>
                                </div>
                            </div>
                    <?php } ?>
                
</div>
<?php } else { ?>

<div class="container-fluid rounded-2 bg-dark p-2" style = "background-color: rgba(255, 51, 51, 1);">
    <h3 class = "text-white text-center">Currently don't have any item on cart!!</h3>
</div>

<?php } ?>