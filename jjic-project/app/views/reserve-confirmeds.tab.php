<div class="mt-5 d-flex justify-content-between align-items-center">
    <h2 class="text-white"><i class="fa">List Confirmed Reservation</i></h2>
  </div>

  <form action="" method="POST">
    <?php if($rows_c != null) { ?>
      <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-2">
        <button type="submit" name="doneRes" type="button" class="btn bg-success bg-gradient text-white shadow">Reservation Done</button>
        <button type="submit" name="confRemove" type="button" class="btn bg-danger bg-gradient text-white shadow">Remove Confirmation</button>
      </div>
      <div class="table-responsive">
        <table class="table table-dark table-striped align-middle">
        <tr>
            <th>Select</th>
            <th>Full Name</th>
            <th>Product Name</th>
            <th>Product Type</th>
            <th>Product Price</th>
            <th>Product Quantity</th>
            <th>Due Date</th>
            <th>Image</th>
            <th></th>
        </tr>
      <?php foreach ($rows_c as $index => $item) { ?>

        <?php include(views_path('list-tab/reserve-tab/show-c-list')); ?>

      <?php } ?>
        </table>
      </div>
    <?php } else { ?>

      <div class="container-fluid rounded-2 bg-dark p-2" style = "background-color: rgba(255, 51, 51, 1);">
          <h3 class = "text-white text-center">Currently don't have any product confirm in reserve!!</h3>
      </div>

    <?php } ?>
</form>