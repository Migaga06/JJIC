<tr>
          <form action="" method="POST">
          <td ><?= $item->product_name?></td>
          <td><?= $item->product_description ?></td>
          <td><?= $item->product_type ?></td>
          <td><i class="fa fa-peso-sign"></i> <?= $item->product_price ?></td>
          <td><?= $item->product_qty ?></td>
          <td>
            <img class="rounded"width="80px" height="80px" src="<?= ROOT ?>/<?= $item->image ?>" alt="">
          </td>
          <td>
            <div class="d-grid gap-2 d-md-flex">
            <button data-bs-toggle="modal" data-bs-target="#sstaticBackdrop<?= $index ?>" type="button" class="btn bg-primary bg-gradient text-white shadow">View</button>
            <?php if($item->reserve_status === "Not Confirm"){?>
                <button data-bs-toggle="modal" data-bs-target="#staticBackdrop<?= $index ?>" type="button" class="btn bg-danger bg-gradient text-white shadow">Cancel</button>
            <?php }?>
            <?php if($item->reserve_status === "Confirm"){?>
                <button disabled data-bs-toggle="modal" data-bs-target="#staticBackdrop<?= $index ?>" type="button" class="btn bg-secondary bg-gradient text-white shadow">Cancel</button>
            <?php }?>
            <?php if($item->reserve_status === "Done"){?>
              <form action="" method="POST">
                <button type="submit" name="clearReserve" type="button" class="btn bg-success bg-gradient text-white shadow" value="<?= $item->reserve_id ?>">Clear</button>
              </form>
            <?php }?>
            </div>
          </td>
          </form>
</tr>
                            <?php include(views_path("profile-tab/profile-reserve/cancel-reserve-modal")); ?>
                            <?php include(views_path("profile-tab/profile-reserve/view-reserve-modal")); ?>