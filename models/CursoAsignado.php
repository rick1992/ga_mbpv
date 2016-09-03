<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "curso_asignado".
 *
 * @property integer $idcursoasignada
 * @property integer $idseccion
 * @property string $grado
 * @property string $nivel
 * @property integer $idfilial
 * @property integer $idanio
 * @property integer $horas
 */
class CursoAsignado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'curso_asignado';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idseccion', 'idfilial', 'idanio', 'horas'], 'integer'],
            [['grado', 'nivel'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idcursoasignada' => 'Idcursoasignada',
            'idseccion' => 'Idseccion',
            'grado' => 'Grado',
            'nivel' => 'Nivel',
            'idfilial' => 'Idfilial',
            'idanio' => 'Idanio',
            'horas' => 'Horas',
        ];
    }
}
