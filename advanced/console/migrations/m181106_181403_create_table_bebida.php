<?php

use yii\db\Migration;

class m181106_181403_create_table_bebida extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%bebida}}', [
            'id' => $this->primaryKey(),
            'descricao' => $this->string()->notNull(),
            'preco' => $this->decimal()->notNull(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%bebida}}');
    }
}
