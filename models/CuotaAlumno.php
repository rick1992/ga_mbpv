<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cuota_alumno".
 *
 * @property integer $codigoMatricula
 * @property string $idMovimiento
 * @property integer $cuota
 * @property string $cargo
 * @property string $saldo
 *
 * @property DetalleMovimiento $idMovimiento0
 * @property DetallePago[] $detallePagos
 */
class CuotaAlumno extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cuota_alumno';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codigoMatricula', 'idMovimiento', 'cuota'], 'required'],
            [['codigoMatricula', 'idMovimiento', 'cuota'], 'integer'],
            [['cargo', 'saldo'], 'number'],
            [['idMovimiento', 'cuota'], 'exist', 'skipOnError' => true, 'targetClass' => DetalleMovimiento::className(), 'targetAttribute' => ['idMovimiento' => 'idMovimiento', 'cuota' => 'cuota']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'codigoMatricula' => 'Codigo Matricula',
            'idMovimiento' => 'Id Movimiento',
            'cuota' => 'Cuota',
            'cargo' => 'Cargo',
            'saldo' => 'Saldo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdMovimiento0()
    {
        return $this->hasOne(DetalleMovimiento::className(), ['idMovimiento' => 'idMovimiento', 'cuota' => 'cuota']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetallePagos()
    {
        return $this->hasMany(DetallePago::className(), ['codigoMatricula' => 'codigoMatricula', 'idMovimiento' => 'idMovimiento', 'cuota' => 'cuota']);
    }
}
