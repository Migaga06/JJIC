<div class="col">
    <div class="card h-100 bg-dark " style=" min-width: 13rem;">
          <img src="<?= ROOT ?>/<?= $item->user_image ?>" class="card-img-top rounded-top " alt="..." style="max-height: 13rem; min-height: 13rem; width:100%;">
          <div class="card-body h-100 text-center">
            <a href="" class="btn btn-secondary " style = "max-width: 1000px; background-color: rgba(255, 255, 255, 0.9);">
              <h5 class="card-title text-black">
                <i class="fa fa-id-card"></i> <?= $item->firstname ?> <?= $item->lastname ?>
              </h5>
            </a>
            <p class="card-text text-white mt-1 text-center"><i class="fa fa-circle-user"></i> <?= $item->role ?></p>
          </div>
            <div class="card-body text-center">
              <a href="<?= ROOT ?>/users/edit/<?= $item->user_id ?>" class="btn btn-success my-1"><i class="fa fa-edit"></i> Edit</a>
              <a href="<?= ROOT ?>/users/delete/<?= $item->user_id ?>" class="btn btn-danger my-1"><i class="fa fa-trash"></i> Delete</a>

          <?php if($item->user_status == 'Banned'){?>
              <form action="" method="POST">
                <button type="submit" name="unbannedUser" type="button" class="btn bg-primary bg-gradient text-white shadow" value="<?= $item->user_id ?>"><i class="fa fa-unlock"></i> Unbanned</button>
              </form>
          <?php }?>
          </div>
    </div>
</div>