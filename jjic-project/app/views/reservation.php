<?php include "partials/header.php" ?>

<div class="container-fluid  p-4 shadow-5 mx-auto" style = "max-width: 1250px; background-color: rgb(45, 45, 45);">

  <div class="mt-5 d-flex justify-content-between align-items-center">
    <h2 class="text-white"><i class="fa">List To Confirm Reservation</i></h2>

  </div>



    <form action="" method="POST">
    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-2">
        <button type="submit" name="mergeRes" type="button" class="btn bg-primary bg-gradient text-white shadow">Merge Item</button>
        <button type="submit" name="multiRes" type="button" class="btn bg-danger bg-gradient text-white shadow">Cancel Reservation</button>
    </div>
    <?php if($rows != null) { ?>
      <div class="table-responsive">
        <table class="table table-dark table-striped align-middle">
        <tr>
            <th>Select</th>
            <th>Full Name</th>
            <th>Product Name</th>
            <th>Product Type</th>
            <th>Product Price</th>
            <th>Product Quantity</th>
            <th>Image</th>
            <th></th>
        </tr>
      <?php foreach ($rows as $index => $item) { ?>

        <?php include(views_path('list-tab/reserve-tab/show-list')); ?>

      <?php } ?>
        </table>
      </div>
    <?php } else { ?>

      <div class="container-fluid rounded-2 bg-dark p-2" style = "background-color: rgba(255, 51, 51, 1);">
          <h3 class = "text-white text-center">Currently don't have any product pending in reserve!!</h3>
      </div>

    <?php } ?>
    </form>

  <hr class="text-white">

  <div class="mt-5 d-flex justify-content-between align-items-center">
    <h2 class="text-white"><i class="fa">List Confirmed Reservation</i></h2>
  </div>

  <form action="" method="POST">
    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-2">
        <button type="submit" name="multiRes" type="button" class="btn bg-success bg-gradient text-white shadow">Reservation Done</button>
        <button type="submit" name="multiRes" type="button" class="btn bg-danger bg-gradient text-white shadow">Remove Confirmation</button>
    </div>
    <?php if($rows_c != null) { ?>
      <div class="table-responsive">
        <table class="table table-dark table-striped align-middle">
        <tr>
            <th>Select</th>
            <th>Full Name</th>
            <th>Product Name</th>
            <th>Product Type</th>
            <th>Product Price</th>
            <th>Product Quantity</th>
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

  <hr class="text-white">

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
            <th>Contact</th>
            <th>Violation Count</th>
            <th>Profile</th>
            <th></th>
        </tr>
      <?php foreach ($rows_o as $index => $item) { ?>

        <?php include(views_path('list-tab/reserve-tab/show-overdue')); ?>

      <?php } ?>
        </table>
      </div>
    <?php } else { ?>

      <div class="container-fluid rounded-2 bg-dark p-2" style = "background-color: rgba(255, 51, 51, 1);">
          <h3 class = "text-white text-center">Currently don't have any product overdue in reserve!!</h3>
      </div>

    <?php } ?>
  </form>

</div>

<?php include "partials/footer.php" ?>