<?php

use yii\db\Migration;

class m181204_152256_create_table_dias_semana extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%dias_semana}}', [
            'id' => $this->primaryKey(),
            'descricao' => $this->string()->notNull(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%dias_semana}}');
    }
}
