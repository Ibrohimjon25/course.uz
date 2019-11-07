<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kurs".
 *
 * @property int $id
 * @property string $name_uz
 * @property string $name_en
 * @property string $name_ru
 * @property string $description_uz
 * @property string $description_en
 * @property string $description_ru
 * @property string $date
 * @property string $teacher_uz
 * @property string $teacher_ru
 * @property string $teacher_en
 * @property int $points
 * @property string $img
 * @property int $category_id
 *
 * @property CategoryCourse $category
 */
class Kurs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $file;
    public $translate_teacher;
    public $translate_name;
    public $translate_description;

    public static function tableName()
    {
        return 'kurs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['points', 'category_id'], 'integer'],
            [['name_uz', 'date', 'teacher_uz', 'img', 'fayl'], 'string', 'max' => 255],
            [['img', 'fayl'],'file'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => CategoryCourse::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['img'], 'file', 'extensions' => 'jpg, png', 'mimeTypes' => 'image/jpeg, image/png'],
            [['fayl'], 'file', 'extensions' => 'zip, rar, iso, 7z'],
            [['translate_description', 'translate_name', 'translate_teacher'], 'safe'],
          //[['file'], 'file', 'extensions' => 'jpg, png', 'mimeTypes' => 'image/jpeg, image/png',],
            

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
            'fayl' => 'Fayl',
            'description_uz' => 'Izoh Uz',
            'date' => 'Sana',
            'teacher_uz' => 'O`qtuvchi Uz',
            'points' => 'Ball',
            'img' => 'Rasm',
            'category_id' => 'Kategoriyasi',
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
    public function getTeacherUz($language = null){
        $title = json_decode($this->teacher_uz, true);

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
    public function getCategory()
    {
        return $this->hasOne(CategoryCourse::className(), ['id' => 'category_id']);
    }
}
