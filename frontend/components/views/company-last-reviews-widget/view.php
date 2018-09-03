<ul class="testimonials-list-row">
    <?php foreach ($items as $item): ?>
        <li>
            <div class="testimonial-card shadow <?= $widget->getColoredClass($item["stars"])?>">

               <div class="col-md-12">
                   <div class="col-md-3 avatar">
                       <div class="round-photo">
                           <div class="image-cover">
                               <img src="<?= \yii\helpers\Url::to("img/testimonials/user.jpg") ?>" alt="User">
                           </div>
                       </div>
                   </div>
                   <div class="col-md-9 info">

                       <div class="name">
                           <?php if ($anon = $widget->isAnon($model["user"])): ?>
                               <?= $anon; ?>
                           <?php else: ?>
                               <?= \yii\helpers\Html::a($model["user"]["name"], $widget->getUserProfileLink($model["user"]), ["target" => "_blank"])?>
                           <?php endif;?>
                       </div>
                       <div class="url">
                           <a href="<?= $widget->getCompanyUrl($item["gisturl"])?>" class="link">Отзывы о <?= $item["gistname"]; ?></a>
                       </div>
                       <div class="date"><?= $widget->getDateByFormat($item["date"]); ?></div>

                   </div>
               </div>
                <div class="clearfix"></div>


                <div class="col-md-12 text">
                    <?=  \yii\helpers\BaseStringHelper::truncate( $item["text"], 700); ?>
                </div>
            </div>
        </li>
    <?php endforeach; ?>

</ul>