<?php

use yii\db\Migration;

/**
 * Handles the creation of table `Country`.
 */
class m180301_035732_create_Country_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('Country', [
            'id' => $this->primaryKey(),
            'code' => $this->string(),
            'country_code' => $this->string(),
            'name' => $this->string(),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp()->defaultValue(0),
            'is_deleted' => $this->boolean()->defaultvalue(false),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('Country');
    }
}
