<?php if(Auth::access('Staff')){

    ?>
<div class="col-12" style="max-width: 580px">
    <button type="button" class="badge btn" style="color: rgb(85, 85, 85);">
        <i class="fa fa-pen"></i> Edit
    </button>
    <button type="button" class="badge btn" style="color: rgb(85, 85, 85);">
        <i class="fa fa-trash-can"></i> Delete
    </button>
    <button type="button" class="badge btn float-end" style="color: rgb(85, 85, 85);">
        <i class="fa fa-thumbtack"></i> Pin Post
    </button>
</div>
<?php }
    $image = new Post_image();
foreach ($rows as $post) {

    $fileQuery = "SELECT file_path, type FROM post_images WHERE post_id = :post_id";
    $files = $image->query($fileQuery, ['post_id' => $post->post_id]);
?>
<div class="card mb-2 border border-dark shadow text-white" style = "max-width: 550px; background-color: rgb(55, 55, 55);" data-bs-theme="dark">
    <div class="card-body">
        <div class="row">
            <div class="col-1">
                <img src="<?= ROOT ?>/<?= $_SESSION['USER']->user_image ?>" class="d-block border border-dark mx-auto rounded-circle" alt="" style="width: 40px; height: 40px;">
            </div>
            <div class="col-11 ">
                <h5 class="card-title px-2 pt-2" name="author"><?= $post->firstname ?> <?=$post->lastname?></h5>
            </div>
        </div>
    </div>
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel" style = "height:270px" data-bs-theme="light">
        <div class="carousel-inner rounded" style = "height: 100%">
            <div class="carousel-item active" style = "height: 100%">
                <img src="<?=ROOT?>/assets/images/yakuback.png" class="d-block w-100" alt="..." style = "height: 100%">
            </div>
            <?php $active = true;
                foreach ($files as $file) {?>
                    <?php if ($file->type == 'image'): ?>
                        <div class="carousel-item <?php $active ? 'active' : ''?>" style = "height: 100%">
                            <img src="<?=ROOT?>/<?= $file->file_path ?>" class="d-block w-100" alt="..." style = "height: 100%">
                        </div>
                    <?php elseif ($file->type == 'video'): ?>
                        <!-- You can customize the video player as needed -->
                        <video controls class="carousel-item <?php $active ? 'active' : ''?>" style = "height: 100%">
                            <source src="<?= $file->file_path ?>" class="d-block w-100" alt="..." style = "height: 100%" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    <?php endif;
                    $active = false;?>
                <?php }?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="card-body text-white">
        <h5 class="card-title"><?= $post->firstname?></h5>
        <p class="card-text"><?= $post->description;?></p>
        <p class="card-text"><small class="text-body-secondary"><?= $post->created_at;?></small></p>
        <hr class="text-white">
        <div class="row">
            <div class="col-12 ">
                <button type="button" class="badge btn text-white shadow border border-secondary" style = "background-color: rgb(45, 45, 45);">
                    <i class="fa fa-heart"></i> Heart
                </button>
                <p class="badge card-text"><small class="text-body-secondary">Heart 1</small></p>
                <button type="button" class="badge btn text-white shadow border border-secondary float-end" data-bs-toggle="collapse" data-bs-target="#enterComment" style = "background-color: rgb(45, 45, 45);">
                    <i class="fa fa-message"></i> Comment
                </button>
                <button class="btn badge card-text float-end" data-bs-toggle="collapse" data-bs-target="#viewComment">
                    <small class="text-body-secondary">View Comment 1</small>
                </button>
            </div>
        </div>
    </div>
    <div class="collapse p-1 rounded-3 mx-2 mb-1" id="viewComment" style = "background-color: rgb(55, 55, 55);">
        <hr class="text-white">
        <div class="row">
            <div class="col-lg-12 mb-1" >
                <p class="badge"><small class="text-body-secondary">Comments :</small></p>
                <div class="row px-3" style="max-height: 200px; position: relative; overflow-y: scroll;">
                    <div class="col-1">
                        <img src="<?= ROOT ?>/<?= $_SESSION['USER']->user_image ?>" class="d-block border border-dark mx-auto rounded-circle" alt="" style="width: 40px; height: 40px;">
                    </div>
                    <div class="col-11 ps-4">
                        <div class="row px-2 pb-2">
                            <small><p class=" rounded p-1" style="background-color: rgb(75, 75, 75);">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ducimus corrupti, tempore fugit ex vel tempora adipisci aliquam aut. Libero officiis est dolores at incidunt ullam doloribus! Possimus, quidem! Commodi, hic!</p></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="collapse p-1 rounded-3 mx-2 mb-1" id="enterComment" style = "background-color: rgb(55, 55, 55);">
        <hr class="text-white">
        <div class="row">
            <div class="col-1">
                <img src="<?= ROOT ?>/<?= $_SESSION['USER']->user_image ?>" class="d-block border border-dark mx-auto rounded-circle" alt="" style="width: 40px; height: 40px;">
            </div>
            <div class="col-11 ps-4">
                <input type="hidden" class="form-control" name="user_id" value="1">
                <input name="post_title" id="title" class="form-control" placeholder="Comment as <?= $_SESSION['USER']->firstname?> <?= $_SESSION['USER']->lastname?>" style="background-color: rgb(75, 75, 75);"></input>
            </div>
            <div class="col-12">
                <button class="btn rounded-5 text-center float-end  mt-1 mb-1" type="submit" style="background-color: rgb(75, 75, 75);"><i class="fa fa-paper-plane text-center"></i> Send</button>
                <button class="btn rounded-5 float-end m-1" type="submit" style="background-color: rgb(75, 75, 75);"><i class="fa fa-file-image"></i></button>
            </div>
        </div>
    </div>
</div>
<?php }?>