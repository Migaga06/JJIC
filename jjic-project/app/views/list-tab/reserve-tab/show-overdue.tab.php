<tr>
        <td ><?= $item->firstname?> <?= $item->lastname?></td>
        <td ><?= $item->email?></td>
        <td >Contact</td>
        <td>Violation</td>
        <td>
            <img class="rounded"width="80px" height="80px" src="<?= ROOT ?>/<?= $item->user_image ?>" alt="">
        </td>
        <td>
            <button data-bs-toggle="modal" data-bs-target="#view<?= $index ?>" type="button" class="btn bg-warning bg-gradient text-dark shadow">View Details</button>
            <button data-bs-toggle="modal" data-bs-target="#ban<?= $index ?>" type="button" class="btn bg-danger bg-gradient text-white shadow">Ban User</button>
            <button data-bs-toggle="modal" data-bs-target="#remove<?= $index ?>" type="button" class="btn bg-primary bg-gradient text-white shadow">Remove</button>
        </td>
</tr>