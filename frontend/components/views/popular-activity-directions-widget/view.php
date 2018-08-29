<ul class="popular-promotion">
    <?php foreach ($items as $item) : ?>
        <?php $color = $item["hex_border_color"]; ?>
        <li>
            <?= \yii\helpers\Html::a($item["title"], ["types/" . $item["alias"]],
                [
                    "style" => "border-color: " . $color . "; background-color: ".$color."; color:#fff"
                ]
            ) ?>
        </li>
    <?php endforeach; ?>
</ul>
