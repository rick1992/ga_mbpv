<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "padre_hijo".
 *
 * @property integer $padre_hijo_padre_id
 * @property integer $padre_hijo_hijo_id
 *
 * @property Permiso $padreHijoPadre
 * @property Permiso $padreHijoHijo
 */
class PadreHijo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'padre_hijo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['padre_hijo_padre_id', 'padre_hijo_hijo_id'], 'required'],
            [['padre_hijo_padre_id', 'padre_hijo_hijo_id'], 'integer'],
            [['padre_hijo_padre_id'], 'exist', 'skipOnError' => true, 'targetClass' => Permiso::className(), 'targetAttribute' => ['padre_hijo_padre_id' => 'permiso_id']],
            [['padre_hijo_hijo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Permiso::className(), 'targetAttribute' => ['padre_hijo_hijo_id' => 'permiso_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'padre_hijo_padre_id' => 'Padre Hijo Padre ID',
            'padre_hijo_hijo_id' => 'Padre Hijo Hijo ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPadreHijoPadre()
    {
        return $this->hasOne(Permiso::className(), ['permiso_id' => 'padre_hijo_padre_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPadreHijoHijo()
    {
        return $this->hasOne(Permiso::className(), ['permiso_id' => 'padre_hijo_hijo_id']);
    }
}
