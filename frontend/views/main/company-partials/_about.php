<?php
$videos = $company->getYoutubeVideoIds();
?>
<?php if (!empty($company["about"]) || $videos):?>
    <h2 class="section-title lined bottom-offset">О компании <?= $company->name;?></h2>

    <?php if ($videos): ?>
        <div class="paragraph"> <?= $this->render("_youtube", ["links" => $videos]) ?></div>
    <?php endif; ?>

<?php endif;?>

<?php if (!empty($company["about"])) : ?>
    <div class="paragraph vertical-offset align-left about">
        <?= $company["about"]?>
    </div>
<?php endif;?>



