<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "horario_curso".
 *
 * @property string $dia
 * @property string $horainicial
 * @property string $horafinal
 */
class HorarioCurso extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'horario_curso';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dia', 'horainicial'], 'required'],
            [['horainicial', 'horafinal'], 'safe'],
            [['dia'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'dia' => 'Dia',
            'horainicial' => 'Horainicial',
            'horafinal' => 'Horafinal',
        ];
    }
}
