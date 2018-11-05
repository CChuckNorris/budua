<?php
/**
 * @var \common\interfaces\IBasicEntity $company
 */
?>
<div class="row middle-xs center-xs start-md">
    <div class="col-xs-12 col-md-6 align-left md-align-center">
        <div class="section-title large pink-lined"><h1><?= $company->getName(); ?></h1></div>
        <div class="section-subtitle"><h2><?= $company->getSubtitle(); ?></h2></div>
    </div>
    <div class="col-xs-12 col-md-6">
        <div class="company-logo">
            <div class="image-contain">
                <?= \yii\helpers\Html::img($company->getLogo(), ["alt" => $company->getName()])?>
            </div>
        </div>
    </div>
</div>
