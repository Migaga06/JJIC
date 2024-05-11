

  <div class="container-fluid  p-4 shadow-5 mx-auto" style = "max-width: 1000px; background-color: rgb(45, 45, 45);">


    <h2 class="text-white text-center mt-5"><i class="fa">Cart Item</i></h2>
    <h4 class="text-danger text-center mb-5"><i class="fa"><i class="fa fa-circle-question"></i> Are you sure you want to remove item?</i></h4>
    
    <?php if($row){ ?>
      
    <div class="row mx-2 p-3 shadow-lg rounded-4 border-top border-bottom border-secondary" style="background-color: rgb(255,102,102);">
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
            <div class="row">
              <div class="col-12 text-center text-md-end text-lg-end mt-2">
                <a href="<?= ROOT ?>/profile" class="btn bg-dark bg-gradient text-white shadow">Cancel</a>
                <button type="submit" class="btn bg-black bg-gradient text-white shadow">Remove Item</button>
              </div>
            </div>
        </form>
      </div>
    </div>
    <?php }else{ ?>
    
    <?php } ?>

  </div>
