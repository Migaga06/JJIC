<?php include "partials/header.php" ?>

    <div class="container-fluid  p-4 shadow-5 mx-auto" style = "max-width: 1000px; background-color: rgb(45, 45, 45);">
        <?php include "partials/crumbs.php" ?>
        <h1 class="text-white"><i class="fa">Profile Account</i></h1>

        <?php if (!empty($_SESSION['USER'])): ?>
        <div class="row mx-2 p-3 shadow-lg rounded-4 border-top border-bottom border-secondary">
            <div class="col-sm-4 col-md-3">
                <img src="<?= ROOT ?>/<?= $_SESSION['USER']->image ?>" alt="" class="d-block border border-warning mx-auto rounded-circle" style="width: 150px; height: 150px;">
                <h3 class = "text-center text-white"><?= $_SESSION['USER']->firstname ?> <?= $_SESSION['USER']->lastname ?></h3>
            </div>
            <div class="col-sm-8 col-md-9 p-2 mt-1 table-responsive">
                <table class="table table-dark table-hover table-striped table-bordered">
                    <tr>
                        <th>First Name:</th><td><?= $_SESSION['USER']->firstname ?></td>
                    </tr>
                    <tr>
                        <th>Last Name:</th><td><?= $_SESSION['USER']->lastname ?></td>
                    </tr>
                    <tr>
                        <th>Username:</th><td><?= $_SESSION['USER']->username ?></td>
                    </tr>
                    <tr>
                        <th>Email:</th><td><?= $_SESSION['USER']->email ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <br>
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md  border-bottom border-body rounded-3" data-bs-theme="dark">
                <div  class="container justify-content-center">
                    <ul class="navbar-nav text-center ">
                    <li class="nav-item mx-5">
                            <a class="nav-link <?=$page_tab=='carts'?'active':''; ?>" href="<?=ROOT?>/profile/<?=$_SESSION['USER']->user_id?>?tab=carts">View Cart</a>
                        </li>
                        <li class="nav-item mx-5">
                            <a class="nav-link <?=$page_tab=='reserves'?'active':''; ?>" href="<?=ROOT?>/profile/<?=$_SESSION['USER']->user_id?>?tab=reserves">Items Reserved</a>
                        </li>
                        <li class="nav-item mx-5">
                            <a class="nav-link <?=$page_tab=='appointments'?'active':''; ?>" href="<?=ROOT?>/profile/<?=$_SESSION['USER']->user_id?>?tab=appointments">Appointment</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <?php
                switch ($page_tab) {
                    case 'carts':
                            include(views_path('profile-tab/cart-tab'));
                        break;
                    case 'reserves':
                            include(views_path('profile-tab/reserve-tab'));
                        break;
                    case 'appointments':
                            include(views_path('profile-tab/appointment-tab'));
                        break;
                    case 'cart-reserve':
                            include(views_path('profile-tab/cart-tab'));
                            include(views_path('profile-tab/reserve-cart'));
                        break;
                    case 'cart-remove':
                            include(views_path('profile-tab/cart-tab'));
                            include(views_path('profile-tab/remove-cart'));
                        break;
                    
                    default:
                        # code...
                        break;
                }
            ?>

        <?php else:?>
            <div class="container-fluid rounded-3" style = "background-color: rgba(255, 51, 51, 1);">
                <h1 class = "text-white text-center">That Profile Not Found!!</h1>
            </div>
        <?php endif; ?>
    </div>

<?php include "partials/footer.php" ?>