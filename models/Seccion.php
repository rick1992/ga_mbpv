<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "seccion".
 *
 * @property integer $seccion_id
 * @property string $letra
 * @property string $created
 * @property string $updated
 * @property integer $createby
 * @property integer $updateby
 * @property string $active
 *
 * @property MatriculaAlumno[] $matriculaAlumnos
 */
class Seccion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'seccion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['seccion_id'], 'required'],
            [['seccion_id', 'createby', 'updateby'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['letra', 'active'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'seccion_id' => 'Seccion ID',
            'letra' => 'Letra',
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
    public function getMatriculaAlumnos()
    {
        return $this->hasMany(MatriculaAlumno::className(), ['seccion_id' => 'seccion_id']);
    }
}
