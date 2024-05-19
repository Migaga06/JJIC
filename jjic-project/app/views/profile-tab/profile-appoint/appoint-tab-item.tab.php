<tr>
          <form action="" method="POST">
          <td><?= $item->firstname?> <?= $item->lastname ?></td>
          <td><?= $item->appoint_reason ?></td>
          <td><?= $item->appoint_date ?></td>
          <td><?= $item->contact ?></td>
          <td class = " text-break"><?= $item->email ?></td>
          <td class = " text-break"><?= $item->appoint_additional ?></td>
          <td><?= $item->appoint_status ?></td>
          <td>
            <div class="d-grid gap-1 d-md-flex">
            <?php if($item->appoint_status === "Not Confirm"){?>
                <button data-bs-toggle="modal" data-bs-target="#edit<?= $index ?>" type="button" class="btn bg-success bg-gradient text-white shadow">Edit</button>
                <button data-bs-toggle="modal" data-bs-target="#not<?= $index ?>" type="button" class="btn bg-danger bg-gradient text-white shadow">Cancel</button>
            <?php }?>
            <?php if($item->appoint_status === "Confirm"){?>
                <button disabled data-bs-toggle="modal" data-bs-target="#conf<?= $index ?>" type="button" class="btn bg-secondary bg-gradient text-white shadow">Request Cancel</button>
            <?php }?>
            <?php if(($item->appoint_status === "Done") || ($item->appoint_status === "Overdue")){?>
              <form action="" method="POST">
                <button type="submit" name="clearAppoint" type="button" class="btn bg-success bg-gradient text-white shadow" value="<?= $item->appoint_id ?>">Clear</button>
              </form>
            <?php }?>
            </div>
          </td>
          </form>
</tr>
<?php include(views_path("profile-tab/profile-appoint/view-appoint-modal")); ?>