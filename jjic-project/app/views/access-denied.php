<?php include "partials/header.php" ?>

<?php if($showQuantityExceededMessage){ ?>
    <?php if($rows){?>
      <div class="modal" tabindex="-1" role="dialog" style="display: block;">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Account Banned!!</h5>
                            </div>
                            <div class="modal-body">
                                Your Account "<?= $rows->firstname?> <?= $rows->lastname?>" is banned until: <?=$userBannedTime?>
                            </div>
                            <div class="modal-footer">
                                <a href="<?= ROOT ?>/login" class= "btn btn-danger ">
                                  <button type="button" class="btn text-white" data-bs-dismiss="modal">
                                     Close
                                  </button>
                                </a>
                                <!-- You can add additional action buttons here if needed -->
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
<?php }else if(!$showQuantityExceededMessage){?>
<center>
    <div class="container-fluid" style = "background-color: rgba(255, 51, 51, 0.5);">
    <h1 class = "text-white">Access Denied!!</h1>
    </div>
</center>
<?php } ?>



<?php include "partials/footer.php" ?>