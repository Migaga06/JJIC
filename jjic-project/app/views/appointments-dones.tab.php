<div class="mt-5 d-flex justify-content-between align-items-center">
    <h2 class="text-white"><i class="fa">List Done Transaction</i></h2>
  </div>

  <form action="" method="POST">
    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-2">
        <?php if($rows_d != null){?>
          <a href="<?=ROOT?>/make_pdf_a">
          <button type="button" class="btn bg-success bg-gradient text-white shadow">Export PDF</button>
        </a>
          <button name="clearData" type="submit" class="btn bg-danger bg-gradient text-white shadow">Clear Data</button>
        <?php }?>
    </div>
    <?php if($rows_d != null) { ?>
      <div class="table-responsive">
        <table class="table table-dark table-striped align-middle">
        <tr>
            <th>Full Name</th>
            <th>Appointment Reason</th>
            <th>Appointment Date</th>
            <th>Contact</th>
            <th>Email</th>
            <th>Appointment Additional</th>
            <th></th>
        </tr>
      <?php foreach ($rows_d as $index => $item) { ?>

        <?php include(views_path('list-tab/appointment-tab/show-done')); ?>

      <?php } ?>
        </table>
      </div>
    <?php } else { ?>

      <div class="container-fluid rounded-2 bg-dark p-2" style = "background-color: rgba(255, 51, 51, 1);">
          <h3 class = "text-white text-center">Currently don't have any transaction done in appointment!!</h3>
      </div>

    <?php } ?>
</form>

<?php include(views_path("list-tab/appointment-tab/appoint-modal/done-appoint-modal")); ?>