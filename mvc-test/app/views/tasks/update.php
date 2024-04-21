<?php include PATH.'partials/header.php'; ?>

<div class = "container">
    <form method="post" class = "mt-5 w-50 mx-auto">
        <h1>Create User</h1>


        <div class = "mb-2">
            <label for="">Task Name</label>
            <input name = "name" type="text" class = "form-control" value = "<?=$tasks->task_name?>">
        </div>
        <div class = "mb-2">
            <label for="">Task Description</label>
            <input name = "description" type="text" class = "form-control" value = "<?=$tasks->task_description?>">
        </div>
        <div class = "mb-2">
            <label for="">Task Status</label>
            <select name="status" id="" class = "form-control" value = "<?=$tasks->task_status?>">
                <option value="" selected hidden>Select Status</option>
                <option value="Ongoing">Ongoing</option>
                <option value="Finished">Finished</option>
            </select>
        </div>
        <div class = "mb-2">
            <label for="">Task Due</label>
            <input type = "date" name = "due" type="text" class = "form-control" value = "<?=$tasks->task_due?>">
        </div>

        <button type = "submit" name = "update" class = "btn btn-primary">Update</button>
    </form>
</div>

<?php include PATH.'partials/footer.php'; ?>