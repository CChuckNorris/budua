<div class="col-xs-12 col-md-12" id="review-block">
    <div class="write-review top-offset align-left md-align-center">

        <div class="title"><span class="mark">Оставьте свой комментарий!</span>
        </div>
        <ul class="social-list">
            <li class="anonymous">
                <button type="button" class="btn active" data-toggle="#addReview">Анонимно</button>
            </li>
        </ul>

        <?= $this->render("_form", ["widget" => $widget]) ?>

    </div>
</div>




