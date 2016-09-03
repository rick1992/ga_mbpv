<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hora_docente".
 *
 * @property integer $iddocente
 * @property string $turno
 * @property integer $dia
 * @property string $horaInicio
 * @property string $horaFin
 * @property integer $codigoMatricula
 * @property integer $idbimestre
 */
class HoraDocente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hora_docente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['iddocente', 'turno', 'dia', 'horaInicio', 'codigoMatricula', 'idbimestre'], 'required'],
            [['iddocente', 'dia', 'codigoMatricula', 'idbimestre'], 'integer'],
            [['horaInicio', 'horaFin'], 'safe'],
            [['turno'], 'string', 'max' => 1],
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
            'horaFin' => 'Hora Fin',
            'codigoMatricula' => 'Codigo Matricula',
            'idbimestre' => 'Idbimestre',
        ];
    }
}
