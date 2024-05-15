<tr>
        <td>
            <div class="form-check ms-3">
                <input class="form-check-input" type="checkbox" name="cart_id[]" value="<?= $item->cart_id ?>" id="flexCheckDefault">
            </div>
        </td>
        <td ><?= $item->product_name?></td>
        <td><?= $item->product_description ?></td>
        <td><?= $item->product_type ?></td>
        <td><i class="fa fa-peso-sign"></i> <?= $item->product_price ?></td>
        <td>
            <div class="col-sm-4 col-md-4 col-lg-4 mt-2 ">
                <div class="wrapper border border-secondary ">
                        <span class="minus<?= $index ?>">-</span>
                        <span class="num<?= $index ?>"><?= $item->product_qty ?></span>
                        <input type="hidden" name="product_qty[]" id="hiddenText<?= $index ?>" value="<?= $item->product_qty ?>">
                        <input type="hidden" name="product_id" id="hiddenText<?= $index ?>" value="<?= $item->product_id ?>">
                        <input type="hidden" name="reserve_id" id="hiddenText<?= $index ?>">
                        <input type="hidden" name="reserve_date" id="hiddenText<?= $index ?>">
                    <span class="plus<?= $index ?>">+</span>
                </div>
            </div>
        </td>
        <td>
            <img class="rounded"width="80px" height="80px" src="<?= ROOT ?>/<?= $item->image ?>" alt="">
        </td>
        <td>
            <button name="btnRemove" class="btn bg-danger bg-gradient text-white shadow" value="<?= $item->cart_id ?>">Remove</button>
        </td>
</tr>

<?php include(views_path("profile-tab/profile-cart-modal/remove-cart-modal")); ?>

<script>
    const plus<?= $index ?> = document.querySelector(".plus<?= $index ?>");
    const minus<?= $index ?> = document.querySelector(".minus<?= $index ?>");
    const num<?= $index ?> = document.querySelector(".num<?= $index ?>");
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

<!--<div class="col">

            <div class="d-grid gap-2 d-md-flex">
            <button data-bs-toggle="modal" data-bs-target="#staticBackdrop<?= $index ?>" type="button" class="btn bg-primary bg-gradient text-white shadow">View</button>
            <button data-bs-toggle="modal" data-bs-target="#sstaticBackdrop<?= $index ?>" type="button" class="btn bg-danger bg-gradient text-white shadow">Cancel</button>
            </div>
-->
                            