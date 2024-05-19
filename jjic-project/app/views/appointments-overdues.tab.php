<div class="mt-5 d-flex justify-content-between align-items-center">
    <h2 class="text-white"><i class="fa">List Overdue Reservation</i></h2>
  </div>

  <form action="" method="POST">
    <?php if($rows_o != null) { ?>
      <div class="table-responsive">
        <table class="table table-dark table-striped align-middle">
        <tr>
            <th>Full Name</th>
            <th>Email</th>
            <th>Appointment Reason</th>
            <th>Violation Count</th>
            <th>Profile</th>
            <th></th>
        </tr>
      <?php foreach ($rows_o as $index => $item) { ?>

        <?php include(views_path('list-tab/appointment-tab/show-overdue')); ?>

      <?php } ?>
        </table>
      </div>
    <?php } else { ?>

      <div class="container-fluid rounded-2 bg-dark p-2" style = "background-color: rgba(255, 51, 51, 1);">
          <h3 class = "text-white text-center">Currently don't have any appointment overdue in this section!!</h3>
      </div>

    <?php } ?>
</form>