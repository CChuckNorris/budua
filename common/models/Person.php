<?php

namespace common\models;

use common\interfaces\IPersonEntity;
use EvgenyGavrilov\behavior\ManyToManyBehavior;
use Yii;
use yii\helpers\Url;
/**
 * This is the model class for table "person".
 *
 * @property integer $id
 * @property string $name
 * @property string $alias
 * @property integer $company_id
 * @property integer $raiting
 * @property integer $reviews
 * @property string $vk_group
 * @property string $fb_group
 * @property string $tags
 * @property string $logo
 * @property string $about
 * @property string $seo_title
 * @property string $seo_keys
 * @property string $seo_desc
 *
 * @property Company $company
 * @property Review[] $reviews0
 */
class Person extends \yii\db\ActiveRecord implements IPersonEntity
{
    public $activities_ids;

    public function behaviors()
    {
        return [
            ManyToManyBehavior::className()
        ];
    }


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'person';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'alias'], 'required'],
            [['raiting', 'reviews'], 'integer'],
            [['about', 'seo_keys', 'seo_desc'], 'string'],
            [['tags', 'company_id', 'activities_ids'], 'safe'],
            [['name', 'alias', 'vk_group', 'fb_group', 'seo_title'], 'string', 'max' => 255],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::className(), 'targetAttribute' => ['company_id' => 'id']],
            ['logo','file','skipOnEmpty' => true, 'extensions' => 'png, jpg, gif', 'checkExtensionByMimeType'=>false]
        ];
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'alias' => 'name-url',
            'company_id' => 'Компания',
            'raiting' => 'Рейтинг',
            'reviews' => 'Отзывы',
            'vk_group' => 'Группа Vk',
            'fb_group' => 'Группа Fb',
            'tags' => 'Теги',
            'logo' => 'Лого',
            'about' => 'О компании',
            'seo_title' => 'SEO Заголовок',
            'seo_keys' => 'SEO Ключевые слова',
            'seo_desc' => 'SEO Описание',
            'activities_ids' => 'Направления деятельности',
        ];
    }

    public function getName()
    {
       return $this->name;
    }

    public function getLogo()
    {
       return Yii::$app->params['imgPath'].$this->logo;
    }

    public function getRating()
    {
        return $this->raiting;
    }

    public function getCompanyName()
    {
        return $this->company->name;
    }

    public function getServiceName()
    {
        return $this->service->name;
    }

    public function getAbout()
    {
        return $this->about;
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['id' => 'company_id']);
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReviews()
    {
        return $this->hasMany(Review::className(), ['person_id' => 'id']);
    }
    public static function getPerson($alias)
    {
        return static::find()->where(['alias'=>$alias])->one();        
    }
    public static function getAll()
    {
        return static::find()->orderBy('raiting DESC')->all();
    }

    public function getActivities()
    {
        return $this->hasMany(ActivityDirection::className(), ['id' => 'activity_id'])
            ->viaTable('persons_activities', ['person_id' => 'id']);
    }


}
