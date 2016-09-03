<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "boletinnotas".
 *
 * @property integer $idBoletin
 * @property integer $idanio
 * @property integer $idfilial
 * @property string $nivel
 * @property string $grado
 * @property integer $idSeccion
 * @property integer $mes
 * @property string $fecha
 * @property string $nombreArchivo
 * @property string $archivo
 */
class Boletinnotas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'boletinnotas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idanio', 'idfilial', 'nivel', 'grado', 'idSeccion', 'mes', 'fecha', 'nombreArchivo', 'archivo'], 'required'],
            [['idanio', 'idfilial', 'idSeccion', 'mes'], 'integer'],
            [['fecha'], 'safe'],
            [['nivel', 'grado'], 'string', 'max' => 50],
            [['nombreArchivo', 'archivo'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idBoletin' => 'Id Boletin',
            'idanio' => 'Idanio',
            'idfilial' => 'Idfilial',
            'nivel' => 'Nivel',
            'grado' => 'Grado',
            'idSeccion' => 'Id Seccion',
            'mes' => 'Mes',
            'fecha' => 'Fecha',
            'nombreArchivo' => 'Nombre Archivo',
            'archivo' => 'Archivo',
        ];
    }
}
