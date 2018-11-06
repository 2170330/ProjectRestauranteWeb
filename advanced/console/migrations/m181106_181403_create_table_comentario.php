<?php

use yii\db\Migration;

class m181106_181403_create_table_comentario extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%comentario}}', [
            'id' => $this->primaryKey(),
            'comentrio' => $this->string()->notNull(),
            'id_user' => $this->integer()->notNull(),
            'avaliacao' => $this->integer(),
        ], $tableOptions);

        $this->createIndex('id_user', '{{%comentario}}', 'id_user');
        $this->addForeignKey('comentario_ibfk_1', '{{%comentario}}', 'id_user', '{{%user}}', 'id', 'RESTRICT', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%comentario}}');
    }
}
