<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detalle_matricula".
 *
 * @property string $mes
 * @property string $monto_cancelado
 * @property string $estado
 * @property integer $codigo_matricula
 * @property string $fecha_pago
 * @property string $numero_comprobante
 * @property string $created
 * @property string $updated
 * @property integer $createby
 * @property integer $updateby
 * @property string $active
 *
 * @property MatriculaAlumno $codigoMatricula
 */
class DetalleMatricula extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detalle_matricula';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mes', 'codigo_matricula'], 'required'],
            [['codigo_matricula', 'createby', 'updateby'], 'integer'],
            [['fecha_pago', 'created', 'updated'], 'safe'],
            [['mes', 'monto_cancelado', 'estado', 'numero_comprobante'], 'string', 'max' => 45],
            [['active'], 'string', 'max' => 1],
            [['codigo_matricula'], 'exist', 'skipOnError' => true, 'targetClass' => MatriculaAlumno::className(), 'targetAttribute' => ['codigo_matricula' => 'codigo_matricula']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mes' => 'Mes',
            'monto_cancelado' => 'Monto Cancelado',
            'estado' => 'Estado',
            'codigo_matricula' => 'Codigo Matricula',
            'fecha_pago' => 'Fecha Pago',
            'numero_comprobante' => 'Numero Comprobante',
            'created' => 'Created',
            'updated' => 'Updated',
            'createby' => 'Createby',
            'updateby' => 'Updateby',
            'active' => 'Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodigoMatricula()
    {
        return $this->hasOne(MatriculaAlumno::className(), ['codigo_matricula' => 'codigo_matricula']);
    }
}
