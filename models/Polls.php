<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "polls".
 *
 * @property int $id
 * @property int|null $tsCreate
 * @property string $phone
 * @property string $email
 * @property string $area
 * @property string $city
 * @property int $gender
 * @property int $rating
 * @property int $questionId
 * @property string $comment
 */
class Polls extends \yii\db\ActiveRecord {

    CONST GENDER_MALE = 1;
    CONST GENDER_FEMALE = 2;

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'polls';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['tsCreate', 'gender', 'rating', 'questionId'], 'integer'],
            [['phone', 'email', 'area', 'city', 'gender', 'rating', 'questionId', 'comment'], 'required'],
            [['comment'], 'string'],
            [['email'], 'email'],
            [['phone', 'email', 'area', 'city'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'tsCreate' => 'Дата',
            'tsCreateString'=> 'Дата',
            'phone' => 'Телефон',
            'email' => 'Email',
            'area' => 'Регион',
            'city' => 'Город',
            'gender' => 'Пол',
            'rating' => 'Оценка',
            'questionId' => 'Вопрос',
            'question' => 'Вопрос',
            'comment' => 'Комментарий',
        ];
    }

    public function beforeSave($insert) {
        if (!$this->tsCreate) {
            $this->tsCreate = time();
        }
        return parent::beforeSave($insert);
    }

    static function gender_options() {
        return [
            self::GENDER_MALE => 'Мужской',
            self::GENDER_FEMALE => 'Женский',
        ];
    }

    public function getGenderText() {
        $options = self::gender_options();
        if (isset($options[$this->gender])) {
            return $options[$this->gender];
        }
    }

    static function rating_options() {
        $range = range(1, 10);
        return array_combine($range, $range);
    }

    public function getQuestion() {
        return $this->hasOne(Questions::class, ['id' => 'questionId']);
    }

}
