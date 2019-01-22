<?php

namespace common\models;

use common\interfaces\IWidgetSettings;
use yii\base\Model;

/**
 * Class YandexRTBWidgetSettings
 * @package common\models
 */
class YandexRTBWidgetSettings extends Model implements IWidgetSettings
{
    public $key;
    public $title;

    public $script;

    public function getView()
    {
        return "_yandex_rtb";
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['key', 'title', 'script'], 'string']
        ];
    }

    public function initSettings($options)
    {
        $this->key = $options["key"];
        $this->title = $options["title"];

        $settings = $options["options"];
        $this->script = $settings["script"];
    }

    public function getSettings()
    {
        return $this->getAttributes(null, ["key", "title", "options"]);
    }

    public function getKey()
    {
        return $this->key;
    }

    public function getTitle()
    {
        return $this->title;
    }
}