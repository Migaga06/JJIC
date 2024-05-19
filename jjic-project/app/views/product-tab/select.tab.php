<tr>
        <td ><?= $item->product_name?></td>
        <td ><?= $item->product_description?></td>
        <td><?= $item->product_type?></td>
        <td><i class="fa fa-person-circle-plus"></i> <?= $item->firstname?> <?= $item->lastname?></td>
        <td><i class="fa fa-peso-sign"></i> <?= $item->product_price?></td>
        <td><?= $item->product_qty?></td>
        <td><img src="<?= ROOT ?>/<?= $item->image ?>" class="card-img-top rounded" alt="..." style="height: 80px; width: 80px;"></td>
        <td>
            <div class="card-group gap-1" style="max-width: 19rem; width:100%;">
                <a href="<?= ROOT ?>/products/edit/<?= $item->product_id ?>" class="btn btn-success bg-gradient">Edit</a>
                <?php if(Auth::access('Admin')){?>
                    <a href="<?= ROOT ?>/products/delete/<?= $item->product_id ?>" class="btn btn-danger bg-gradient">Delete</a>
                <?php }?>
            </div>
        </td>
</tr>