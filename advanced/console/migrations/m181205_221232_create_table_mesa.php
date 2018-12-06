<?php

use yii\db\Migration;

class m181205_221232_create_table_mesa extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%mesa}}', [
            'id' => $this->primaryKey(),
            'descricao' => $this->string()->notNull(),
            'nLugares' => $this->integer()->notNull(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%mesa}}');
    }
}
