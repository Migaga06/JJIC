
<?php if(!empty($_SESSION['USER'])){
  redirect('home');

  }
  else{
    ?>
<?php include "partials/header.php" ?>
<div class="container-fluid  p-4 shadow-5 mx-auto" style = "max-width: 1000px; background-color: rgb(45, 45, 45);">
  <div class="row align-items-start">
    <div class="col-xl-2">
    </div>

    <div class="col-xl-8">

      <form action="" method="POST" class="w-50 mx-auto mt-5 mb-5 p-5 shadow-lg border-top border-bottom border-secondary rounded">
        <h2 class="title text-white text-center mb-5" ><i class="fa fa-">Login</i></h2>

          <!-- ALERT MESSAGE -->
          <?php if (!empty($errors)): ?>

          <div class="alert alert-dark alert-dismissible fade show" role="alert">

            <?php foreach ($errors as $error): ?>

              <?= $error . "<br>" ?>

            <?php endforeach; ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>

        <?php endif; ?>



        <div class="mb-2">
          <label for="" class="text-white">Username</label>
          <input type="text" name="username" value="<?= get_var('username') ?>" class="form-control" placeholder ="Username">
        </div>
        <div class="mb-2">
          <label for="" class="text-white">Password</label>
          <input type="password" name="password" class="form-control" placeholder="Password">
        </div>
        <div class="d-grid gap-2 col-6 mx-auto">
        <button type="submit" class="btn bg-black bg-gradient text-white">Login</button>
        <a href="<?= ROOT ?>/register" class="btn bg-dark bg-gradient text-white">Register</a>
        </div>
      </form>

    </div>

    <div class="col-xl-2">
    </div>
  </div>
</div>
<?php include "partials/footer.php" ?>
<?php
  }
    ?>
