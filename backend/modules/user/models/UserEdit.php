<?php
/**
 * Created by PhpStorm.
 * User: Alexey
 * Email: keccgroup@gmail.com
 * Date: 01.10.2018
 * Time: 16:10
 */

namespace app\modules\user\models;

use common\models\User;

class UserEdit extends User
{
    const AMOUNT = 0;
    const TOKEN = 0;

    public $amount;
    public $token;
    public $enrollments;
    public $name;
    public $second_name;
    public $password;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['amount', 'default', 'value' => self::AMOUNT],
            ['token', 'default', 'value' => self::TOKEN],
            ['enrollments', 'default', 'value' => self::AMOUNT],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
            [['name', 'second_name'], 'string'],
            [['username', 'password'], 'required'],
            ['password', 'validatePassword'],
        ];
    }

}