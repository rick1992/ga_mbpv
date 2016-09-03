<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tabla_asistencia".
 *
 * @property integer $iddocente
 * @property string $turno
 * @property integer $dia
 * @property string $horaInicio
 * @property string $fecha
 * @property string $horaLl
 * @property string $horaS
 * @property string $estado
 */
class TablaAsistencia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tabla_asistencia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['iddocente', 'turno', 'dia', 'horaInicio', 'fecha', 'horaLl', 'horaS', 'estado'], 'required'],
            [['iddocente', 'dia'], 'integer'],
            [['horaInicio', 'fecha', 'horaLl', 'horaS'], 'safe'],
            [['turno', 'estado'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'iddocente' => 'Iddocente',
            'turno' => 'Turno',
            'dia' => 'Dia',
            'horaInicio' => 'Hora Inicio',
            'fecha' => 'Fecha',
            'horaLl' => 'Hora Ll',
            'horaS' => 'Hora S',
            'estado' => 'Estado',
        ];
    }
}
