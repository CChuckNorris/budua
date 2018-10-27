<?php

namespace backend\helpers;

/**
 * Class ProfileRatingCounter
 * @package backend\helpers
 */
class ProfileRatingCounter
{

    private $multiplier;

    private $rating;

    private $mod_rating;

    /**
     * ProfileRatingCounter constructor.
     * @param array $options
     */
    public function __construct($options = ['multiplier' => 0, 'base_rating' => 0])
    {

        $this->multiplier = $options['multiplier'];
        $this->rating = $options['base_rating'];

    }

    public function calculate()
    {
        $this->mod_rating = $this->rating * $this->multiplier;

        return round($this->mod_rating, 0, PHP_ROUND_HALF_UP);
    }
}