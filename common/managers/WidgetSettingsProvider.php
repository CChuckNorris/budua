<?php

namespace common\managers;

use common\data_mappers\WidgetSettingsDataMapper;
use common\helpers\WidgetsNamesHolder;
use common\models\InfoBlock;

/**
 * Class WidgetSettingsProvider
 * @package common\managers
 */
class WidgetSettingsProvider
{
    /**
     * @var WidgetSettingsDataMapper
     */
    private $dataMapper;

    /** @var WidgetsNamesHolder */
    private $WidgetsNamesHolder;

    /**
     * WidgetSettingsProvider constructor.
     * @param WidgetSettingsDataMapper $dataMapper
     * @param WidgetsNamesHolder $widgetsNamesHolder
     */
    public function __construct(WidgetSettingsDataMapper $dataMapper, WidgetsNamesHolder $widgetsNamesHolder)
    {
        $this->dataMapper = $dataMapper;
        $this->WidgetsNamesHolder = $widgetsNamesHolder;
    }

    /**
     * @return string
     */
    public function getTopPageCountersWidgetSettings()
    {
        $class_name = get_class($this->WidgetsNamesHolder);
        $key = $class_name::COUNTERS_TOP_PAGE;

        return $this->dataMapper->findByPrimaryKey($key)->options;
    }

    public function getSideBarBannerWidgetSettings()
    {
        /** @var WidgetsNamesHolder $class_name */
        $class_name = get_class($this->WidgetsNamesHolder);
        $key = $class_name::SIDEBAR_BANNER;

        return $this->dataMapper->findByPrimaryKey($key)->options;
    }

    public function getHorizontalBannerWidgetSettings()
    {
        /** @var WidgetsNamesHolder $class_name */
        $class_name = get_class($this->WidgetsNamesHolder);
        $key = $class_name::HORIZONTAL_BANNER;

        return $this->dataMapper->findByPrimaryKey($key)->options;
    }

    public function getYandexRTBWidgetSettings()
    {
        /** @var WidgetsNamesHolder $class_name */
        $class_name = get_class($this->WidgetsNamesHolder);
        $key = $class_name::YANDEX_RTB;

        return $this->dataMapper->findByPrimaryKey($key)->options;
    }

    /**
     * @return InfoBlock
     */
    public function getInfoBlock1WidgetSettings()
    {
        /** @var WidgetsNamesHolder $class_name */
        $class_name = get_class($this->WidgetsNamesHolder);
        $key = $class_name::INFO_BLOCK_1;

        $options = $this->dataMapper->findByPrimaryKey($key)->options;

        $InfoBlock = new InfoBlock($options["header"], $options["content"], $options["file_path"]);

        return $InfoBlock;
    }

}