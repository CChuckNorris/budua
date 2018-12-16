<?php

namespace backend\modules\blog;

class Module extends \yii\base\Module
{
    public function init()
    {
        parent::init();

        $this->modules = [
            'dashboard' => [
                // you should consider using a shorter namespace here!
                'class' => \backend\modules\blog\modules\dashboard\Module::class,
            ],
        ];
    }
}