                            <!-- Modal -->
                            <div class="modal fade" id="viewProd<?= $index ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="viewProd<?= $index ?>" aria-hidden="true"  data-bs-theme="dark">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h2 class="modal-title fs-5 text-light text-center" id="viewProd<?= $index ?>"><i class="fa">Reserve Item</i></h2>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body bg-primary bg-gradient">
                                        <h4 class="text-white text-center"><i class="fa fa-eye"> Viewing Reservation</i></h4>
                                            <div class="row mx-2 p-3 shadow-lg rounded bg-dark bg-gradient border border-light">
                                                <div class="col-sm-12 col-md-5 col-lg-4 py-5">
                                                    <img src="<?=ROOT?>/<?= $item->image ?>" alt="" class=" d-block mx-auto rounded border border-light" style="width: 100%; height: 100%;">
                                                </div>
                                                <div class="col-sm-12 col-md-7 col-lg-8 mt-3 mb-3 text-center border border-light rounded bg-black bg-gradient p-2">
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
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="badge col-sm-12 col-md-5 col-lg-4">
                                                                    <img src="<?=ROOT?>/<?= $item->user_image ?>" alt="" class="rounded border border-white" style="width: 100%; height: 100%;">
                                                                </div>
                                                                <div class="badge col-sm-12 col-md-7 col-lg-8 mt-4 text-center">
                                                                    <h5 class="card-title p-2 border border-white rounded-4 text-white shadow text-wrap" style = "background-color: rgba(75, 75, 75, 0.8);">
                                                                        <i class="fa fa-product-hunt"></i> <?= $item->firstname ?> <?= $item->lastname ?>
                                                                    </h5>
                                                                    <h5 class="badge p-2 card-title border border-white rounded-4 text-white shadow mt-2 text-wrap text-center" style = "background-color: rgba(75, 75, 75, 0.8);">
                                                                        <i class="fa fa-product-hunt"></i> <?= $item->email ?>
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    </form>
                                                </div>
                                                <div class="col-sm-12 col-md-12 col-lg-12">

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
<!---->

<!-- Modal -->
<div class="modal fade" id="ban<?= $index ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ban<?= $index ?>" aria-hidden="true"  data-bs-theme="dark">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title fs-5 text-light text-center" id="ban<?= $index ?>"><i class="fa">Reserve Item</i></h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-danger bg-gradient">
                <h4 class="text-white text-center"><i class="fa fa-triangle-exclamation"> Ban User</i></h4>
                <div class="row mx-1 p-1 shadow-lg rounded border border-light bg-dark bg-gradient">
                <!--form-->
                <form action="" method="POST">
                    <div class="col-12 mt-3 mb-1 text-center">
                        <div class="row">
                            <div class="col-4">
                                <img src="<?=ROOT?>/<?= $item->image ?>" alt="" class="d-block mx-auto rounded border border-dark float-end" style="width: 70px; height: 70px;">
                            </div>
                            <div class="col-8">
                                <h3 class="badge p-2 border border-white rounded-5 mx-1 my-1 text-white shadow text-wrap float-start" style = "background-color: rgba(75, 75, 75, 0.8);">
                                    <i class="fa fa-product-hunt"></i> <?= $item->product_name ?>
                                </h3>
                                <input type="datetime-local" id="date-limit" name="confirm_date" class="form-control border-white bg-secondary text-white" style="width: 200px; height: 30px;">
                            </div>
                        </div>
                            <div class="row p-1 text-center">
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
                                                <i class="fa fa-calendar-days"></i> <?= $item->confirm_due ?>
                                            </small>
                                        </small>
                                    </p>
                                </div>
                            </div>
                            <div class="row p-2 bg-black bg-gradient mx-3 rounded border border-light" style="height: 100px;">
                                    <div class="col-4">
                                        <img src="<?=ROOT?>/<?= $item->user_image ?>" alt="" class="d-block mx-auto rounded border border-dark" style="width: 85px; height: 85px;">
                                    </div>
                                    <div class=" col-8 text-center">
                                        <h5 class="badge p-2 border border-white rounded-4 text-white shadow text-wrap" style = "background-color: rgba(75, 75, 75, 0.8);">
                                            <i class="fa fa-product-hunt"></i> <?= $item->firstname ?> <?= $item->lastname ?>
                                        </h5>
                                        <h5 class="badge p-2 card-title border border-white rounded-4 text-white shadow text-wrap text-center" style = "background-color: rgba(75, 75, 75, 0.8);">
                                            <i class="fa fa-product-hunt"></i> <?= $item->email ?>
                                        </h5>
                                    </div>
                                </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn bg-dark bg-gradient text-white shadow" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="banUser" type="button" class="btn bg-danger bg-gradient text-white shadow" value="<?= $item->user_id ?>">Proceed Ban User</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
     // Get the current date and time
    const now = new Date();

    // Calculate the minimum date (7 days from today)
    const minDate = new Date();
    minDate.setDate(now.getDate() + 7);

    // Format the minimum date in the format required by datetime-local input (YYYY-MM-DDThh:mm)
    const formatDateTime = date => {
        const year = date.getFullYear();
        const month = (date.getMonth() + 1).toString().padStart(2, '0');
        const day = date.getDate().toString().padStart(2, '0');
        const hours = date.getHours().toString().padStart(2, '0');
        const minutes = date.getMinutes().toString().padStart(2, '0');
        return `${year}-${month}-${day}T${hours}:${minutes}`;
    };

    // Set the min attribute of the datetime-local input
    document.getElementById('date-limit').min = formatDateTime(minDate);
    document.getElementById('date-limit').value = formatDateTime(minDate);
</script>





