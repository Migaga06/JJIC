<?php include Path."partials/header.php"?>

<div class="container">
    <form action="" method="POST" class="mt-5 w-50 mx-auto"> 
        <h2>EditUsers</h2>
        <div class="mb-2">
            <label for="">Firstname</label>
            <input name="firstname" type="text" class="form-control">

        </div>
        <div class="mb-2">
            <label for="">Lastname</label>
            <input name="lastname" type="text" class="form-control">

        </div>
        <div class="mb-2">
            <label for="">Email</label>
            <input name="email" type="text" class="form-control">

        </div>
        <div class="mb-2">
            <label for="">Password</label>
            <input name="password" type="text" class="form-control">

        </div>
        <button type="submit" name="create" class="btn btn-info">Create</button>
    </form>
</div>

<?php include Path."partials/footer.php"?>