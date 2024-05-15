<!-- Modal -->
<div class="modal fade" id="view<?= $index ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="view<?= $index ?>" aria-hidden="true"  data-bs-theme="dark">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title fs-5 text-light text-center" id="view<?= $index ?>"><i class="fa">Reserve Item</i></h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-primary">
                <h4 class="text-white text-center"><i class="fa fa-eye"> Viewing Reservation</i></h4>
                <div class="row mx-2 p-3 shadow-lg rounded" style="background-color: rgb(102,178,255);">
                    <div class="col-sm-12 col-md-5 col-lg-4">
                        <img src="<?=ROOT?>/<?= $item->image ?>" alt="" class="d-block mx-auto rounded border border-dark" style="width: 100%; height: 100%;">
                    </div>
                    <div class="col-sm-12 col-md-7 col-lg-8 mt-3 mb-3 text-center">
                        <h3 class="card-title p-2 border border-white rounded-5 mx-1 my-1 text-white shadow text-wrap" style = "background-color: rgba(75, 75, 75, 0.8);">
                            <i class="fa fa-product-hunt"></i> <?= $item->product_name ?>
                        </h3>
                        <h5 class="badge p-2 border border-white rounded-4 mt-2 mx-1 text-white shadow text-wrap" style = "background-color: rgba(75, 75, 75, 0.8);">
                            <i class="fa fa-message"></i></i> <?= $item->product_description ?>
                        </h5>
                        <!--form-->
                        <form action="" method="POST">
                            <div class="row p-2 text-center">
                                <div class="col-12">
                                    <p class="badge text-success px-2 border border-success rounded-5 shadow" style = "background-color: rgba(255, 255, 255, 0.9);">
                                        <small>
                                            <small>
                                                <i class="fa fa-peso-sign"></i> <?= $item->product_price ?>
                                            </small>
                                        </small>
                                    </p>
                                    <p class="badge text-primary px-2 border border-primary rounded-5 shadow" style = "background-color: rgba(255, 255, 255, 0.9);">
                                        <small>
                                            <small>
                                                <i class="fa fa-boxes-stacked"></i> <?= $item->product_qty ?>
                                            </small>
                                        </small>
                                    </p>
                                    <p class="badge text-danger px-2 border border-danger rounded-5 shadow" style = "background-color: rgba(255, 255, 255, 0.9);">
                                        <small>
                                            <small>
                                                <i class="fa fa-t"></i> <?= $item->product_type ?>
                                            </small>
                                        </small>
                                    </p>
                                    <p class="badge text-dark px-2 border border-dark rounded-5 shadow" style = "background-color: rgba(255, 255, 255, 0.9);">
                                        <small>
                                            <small>
                                                <i class="fa fa-exclamation"></i> <?= $item->reserve_status ?>
                                            </small>
                                        </small>
                                    </p>
                                    <p class="badge text-dark px-2 border border-dark rounded-5 shadow" style = "background-color: rgba(255, 255, 255, 0.9);">
                                        <small>
                                            <small>
                                                <i class="fa fa-calendar-days"></i> <?= $item->reserve_date ?>
                                            </small>
                                        </small>
                                    </p>
                                </div>
                                <div class="row mx-1 p-2 shadow border border-dark rounded mt-2" style="background-color: rgb(153,204,255);">
                                    <div class="badge col-sm-12 col-md-5 col-lg-4">
                                        <img src="<?=ROOT?>/<?= $item->user_image ?>" alt="" class="d-block mx-auto rounded border border-dark" style="width: 100%; height: 100%;">
                                    </div>
                                    <div class="badge col-sm-12 col-md-7 col-lg-8 mt-4 text-center">
                                        <h5 class="card-title p-2 border border-white rounded-4 text-white shadow text-wrap" style = "background-color: rgba(75, 75, 75, 0.8);">
                                            <i class="fa fa-product-hunt"></i> <?= $item->firstname ?> <?= $item->lastname ?>
                                        </h5>
                                        <h5 class="badge p-2 card-title border border-white rounded-4 text-white shadow mt-2 text-wrap text-center mb-2" style = "background-color: rgba(75, 75, 75, 0.8);">
                                            <i class="fa fa-product-hunt"></i> <?= $item->email ?>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <form action="" method="POST">
                    <button type="button" class="btn bg-dark bg-gradient text-white shadow" data-bs-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>









