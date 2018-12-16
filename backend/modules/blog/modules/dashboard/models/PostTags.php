<?php

namespace backend\modules\blog\modules\dashboard\models;

use yii\db\ActiveRecord;

/**
 * Class PostTags
 * @package backend\modules\blog\modules\dashboard\models
 */
class PostTags extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blog_posts_tags';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [["tag_id", "post_id"], 'required'],
            [["tag_id", "post_id"], "integer"]
        ];
    }

}