<?php

use yii\db\Migration;

/**
 * Class m191018_142935_order_table
 */
class m191018_142935_order_table extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('e_orders', [
            'id' => $this->primaryKey(),
            'shop_id' => $this->integer(),
            'status_code' => $this->string(100),
            'status_text' => $this->text(),
            'price' => $this->money(12, 2),
            'delivery_price' => $this->money(12, 2),
            'comment' => $this->text(),
            'paySystem' => $this->tinyInteger(),
            'fio' => $this->string(100),
            'email' => $this->string(100),
            'phone' => $this->string(100),
            'address' => $this->string(1000),
            'city' => $this->string(100),
            'delivery' => $this->string(100),
            'basket' => $this->json(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('e_orders');
    }
}
