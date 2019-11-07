<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Bookk".
 *
 * @property int $id
 * @property string $name_uz
 * @property string $name_ru
 * @property string $name_en
 * @property string $description_uz
 * @property string $description_ru
 * @property string $description_en
 * @property string $avtor_uz
 * @property string $avtor_en
 * @property string $avtor_ru
 * @property string $img
 * @property int $category_id
 */
class Bookk extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    
public $file;
public $translate_avtor;
public $translate_name;
public $translate_description;

    public static function tableName()
    {
        return 'bookk';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
         [['name_uz','img','description_uz', 'avtor_uz', 'category_id', 'kitob'], 'required'],
         [['name_uz','kitob', 'description_uz', 'avtor_uz', 'img'], 'string'],
         [['img'], 'file', 'extensions' => 'jpg, png', 'mimeTypes' => 'image/jpeg, image/png'],
         [['kitob'], 'file', 'extensions' => 'pdf, epub, djw'],
         [['translate_description', 'translate_name', 'translate_avtor'], 'safe'],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_uz' => 'Name',
            'translate_name' => 'Name',
            'kitob' => 'Kitob',
            'description_uz' => 'Izoh',
            'translate_description' => Yii::t('yii', 'description_uz'),
            'avtor_uz' => 'Muallif',
            'translate_avtor' => Yii::t('yii', 'avtor_uz'),
            'img' => 'Img',
            'category_id' => 'Kategoriya',
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
    public function getAvtorUz($language = null){
        $title = json_decode($this->avtor_uz, true);

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
}
