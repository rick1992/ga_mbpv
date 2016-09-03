<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fotoportada".
 *
 * @property integer $id
 * @property string $descripcion
 * @property string $path
 * @property integer $orden
 * @property integer $view
 */
class Fotoportada extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fotoportada';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion', 'path'], 'required'],
            [['orden', 'view'], 'integer'],
            [['descripcion'], 'string', 'max' => 50],
            [['path'], 'string', 'max' => 250],
            [['orden'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descripcion' => 'Descripcion',
            'path' => 'Path',
            'orden' => 'Orden',
            'view' => 'View',
        ];
    }
}
