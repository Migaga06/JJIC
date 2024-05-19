                            <!-- Modal -->
                            <div class="modal fade" id="sstaticBackdrop<?= $index ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="sstaticBackdropLabel<?= $index ?>" aria-hidden="true"  data-bs-theme="dark">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h2 class="modal-title fs-5 text-light text-center" id="sstaticBackdropLabel<?= $index ?>"><i class="fa">Cart Item</i></h2>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body bg-primary">
                                        <h4 class="text-white text-center"><i class="fa fa-eye"> Viewing Reservation</i></h4>


                                            <div class="row mx-2 p-3 shadow-lg rounded" style="background-color: rgb(102,178,255);">
                                                <div class="col-sm-12 col-md-5 col-lg-4">
                                                    <img src="<?=ROOT?>/<?= $item->image ?>" alt="" class="d-block mx-auto rounded border border-dark" style="width: 100%; height: 100%;">
                                                </div>
                                                <div class="col-sm-12 col-md-7 col-lg-8 mt-3 mb-3">
                                                    <h3 class="card-title p-2 border border-white rounded-4 mx-1 my-1 text-white shadow" style = "background-color: rgba(75, 75, 75, 0.8);">
                                                    <i class="fa fa-product-hunt"></i> <?= $item->product_name ?>
                                                    </h3>
                                                    <h5 class="card-title p-2 border border-white rounded-4 mt-2 mx-1 text-white shadow" style = "background-color: rgba(75, 75, 75, 0.8);">
                                                    <i class="fa fa-message"></i></i> <?= $item->product_description ?>
                                                    </h5>
                                                    <!--form-->
                                                    <form action="" method="POST">
                                                    <div class="row mt-3 ">
                                                        <div class="col-3">
                                                        <p class="card-text text-success px-2 border border-success rounded-5 shadow" style = "background-color: rgba(255, 255, 255, 0.9);">
                                                            <small>
                                                            <small>
                                                                <i class="fa fa-peso-sign"></i> <?= $item->product_price ?>
                                                            </small>
                                                            </small>
                                                        </p>
                                                        </div>
                                                        <div class="col-3">
                                                        <p class="card-text text-primary px-2 border border-primary rounded-5 shadow" style = "background-color: rgba(255, 255, 255, 0.9);">
                                                            <small>
                                                            <small>
                                                                <i class="fa fa-boxes-stacked"></i> <?= $item->product_qty ?>
                                                            </small>
                                                            </small>
                                                        </p>
                                                        </div>
                                                        <div class="col-3">
                                                        <p class="card-text text-danger px-2 border border-danger rounded-5 shadow" style = "background-color: rgba(255, 255, 255, 0.9);">
                                                            <small>
                                                            <small>
                                                                <i class="fa fa-t"></i> <?= $item->product_type ?>
                                                            </small>
                                                            </small>
                                                        </p>
                                                        </div>
                                                        <div class="col-3">
                                                        <p class="card-text text-dark px-2 border border-dark rounded-5 shadow" style = "background-color: rgba(255, 255, 255, 0.9);">
                                                            <small>
                                                            <small>
                                                                <i class="fa fa-exclamation"></i> <?= $item->reserve_status ?>
                                                            </small>
                                                            </small>
                                                        </p>
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

                                                        <!-- Modal -->
                            <div class="modal fade" id="clear<?= $index ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="clear<?= $index ?>" aria-hidden="true"  data-bs-theme="dark">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h2 class="modal-title fs-5 text-light text-center" id="clear<?= $index ?>"><i class="fa">Cart Item</i></h2>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body bg-primary">
                                        <h4 class="text-white text-center"><i class="fa fa-eye"> Viewing Reservation</i></h4>


                                            <div class="row mx-2 p-3 shadow-lg rounded" style="background-color: rgb(102,178,255);">
                                                <div class="col-sm-12 col-md-5 col-lg-4">
                                                    <img src="<?=ROOT?>/<?= $item->image ?>" alt="" class="d-block mx-auto rounded border border-dark" style="width: 100%; height: 100%;">
                                                </div>
                                                <div class="col-sm-12 col-md-7 col-lg-8 mt-3 mb-3">
                                                    <h3 class="card-title p-2 border border-white rounded-4 mx-1 my-1 text-white shadow" style = "background-color: rgba(75, 75, 75, 0.8);">
                                                    <i class="fa fa-product-hunt"></i> <?= $item->product_name ?>
                                                    </h3>
                                                    <h5 class="card-title p-2 border border-white rounded-4 mt-2 mx-1 text-white shadow" style = "background-color: rgba(75, 75, 75, 0.8);">
                                                    <i class="fa fa-message"></i></i> <?= $item->product_description ?>
                                                    </h5>
                                                    <!--form-->
                                                    <form action="" method="POST">
                                                    <div class="row mt-3 ">
                                                        <div class="col-3">
                                                        <p class="card-text text-success px-2 border border-success rounded-5 shadow" style = "background-color: rgba(255, 255, 255, 0.9);">
                                                            <small>
                                                            <small>
                                                                <i class="fa fa-peso-sign"></i> <?= $item->product_price ?>
                                                            </small>
                                                            </small>
                                                        </p>
                                                        </div>
                                                        <div class="col-3">
                                                        <p class="card-text text-primary px-2 border border-primary rounded-5 shadow" style = "background-color: rgba(255, 255, 255, 0.9);">
                                                            <small>
                                                            <small>
                                                                <i class="fa fa-boxes-stacked"></i> <?= $item->product_qty ?>
                                                            </small>
                                                            </small>
                                                        </p>
                                                        </div>
                                                        <div class="col-3">
                                                        <p class="card-text text-danger px-2 border border-danger rounded-5 shadow" style = "background-color: rgba(255, 255, 255, 0.9);">
                                                            <small>
                                                            <small>
                                                                <i class="fa fa-t"></i> <?= $item->product_type ?>
                                                            </small>
                                                            </small>
                                                        </p>
                                                        </div>
                                                        <div class="col-3">
                                                        <p class="card-text text-dark px-2 border border-dark rounded-5 shadow" style = "background-color: rgba(255, 255, 255, 0.9);">
                                                            <small>
                                                            <small>
                                                                <i class="fa fa-exclamation"></i> <?= $item->reserve_status ?>
                                                            </small>
                                                            </small>
                                                        </p>
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









