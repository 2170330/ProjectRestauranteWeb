<?php

use yii\db\Migration;

class m181106_181404_create_table_reserva extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%reserva}}', [
            'id' => $this->primaryKey(),
            'nPessoas' => $this->integer()->notNull(),
            'data' => $this->date()->notNull(),
            'hora' => $this->time()->notNull(),
            'id_user' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex('id_user', '{{%reserva}}', 'id_user');
        $this->addForeignKey('reserva_ibfk_1', '{{%reserva}}', 'id_user', '{{%user}}', 'id', 'RESTRICT', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%reserva}}');
    }
}