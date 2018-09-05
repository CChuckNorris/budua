<?php

use yii\helpers\Url;

?>

<div class="col-md-12 sorting-ctrl">

    <div class="dropdown-wrapper ">
        <img src="/frontend/web/img/loader2.gif" class="review-loader">
        <div class="dropdown-title">
            Сортировать по:
        </div>
        <div class="ae-dropdown dropdown">
            <div class="ae-select">
                <span class="ae-select-content">Дата</span>
                <i class="icon icon-angle-arrow-down"></i>
            </div>
            <ul class="sorting-dropdown-menu ae-hide">


                <li title="Популярность">
                    <span>
                          <a href="<?= Url::toRoute([$target_url, 'sort' => 'popular', 'sort_desc' => 'desc']); ?>">
                              <i class="icon icon-angle-arrow-down up"></i>
                          </a>
                    </span>
                    <span>Популярность</span>
                    <span>
                        <a href="<?= Url::toRoute([$target_url, 'sort' => 'popular']); ?>">
                              <i class="icon icon-angle-arrow-down down"></i>
                        </a>
                    </span>
                </li>

                <li title="Дата">
                        <span>
                        <a href="<?= Url::toRoute([$target_url]); ?>">
                                <i class="icon icon-angle-arrow-down up"></i>
                        </a>
                    </span>
                    <span>Дата</span>
                    <span>
                        <a href="<?= Url::toRoute([$target_url, 'sort_desc' => 'desc']); ?>">
                              <i class="icon icon-angle-arrow-down down"></i>
                        </a>
                    </span>
                </li>

                <li title="Негатив/Позитив">

                      <span>
                         <a href="<?= Url::toRoute([$target_url, 'sort' => 'bad-good',  'sort_desc' => 'desc']); ?>">
                               <i class="icon icon-angle-arrow-down up"></i>
                         </a>
                    </span>
                    <span>Позитив/Негатив</span>

                    <span>
                        <a href="<?= Url::toRoute([$target_url, 'sort' => 'bad-good']); ?>">
                            <i class="icon icon-angle-arrow-down down"></i>
                        </a>
                    </span>
                </li>
            </ul>
        </div>
    </div>
</div>