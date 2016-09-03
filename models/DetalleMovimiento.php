<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detalle_movimiento".
 *
 * @property string $idMovimiento
 * @property integer $cuota
 * @property string $fechaVencimiento
 * @property string $concepto
 * @property string $fechaDevengado
 *
 * @property CuotaAlumno[] $cuotaAlumnos
 * @property MovimientoFinanciero $idMovimiento0
 */
class DetalleMovimiento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detalle_movimiento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idMovimiento', 'cuota'], 'required'],
            [['idMovimiento', 'cuota'], 'integer'],
            [['fechaVencimiento', 'fechaDevengado'], 'safe'],
            [['concepto'], 'string', 'max' => 100],
            [['idMovimiento'], 'exist', 'skipOnError' => true, 'targetClass' => MovimientoFinanciero::className(), 'targetAttribute' => ['idMovimiento' => 'idMovimiento']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idMovimiento' => 'Id Movimiento',
            'cuota' => 'Cuota',
            'fechaVencimiento' => 'Fecha Vencimiento',
            'concepto' => 'Concepto',
            'fechaDevengado' => 'Fecha Devengado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCuotaAlumnos()
    {
        return $this->hasMany(CuotaAlumno::className(), ['idMovimiento' => 'idMovimiento', 'cuota' => 'cuota']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdMovimiento0()
    {
        return $this->hasOne(MovimientoFinanciero::className(), ['idMovimiento' => 'idMovimiento']);
    }
}
