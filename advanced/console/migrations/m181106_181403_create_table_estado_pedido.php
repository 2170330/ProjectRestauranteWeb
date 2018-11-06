<?php

use yii\db\Migration;

class m181106_181403_create_table_estado_pedido extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%estado_pedido}}', [
            'id' => $this->primaryKey(),
            'id_estado' => $this->integer()->notNull(),
            'id_pedido' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex('id_pedido', '{{%estado_pedido}}', 'id_pedido');
        $this->createIndex('id_estado', '{{%estado_pedido}}', 'id_estado');
        $this->addForeignKey('estado_pedido_ibfk_1', '{{%estado_pedido}}', 'id_estado', '{{%estado}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('estado_pedido_ibfk_2', '{{%estado_pedido}}', 'id_pedido', '{{%pedido}}', 'id', 'RESTRICT', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%estado_pedido}}');
    }
}
