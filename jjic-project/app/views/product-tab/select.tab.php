<div class="col">
    <div class="card h-100" style="min-height: 22rem; height: 100%;">
                <img src="<?= ROOT ?>/<?= $item->image ?>" class="card-img-top rounded" alt="..." style="min-height: 22rem; height: 100%;">
                <div class="card-img-overlay">
                    <div class="p-1 rounded-2 border border-white" style = "background-color: rgba(24, 24, 24, 0.5);"><h5 class="card-title text-white text-center"><i class="fa fa-product-hunt"></i> <?= $item->product_name?></h5></div>
                    <div class="mt-1 p-1 rounded-4 border border-white" style = "background-color: rgba(24, 24, 24, 0.5);"><p class="card-text text-center text-white "><small><i class="fa fa-message"></i> <?= $item->product_description?></small></p></div>
                    <div class="card-group justify-content-center">
                        <div class="card-group rounded justify-content-center p-1 my-1" >
                            <p class="card-text text-white text-center m-1 px-2 border border-white rounded" style = "background-color: rgba(24, 24, 24, 0.8);"><small><small><i class="fa fa-t"></i> <?= $item->product_type?></small></small></p>
                            <p class="card-text text-white text-center m-1 px-2 border border-white rounded" style = "background-color: rgba(24, 24, 24, 0.8);"><small><small><i class="fa fa-person-circle-plus"></i> <?= $item->user->firstname?> <?= $item->user->lastname?></small></small></p>
                        </div>
                        <div class="card-group">
                            <p class="card-text text-success m-1 px-2 border border-success rounded-5"  style = "background-color: rgba(210, 210, 210, 0.6);"><small><small><i class="fa fa-peso-sign"></i> <?= $item->product_price?></small></small></p>
                            <p class="card-text text-primary m-1 px-2 border border-primary rounded-5"  style = "background-color: rgba(210, 210, 210, 0.6);"><small><small><i class="fa fa-boxes-stacked"></i> <?= $item->product_qty?></small></small></p>
                        </div>
                    </div>
                    <div class="card-group justify-content-center position-absolute bottom-0 start-50 translate-middle-x text-center" style="max-width: 19rem; width:100%;">
                    <a href="<?= ROOT ?>/products/edit/<?= $item->product_id ?>" class="btn btn-success m-1 border border-white"><i class="fa fa-edit"></i> Edit</a>
                    <a href="<?= ROOT ?>/products/delete/<?= $item->product_id ?>" class="btn btn-danger m-1 border border-white"><i class="fa fa-trash"></i> Delete</a>
                    </div>
                </div>
    </div>
</div>