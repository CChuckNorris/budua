<?php

namespace frontend\components;

use common\data_mappers\WidgetSettingsDataMapper;
use common\helpers\WidgetsNamesHolder;
use common\models\WidgetsSettings;
use yii\base\Widget;

/**
 * Class MainMenuWidget
 * @package frontend\components
 */
class MainMenuWidget extends Widget
{
    public $items;

    /** @var WidgetSettingsDataMapper **/
    private $WidgetSettingsDataMapper;

    public function init()
    {
        parent::init();

        $this->WidgetSettingsDataMapper = new WidgetSettingsDataMapper(new WidgetsSettings());
    }

    public function run()
    {
        $this->loadData();

        return $this->render("main-menu-widget/view", ["items" => $this->items]);
    }

    private function loadData()
    {
        $settings = $this->WidgetSettingsDataMapper->findByPrimaryKey(WidgetsNamesHolder::MAIN_MENU);

        $this->items = $settings->options;
    }

}
