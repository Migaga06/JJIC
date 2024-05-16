<tr>
        <td ><?= $item->firstname?> <?= $item->lastname?></td>
        <td ><?= $item->product_name?></td>
        <td><?= $item->product_type ?></td>
        <td><i class="fa fa-peso-sign"></i> <?= $item->product_price ?></td>
        <td><?= $item->product_qty ?></td>
        <td>
            <img class="rounded"width="80px" height="80px" src="<?= ROOT ?>/<?= $item->image ?>" alt="">
        </td>
        <td>
            <button data-bs-toggle="modal" data-bs-target="#done<?= $index ?>" type="button" class="btn bg-warning bg-gradient text-dark shadow">View Details</button>
        </td>
</tr>

<?php include(views_path("list-tab/reserve-tab/reserve-modal/done-reserve-modal")); ?>