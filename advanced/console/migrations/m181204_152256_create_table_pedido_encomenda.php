<?php

use yii\db\Migration;

class m181204_152256_create_table_pedido_encomenda extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%pedido_encomenda}}', [
            'id' => $this->primaryKey(),
            'id_pedido' => $this->integer()->notNull(),
            'id_encomenda' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex('id_encomenda', '{{%pedido_encomenda}}', 'id_encomenda');
        $this->createIndex('id_pedido', '{{%pedido_encomenda}}', 'id_pedido');
        $this->addForeignKey('pedido_encomenda_ibfk_1', '{{%pedido_encomenda}}', 'id_pedido', '{{%pedido}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('pedido_encomenda_ibfk_2', '{{%pedido_encomenda}}', 'id_encomenda', '{{%encomenda}}', 'id', 'RESTRICT', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%pedido_encomenda}}');
    }
}
