<?php

namespace backend\modules\blog\modules\dashboard\models;

use yii\db\ActiveRecord;


/**
 * Class Tag
 * @package backend\modules\blog\modules\dashboard\models
 */
class Tag extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blog_tags';
    }

    public function formName()
    {
        return "Tag";
    }

    public function behaviors()
    {
        return [
            [
                'class' => \backend\modules\blog\modules\dashboard\models\SluggableBehavior::className(),
                'attribute' => 'name',
                'slugAttribute' => 'slug',
                'ensureUnique' => true
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [["name", "slug"], "string"],
            [["slug"], "unique"],
            [["seo_title", "seo_description", "seo_keys"], "string"]

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Загаловок',
            'slug' => 'URL',
        ];
    }


}