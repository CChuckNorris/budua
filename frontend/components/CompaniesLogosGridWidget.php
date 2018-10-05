<?php

namespace frontend\components;

use yii\base\Widget;

class CompaniesLogosGridWidget extends Widget
{
    const template_1 = 1;
    const template_2 = 2;

    public $items;

    public $target_url;

    public $template = 1;

    private $img_dir = "/frontend/web/mt/img/";

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render("companies-logos-grid-widget/view".$this->template, [
            "widget" => $this,
            "items" => $this->items
        ]);
    }

    public function getRegionsList($regions, $limit = 3)
    {
        if (!$regions) return false;

        foreach ($regions as $r_key => $region) {
            if ($r_key == $limit) {
                echo "<p class='region'>...</p>";
                break;
            }
            echo "<p class='region'>".$region["name"]."</p>";
        }
    }

    public function getLogoPath($item)
    {
        return  $this->img_dir . $item['logo'];
    }

    public function getTargetUrl()
    {
        return $this->target_url;
    }

}
