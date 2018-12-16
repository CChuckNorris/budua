<?php

namespace backend\modules\blog\modules\dashboard\models;

use yii\db\ActiveRecord;

/**
 * Class PostCategories
 * @package backend\modules\blog\modules\dashboard\models
 */
class PostCategories extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blog_posts_categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [["category_id", "post_id"], 'required'],
            [["category_id", "post_id"], "integer"]
        ];
    }

}