<?php include "partials/header.php" ?>

<div class="container-fluid  p-4 shadow-5 mx-auto" style = "max-width: 1250px; background-color: rgb(45, 45, 45);">



          <div class="container-fluid">
            <nav class="navbar navbar-expand-md  border-bottom border-body rounded-3" data-bs-theme="dark">
                <div  class="container justify-content-center">
                    <ul class="navbar-nav text-center ">
                        <?php if(Auth::access('Staff')){?>
                        <li class="nav-item mx-5">
                            <a class="nav-link <?=$page_tab=='confirms'?'active':''; ?>" href="<?=ROOT?>/appointments_list?tab=confirms">List to Confirm</a>
                        </li>
                        <li class="nav-item mx-5">
                            <a class="nav-link <?=$page_tab=='confirmeds'?'active':''; ?>" href="<?=ROOT?>/appointments_list?tab=confirmeds">List Cofirmed Appointments</a>
                        </li>
                        <?php }?>
                        <?php if(Auth::access('Admin')){?>
                        <li class="nav-item mx-5">
                            <a class="nav-link <?=$page_tab=='overdues'?'active':''; ?>" href="<?=ROOT?>/appointments_list?tab=overdues">List Overdue</a>
                        </li>
                        <li class="nav-item mx-5">
                            <a class="nav-link <?=$page_tab=='dones'?'active':''; ?>" href="<?=ROOT?>/appointments_list?tab=dones">Done Appointments</a>
                        </li>
                        <?php }?>
                    </ul>
                </div>
            </nav>

            <?php
            if(Auth::access('Staff')){
                   switch ($page_tab) {
                        case 'confirms':
                                include(views_path('appointments-confirms'));
                            break;
                        case 'confirmeds':
                                include(views_path('appointments-confirmeds'));
                            break;

                        default:
                            # code...
                            break;
                    }
                    switch ($page_tab) {
                         case 'overdues':
                                 include(views_path('appointments-overdues'));
                             break;
                         case 'dones':
                                 include(views_path('appointments-dones'));
                             break;

                         default:
                             # code...
                             break;
                     }
                 }
            ?>
          </div>
  <hr class="text-white">
</div>

<?php include "partials/footer.php" ?>