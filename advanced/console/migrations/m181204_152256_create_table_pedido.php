<?php

use yii\db\Migration;

class m181204_152256_create_table_pedido extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%pedido}}', [
            'id' => $this->primaryKey(),
            'id_menu' => $this->integer()->notNull(),
            'id_itens' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex('id_itens', '{{%pedido}}', 'id_itens');
        $this->createIndex('id_menu', '{{%pedido}}', 'id_menu');
        $this->addForeignKey('pedido_ibfk_1', '{{%pedido}}', 'id_menu', '{{%menu}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('pedido_ibfk_2', '{{%pedido}}', 'id_itens', '{{%itens}}', 'id', 'RESTRICT', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%pedido}}');
    }
}
