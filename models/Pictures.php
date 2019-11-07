<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pictures".
 *
 * @property int $id
 * @property string $name_uz
 * @property string $name_en
 * @property string $name_ru
 * @property string $date
 * @property string $img
 */
class Pictures extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
        public $file;
        public $translate_name;

    public static function tableName()
    {
        return 'pictures';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_uz', 'date', 'img'], 'string', 'max' => 255],
            [['img'], 'file', 'extensions' => 'jpg, png', 'mimeTypes' => 'image/jpeg, image/png',],
            [['translate_name'], 'safe'],


        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            //'id' => 'ID',
            'name_uz' => 'Name Uz',
            'date' => 'Sana',
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
}
