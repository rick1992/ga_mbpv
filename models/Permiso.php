<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "permiso".
 *
 * @property integer $permiso_id
 * @property string $descripcion
 * @property integer $tipo
 * @property string $active
 *
 * @property PadreHijo[] $padreHijos
 * @property PadreHijo[] $padreHijos0
 * @property Permiso[] $padreHijoHijos
 * @property Permiso[] $padreHijoPadres
 * @property RolPermiso[] $rolPermisos
 */
class Permiso extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'permiso';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipo'], 'integer'],
            [['descripcion'], 'string', 'max' => 250],
            [['active'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'permiso_id' => 'Permiso ID',
            'descripcion' => 'Descripcion',
            'tipo' => 'Tipo',
            'active' => 'Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPadreHijos()
    {
        return $this->hasMany(PadreHijo::className(), ['padre_hijo_padre_id' => 'permiso_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPadreHijos0()
    {
        return $this->hasMany(PadreHijo::className(), ['padre_hijo_hijo_id' => 'permiso_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPadreHijoHijos()
    {
        return $this->hasMany(Permiso::className(), ['permiso_id' => 'padre_hijo_hijo_id'])->viaTable('padre_hijo', ['padre_hijo_padre_id' => 'permiso_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPadreHijoPadres()
    {
        return $this->hasMany(Permiso::className(), ['permiso_id' => 'padre_hijo_padre_id'])->viaTable('padre_hijo', ['padre_hijo_hijo_id' => 'permiso_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRolPermisos()
    {
        return $this->hasMany(RolPermiso::className(), ['permiso_id' => 'permiso_id']);
    }
}
