<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "colegio_procedencia".
 *
 * @property integer $colegio_id
 * @property string $nombre_colegio
 * @property string $direccion
 * @property string $created
 * @property string $updated
 * @property integer $createby
 * @property integer $updateby
 * @property string $active
 *
 * @property Alumno[] $alumnos
 */
class ColegioProcedencia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'colegio_procedencia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['colegio_id'], 'required'],
            [['colegio_id', 'createby', 'updateby'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['nombre_colegio'], 'string', 'max' => 100],
            [['direccion'], 'string', 'max' => 200],
            [['active'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'colegio_id' => 'Colegio ID',
            'nombre_colegio' => 'Nombre Colegio',
            'direccion' => 'Direccion',
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
        return $this->hasMany(Alumno::className(), ['colegio_id' => 'colegio_id']);
    }
}
