<tr>
        <td>
            <div class="form-check ms-3">
                <input class="form-check-input" type="checkbox" name="reserve_id[]" value="<?= $item->reserve_id ?>" id="flexCheckDefault">
            </div>
        </td>
        <td ><?= $item->firstname?> <?= $item->lastname?></td>
        <td ><?= $item->product_name?></td>
        <td><?= $item->product_type ?></td>
        <td><i class="fa fa-peso-sign"></i> <?= $item->product_price ?></td>
        <td><?= $item->product_qty ?></td>
        <td><?= $item->confirm_due ?></td>
        <td>
            <img class="rounded"width="80px" height="80px" src="<?= ROOT ?>/<?= $item->image ?>" alt="">
        </td>
        <td>
        <button data-bs-toggle="modal" data-bs-target="#sstaticBackdrop<?= $index ?>" type="button" class="btn bg-warning bg-gradient text-dark shadow">View Details</button>
        </td>
</tr>

<?php include(views_path("list-tab/reserve-tab/reserve-modal/c-details-reserve-modal")); ?>