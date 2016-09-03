<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "filial".
 *
 * @property integer $idfilial
 * @property string $direccion
 * @property string $distrito
 * @property string $telefono
 * @property string $created
 * @property string $updated
 * @property integer $createby
 * @property integer $updateby
 * @property string $active
 *
 * @property ProgramacionEscolar[] $programacionEscolars
 */
class Filial extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'filial';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created', 'updated'], 'safe'],
            [['createby', 'updateby'], 'integer'],
            [['direccion', 'distrito', 'telefono'], 'string', 'max' => 45],
            [['active'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idfilial' => 'Idfilial',
            'direccion' => 'Direccion',
            'distrito' => 'Distrito',
            'telefono' => 'Telefono',
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
    public function getProgramacionEscolars()
    {
        return $this->hasMany(ProgramacionEscolar::className(), ['filial_id' => 'idfilial']);
    }
}
