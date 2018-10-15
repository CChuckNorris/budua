<?php

namespace common\models;

use common\interfaces\IWidgetSettings;
use yii\base\Model;

/**
 * Class MainMenuWidgetSettings
 * @package common\models
 */
class MainMenuWidgetSettings extends Model implements IWidgetSettings
{
    public $key;
    public $title;

    public $options;

    public $link_href1;
    public $link_href2;
    public $link_href3;

    public $link_name1;
    public $link_name2;
    public $link_name3;

    public $link_target1;
    public $link_target2;
    public $link_target3;

    public $link_title1;
    public $link_title2;
    public $link_title3;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['link_target1', 'link_target2', 'link_target3'], 'string'],
            [['link_title1', 'link_title2', 'link_title3'], 'string'],
            [['link_name1', 'link_name2', 'link_name3'], 'string'],
            [['key', 'title'], 'string'],
            [['link_href1', 'link_href2', 'link_href3'],'url', 'message' => "Указанное значение не является правильным URL (http(s)://example.com)."]
        ];
    }

    public function getView()
    {
        return "_main_menu";
    }

    public function initSettings($options)
    {
        $this->key = $options["key"];
        $this->title = $options["title"];

        $settings = $options["options"];
        $this->link_href1 = $settings[0]["link_href"];
        $this->link_href2 = $settings[1]["link_href"];
        $this->link_href3 = $settings[2]["link_href"];

        $this->link_name1 = $settings[0]["link_name"];
        $this->link_name2 = $settings[1]["link_name"];
        $this->link_name3 = $settings[2]["link_name"];

        $this->link_target1 = $settings[0]["link_target"];
        $this->link_target2 = $settings[1]["link_target"];
        $this->link_target3 = $settings[2]["link_target"];


        $this->link_title1 = $settings[0]["link_title"];
        $this->link_title2 = $settings[1]["link_title"];
        $this->link_title3 = $settings[2]["link_title"];

    }

    public function getSettings()
    {
        $attributes = $this->getAttributes(null, ["key", "title", "options"]);
        return [
            ["link_href" => $attributes["link_href1"], "link_target" => $attributes["link_target1"], "link_title" => $attributes["link_title1"], "link_name" => $attributes["link_name1"]],
            ["link_href" => $attributes["link_href2"], "link_target" => $attributes["link_target2"], "link_title" => $attributes["link_title2"], "link_name" => $attributes["link_name2"]],
            ["link_href" => $attributes["link_href3"], "link_target" => $attributes["link_target3"], "link_title" => $attributes["link_title3"], "link_name" => $attributes["link_name3"]],
        ];
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