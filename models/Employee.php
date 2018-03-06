<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property int $id
 * @property string $identity_card
 * @property string $last_name
 * @property string $first_name
 * @property string $name
 * @property string $phone_no
 * @property string $country_code
 * @property string $date_of_birth
 * @property string $address
 * @property string $state
 * @property string $city
 * @property string $country
 * @property int $postcode
 * @property string $department
 * @property string $user_name
 * @property string $password
 * @property string $last_logging_time
 * @property string $email
 * @property string $created_at
 * @property string $updated_at
 * @property int $is_deleted
 */
class Employee extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date_of_birth', 'last_logging_time', 'created_at', 'updated_at'], 'safe'],
            [['postcode', 'is_deleted'], 'integer'],
            [['identity_card', 'last_name', 'first_name', 'name', 'phone_no', 'country_code', 'address', 'state', 'city', 'country', 'department', 'user_name', 'password', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'identity_card' => 'Identity Card',
            'last_name' => 'Last Name',
            'first_name' => 'First Name',
            'name' => 'Name',
            'phone_no' => 'Phone No',
            'country_code' => 'Country Code',
            'date_of_birth' => 'Date Of Birth',
            'address' => 'Address',
            'state' => 'State',
            'city' => 'City',
            'country' => 'Country',
            'postcode' => 'Postcode',
            'department' => 'Department',
            'user_name' => 'User Name',
            'password' => 'Password',
            'last_logging_time' => 'Last Logging Time',
            'email' => 'Email',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'is_deleted' => 'Is Deleted',
        ];
    }

}
