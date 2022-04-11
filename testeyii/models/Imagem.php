<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "imagem".
 *
 * @property int $idImagem
 * @property string $nome
 * @property string $descri
 * @property string $categoria
 * @property string $imagem
 */
class Imagem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'imagem';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'descri', 'categoria', 'imagem'], 'required'],
            [['nome', 'imagem'], 'string', 'max' => 100],
            [['descri'], 'string', 'max' => 50],
            [['categoria'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idImagem' => Yii::t('app', 'Id Imagem'),
            'nome' => Yii::t('app', 'Nome'),
            'descri' => Yii::t('app', 'Descri'),
            'categoria' => Yii::t('app', 'Categoria'),
            'imagem' => Yii::t('app', 'Imagem'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return ImagemQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ImagemQuery(get_called_class());
    }
}
