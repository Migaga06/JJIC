<?php include "partials/header.php" ?>

<div class="container-fluid  p-4 shadow-5 mx-auto" style = "max-width: 1250px; background-color: rgb(45, 45, 45);">



          <div class="container-fluid">
            <nav class="navbar navbar-expand-md  border-bottom border-body rounded-3" data-bs-theme="dark">
                <div  class="container justify-content-center">
                    <ul class="navbar-nav text-center ">
                        <li class="nav-item mx-5">
                            <a class="nav-link <?=$page_tab=='confirms'?'active':''; ?>" href="<?=ROOT?>/reservation?tab=confirms">List to Confirm</a>
                        </li>
                        <li class="nav-item mx-5">
                            <a class="nav-link <?=$page_tab=='confirmeds'?'active':''; ?>" href="<?=ROOT?>/reservation?tab=confirmeds">List Cofirmed Reservation</a>
                        </li>
                        <li class="nav-item mx-5">
                            <a class="nav-link <?=$page_tab=='overdues'?'active':''; ?>" href="<?=ROOT?>/reservation?tab=overdues">List Overdue</a>
                        </li>
                        <li class="nav-item mx-5">
                            <a class="nav-link <?=$page_tab=='dones'?'active':''; ?>" href="<?=ROOT?>/reservation?tab=dones">Done Transaction</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <?php
                   switch ($page_tab) {
                        case 'confirms':
                                include(views_path('reserve-confirms'));
                            break;
                        case 'confirmeds':
                                include(views_path('reserve-confirmeds'));
                            break;
                        case 'overdues':
                                include(views_path('reserve-overdues'));
                            break;
                        case 'dones':
                                include(views_path('reserve-dones'));
                            break;

                        default:
                            # code...
                            break;
                    }
            ?>
          </div>
  <hr class="text-white">
</div>

<?php include "partials/footer.php" ?>