<?php

namespace backend\helpers;

use common\helpers\WidgetsNamesHolder;
use common\models\CountersTopPageWidgetSettings;
use common\models\HorizontalBannerWidgetSettings;
use common\models\InfoBlock1WidgetSettings;
use common\models\MainMenuWidgetSettings;
use common\models\RegionsWidgetSettings;
use common\models\SidebarBannerWidgetSettings;
use common\models\YandexRTBWidgetSettings;
use Yii;

class WidgetsSettingsFactory
{

    public function getWidgetSettings($widget_id)
    {
        if (WidgetsNamesHolder::COUNTERS_TOP_PAGE == $widget_id) {
            /** @var CountersTopPageWidgetSettings */
            return new CountersTopPageWidgetSettings();
        }

        if (WidgetsNamesHolder::REGIONS == $widget_id) {
            /** @var RegionsWidgetSettings */
            return new RegionsWidgetSettings();
        }

        if (WidgetsNamesHolder::SIDEBAR_BANNER == $widget_id) {
            /** @var SidebarBannerWidgetSettings */
            return new SidebarBannerWidgetSettings();
        }

        if (WidgetsNamesHolder::HORIZONTAL_BANNER == $widget_id) {
            /** @var HorizontalBannerWidgetSettings */
            return new HorizontalBannerWidgetSettings();
        }

        if (WidgetsNamesHolder::INFO_BLOCK_1 == $widget_id) {
            /** @var InfoBlock1WidgetSettings */
            return new InfoBlock1WidgetSettings();
        }

        if (WidgetsNamesHolder::MAIN_MENU == $widget_id) {
            /** @var MainMenuWidgetSettings */
            return new MainMenuWidgetSettings();
        }

        if (WidgetsNamesHolder::YANDEX_RTB == $widget_id) {
            /** @var MainMenuWidgetSettings */
            return new YandexRTBWidgetSettings();
        }
    }
}