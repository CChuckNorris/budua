<?php

namespace frontend\components;

use common\data_mappers\WidgetSettingsDataMapper;
use common\helpers\WidgetsNamesHolder;
use common\managers\WidgetSettingsProvider;
use common\models\WidgetsSettings;
use yii\base\Widget;

class YandexRTBWidget extends Widget
{
    public $options;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render("yandex-rtb/view", ["options" => $this->getSetting(), 'widget' => $this]);
    }

    private function getSetting()
    {
        $provider = new WidgetSettingsProvider(new WidgetSettingsDataMapper(new WidgetsSettings()), new WidgetsNamesHolder());
        return $provider->getYandexRTBWidgetSettings();
    }
}
