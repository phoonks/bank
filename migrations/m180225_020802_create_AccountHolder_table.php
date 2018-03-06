<?php

use yii\db\Migration;

/**
 * Handles the creation of table `AccountHolder`.
 */
class m180225_020802_create_AccountHolder_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('AccountHolder', [
            'id' => $this->primaryKey(),
            'identity_card' => $this->string(),
            'last_name' => $this->string(),
            'first_name' => $this->string(),
            'name' => $this->string(),
            'phone_no' => $this->string(),
            'country_code' => $this->string(),
            'date_of_birth' => $this->dateTime(),
            'address' => $this->string(),
            'state' => $this->string(),
            'city' => $this->string(),
            'country' => $this->string(),
            'postcode' => $this->integer(),
            'race' => $this->string(),
            'signature' => $this->string(),
            'finger_print' => $this->string(),
            'user_name' => $this->string(),
            'password' => $this->string(),
            'last_logging_time' => $this->dateTime(),
            'email' => $this->string(),
            'created_at' => $this->timestamp()->defaultValue(null),
            'updated_at' => $this->timestamp()->defaultValue(0),
            'is_deleted' => $this->boolean()->defaultvalue(false),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('AccountHolder');
    }
}
