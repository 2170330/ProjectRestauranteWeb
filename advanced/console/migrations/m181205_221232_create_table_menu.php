<?php

use yii\db\Migration;

class m181205_221232_create_table_menu extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%menu}}', [
            'id' => $this->primaryKey(),
            'id_itens' => $this->integer()->notNull(),
            'imagem' => $this->string()->notNull(),
        ], $tableOptions);

        $this->createIndex('id_itens', '{{%menu}}', 'id_itens');
        $this->addForeignKey('menu_ibfk_1', '{{%menu}}', 'id_itens', '{{%itens}}', 'id', 'RESTRICT', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%menu}}');
    }
}
