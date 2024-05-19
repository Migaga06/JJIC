<?php
date_default_timezone_set('Asia/Manila');

$image = new Post_image();
$likes = new Like();
    foreach ($rows_p as $post) {

    $fileQuery = "SELECT file_path, type FROM post_images WHERE post_id = :post_id";
    $files = $image->query($fileQuery, ['post_id' => $post->post_id]);

    $postTime = new DateTime($post->created_at);
    $now = new DateTime();

    $timeDiff = $now->diff($postTime);

    if ($timeDiff->y > 0) {
        $formattedTime = $timeDiff->y . ' year' . ($timeDiff->y > 1 ? 's' : '') . ' ago';
    } elseif ($timeDiff->m > 0) {
        $formattedTime = $timeDiff->m . ' month' . ($timeDiff->m > 1 ? 's' : '') . ' ago';
    } elseif ($timeDiff->d > 0) {
        $formattedTime = $timeDiff->d . ' day' . ($timeDiff->d > 1 ? 's' : '') . ' ago';
    } elseif ($timeDiff->h > 0) {
        $formattedTime = $timeDiff->h . ' hour' . ($timeDiff->h > 1 ? 's' : '') . ' ago';
    } elseif ($timeDiff->i > 0) {
        $formattedTime = $timeDiff->i . ' minute' . ($timeDiff->i > 1 ? 's' : '') . ' ago';
    } else {
        $formattedTime = 'Just now';
    }
    ?>
<h2 class="text-white"><i class="fa fa-thumbtack"></i> Pinned Post</h2>
<?php if(Auth::access('Staff')){ ?>
<form method="POST">
<div class="col-12" style="max-width: 700px">
    <button name="deletePinPost" type="submit" class="badge btn" style="color: rgb(155,155,155);" value="<?= $post->post_id?>"> <i class="fa fa-trash-can"></i> Delete</button>
    <button name="unpinPost" type="submit" class="badge btn float-end" style="color: rgb(155,155,155);" value="<?= $post->post_id?>">
        <i class="fa fa-thumbtack"></i> Unpinned Post
    </button>
</div>
</form>
<?php } ?>
<form method="POST">
<div class="card mb-2 border border-dark shadow text-white" style = "max-width: 700px; background-color: rgb(55, 55, 55);" data-bs-theme="dark">
    <div class="card-body">
        <div class="row">
            <div class="col-1">
                <img src="<?= ROOT ?>/<?= $post->user_image ?>" class="d-block border border-dark mx-auto rounded-circle" alt="" style="width: 40px; height: 40px;">
            </div>
            <div class="col-11 ">
                <h5 class="card-title px-2 pt-2" name="author"><?= $post->firstname ?> <?=$post->lastname?></h5>
            </div>
        </div>
    </div>
    <div id="carouselExampleAutoplaying<?= $post->post_id ?>" class="carousel slide" data-bs-ride="carousel" style="height:270px" data-bs-theme="light">
        <div class="carousel-inner rounded" style="height: 100%">
            <?php foreach ($files as $key => $file): ?>
                <?php if ($file->type == 'image'): ?>
                    <div class="carousel-item <?= $key === 0 ? 'active' : '' ?>" style="height: 100%">
                        <img src="<?= ROOT ?>/<?= $file->file_path ?>" class="d-block w-100" alt="..." style="height: 100%">
                    </div>
                <?php elseif ($file->type == 'video'): ?>
                    <div class="carousel-item <?= $key === 0 ? 'active' : '' ?>" style="height: 100%">
                        <video controls style="height: 100%; width: 100%;">
                            <source src="<?= ROOT ?>/<?= $file->file_path ?>" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying<?= $post->post_id ?>" data-bs-slide="prev" style="z-index: 10;">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying<?= $post->post_id ?>" data-bs-slide="next" style="z-index: 10;">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        </div>
    <div class="card-body text-white">
        <h5 class="card-title"><?= $post->title?></h5>
        <p class="card-text"><?= $post->description;?></p>
        <p class="card-text"><small class="text-body-secondary"><i class="fa fa-clock"></i> <?= $formattedTime; ?></small></p>
        <hr class="text-white">
        <div class="row">
            <div class="col-12 ">
                <button name="btnHeart" type="submit" class="badge btn text-white shadow-lg" style="background-color: <?php echo $likes->userLiked($_SESSION['USER']->user_id, $post->post_id) ? '#ff66b2' : 'rgb(45, 45, 45)'; ?>;" value="<?= $post->post_id; ?>">
                    <i class="fa fa-heart"></i> Heart
                </button>
                <p class="badge card-text"><small class="text-body-secondary"><?= $post->like_count; ?></small></p>
            </div>
        </div>
    </div>
</div>
</form>
<?php }?>