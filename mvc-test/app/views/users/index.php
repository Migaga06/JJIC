<?php
include Path.'partials/header.php';
?>
 
<div class = "container">

    <div class = "d-flex justify-content-between align-items-center mt-5">
        <h1>List of Users</h1>

        <a href="<?=ROOT?>/users/create" class = "btn btn-primary">Add New</a>
    </div>

    <table class = "table table-striped">
        <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th></th>
        </tr>
        <?php foreach($users as $item)
        {
            ?>
            <tr>
                <td><?= $item->firstname ?></td>
                <td><?= $item->lastname ?></td>
                <td><?= $item->email ?></td>
                <td><a href="<?=ROOT?>/users/edit/<?=$item->id?>" class = "btn btn-success btn-sm">Edit</a></td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>

 
<?php
include Path.'partials/footer.php';
?>