<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "apoderado".
 *
 * @property string $tipo_seguro
 * @property string $info_colegio
 * @property string $ocupacion
 * @property string $especificacion_ocupacion
 * @property integer $usuario_id
 * @property string $created
 * @property string $updated
 * @property integer $createby
 * @property integer $updateby
 * @property string $active
 *
 * @property Alumno[] $alumnos
 * @property Usuario $usuario
 */
class Apoderado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'apoderado';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['usuario_id'], 'required'],
            [['usuario_id', 'createby', 'updateby'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['tipo_seguro', 'info_colegio', 'ocupacion', 'especificacion_ocupacion'], 'string', 'max' => 45],
            [['active'], 'string', 'max' => 1],
            [['usuario_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['usuario_id' => 'usuario_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tipo_seguro' => 'Tipo Seguro',
            'info_colegio' => 'Info Colegio',
            'ocupacion' => 'Ocupacion',
            'especificacion_ocupacion' => 'Especificacion Ocupacion',
            'usuario_id' => 'Usuario ID',
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
    public function getAlumnos()
    {
        return $this->hasMany(Alumno::className(), ['apoderado_id' => 'usuario_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuario::className(), ['usuario_id' => 'usuario_id']);
    }
}
