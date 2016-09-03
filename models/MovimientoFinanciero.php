<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "movimiento_financiero".
 *
 * @property string $idMovimiento
 * @property string $concepto
 * @property string $movimiento
 * @property integer $numeroCuotas
 *
 * @property DetalleMovimiento[] $detalleMovimientos
 */
class MovimientoFinanciero extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'movimiento_financiero';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['numeroCuotas'], 'integer'],
            [['concepto', 'movimiento'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idMovimiento' => 'Id Movimiento',
            'concepto' => 'Concepto',
            'movimiento' => 'Movimiento',
            'numeroCuotas' => 'Numero Cuotas',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleMovimientos()
    {
        return $this->hasMany(DetalleMovimiento::className(), ['idMovimiento' => 'idMovimiento']);
    }
}
