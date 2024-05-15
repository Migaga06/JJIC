<tr>
          <form action="" method="POST">
          <td ><?= $item->product_name?></td>
          <td><?= $item->product_description ?></td>
          <td><?= $item->product_type ?></td>
          <td><i class="fa fa-peso-sign"></i> <?= $item->product_price ?></td>
          <td><?= $item->product_qty ?></td>
          <td>
            <img class="rounded"width="80px" height="80px" src="<?= ROOT ?>/<?= $item->image ?>" alt="">
          </td>
          <td>
            <div class="d-grid gap-2 d-md-flex">
            <button data-bs-toggle="modal" data-bs-target="#sstaticBackdrop<?= $index ?>" type="button" class="btn bg-primary bg-gradient text-white shadow">View</button>
            <?php if($item->reserve_status === "Not Confirm"){?>
                <button data-bs-toggle="modal" data-bs-target="#staticBackdrop<?= $index ?>" type="button" class="btn bg-danger bg-gradient text-white shadow">Cancel</button>
            <?php }?>
            <?php if($item->reserve_status === "Confirm"){?>
                <button disabled data-bs-toggle="modal" data-bs-target="#staticBackdrop<?= $index ?>" type="button" class="btn bg-secondary bg-gradient text-white shadow">Cancel</button>
            <?php }?>
            </div>
          </td>
          </form>
</tr>
<!--<div class="col">
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
                                    <form action="" method="POST" class="m-1">
                                        <button data-bs-toggle="modal" data-bs-target="#staticBackdrop<?= $index ?>" type="button" name="showReserve" class="btn mb-1 bg-danger bg-gradient text-white shadow">Cancel Reserve</button>
                                    </form>
                                     </div>
                                </div>
                            </div>-->
                            <?php include(views_path("profile-tab/profile-reserve/cancel-reserve-modal")); ?>
                            <?php include(views_path("profile-tab/profile-reserve/view-reserve-modal")); ?>