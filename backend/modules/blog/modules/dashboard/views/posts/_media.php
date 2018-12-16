<?php
use kartik\file\FileInput;
?>

<div class="col-md-12">
    <div class="col-md-6">
        <?=
        $form->field($model, 'file')->widget(FileInput::classname(), [
            'options' => [
                'accept' => 'image/*',
            ],
        ]);
        ?>
    </div>
    <div class="col-md-6 text-center" style="padding-top: 100px">

        <?php if ($model->preview_xl): ?>
            <img src="<?= $model->preview_xl ?>" class="img-rounded" width="200"
                 alt='logo'/>
        <?php endif; ?>
    </div>
</div>
