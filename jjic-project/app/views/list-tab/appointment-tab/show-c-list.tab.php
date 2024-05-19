<tr>
        <td>
            <div class="form-check ms-3">
                <input class="form-check-input" type="checkbox" name="appoint_id[]" value="<?= $item->appoint_id ?>" id="flexCheckDefault">
            </div>
        </td>
        <td ><?= $item->firstname?> <?= $item->lastname?></td>
        <td ><?= $item->appoint_reason?></td>
        <td><?= $item->appoint_date ?></td>
        <td><?= $item->contact ?></td>
        <td><?= $item->email ?></td>
        <td><?= $item->appoint_additional ?></td>
        <td>
        <button data-bs-toggle="modal" data-bs-target="#view<?= $index ?>" type="button" class="btn bg-warning bg-gradient text-dark shadow">View Details</button>
        </td>
</tr>

<?php include(views_path("list-tab/appointment-tab/appoint-modal/c-details-appoint-modal")); ?>