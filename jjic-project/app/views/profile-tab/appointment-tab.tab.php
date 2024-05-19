            <nav class="navbar mt-2 justify-content-end" data-bs-theme="dark">
                <a href="<?=ROOT?>/appointments" class="btn btn-sm btn-dark mt-1"><i class="fa fa-wrench"></i> Create Appointment</a>
            </nav>
            <h1 class="text-white text-center mt-3 mb-4"><i class="fa">Appointments</i></h1>
            <div>

                <?php if(isset($row_appoint) && $row_appoint) { ?>
                    <div class="table-responsive">
                    <table class="table table-dark table-striped align-middle">
                        <tr>
                            <th>Full Name</th>
                            <th>Appointment Reason</th>
                            <th>Appointment Date</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Additional</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                        <?php foreach ($row_appoint as $index => $item) { ?>
                                <?php include(views_path('profile-tab/profile-appoint/appoint-tab-item')); ?>
                        <?php } ?>
                    </table>
                    </div>
                <?php } else { ?>
                        <?php if(count($_POST)>0): ?>
                            <div class="container-fluid rounded-2 bg-danger p-2 mb-2" style = "background-color: rgba(255, 51, 51, 1);">
                                <h3 class = "text-white text-center">Search result not found!!</h3>
                            </div>
                        <?php endif; ?>
                        <div class="container-fluid rounded-2 bg-dark p-2" style = "background-color: rgba(255, 51, 51, 1);">
                                <h3 class = "text-white text-center">Currently don't have any items reserved!!</h3>
                        </div>
                <?php } ?>