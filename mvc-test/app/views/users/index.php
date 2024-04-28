<?php include PATH."partials/header.php" ?>

<div class="container">


  <div class="mt-5 d-flex justify-content-between align-items-center">
    <h2>List of Users</h2>

    <a href="<?=ROOT?>/users/create" class="btn btn-primary">Add New</a>
  </div>


  <table class="table table-striped mt-3">
    <tr>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Email</th>
      <th></th>
    </tr>
    <?php foreach($users as $item) { ?>
    <tr>
        <td><?= $item->firstname?></td>
        <td><?= $item->lastname?></td>
        <td><?= $item->email?></td>
        <td>
            <a href="<?=ROOT?>/users/edit/<?=$item->id?>" class="btn btn-success btn-sm">Edit</a>
        </td>
    </tr>
    <?php } ?>
  </table>
</div>

<?php include PATH."partials/footer.php" ?>