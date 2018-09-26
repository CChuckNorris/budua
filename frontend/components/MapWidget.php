<?php

namespace frontend\components;

use yii\base\Widget;

class MapWidget extends Widget
{
    public $items;


    public function run()
    {
        return $this->render("map-widget/view", ["items" => $this->items, "widget" => $this]);
    }




}
