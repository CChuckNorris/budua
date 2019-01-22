<?php

use yii\helpers\Url;

?>

<div class="col-xs-12 col-md-6 end-md">

    <div class="dropdown-wrapper">
        <img src="/frontend/web/img/review_loader.gif" class="review-loader">
        <div class="dropdown-title">
            Сортировать по:
        </div>
        <div class="ae-dropdown dropdown">
            <div class="ae-select">
                <span class="ae-select-content">Дата</span>
                <i class="icon icon-angle-arrow-down"></i>
            </div>
            <ul class="sortcontrols-menu ae-hide" id="dropdown-menu">


                <li title="Популярность">
                    <span>
                          <a href="<?= Url::toRoute([$target_url, 'id' => $entity_id, 'sort' => 'popular']); ?>">
                              <i class="icon icon-angle-arrow-down up"></i>
                          </a>
                    </span>
                    <span>Популярность</span>
                    <span>
                        <a href="<?= Url::toRoute([$target_url, 'id' => $entity_id, 'sort' => 'popular', 'sort_desc' => 'desc']); ?>">
                              <i class="icon icon-angle-arrow-down down"></i>
                        </a>
                    </span>
                </li>

                <li title="Дата">
                        <span>
                        <a href="<?= Url::toRoute([$target_url, 'id' => $entity_id]); ?>">
                                <i class="icon icon-angle-arrow-down up"></i>
                        </a>
                    </span>
                    <span>Дата</span>
                    <span>
                        <a href="<?= Url::toRoute([$target_url, 'id' => $entity_id, 'sort_desc' => 'desc']); ?>">
                              <i class="icon icon-angle-arrow-down down"></i>
                        </a>
                    </span>
                </li>

                <li title="Позитив/Негатив">

                      <span>
                         <a href="<?= Url::toRoute([$target_url, 'id' => $entity_id, 'sort' => 'bad-good']); ?>">
                               <i class="icon icon-angle-arrow-down up"></i>
                         </a>
                    </span>
                    <span>Позитив/Негатив</span>

                    <span>
                        <a href="<?= Url::toRoute([$target_url, 'id' => $entity_id, 'sort' => 'bad-good', 'sort_desc' => 'desc']); ?>">
                            <i class="icon icon-angle-arrow-down down"></i>
                        </a>
                    </span>
                </li>
            </ul>
        </div>
    </div>
</div>