
                            <!-- Modal -->
                            <div data-bs-theme="dark" class="modal fade" id="staticBackdrop<?= $index ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel<?= $index ?>" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h2 class="modal-title fs-5 text-white text-center" id="staticBackdropLabel<?= $index ?>"><i class="fa">Cart Item</i></h2>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body" style="background-color: rgb(102, 102, 255);">
                                            <h4 class=" text-center text-white" ><i class="fa"><i class="fa fa-circle-question"></i> Are you sure you want to reserve this item?</i></h4>
                                            <div class="row mx-2 p-3 shadow-lg rounded " style="background-color: rgba(139, 139, 255, 0.7);">
                                            <div class="col-sm-12 col-md-5 col-lg-4">
                                                <img src="<?=ROOT?>/<?= $item->image ?>" alt="" class="d-block border border-dark mx-auto rounded" style="width: 100%; height: 100%;">
                                            </div>
                                            <div class="col-sm-12 col-md-7 col-lg-8 mt-3 mb-3">
                                                <h3 class="card-title p-2 border border-white rounded-4 mx-1 my-1 text-white shadow" style = "background-color: rgba(75, 75, 75, 0.8);">
                                                <i class="fa fa-product-hunt"></i> <?= $item->product_name ?>
                                                </h3>
                                                <h5 class="card-title p-2 border border-white rounded-4 mt-2 mx-1 text-white shadow" style = "background-color: rgba(75, 75, 75, 0.8);">
                                                <i class="fa fa-message"></i></i> <?= $item->product_description ?>
                                                </h5>
                                                <!--form-->
                                                <form action="" method="POST">
                                                <div class="row mt-3 ">
                                                    <div class="col-4">
                                                    <p class="card-text text-success px-2 border border-success rounded-5 shadow" style = "background-color: rgba(255, 255, 255, 0.9);">
                                                        <small>
                                                        <small>
                                                            <i class="fa fa-peso-sign"></i> <?= $item->product_price ?>
                                                        </small>
                                                        </small>
                                                    </p>
                                                    </div>
                                                    <div class="col-4">
                                                    <p class="card-text text-primary px-2 border border-primary rounded-5 shadow" style = "background-color: rgba(255, 255, 255, 0.9);">
                                                        <small>
                                                        <small>
                                                            <i class="fa fa-boxes-stacked"></i> <?= $item->product_qty ?>
                                                        </small>
                                                        </small>
                                                    </p>
                                                    </div>
                                                    <div class="col-4">
                                                    <p class="card-text text-danger px-2 border border-danger rounded-5 shadow" style = "background-color: rgba(255, 255, 255, 0.9);">
                                                        <small>
                                                        <small>
                                                            <i class="fa fa-t"></i> <?= $item->product_type ?>
                                                        </small>
                                                        </small>
                                                    </p>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-sm-4 col-md-4 col-lg-4 mt-2 ">
                                                        <div class="wrapper border border-secondary ">
                                                        <span class="minus<?= $index ?>">-</span>
                                                        <span class="num<?= $index ?>"><?= $item->product_qty ?></span>
                                                        <input type="hidden" name="product_qty" id="hiddenText<?= $index ?>" value="<?= $item->product_qty ?>">
                                                        <input type="hidden" name="product_id" id="hiddenText<?= $index ?>" value="<?= $item->product_id ?>">
                                                        <input type="hidden" name="reserve_id" id="hiddenText<?= $index ?>">
                                                        <input type="hidden" name="reserve_date" id="hiddenText<?= $index ?>">
                                                        <span class="plus<?= $index ?>">+</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-8 col-md-8 col-lg-8">
                                                        <p class="card-text text-center rounded-1 mt-2 py-2 border border-white shadow text-white" style = "background-color: rgba(255, 255, 255, 0.5);">
                                                        <small>
                                                            <small>
                                                            <i class="fa fa-circle-question"></i> Put the number of quantity you want
                                                            </small>
                                                        </small>
                                                        </p>
                                                    </div>
                                                    </div>
                                                
                                            </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn bg-dark bg-gradient text-white shadow" data-bs-dismiss="modal">Cancel</button>
                                            <button name="btnReserve" class="btn bg-black bg-gradient text-white shadow"  value="<?= $item->cart_id ?>">Reserve Item</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

<script>
    const plus<?= $index ?> = document.querySelector("#staticBackdrop<?= $index ?> .plus<?= $index ?>");
    const minus<?= $index ?> = document.querySelector("#staticBackdrop<?= $index ?> .minus<?= $index ?>");
    const num<?= $index ?> = document.querySelector("#staticBackdrop<?= $index ?> .num<?= $index ?>");
    const hiddenInput<?= $index ?> = document.getElementById("hiddenText<?= $index ?>");

    let quantity<?= $index ?> = parseInt(num<?= $index ?>.innerText);

    plus<?= $index ?>.addEventListener("click", () => {
        quantity<?= $index ?>++;
        updateQuantity<?= $index ?>();
    });

    minus<?= $index ?>.addEventListener("click", () => {
        if (quantity<?= $index ?> > 1) {
            quantity<?= $index ?>--;
            updateQuantity<?= $index ?>();
        }
    });

    function updateQuantity<?= $index ?>() {
        const formattedQuantity<?= $index ?> = quantity<?= $index ?> < 10 ? quantity<?= $index ?> : quantity<?= $index ?>;
        num<?= $index ?>.innerText = formattedQuantity<?= $index ?>;
        hiddenInput<?= $index ?>.value = formattedQuantity<?= $index ?>; // Update the value of the hidden input
    }
</script>
