<?php include PATH.'partials/header.php';?>

<div class = "container">
    <form method="post" class = "mt-5 w-50 mx-auto">
        <h1>Create Task</h1>

        <div class = "mb-2">
            <label for="">Task Name</label>
            <input name = "name" type="text" class = "form-control">
        </div>
        <div class = "mb-2">
            <label for="">Task Description</label>
            <input name = "description" type="text" class = "form-control">
        </div>
        <div class = "mb-2">
            <label for="">Task Status</label>
            <select name="status" id="" class = "form-control">
                <option value="" selected hidden>Select Status</option>
                <option value="Ongoing">Ongoing</option>
                <option value="Finished">Finished</option>
            </select>
        </div>
        <div class = "mb-2">
            <label for="">Task Due</label>
            <input type = "date" name = "due" type="text" class = "form-control">
        </div>

        <button type = "submit" name = "create" class = "btn btn-primary">Create</button>
    </form>
</div>

<?php include PATH.'partials/footer.php'; ?>