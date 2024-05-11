<div class="col">
    <div class="card m-2 h-100 text-bg-dark " style="min-height: 24rem; height: 100%;">
          <img src="<?= ROOT ?>/<?= $item->image ?>" class="card-img-top rounded" alt="..." style="min-height: 24rem;  height: 100%;">
          <div class="card-img-overlay">
            <div class="card-group">
              <div class="row">
                <div class="col-12">
                  <h5 class="card-title p-2 border border-dark rounded-4 text-white" style = "background-color: rgba(64, 64, 64, 0.5);"><i class="fa fa-product-hunt"></i> <?= $item->product_name?></h5>
                </div>
                <div class="col-12">
                  <small><p class="card-text p-1 border border-dark rounded-3 text-white" style = "background-color: rgba(64, 64, 64, 0.5);"><i class="fa fa-message"></i> <?= $item->product_description?></p></small>
                </div>
              </div>
            </div>
            
            <div class="card-group">
              <p class="card-text text-success m-1 px-2 border border-success rounded-5" style = "background-color: rgba(255, 255, 255, 0.7);"><small><small><i class="fa fa-peso-sign"></i> <?= $item->product_price?></small></small></p>
              <p class="card-text text-primary m-1 px-2 border border-primary rounded-5" style = "background-color: rgba(255, 255, 255, 0.7);"><small><small><i class="fa fa-boxes-stacked"></i> <?= $item->product_qty?></small></small></p>
              <p class="card-text text-danger m-1 px-2 border border-danger rounded-5" style = "background-color: rgba(255, 255, 255, 0.7);"><small><small><i class="fa fa-t"></i> <?= $item->product_type?></small></small></p>
            </div>
            <div class="card-group justify-content-center position-absolute bottom-0 start-50 translate-middle-x text-center" style="max-width: 19rem; width:100%;">
              <a href="<?= ROOT ?>/products/add/<?= $item->product_id ?>" class="btn m-1 border border-white text-white" style = " max-height: 7rem; background-color: rgba(255, 128, 0, 0.7);"><small><small><i class="fa fa-cart-plus"></i> Add to Cart</small></small></a>
              <a href="<?= ROOT ?>/products/reserve/<?= $item->product_id ?>" class="btn m-1 border border-white text-white" style = "background-color: rgba(102, 102, 255, 0.7);"><small><small><i class="fa fa-basket-shopping"></i> Reserve Item</small></small></a>
            </div>
          </div>
    </div>
</div>