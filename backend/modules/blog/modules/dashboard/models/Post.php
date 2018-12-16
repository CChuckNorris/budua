<?php

namespace backend\modules\blog\modules\dashboard\models;

use EvgenyGavrilov\behavior\ManyToManyBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * Class Post
 * @package backend\modules\blog\modules\dashboard\models
 */
class Post extends ActiveRecord
{
    const PUBLISHED_STATUS = "published";

    const DRAFT_STATUS = "draft";

    public $file;

    public $tags_ids;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blog_posts';
    }

    public function formName()
    {
        return "Post";
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
            ],
            [
                'class' => \backend\modules\blog\modules\dashboard\models\SluggableBehavior::className(),
                'attribute' => 'title',
                'slugAttribute' => 'slug',
                'ensureUnique' => true
            ],
            ManyToManyBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'status'], 'required'],
            [["title", "slug", "description", "text", "h1_title", "seo_title", "seo_description", "seo_keys", "status"], "string"],
            [["preview_s", "preview_m", "preview_l", "preview_xl", "is_announcement"], "safe"],
            [["published_at", "file", "tags_ids"], "safe"],
            [["created_at", "updated_at", "category_id"], "integer"],
            [["slug"], "unique"]

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Загаловок',
            'h1_title' => 'H1 загаловок',
            'slug' => 'URL',
            'description' => 'Краткое описание',
            'is_announcement' => 'В анонс',
            'file' => 'Обложка',
            'category_id' => "Категория",
            'tags_ids' => "Метки",
            'status' => "Статус"
        ];
    }

    public static function displayTags($tags = [])
    {
        return implode(",", array_column($tags, "name"));
    }

    public function getH1Title()
    {
        return $this->h1_title ? $this->h1_title : $this->title;
    }

    public function getStatuses()
    {
        return [
            self::PUBLISHED_STATUS => "Опубликовано",
            self::DRAFT_STATUS => "Черновик"
        ];
    }
    public function getTags()
    {
        return $this->hasMany(Tag::className(), ['id' => 'tag_id'])
            ->viaTable('blog_posts_tags', ['post_id' => 'id']);
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

}