<?php

namespace common\models;

use backend\behaviors\CompanyCompleteProfileBehavior;
use backend\behaviors\CompanyRatingModifierBehavior;
use common\interfaces\IBasicEntity;
use EvgenyGavrilov\behavior\ManyToManyBehavior;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\Url;

/**
 * This is the model class for table "company".
 *
 * @property integer $id
 * @property string $name
 * @property string $subtitle
 * @property string $alias
 * @property string $site
 * @property string $address
 * @property integer $raiting
 * @property integer $mod_rating
 * @property integer $reviews
 * @property string $clients
 * @property string $vk_group
 * @property string $fb_group
 * @property string $year
 * @property string $tags
 * @property string $logo
 * @property string $about
 * @property string $founders
 * @property string $court_cases
 * @property string $authorized_persons
 * @property string $cea_activities
 * @property string $state_register_legal_entities
 * @property string $e-mail
 * @property string $tel
 * @property string $multiplier
 * @property integer $profile_complete_status
 * @property string $rating_status
 * @property string $created_at
 * @property string $updated_at
 */
class Company extends \yii\db\ActiveRecord implements IBasicEntity
{
    public $activities_ids;

    public $regions_ids;

    public $cases = [];

    public $reviews_and_thanks = [];

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ],
            ManyToManyBehavior::className(),
            /*'profileChecker' => [
                'class' => CompanyCompleteProfileBehavior::className()
            ],*/
            'ratingModifier' => [
                'class' => CompanyRatingModifierBehavior::className()
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company';
    }
    
    public $peoples_string="";
    
    public function afterFind()
    {
        if(isset($this->persons))
        {
            $i=0;
            foreach($this->persons as $person)
            {
                if($i!=0)
                    $this->peoples_string.=', ';
                $this->peoples_string.=' <a data-pjax="0" href="'.Url::toRoute(['person/person', 'alias'=>$person->alias]).'">'.$person->name.'</a> ';
                $i=1;
            }
        }
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'alias'], 'required'],
            [['mod_rating', 'raiting', 'reviews', 'site_link', 'profile_complete_status'], 'integer'],
            [['about', 'seo_title', 'seo_keys', 'seo_desc',
                'videos', 'clients', 'rating_status', 'founders', 'court_cases', 'authorized_persons', 'cea_activities', 'state_register_legal_entities', 'address', 'subtitle'], 'string'],
            [['tags'], 'safe'],
            [['name', 'alias', 'site', 'vk_group', 'fb_group', 'tel', 'year'], 'string', 'max' => 255],
            ['email', 'email'],
            [['multiplier'], 'number'],
            [['activities_ids', 'cases', 'reviews_and_thanks', 'regions_ids'], 'safe'],
            ['logo','file','skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg', 'checkExtensionByMimeType'=>false]
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
            'alias' => 'name-url',
            'site' => 'Сайт',
            'site_link'=>'Активировать ссылку на сайт',
            'videos'=>'Видео с ютуба',
            'raiting' => 'Базовый рейтинг',
            'mod_rating' => 'Модифицированный рейтинг',
            'reviews' => 'Отзывы',
            'clients' => 'Клиенты',
            'vk_group' => 'Группа VK',
            'fb_group' => 'Группа Fb',
            'year' => 'Год',
            'tags' => 'Теги',
            'logo' => 'Лого',
            'about' => 'О компании',
            'email' => 'E-Mail',
            'tel' => 'Телефон',
            'seo_title' => 'SEO Заголовок',
            'seo_keys' => 'SEO Ключевые слова',
            'seo_desc' => 'SEO Описание',
            'activities_ids' => 'Направления деятельности',
            'regions_ids' => 'Регионы',
            'cases' => 'Кейсы',
            'reviews_and_thanks' => 'Отзывы и благодарности клиентов',
            'profile_complete_status' => 'Наполненности профиля(%)',
            'multiplier' => 'Мультипликатор',
            'rating_status' => 'Репутация',
            'founders' => 'Учредители',
            'court_cases' => 'Судебные дела',
            'authorized_persons' => 'Уполномоченные лица (укажите через запятую)',
            'cea_activities' => 'Виды деятельности (по КВЭД)',
            'state_register_legal_entities' => 'ЕГРПОУ',
            'address' => 'Адрес',
            'subtitle' => 'Подзаголовок'
        ];
    }


    public function getName()
    {
        return $this->name;
    }

    public function getSubtitle()
    {
        return $this->subtitle;
    }

    public function getLogo()
    {
        return Yii::$app->params['imgPath'] . $this->logo;
    }

    public function getRating()
    {
        return $this->mod_rating;
    }

    public function getReviews()
    {
       return $this->reviews;
    }

    public function getAbout()
    {
        return $this->about;
    }

    public function getAuthorizedPersons()
    {
        return array_filter(explode(",", $this->authorized_persons), 'trim');
    }

    public function getYoutubeVideoIds()
    {
        $videos = array_filter(explode(",", $this->videos));

        return !empty($videos) ? $videos : false;
    }

    public function getCompany($alias)
    {
        return static::find()->where(['alias'=>$alias])->one();        
    }
    public function getComments()
    {
        return $this->hasMany(Review::className(), ['company_id'=>'id'])->orderBy('date DESC');
    }
    public function getPersons()
    {
        return $this->hasMany(Person::className(), ['company_id'=>'id']);
    }
    public function getTop()
    {
        return static::find()->orderBy('mod_rating DESC')->limit(12)->all();
    }
    public function getWhorst()
    {
        return static::find()->orderBy('mod_rating')->limit(12)->all();
    }
    public function getAll()
    {
        return static::find()->orderBy('mod_rating DESC')->asArray()->all();
    }

    public function getAllinAlias($name)
    {
        return static::find()->where(['like', 'regions', $name])->orderBy('mod_rating')->limit(12)->all();
    }
    public function getTableMain($regions, $tags, $limit, $sort)
    {
        $query = $this->find()->joinWith(["casesFiles"]);

        if($regions)
        {
            $regions=explode(", ", $regions);
            $str="";
            for($i=0; $i<count($regions); $i++)
            $str.="regions like '%$regions[$i]%' OR ";
            $str=substr($str, 0, -4);
            $query=$query->andFilterWhere(['or', 
                $str
            ]);
        }
            
        if($tags)
        {
            $tags=explode(", ", $tags);
            $str="";
            for($i=0; $i<count($tags); $i++)
            $str.="tags like '%$tags[$i]%' OR ";
            $str=substr($str, 0, -4);
            $query=$query->andFilterWhere(['or', 
                $str
            ]);
        }
        if($sort)
        {
            if($sort=="raiting")
                $query=$query->orderBy('mod_rating DESC');
            else if($sort=="raiting_bad")
                $query=$query->orderBy('mod_rating');
            else if($sort=="reviews")
                $query=$query->orderBy('reviews DESC');
            else if($sort=="reviews_bad")
                 $query=$query->orderBy('reviews');
        }
        if($limit)
            $query=$query->limit($limit);
        else
            $query=$query->limit(12);

        return $query->groupBy("id")->asArray()->all();
    }
    public function getTableFromPage($page)
    {
        $query = self::find()->joinWith(['regions']);

        if($page->regions)
        {
            $regions = explode(", ", $page->regions);
            foreach ($regions as $region)
            {
                $query->orWhere(['region.name' => $region]);
            }
        }
            
        if($page->tags)
        {
            $tags=explode(", ", $page->tags);
            $str="";
            for($i=0; $i<count($tags); $i++)
            $str.="tags like '%$tags[$i]%' OR ";
            $str=substr($str, 0, -4);
            $query=$query->andFilterWhere(['or', 
                $str
            ]);
        }
        if($page->limit_rec)
            $query=$query->limit($page->limit_rec);
        else
            $query=$query->limit(12);
        if($page->sort_by)
        {
            if($page->sort_by=="raiting")
                $query=$query->orderBy('mod_rating DESC');
            else if($page->sort_by=="raiting_bad")
                $query=$query->orderBy('mod_rating');
            else if($page->sort_by=="reviews")
                $query=$query->orderBy('reviews DESC');
            else if($page->sort_by=="reviews_bad")
                 $query=$query->orderBy('reviews');
        }
        return $query->asArray()->all();
    }
    public static function findBestCompanies()
    {
        return self::find()->joinWith(["regions"])->orderBy('mod_rating DESC')->limit(14)->asArray()->all();
    }
    public static function findBestEDCompanies()
    {
        return self::find()->where(['like', 'tags', 'Обучение'])->orderBy('mod_rating DESC')->limit(14)->asArray()->all();
    }

    public function getActivities()
    {
        return $this->hasMany(ActivityDirection::className(), ['id' => 'activity_id'])
            ->viaTable('company_activities', ['company_id' => 'id']);
    }

    public function getRegions()
    {
        return $this->hasMany(Region::className(), ['id' => 'region_id'])
            ->viaTable('company_regions', ['company_id' => 'id']);
    }

    public function getCasesFiles()
    {
        return $this->hasMany(CompanyCases::className(), ['company_id' => 'id']);
    }

    public function getReviewsAndThanksFiles()
    {
        return $this->hasMany(CompanyReviewsAndThanks::className(), ['company_id' => 'id']);
    }

    public function getReviewsInfo()
    {
        return $this->hasMany(Review::className(), ['company_id' => 'id']);
    }
}
