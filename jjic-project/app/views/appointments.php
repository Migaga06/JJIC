<?php include "partials/header.php" ?>

<div class="container-fluid  p-4 shadow-5 mx-auto" style = "max-width: 1000px; background-color: rgb(45, 45, 45);">
<?php if($showQuantityExceededMessage){ ?>
            <div class="modal" tabindex="-1" role="dialog" style="display: block;">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Existing Appointment!!</h5>
                  </div>
                  <div class="modal-body">
                    You already have appointment please check your appointments in your profile. You can edit it anytime you want.
                  </div>
                  <div class="modal-footer">
                    <a href="<?= ROOT ?>/profile/<?=$_SESSION['USER']->user_id?>?tab=appointments" class= "btn btn-danger ">
                      <button type="button" class="btn text-white" data-bs-dismiss="modal">
                        Close
                      </button>
                    </a>
                  </div>
                </div>
              </div>
            </div>
    <?php }?>
  <div class="my-4 row mx-2 p-3 shadow-lg rounded-4 border-top border-bottom border-secondary text-white">
    <h1 class="text-white"><i class="fa">Appointment Form</i></h1>

     <!-- ALERT MESSAGE -->
     <?php if (!empty($errors)): ?>

      <div class="alert alert-dark alert-dismissible fade show" role="alert">

        <?php foreach ($errors as $error): ?>

          <?= $error . "<br>" ?>

        <?php endforeach; ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>

      <?php endif; ?>
    <form class="row g-3" data-bs-theme="dark" method="POST">
      <input type="hidden" name="user_id" value="<?= $_SESSION['USER']->user_id?>">
      <input type="hidden" name="appoint_id">
      <input type="hidden" name="appoint_status" value="Not Confirm">
      <div class="col-md-6">
      <label for="fname" class="form-label">First Name</label>
        <input type="text" name="firstname" class="form-control" id="fname" value="<?= $_SESSION['USER']->firstname?>">
      </div>
      <div class="col-6">
        <label for="lname" class="form-label">Last Name</label>
        <input type="text" name="lastname" class="form-control" id="lname" value="<?= $_SESSION['USER']->lastname?>">
      </div>
      <div class="col-md-6">
        <label for="" class="form-label">Appointment Reason</label>
        <select name="appoint_reason" class="form-select">
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
        <input type="text" name="contact" class="form-control" id="inputAddress2" placeholder="Incase we need to contact you">
      </div>
      <div class="col-6">
        <label for="inputCity" class="form-label">Email</label>
        <input type="text" name="email" class="form-control" id="inputCity" value="<?= $_SESSION['USER']->email?>">
      </div>
      <div class="col-12">
        <label for="exampleFormControlTextarea1" class="form-label">Additional</label>
        <textarea class="form-control" name="appoint_additional" id="exampleFormControlTextarea1" rows="3" placeholder="For additional reason only, you can leave this empty"></textarea>
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-primary float-end ms-2">Confirm Appointment</button>
        <button type="submit" class="btn btn-danger float-end">Cancel Appointment</button>
      </div>
    </form>
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
    document.getElementById('date-limit').value = minDateTime;

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

<?php include "partials/footer.php" ?>
