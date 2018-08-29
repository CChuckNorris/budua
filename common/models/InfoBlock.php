<?php

namespace common\models;

/**
 * Class InfoBlock
 * @package common\models
 */
class InfoBlock
{
    protected $header;

    protected $content;

    protected $placeholder;

    /**
     * InfoBlock constructor.
     * @param $header
     * @param $content
     * @param $placeholder
     */
    public function __construct($header, $content, $placeholder)
    {
        $this->header = $header;
        $this->content = $content;
        $this->placeholder = $placeholder;
    }


    public function getContent()
    {
        return $this->content;
    }

    public function getHeader()
    {
        return $this->header;
    }

    public function getPlaceholder()
    {
        return $this->placeholder;
    }


}