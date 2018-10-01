<?php

namespace app\modules\user\models;

use Yii;

/**
 * This is the model class for table "user_balance".
 *
 * @property int $id
 * @property string $amount
 * @property string $token
 * @property int $user_id
 * @property string $enrollments
 */
class UserBalance extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_balance';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['amount', 'token', 'enrollments'], 'number'],
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'amount' => Yii::t('app', 'Amount'),
            'token' => Yii::t('app', 'Token'),
            'user_id' => Yii::t('app', 'User ID'),
            'enrollments' => Yii::t('app', 'Enrollments'),
        ];
    }
}
