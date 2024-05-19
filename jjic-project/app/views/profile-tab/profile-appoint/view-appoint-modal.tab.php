<!-- Modal -->
<div class="modal fade" id="edit<?= $index ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="edit<?= $index ?>" aria-hidden="true"  data-bs-theme="dark">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title fs-5 text-light text-center" id="edit<?= $index ?>"><i class="fa">Reserve Item</i></h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-success bg-gradient">
                <h4 class="text-white text-center"><i class="fa fa-circle-check"> Edit Appointment</i></h4>
                <div class="row g-3 mx-1 mt-2 p-1 shadow-lg rounded border border-light bg-dark bg-gradient text-white">
                <!--form-->
                <form action="" method="POST">
                <div class="col-md-6">
                <label for="fname" class="form-label">First Name</label>
                    <input type="text" name="firstname" class="form-control" id="fname" value="<?= $item->firstname?>">
                </div>
                <div class="col-6">
                    <label for="lname" class="form-label">Last Name</label>
                    <input type="text" name="lastname" class="form-control" id="lname" value="<?= $item->lastname?>">
                </div>
                <div class="col-md-6">
                    <label for="" class="form-label">Appointment Reason</label>
                    <select name="appoint_reason" class="form-select">
                    <option value="<?= $item->appoint_reason?>">Last Selected: <?= $item->appoint_reason?></option>
                    <hr>
                    <option value="Motorcycle Check-up">Motorcycle Check-up</option>
                    <option value="Motorcycle Fixing">Motorcycle Fixing</option>
                    <option value="Motorcycle Chane Oil">Motorcycle Change Oil</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Appointment Date</label>
                    <input type="datetime-local" id="date-limit" name="appoint_date" class="form-control">
                    <div id="passwordHelpBlock" class="form-text">
                    Must atleast 3 days ahead in the current day, and also 8am - 8pm only allowed
                    </div>
                </div>
                <div class="col-6">
                    <label for="inputAddress2" class="form-label">Contact Number</label>
                    <input type="text" name="contact" class="form-control" id="inputAddress2" placeholder="Incase we need to contact you" value="<?= $item->contact?>">
                </div>
                <div class="col-6">
                    <label for="inputCity" class="form-label">Email</label>
                    <input type="text" name="email" class="form-control" id="inputCity" value="<?= $item->email?>">
                </div>
                <div class="col-12">
                    <label for="exampleFormControlTextarea1" class="form-label">Additional</label>
                    <textarea class="form-control" name="appoint_additional" id="exampleFormControlTextarea1" rows="3" placeholder="For additional reason only, you can leave this empty"><?= $item->appoint_additional?></textarea>
                </div>
            </div>

            </div>
            <div class="modal-footer">
                    <button type="button" class="btn bg-dark bg-gradient text-white shadow" data-bs-dismiss="modal">Close</button>
                    <button name="btnEdit" class="btn bg-success bg-gradient text-white shadow" value="<?= $item->appoint_id ?>">Proceed Edit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Get the current date and time
    const now = new Date();

    // Calculate the minimum date (1 day from today)
    const minDate = new Date();
    minDate.setDate(now.getDate() + 3);

    // Function to format the date and time
    const formatDateTime = (date, hour) => {
        const year = date.getFullYear();
        const month = (date.getMonth() + 1).toString().padStart(2, '0');
        const day = date.getDate().toString().padStart(2, '0');
        const hours = hour.toString().padStart(2, '0');
        const minutes = '00';
        return `${year}-${month}-${day}T${hours}:${minutes}`;
    };

    // Set the min attribute of the datetime-local input to 8am next day
    const minDateTime = formatDateTime(minDate, 8);
    document.getElementById('date-limit').min = minDateTime;
    document.getElementById('date-limit').value = "<?= $item->appoint_date?>";

    // Restrict time to 8am to 8pm
    document.getElementById('date-limit').addEventListener('input', function (e) {
        const selectedDate = new Date(e.target.value);
        const selectedHour = selectedDate.getHours();

        if (selectedHour < 8 || selectedHour >= 20) {
            // If the selected time is outside 8am to 8pm, reset to 8am next day
            e.target.value = minDateTime;
        }
    });
</script>

<!-- Modal -->
<div class="modal fade" id="not<?= $index ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="not<?= $index ?>" aria-hidden="true"  data-bs-theme="dark">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title fs-5 text-light text-center" id="edit<?= $index ?>"><i class="fa">Reserve Item</i></h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-danger bg-gradient p-4">
                <h4 class="text-white text-center"><i class="fa fa-circle-check"><i class="fa fa-triangle-exclamation"></i> Are You Sure You Want To Cancel Appointment??</i></h4>
            </div>
            <div class="modal-footer">
                <form action="" method="POST">
                    <button type="button" class="btn bg-dark bg-gradient text-white shadow" data-bs-dismiss="modal">Close</button>
                    <button name="btnCancel" class="btn bg-danger bg-gradient text-white shadow" value="<?= $item->appoint_id ?>">Proceed Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>