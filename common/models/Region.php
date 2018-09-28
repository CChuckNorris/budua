<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "region".
 *
 * @property integer $id
 * @property string $name
 * @property string $alias
 * @property string $h1_title
 * @property string $seo_title
 * @property string $seo_key
 * @property string $seo_desc
 */
class Region extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'region';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['h1_title', 'seo_title', 'seo_key', 'seo_desc'], 'string', 'max' => 255],
            [['name', 'alias'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'alias' => 'Адрес',
            'h1_title' => 'H1 (Заголовок на странице элемента)',
            'seo_title' => 'SEO Заголовок',
            'seo_keys' => 'SEO Ключевые слова',
            'seo_desc' => 'SEO Описание',
        ];
    }
    public function getAll()
    {
        return static::find()->orderBy('name')->all();
    }
}
