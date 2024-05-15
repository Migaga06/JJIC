<?php include PATH . "partials/header.php" ?>

  <div class="container-fluid  p-4 shadow-5 mx-auto" style = "max-width: 1000px; background-color: rgb(45, 45, 45);">


  <!--for later--><?php include PATH . "partials/crumbs.php" ?>
    <h2 class="text-white text-center mt-2"><i class="fa">Reserve Item</i></h2>
    <h4 class="text-warning text-center mb-5"><i class="fa"><i class="fa fa-circle-question"></i> Are you sure you want to reserve this item?</i></h4>

    <?php if($row){ ?>

    <?php if($showQuantityExceededMessage): ?>
                <div class="modal" tabindex="-1" role="dialog" style="display: block;">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Quantity Exceeded</h5>
                                <a href="<?= ROOT ?>/products/reserve/<?= $row[0]->product_id ?>" class="btn btn-close">
                                  <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close"></button>
                                </a>
                            </div>
                            <div class="modal-body">
                                The quantity entered exceeds the available quantity.
                            </div>
                            <div class="modal-footer">
                                <a href="<?= ROOT ?>/products/reserve/<?= $row[0]->product_id ?>" class= "btn btn-danger ">
                                  <button type="button" class="btn text-white" data-bs-dismiss="modal">
                                     Close
                                  </button>
                                </a>
                                <!-- You can add additional action buttons here if needed -->
                            </div>
                        </div>
                    </div>
                </div>
    <?php endif; ?>

    <div class="row mx-2 p-3 shadow-lg rounded-4 border-top border-bottom border-secondary" style="background-color: rgba(64, 64, 64, 0.5);">
      <div class="col-sm-12 col-md-5 col-lg-4">
        <img src="<?=ROOT?>/<?= $row[0]->image ?>" alt="" class="d-block border border-warning mx-auto rounded-4" style="width: 100%; height: 100%;">
      </div>
      <div class="col-sm-12 col-md-7 col-lg-8 mt-3 mb-3">
        <h3 class="card-title p-2 border border-white rounded-4 mx-1 my-1 text-white shadow" style = "background-color: rgba(75, 75, 75, 0.8);">
          <i class="fa fa-product-hunt"></i> <?= $row[0]->product_name ?>
        </h3>
        <h5 class="card-title p-2 border border-white rounded-4 mt-2 mx-1 text-white shadow" style = "background-color: rgba(75, 75, 75, 0.8);">
          <i class="fa fa-message"></i></i> <?= $row[0]->product_description ?>
        </h5>
        <!--form-->
        <form action="" method="POST">
          <div class="row mt-3 ">
            <div class="col-4">
              <p class="card-text text-success px-2 border border-success rounded-5 shadow" style = "background-color: rgba(255, 255, 255, 0.9);">
                <small>
                  <small>
                    <i class="fa fa-peso-sign"></i> <?= $row[0]->product_price ?>
                  </small>
                </small>
              </p>
            </div>
            <div class="col-4">
              <p class="card-text text-primary px-2 border border-primary rounded-5 shadow" style = "background-color: rgba(255, 255, 255, 0.9);">
                <small>
                  <small>
                    <i class="fa fa-boxes-stacked"></i> <?= $row[0]->product_qty ?>
                  </small>
                </small>
              </p>
            </div>
            <div class="col-4">
              <p class="card-text text-danger px-2 border border-danger rounded-5 shadow" style = "background-color: rgba(255, 255, 255, 0.9);">
                <small>
                  <small>
                    <i class="fa fa-t"></i> <?= $row[0]->product_type ?>
                  </small>
                </small>
              </p>
            </div>
          </div>
          <div class="row mt-3">
              <div class="col-sm-4 col-md-4 col-lg-4 mt-2 ">
                <div class="wrapper border border-secondary ">
                  <span class="minus">-</span>
                  <span class="num">1</span>
                  <input type="hidden" name="product_qty" id="hiddenText" value="1">
                  <input type="hidden" name="reserve_id">
                  <input type="hidden" name="reserve_date">
                  <input type="hidden" name="confirm_due">
                  <input type="hidden" name="reserve_status" value="Not Confirm">
                  <input type="hidden" name="user_id" value="<?= $_SESSION['USER']->user_id ?>">
                  <input type="hidden" name="product_name" value="<?= $row[0]->product_name ?>">
                  <input type="hidden" name="product_description" value="<?= $row[0]->product_description ?>">
                  <input type="hidden" name="product_price" value="<?= $row[0]->product_price ?>">
                  <input type="hidden" name="product_type" value="<?= $row[0]->product_type ?>">
                  <input type="hidden" name="image" value="<?= $row[0]->image ?>">
                  <input type="hidden" name="product_id" value="<?= $row[0]->product_id ?>">
                  <span class="plus">+</span>
                </div>
              </div>
              <div class="col-sm-8 col-md-8 col-lg-8">
                <p class="card-text text-body-tertiary text-center rounded-1 mt-2 py-2 border border-secondary shadow" style = "background-color: rgba(255, 255, 255, 0.6);">
                  <small>
                    <small>
                      <i class="fa fa-circle-question"></i> Put the number of quantity you want
                    </small>
                  </small>
                </p>
              </div>
            </div>
            <div class="row">
              <div class="col-12 text-center text-md-end text-lg-end mt-2">
                <a href="<?= ROOT ?>/products/index" class="btn bg-dark bg-gradient text-white shadow">Cancel</a>
                <button type="submit" class="btn bg-black bg-gradient text-white shadow">Reserve Item</button>
              </div>
            </div>
        </form>
      </div>
    </div>
    <?php }else{ ?>

    <?php } ?>

  </div>
  <script>
    const plus = document.querySelector(".plus");
    const minus = document.querySelector(".minus");
    const num = document.querySelector(".num");
    const hiddenInput = document.getElementById("hiddenText");

    let quantity = 1;

    plus.addEventListener("click", () => {
        quantity++;
        updateQuantity();
    });

    minus.addEventListener("click", () => {
        if (quantity > 1) {
            quantity--;
            updateQuantity();
        }
    });

    function updateQuantity() {
        const formattedQuantity = quantity < 10 ? quantity : quantity;
        num.innerText = formattedQuantity;
        hiddenInput.value = formattedQuantity; // Update the value of the hidden input
    }
</script>

  <?php include PATH . "partials/footer.php" ?>