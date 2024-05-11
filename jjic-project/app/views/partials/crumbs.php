<nav aria-label="breadcrumb">
  <ol class="breadcrumb justify-content-center">
    <?php if (isset($crumbs)):?>
        <?php foreach ($crumbs as $crumb):?>

        <li class="breadcrumb-item text-white "><a class="disabled" href="<?=$crumb[1]?>" style="color: white;"><i class="fa"><?=$crumb[0]?></i></a></li>

        <?php endforeach; ?>
    <?php endif; ?>
  </ol>
</nav>