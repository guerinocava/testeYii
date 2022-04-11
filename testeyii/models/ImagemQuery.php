<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Imagem]].
 *
 * @see Imagem
 */
class ImagemQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Imagem[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Imagem|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
