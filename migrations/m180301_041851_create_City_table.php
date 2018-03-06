<?php

use yii\db\Migration;

/**
 * Handles the creation of table `City`.
 * Has foreign keys to the tables:
 *
 * - `Country`
 */
class m180301_041851_create_City_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('City', [
            'id' => $this->primaryKey(),
            'country_id' => $this->integer()->notNull(),
            'code' => $this->string(),
            'name' => $this->string(),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp()->defaultValue(0),
            'is_deleted' => $this->boolean()->defaultvalue(false),
        ]);

        // creates index for column `country_id`
        $this->createIndex(
            'idx-City-country_id',
            'City',
            'country_id'
        );

        // add foreign key for table `Country`
        $this->addForeignKey(
            'fk-City-country_id',
            'City',
            'country_id',
            'Country',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `Country`
        $this->dropForeignKey(
            'fk-City-country_id',
            'City'
        );

        // drops index for column `country_id`
        $this->dropIndex(
            'idx-City-country_id',
            'City'
        );

        $this->dropTable('City');
    }
}
