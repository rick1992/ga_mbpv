<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cursos_docente".
 *
 * @property integer $idcursoasignada
 * @property string $rutaSilabus
 */
class CursosDocente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cursos_docente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idcursoasignada'], 'required'],
            [['idcursoasignada'], 'integer'],
            [['rutaSilabus'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idcursoasignada' => 'Idcursoasignada',
            'rutaSilabus' => 'Ruta Silabus',
        ];
    }
}
