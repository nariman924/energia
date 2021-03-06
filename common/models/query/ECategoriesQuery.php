<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\ECategories]].
 *
 * @see \common\models\ECategories
 */
class ECategoriesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\ECategories[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\ECategories|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public function getList($parentId = null)
    {
        return $this->select(['name', 'id', 'shop_id'])
            ->where(['shop_parent_id' => $parentId])
            ->asArray()
            ->all();
    }
}
