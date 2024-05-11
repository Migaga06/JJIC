<?php include PATH . "partials/header.php" ?>
<!---->
<div class="container mb-5">
    <div class="row align-items-start">
        <div class="col-xl-1"></div>
        <div class="container-fluid  p-4 shadow-5 mx-auto " style = "max-width: 1000px; background-color: rgb(45, 45, 45);">
            <?php include PATH . "partials/crumbs.php" ?>

            <form action="" method="POST" enctype="multipart/form-data" class="mt-5 mb-5 w-50 p-5 mx-auto shadow-lg border-top border-bottom border-secondary">
                <h2 class="text-white text-center"><i class="fa">Add User</i></h2>

                <!-- ALERT MESSAGE -->
                <?php if (!empty($errors)): ?>

                    <div class="alert alert-dark alert-dismissible fade show" role="alert">

                        <?php foreach ($errors as $error): ?>

                            <?= $error . "<br>" ?>

                        <?php endforeach; ?>

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                <?php endif; ?>

                <input type="hidden" name="user_id">

                <div class="mb-2">
                    <label for="" class="text-white">Image</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="mb-2">
                    <label for="" class="text-white">Role</label>
                    <select name="role" class="form-control">
                        <option <?= get_select('role', '') ?> value="">Choose a Role</option>
                        <option <?= get_select('role', 'Admin') ?> value="Admin">Admin</option>
                        <option <?= get_select('role', 'Super Admin') ?> value="Super Admin">Super Admin</option>
                        <option <?= get_select('role', 'User') ?> value="User">User</option>
                    </select>
                </div>

                <div class="mb-2">
                    <label for="" class="text-white">First Name</label>
                    <input name="firstname" value="<?= get_var('firstname') ?>" type="text" class="form-control">
                </div>
                <div class="mb-2">
                    <label for="" class="text-white">Last Name</label>
                    <input name="lastname" value="<?= get_var('lastname') ?>" type="text" class="form-control">
                </div>
                <div class="mb-2">
                    <label for="" class="text-white">Username</label>
                    <input name="username" value="<?= get_var('username') ?>" type="text" class="form-control">
                </div>
                <div class="mb-2">
                    <label for="" class="text-white">Email</label>
                    <input name="email" value="<?= get_var('email') ?>" type="text" class="form-control">
                </div>
                <div class="mb-2">
                    <label for="" class="text-white">Password</label>
                    <input name="password" value="<?= get_var('password') ?>" type="password" class="form-control">
                </div>
                <div class="d-grid gap-2 col-6 mx-auto">
                    <button type="submit" class="btn bg-black bg-gradient text-white">Create Account</button>
                    <a href="<?= ROOT ?>/users" class="btn bg-dark bg-gradient text-white">Back</a>
                </div>
            </form>

        </div>
        <div class="col-xl-1"></div>
    </div>
</div>

<?php include PATH . "partials/footer.php" ?>