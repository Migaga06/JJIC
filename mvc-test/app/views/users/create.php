<?php
include Path.'partials/header.php';
?>

<div class = "container">
    <form method="post" class = "mt-5 w-50 mx-auto">
        <h1>Create User</h1>

        <div class = "mb-2">
            <label for="">Firstname</label>
            <input name = "firstname" type="text" class = "form-control">
        </div>
        <div class = "mb-2">
            <label for="">Lastname</label>
            <input name = "lastname" type="text" class = "form-control">
        </div>
        <div class = "mb-2">
            <label for="">Email</label>
            <input name = "email" type="text" class = "form-control">
        </div>
        <div class = "mb-2">
            <label for="">Password</label>
            <input name = "password" type="text" class = "form-control">
        </div>

        <button type = "submit" name = "create" class = "btn btn-primary">Create</button>
    </form>
</div>

<?php
include Path.'partials/footer.php';
?>