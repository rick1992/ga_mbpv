<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "promedio_unidad".
 *
 * @property integer $idunidad
 */
class PromedioUnidad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'promedio_unidad';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idunidad'], 'required'],
            [['idunidad'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idunidad' => 'Idunidad',
        ];
    }
}
