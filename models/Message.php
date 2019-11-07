<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "message".
 *
 * @property int $id
 * @property string $name_uz
 * @property string $name_en
 * @property string $name_ru
 * @property string $email
 * @property string $description_uz
 * @property string $description_en
 * @property string $description_ru
 * @property string $img
 */
class Message extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $file;
    public $translate_title;
    public $translate_name;
    public $translate_description;

    public static function tableName()
    {
        return 'message';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_uz', 'email', 'description_uz', 'img', 'title_uz', ], 'string', 'max' => 255],
            [['img'], 'file', 'extensions' => 'jpg, png', 'mimeTypes' => 'image/jpeg, image/png'],
            ['img', 'required'],
            [['translate_description', 'translate_name', 'translate_title'], 'safe'],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_uz' => 'Name uz',
            'email' => 'Email',
            'description_uz' => 'Izoh Uz',
            'title_uz'=>'Sarlavha Uz',
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
    public function getTitleUz($language = null){
        $title = json_decode($this->title_uz, true);

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
