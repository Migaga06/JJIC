<?php include PATH.'partials/header.php'; ?>
 
<div class = "container">

    <div class = "d-flex justify-content-between align-items-center mt-5">
        <h1>List of Users</h1>

        <a href="<?=ROOT?>/tasks/create" class = "btn btn-primary">Add New</a>
    </div>

    <table class = "table table-striped table-bordered">
        <tr>
            <th>Task Name</th>
            <th>Description</th>
            <th>Status</th>
            <th>Due</th>
            <th></th>
        </tr>
        <?php if ($tasks != null) { ?>
        <?php foreach($tasks as $item)
        {
            ?>
            <tr>
                <td><?= $item->task_name?></td>
                <td><?= $item->task_description?></td>
                <td><?= $item->task_status?></td>
                <td><?= $item->task_due?></td>
                <td style = "text-align:center">
                    <a href="<?=ROOT?>/tasks/update/<?=$item->id?>" class = "btn btn-success btn-sm">Edit</a>
                    |
                    <a href="<?=ROOT?>/tasks/delete/<?=$item->id?>" class = "btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
            <?php
        }
        ?>
        <?php } else { ?>
      <tr>
        <td colspan="3">
          <h3>No record found.</h3>
        </td>
      </tr>
    <?php } ?>
    </table>
</div>

 
<?php include PATH.'partials/footer.php'; ?>