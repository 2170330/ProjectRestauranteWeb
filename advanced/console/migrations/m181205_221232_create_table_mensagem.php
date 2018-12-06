<?php

use yii\db\Migration;

class m181205_221232_create_table_mensagem extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%mensagem}}', [
            'id' => $this->primaryKey(),
            'mensagem' => $this->integer()->notNull(),
            'assunto' => $this->integer()->notNull(),
            'id_user' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex('id_user', '{{%mensagem}}', 'id_user');
        $this->addForeignKey('mensagem_ibfk_1', '{{%mensagem}}', 'id_user', '{{%user}}', 'id', 'RESTRICT', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%mensagem}}');
    }
}
