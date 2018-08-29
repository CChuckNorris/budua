<?php

namespace common\models;

use common\interfaces\IWidgetSettings;
use yii\base\Model;

/**
 * Class InfoBlock1WidgetSettings
 * @package common\models
 */
class InfoBlock1WidgetSettings extends Model implements IWidgetSettings
{
    public $key;
    public $title;

    public $file_path;

    public $header;

    public $content;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['key', 'title', 'file_path', 'header', 'content'], 'string'],

        ];
    }

    public function getView()
    {
        return "_info_block_1";
    }

    public function initSettings($options)
    {
        $this->key = $options["key"];
        $this->title = $options["title"];

        $settings = $options["options"];
        $this->file_path = $settings["file_path"];
        $this->header = $settings["header"];
        $this->content = $settings["content"];

    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'header' => 'Заголовок',
            'content' => 'Контент',
        ];
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