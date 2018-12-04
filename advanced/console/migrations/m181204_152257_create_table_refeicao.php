<?php

use yii\db\Migration;

class m181204_152257_create_table_refeicao extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%refeicao}}', [
            'id' => $this->primaryKey(),
            'id_mesa' => $this->integer()->notNull(),
            'data' => $this->date()->notNull(),
            'hora_inicio' => $this->time()->notNull(),
            'hora_fim' => $this->time()->notNull(),
        ], $tableOptions);

        $this->createIndex('id_mesa', '{{%refeicao}}', 'id_mesa');
        $this->addForeignKey('refeicao_ibfk_1', '{{%refeicao}}', 'id_mesa', '{{%mesa}}', 'id', 'RESTRICT', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%refeicao}}');
    }
}
