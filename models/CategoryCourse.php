<?php

namespace app\models;
use yii\data\Pagination;
use Yii;

/**
 * This is the model class for table "category_course".
 *
 * @property int $id
 * @property string $name_uz
 * @property string $name_ru
 * @property string $name_en
 * @property string $description_uz
 * @property string $description_ru
 * @property string $description_en
 * @property string $img
 *
 * @property Kurs[] $kurs
 */

class CategoryCourse extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
        public $file;
        public $translate_name;
        public $translate_description;

    public static function tableName()
    {
        return 'category_course';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_uz', 'description_uz', 'img'], 'string', 'max' => 255],
            [['img'], 'file', 'extensions' => 'jpg, png, jpeg', 'mimeTypes' => 'image/jpeg, image/png, jpeg/png'],
            [['translate_description', 'translate_name'], 'safe'],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_uz' => 'Name Uz',
            'description_uz' => 'Izoh Uz',
            'img' => 'Rasm',
            'file'=>'Rasm',

        ];
    }
    public function getNameUz($language = null){
        $title = json_decode($this->name_uz, true);

        if ($language) {
            if (isset($title[$language])) {
                return $title[$language];    
            }else{
            return null;
            }
        }
        
        if (isset($title[Yii::$app->language])) {
            return $title[Yii::$app->language];
            }else{
                $a = null;
                foreach ($title as $value) {
                    if ($value!='') {
                        $a = $value;
                        break;
                    }
                }
            return $a;    
            }
    }
    public function getDescriptionUz($language = null){
        $title = json_decode($this->description_uz, true);

        if ($language) {
            if (isset($title[$language])) {
                return $title[$language];    
            }else{
            return null;
            }
        }
        
        if (isset($title[Yii::$app->language])) {
            if ($title[Yii::$app->language]!='') {
                return $title[Yii::$app->language];
            }
            $a = null;
            foreach ($title as $value) {
                if ($value!='') {
                    $a = $value;
                    break;
                }
            }
            return $a;
        }else{
            $a = null;
            foreach ($title as $value) {
                if ($value!='') {
                    $a = $value;
                    break;
                }
            }
            return $a;
        }
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKurs()
    {
        return $this->hasMany(Kurs::className(), ['category_id' => 'id']);
    }
}
