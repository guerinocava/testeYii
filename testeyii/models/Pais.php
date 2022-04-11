<?php

namespace app\models;

use yii\db\ActiveRecord;
use app\models\Pais;

class Pais extends ActiveRecord
{

}


// obtém todas as linhas da tabela pais e as ordena pela coluna "nome"
$paises = Pais::find()->orderBy('nome')->all();

// obtém a linha cuja chave primária é "BR"
$pais = Pais::findOne('BR');

// exibe "Brasil"
echo $pais->nome;

// altera o nome do país para "Brazil" e o salva no banco de dados
$pais->nome = 'Brazil';
$pais->save();