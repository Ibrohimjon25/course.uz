<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "teacher".
 *
 * @property int $id
 * @property string $name
 * @property string $profession_uz
 * @property string $profession_ru
 * @property string $profession_en
 * @property string $img
 * @property int $points
 */
class Teacher extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
        public $file;
        public $translate_prof;

    public static function tableName()
    {
        return 'teacher';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['points'], 'integer'],
            [['name', 'profession_uz', 'img'], 'string', 'max' => 255],
            [['img'], 'file', 'extensions' => 'jpg, png', 'mimeTypes' => 'image/jpeg, image/png',],
            [['translate_prof'], 'safe'],


        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'F.I.O',
            'profession_uz' => 'Kasb',
            'translate_prof'=>'Profession',
            'img' => 'Rasm',
            'points' => 'Ball',
            'file'=>'Rasm',

        ];
    }
    public function getProfUz($language = null){
        $title = json_decode($this->profession_uz, true);

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
