<?php

use yii\db\Migration;

class m181204_152257_create_table_tipo_bebida extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%tipo_bebida}}', [
            'id' => $this->primaryKey(),
            'descricao' => $this->string()->notNull(),
        ], $tableOptions);

        $this->addForeignKey('tipo_bebida_ibfk_1', '{{%tipo_bebida}}', 'id', '{{%bebida}}', 'id_tipo_bebida', 'RESTRICT', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%tipo_bebida}}');
    }
}
