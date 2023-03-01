<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "questions".
 *
 * @property int $id
 * @property int|null $tsCreate
 * @property string $question
 */
class Questions extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'questions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['tsCreate'], 'integer'],
            [['question'], 'required'],
            [['question'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'tsCreate' => 'Ts Create',
            'question' => 'Question',
        ];
    }

    static function options() {
        return self::find()
                        ->select(['question', 'id'])
                        ->indexBy('id')
                        ->column();
    }
    
    public function __toString() {
        return $this->question;
    }

}
