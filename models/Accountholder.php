<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "accountholder".
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
 * @property string $race
 * @property string $signature
 * @property string $finger_print
 * @property string $user_name
 * @property string $password
 * @property string $last_logging_time
 * @property string $email
 * @property string $created_at
 * @property string $updated_at
 * @property int $is_deleted
 */
class Accountholder extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public $auth_key;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'accountholder';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['date_of_birth', 'last_logging_time', 'created_at', 'updated_at'], 'safe'],
            [['postcode', 'is_deleted'], 'integer'],
            [['identity_card', 'last_name', 'first_name', 'phone_no', 'country_code', 'address', 'state', 'city', 'country', 'race', 'signature', 'finger_print', 'user_name', 'password', 'auth_key', 'email'], 'string', 'max' => 255],
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
            'race' => 'Race',
            'signature' => 'Signature',
            'finger_print' => 'Finger Print',
            'user_name' => 'User Name',
            'password' => 'Password',
            'last_logging_time' => 'Last Logging Time',
            'email' => 'Email',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'is_deleted' => 'Is Deleted',
        ];
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['user_name' => $username]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
