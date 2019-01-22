<?php

namespace backend\modules\blog\modules\dashboard\models;

use yii\db\ActiveRecord;

/**
 * Class Reviews
 * @package backend\modules\blog\modules\dashboard\models
 */
class Reviews extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blog_reviews';
    }

    public function formName()
    {
        return "Review";
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text'], 'required'],
            [['author_id','post_id', 'stars', 'date', 'likes', 'dislikes', 'ip'], 'safe']
        ];
    }


    public static function getAllComments($id, $sort, $sort_desc)
    {
        if(!$sort)
            $sort="date";
        else if($sort=="popular")
            $sort="likes";
        else
            $sort="stars";
        $query= self::find()->where(['post_id'=>$id]);
        if(!$sort_desc)
            $query=$query->orderBy($sort.' DESC')->all();
        else
            $query=$query->orderBy($sort)->all();
        return $query;
    }

}