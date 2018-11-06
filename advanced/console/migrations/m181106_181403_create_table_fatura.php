<?php

use yii\db\Migration;

class m181106_181403_create_table_fatura extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%fatura}}', [
            'id' => $this->primaryKey(),
            'id_refeicao' => $this->integer()->notNull(),
            'id_tipo_pagamento' => $this->integer()->notNull(),
            'data' => $this->date()->notNull(),
            'hora' => $this->time()->notNull(),
            'total' => $this->decimal()->notNull(),
            'id_user' => $this->integer(),
        ], $tableOptions);

        $this->createIndex('id_tipo_pagamento', '{{%fatura}}', 'id_tipo_pagamento');
        $this->createIndex('id_receicao', '{{%fatura}}', 'id_refeicao');
        $this->createIndex('id_user', '{{%fatura}}', 'id_user');
        $this->addForeignKey('fatura_ibfk_1', '{{%fatura}}', 'id_refeicao', '{{%refeicao}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('fatura_ibfk_2', '{{%fatura}}', 'id_tipo_pagamento', '{{%tipo_pagamento}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('fatura_ibfk_3', '{{%fatura}}', 'id_user', '{{%user}}', 'id', 'RESTRICT', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%fatura}}');
    }
}
