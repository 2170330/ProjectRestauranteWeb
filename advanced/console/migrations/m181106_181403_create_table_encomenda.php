<?php

use yii\db\Migration;

class m181106_181403_create_table_encomenda extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%encomenda}}', [
            'id' => $this->primaryKey(),
            'id_user' => $this->integer()->notNull(),
            'data' => $this->date()->notNull(),
            'hora' => $this->time()->notNull(),
            'descrisao' => $this->string(),
        ], $tableOptions);

        $this->createIndex('id_user', '{{%encomenda}}', 'id_user');
        $this->addForeignKey('encomenda_ibfk_1', '{{%encomenda}}', 'id_user', '{{%user}}', 'id', 'RESTRICT', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%encomenda}}');
    }
}
