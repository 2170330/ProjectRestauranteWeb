<?php

use yii\db\Migration;

class m181204_152256_create_table_prato extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%prato}}', [
            'id' => $this->primaryKey(),
            'descricao' => $this->string()->notNull(),
            'preco' => $this->decimal()->notNull(),
            'id_tipo_prato' => $this->integer()->notNull(),
            'imagem' => $this->string()->notNull(),
            'id_dia_semana' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex('id_dia_semana', '{{%prato}}', 'id_dia_semana');
        $this->createIndex('id_tipo_prato', '{{%prato}}', 'id_tipo_prato');
        $this->addForeignKey('prato_ibfk_1', '{{%prato}}', 'id_tipo_prato', '{{%tipo_prato}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('prato_ibfk_2', '{{%prato}}', 'id_dia_semana', '{{%dias_semana}}', 'id', 'RESTRICT', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%prato}}');
    }
}
