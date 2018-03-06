<?php

namespace app\forms;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class SignupForm extends Model
{
    public $identity_card;
    public $last_name;
    public $first_name;
    public $name;
    public $phone_no;
    public $country_code;
    public $date_of_birth;
    public $address;
    public $state;
    public $city;
    public $country;
    public $postcode;
    public $race;
    public $signature;
    public $finger_print;
    public $user_name;
    public $password;
    public $email;

    public function rules()
    {
        // name, email, subject and body are required
    	[['identity_card', 'last_name', 'first_name', 'name', 'phone_no', 'country_code', 'date_of_birth', 'address', 'state', 'city', 'country', 'postcode', 'race', 'user_name', 'password', 'email'], 'required'];
        // email has to be a valid email address
        ['email', 'email'];

    }

    public function createAccount()
    {
        $model = new AccountHolder;
        $model->identity_card = $this->identity_card;
        $model->last_name = $this->last_name;
        $model->first_name = $this->first_name;
        $model->name = $this->name;
        $model->phone_no = $this->phone_no;
        $model->country_code = $this->country_code;
        $model->date_of_birth = $this->date_of_birth;
        $model->address = $this->address;
        $model->state = $this->state;
        $model->city = $this->city;
        $model->country = $this->country;
        $model->postcode = $this->postcode;
        $model->race = $this->race;
        $model->signature = $this->signature;
        $model->finger_print = $this->finger_print;
        $model->user_name = $this->user_name;
        $model->password = $this->password;
        $model->email = $this->email;
        $model->last_logging_time = $this->date('Y-m-d H:i:s');
        $model->created_at = $this->date('Y-m-d H:i:s');
        $model->updated_at = $this->date('Y-m-d H:i:s');
        $model->is_deleted = 0;

        //the following three lines were added:
        // $auth = Yii:$app->authManager;
        // $authorRole = $auth->getRole('author');
        // $auth->assign($authorRole, $user->getId());
        
        $model->save();
        return $model;
    }
}
