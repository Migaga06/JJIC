<?php include PATH . "partials/header.php" ?>

<script>
    function display_image_name(file_name){
        document.querySelector(".file_info").innerHTML = '<b>Selected file:</b><br>' + file_name;

    }
</script>
    <div class="container-fluid  p-4 shadow-5 mx-auto" style = "max-width: 1000px; background-color: rgb(45, 45, 45);">
        <?php include PATH . "partials/crumbs.php" ?>
        <h1 class="text-white"><i class="fa">Edit Profile Account</i></h1>

        <?php if($row){?>
        <form action="" method="POST" enctype="multipart/form-data">
        <div class="row mx-2 p-3 shadow-lg rounded-4 border-top border-bottom border-secondary">
            <div class="col-sm-4 col-md-3">
                <img src="<?=ROOT?>/<?= $row[0]->image ?>" alt="" class="d-block border border-warning mx-auto rounded-4 mt-5" style="width: 150px; height: 150px;">
                <div class="text-center">
                    <label for="image_browser"  class="btn-sm btn bg-black bg-gradient text-white mt-2">
                        <input onchange="display_image_name(this.files[0].name)" id="image_browser" type="file" name="image" style="display: none;">
                        <i class="fa fa-upload"></i> Browse image
                    </label>
                    <p class = "file_info text-muted bg-white rounded mt-1"></p>
                </div>
            </div>
            <div class="col-sm-8 col-md-9 p-2 mt-1">
                <table class="table table-dark table-hover table-striped table-bordered">
                    <tr>
                        <th>Role:</th>
                        <td>
                            <select name="role" class="form-control">
                                <option value="">Choose a Role</option>
                                <option <?= $row[0]->role == 'Super Admin' ? 'selected' : '' ?> value="Super Admin">Super Admin</option>
                                <option <?= $row[0]->role == 'Admin' ? 'selected' : '' ?> value="Admin">Admin</option>
                                <option <?= $row[0]->role == 'User' ? 'selected' : '' ?> value="User">User</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>First Name:</th>
                        <td>
                            <input name="firstname" value="<?= $row[0]->firstname ?>" type="text" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <th>Last Name:</th><td>
                            <input name="lastname" value="<?= $row[0]->lastname ?>" type="text" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td>
                            <input name="email" value="<?= $row[0]->email ?>" type="email" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <th>Password:</th>
                        <td>
                            <input name="password" value="<?= $row[0]->password ?>" type="password" class="form-control">
                        </td>
                    </tr>
                </table>
            </div>
            <div class="container">
                <div class="row">
                <button type="submit" class="btn bg-black bg-gradient text-white">Update</button>
                <a href="<?= ROOT ?>/users" class="btn bg-dark bg-gradient text-white mt-2">Back</a>
                </div>
            </div>
            <?php } else if(!$row) {?>
                <div class="container-fluid rounded-3" style = "background-color: rgba(255, 51, 51, 1);">
                    <h1 class = "text-white text-center">Such User Doesn't Exist!!</h1>
                </div>
            <?php }?>
        </div>
        </form>
</div>
<?php include PATH . "partials/footer.php" ?>