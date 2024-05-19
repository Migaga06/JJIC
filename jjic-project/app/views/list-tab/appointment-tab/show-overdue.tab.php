<tr>
        <td ><?= $item->firstname?> <?= $item->lastname?></td>
        <td ><?= $item->email?></td>
        <td><?= $item->appoint_reason?></td>
        <td><?= $item->violation_count?></td>
        <td>
            <img class="rounded"width="80px" height="80px" src="<?= ROOT ?>/<?= $item->user_image ?>" alt="">
        </td>
        <td>
            <button data-bs-toggle="modal" data-bs-target="#viewProd<?= $index ?>" type="button" class="btn bg-warning bg-gradient text-dark shadow">View Details</button>
            <button data-bs-toggle="modal" data-bs-target="#ban<?= $index ?>" type="button" class="btn bg-danger bg-gradient text-white shadow">Ban User</button>
            <button type="submit" name="removeDue" type="button" class="btn bg-primary bg-gradient text-white shadow" value="<?= $item->appoint_id ?>">Remove</button>
        </td>
</tr>

<?php include(views_path("list-tab/appointment-tab/appoint-modal/overdue-appoint-modal")); ?>