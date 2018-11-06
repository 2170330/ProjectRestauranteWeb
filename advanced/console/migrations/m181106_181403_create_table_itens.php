<?php

use yii\db\Migration;

class m181106_181403_create_table_itens extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%itens}}', [
            'id' => $this->primaryKey(),
            'id_prato' => $this->integer(),
            'id_bebida' => $this->integer(),
            'id_sobremesa' => $this->integer(),
        ], $tableOptions);

        $this->createIndex('id_bebida', '{{%itens}}', 'id_bebida');
        $this->createIndex('id_prato', '{{%itens}}', 'id_prato');
        $this->createIndex('id_sobremesa', '{{%itens}}', 'id_sobremesa');
        $this->addForeignKey('itens_ibfk_1', '{{%itens}}', 'id_prato', '{{%prato}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('itens_ibfk_2', '{{%itens}}', 'id_bebida', '{{%bebida}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('itens_ibfk_3', '{{%itens}}', 'id_sobremesa', '{{%sobremesa}}', 'id', 'RESTRICT', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%itens}}');
    }
}
