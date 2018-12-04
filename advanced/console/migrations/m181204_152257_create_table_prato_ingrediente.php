<?php

use yii\db\Migration;

class m181204_152257_create_table_prato_ingrediente extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%prato_ingrediente}}', [
            'id' => $this->primaryKey(),
            'id_prato' => $this->integer()->notNull(),
            'id_ingrediente' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex('id_ingrediente', '{{%prato_ingrediente}}', 'id_ingrediente');
        $this->createIndex('id_prato', '{{%prato_ingrediente}}', 'id_prato');
        $this->addForeignKey('prato_ingrediente_ibfk_1', '{{%prato_ingrediente}}', 'id_prato', '{{%prato}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('prato_ingrediente_ibfk_2', '{{%prato_ingrediente}}', 'id_ingrediente', '{{%ingredientes}}', 'id', 'RESTRICT', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%prato_ingrediente}}');
    }
}
