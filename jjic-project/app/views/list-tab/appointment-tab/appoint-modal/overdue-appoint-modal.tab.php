                            <!-- Modal -->
                            <div class="modal fade" id="viewProd<?= $index ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="viewProd<?= $index ?>" aria-hidden="true"  data-bs-theme="dark">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h2 class="modal-title fs-5 text-light text-center" id="viewProd<?= $index ?>"><i class="fa">Reserve Item</i></h2>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body bg-danger bg-gradient">
                                        <h4 class="text-white text-center"><i class="fa fa-eye"> Viewing Overdue Appointment</i></h4>
                                            <div class="row mx-2 p-3 shadow-lg rounded bg-dark bg-gradient border border-light">
                                                <div class="col-12 mt-2 mb-2 text-center rounded bg-black bg-gradient p-2">
                                                    <div class="col-12">
                                                        <img src="<?=ROOT?>/<?= $item->user_image ?>" alt="" class="d-block mx-auto rounded border border-secondary" style="width: 150px; height: 150px;">
                                                    </div>
                                                    <h3 class="card-title p-2 border border-white rounded-5 mx-1 my-1 text-white shadow text-wrap" style = "background-color: rgba(75, 75, 75, 0.8);">
                                                    <i class="fa fa-user"></i> <?= $item->firstname ?> <?= $item->lastname ?>
                                                    </h3>
                                                    <h5 class="badge p-2 border border-white rounded-4 mt-2 mx-1 text-white shadow text-wrap" style = "background-color: rgba(75, 75, 75, 0.8);">
                                                    <i class="fa fa-message"></i></i> <?= $item->appoint_reason ?>
                                                    </h5>
                                                    <!--form-->
                                                    <form action="" method="POST">
                                                    <div class="row p-2 text-center">
                                                        <div class="col-6">
                                                            <p class="text-light px-2 bg-dark bg-gradient rounded-5 shadow border border-secondary">
                                                                <small>
                                                                <small>
                                                                    <i class="fa fa-calendar-days"></i> <?= $item->appoint_date ?>
                                                                </small>
                                                                </small>
                                                            </p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="text-light px-2 bg-dark bg-gradient rounded-5 shadow border border-secondary">
                                                                <small>
                                                                <small>
                                                                    <i class="fa fa-phone"></i> <?= $item->contact ?>
                                                                </small>
                                                                </small>
                                                            </p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="text-light px-2 bg-dark bg-gradient rounded-5 shadow border border-secondary">
                                                                <small>
                                                                <small>
                                                                    <i class="fa fa-envelope"></i> <?= $item->email ?>
                                                                </small>
                                                                </small>
                                                            </p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="text-light px-2 bg-dark bg-gradient rounded-5 shadow border border-secondary">
                                                                <small>
                                                                <small>
                                                                    <i class="fa fa-circle-exclamation"></i> <?= $item->appoint_status ?>
                                                                </small>
                                                                </small>
                                                            </p>
                                                        </div>
                                                        <div class="col-12">
                                                            <p class="text-light px-2 bg-dark bg-gradient rounded-5 shadow border border-secondary">
                                                                <small>
                                                                <small>
                                                                    <i class="fa fa-clipboard"></i> <?= $item->appoint_additional ?>
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
<!---->

<!-- Modal -->
<div class="modal fade" id="ban<?= $index ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ban<?= $index ?>" aria-hidden="true"  data-bs-theme="dark">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title fs-5 text-light text-center" id="ban<?= $index ?>"><i class="fa">Ban User</i></h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-danger bg-gradient">
                                        <h4 class="text-white text-center"><i class="fa fa-triangle-exclamation"> Are you sure you want to ban this user?</i></h4>
                                            <div class="row mx-2 p-3 shadow-lg rounded bg-dark bg-gradient border border-light">
                                                <div class="col-12 mt-2 mb-2 text-center rounded bg-black bg-gradient p-2">
                                                    <div class="col-12">
                                                        <img src="<?=ROOT?>/<?= $item->user_image ?>" alt="" class="d-block mx-auto rounded border border-secondary" style="width: 150px; height: 150px;">
                                                    </div>
                                                    <h3 class="card-title p-2 border border-white rounded-5 mx-1 my-1 text-white shadow text-wrap" style = "background-color: rgba(75, 75, 75, 0.8);">
                                                    <i class="fa fa-user"></i> <?= $item->firstname ?> <?= $item->lastname ?>
                                                    </h3>
                                                    <h5 class="badge p-2 border border-white rounded-4 mt-2 mx-1 text-white shadow text-wrap" style = "background-color: rgba(75, 75, 75, 0.8);">
                                                    <i class="fa fa-message"></i></i> <?= $item->appoint_reason ?>
                                                    </h5>
                                                    <!--form-->
                                                    <form action="" method="POST">
                                                    <small>
                                                    <input type="datetime-local" id="date-limit" name="confirm_date" class=" border border-secondary bg-dark bg-gradient rounded-5 px-3">
                                                    </small>
                                                    <div class="row p-2 text-center">
                                                        <div class="col-6">
                                                            <p class="text-light px-2 bg-dark bg-gradient rounded-5 shadow border border-secondary">
                                                                <small>
                                                                <small>
                                                                    <i class="fa fa-calendar-days"></i> <?= $item->appoint_date ?>
                                                                </small>
                                                                </small>
                                                            </p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="text-light px-2 bg-dark bg-gradient rounded-5 shadow border border-secondary">
                                                                <small>
                                                                <small>
                                                                    <i class="fa fa-phone"></i> <?= $item->contact ?>
                                                                </small>
                                                                </small>
                                                            </p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="text-light px-2 bg-dark bg-gradient rounded-5 shadow border border-secondary">
                                                                <small>
                                                                <small>
                                                                    <i class="fa fa-envelope"></i> <?= $item->email ?>
                                                                </small>
                                                                </small>
                                                            </p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="text-light px-2 bg-dark bg-gradient rounded-5 shadow border border-secondary">
                                                                <small>
                                                                <small>
                                                                    <i class="fa fa-circle-exclamation"></i> <?= $item->appoint_status ?>
                                                                </small>
                                                                </small>
                                                            </p>
                                                        </div>
                                                        <div class="col-12">
                                                            <p class="text-light px-2 bg-dark bg-gradient rounded-5 shadow border border-secondary">
                                                                <small>
                                                                <small>
                                                                    <i class="fa fa-clipboard"></i> <?= $item->appoint_additional ?>
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





