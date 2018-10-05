<?php

namespace common\models;


/**
 * This is the model class for table "company_regions".
 *
 * @property integer $company_id
 * @property integer $region_id
 */
class CompanyRegions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company_regions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['region_id', 'company_id'], 'required'],
            [['region_id', 'company_id'], 'integer'],
        ];
    }

}
