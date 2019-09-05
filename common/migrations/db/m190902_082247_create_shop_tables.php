<?php

use yii\db\Migration;

/**
 * Class m190902_082247_create_shop_tables
 */
class m190902_082247_create_shop_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('e_categories', [
            'id' => $this->primaryKey(),
            'shop_id' => $this->integer()->unique(),
            'shop_parent_id' => $this->integer(),
            'name' => $this->string(1000),
        ], $tableOptions);
        $this->createTable('e_categories_offers', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer(),
            'offer_id' => $this->integer(),
        ], $tableOptions);
        $this->createTable('e_offers', [
            'id' => $this->primaryKey(),
            'shop_id' => $this->integer()->unique(),
            'available' => $this->boolean()->defaultValue(0),
            'shop_url' => $this->string(1000),
            'price' => $this->money(12, 2),
            'currency' => $this->string(100),
            'qty' => $this->integer(),
            'vendor_code' => $this->string(1000),
            'shop_anons_pic' => $this->string(1000),
            'anons_pic' => $this->string(1000),
            'name' => $this->string(1000),
            'vendor' => $this->string(1000),
            'barcode' => $this->string(1000),
            'description' => $this->text(),
        ], $tableOptions);
        $this->createTable('e_offer_params', [
            'id' => $this->primaryKey(),
            'offer_id' => $this->integer(),
            'name' => $this->string(1000),
            'value' => $this->string(1000),
        ], $tableOptions);
        $this->createTable('e_offer_pictures', [
            'id' => $this->primaryKey(),
            'offer_id' => $this->integer(),
            'shop_url' => $this->string(1000),
            'url' => $this->string(1000),
        ], $tableOptions);

        $this->createIndex('e_categories_shop_id', 'e_categories', 'shop_id');
        $this->createIndex('e_categories_child_id', 'e_categories', 'shop_parent_id');

        $this->addForeignKey(
            'e_categories_offers_category',
            'e_categories_offers',
            'category_id',
            'e_categories',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'e_categories_offers_offer',
            'e_categories_offers',
            'offer_id',
            'e_offers',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'e_offer_params_offer',
            'e_offer_params',
            'offer_id',
            'e_offers',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'e_offer_pictures_offer',
            'e_offer_pictures',
            'offer_id',
            'e_offers',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('e_categories_shop_id', 'e_categories');
        $this->dropIndex('e_categories_child_id', 'e_categories');

        $this->dropForeignKey(
            'e_categories_offers_category',
            'e_categories_offers'
        );
        $this->dropForeignKey(
            'e_categories_offers_offer',
            'e_categories_offers'
        );
        $this->dropForeignKey(
            'e_offer_params_offer',
            'e_offer_params'
        );
        $this->dropForeignKey(
            'e_offer_pictures_offer',
            'e_offer_pictures'
        );

        $this->dropTable('e_categories');
        $this->dropTable('e_categories_offers');
        $this->dropTable('e_offers');
        $this->dropTable('e_offer_params');
        $this->dropTable('e_offer_pictures');
    }
}
