<?php

use yii\db\Migration;

class m181106_181404_create_table_sobremesa extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%sobremesa}}', [
            'id' => $this->primaryKey(),
            'descricao' => $this->string()->notNull(),
            'preco' => $this->decimal()->notNull(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%sobremesa}}');
    }
}
