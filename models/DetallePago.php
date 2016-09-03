<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detalle_pago".
 *
 * @property integer $idPago
 * @property integer $codigoMatricula
 * @property string $idMovimiento
 * @property integer $cuota
 * @property string $pago
 * @property string $fechaPago
 * @property string $reciboPago
 *
 * @property CuotaAlumno $codigoMatricula0
 */
class DetallePago extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detalle_pago';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codigoMatricula', 'idMovimiento', 'cuota'], 'required'],
            [['codigoMatricula', 'idMovimiento', 'cuota'], 'integer'],
            [['pago'], 'number'],
            [['fechaPago'], 'safe'],
            [['reciboPago'], 'string', 'max' => 250],
            [['codigoMatricula', 'idMovimiento', 'cuota'], 'exist', 'skipOnError' => true, 'targetClass' => CuotaAlumno::className(), 'targetAttribute' => ['codigoMatricula' => 'codigoMatricula', 'idMovimiento' => 'idMovimiento', 'cuota' => 'cuota']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idPago' => 'Id Pago',
            'codigoMatricula' => 'Codigo Matricula',
            'idMovimiento' => 'Id Movimiento',
            'cuota' => 'Cuota',
            'pago' => 'Pago',
            'fechaPago' => 'Fecha Pago',
            'reciboPago' => 'Recibo Pago',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodigoMatricula0()
    {
        return $this->hasOne(CuotaAlumno::className(), ['codigoMatricula' => 'codigoMatricula', 'idMovimiento' => 'idMovimiento', 'cuota' => 'cuota']);
    }
}
