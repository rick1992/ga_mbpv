<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "docente".
 *
 * @property integer $docente_id
 * @property string $grado_academico
 * @property string $especialidad
 * @property string $active
 * @property string $created
 * @property string $updated
 * @property integer $create_by
 * @property integer $update_by
 *
 * @property CursoDocenteGrado[] $cursoDocenteGrados
 * @property Usuario $docente
 */
class Docente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'docente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['docente_id', 'grado_academico', 'especialidad'], 'required'],
            [['docente_id', 'create_by', 'update_by'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['grado_academico'], 'string', 'max' => 20],
            [['especialidad'], 'string', 'max' => 70],
            [['active'], 'string', 'max' => 1],
            [['docente_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['docente_id' => 'usuario_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'docente_id' => 'Docente ID',
            'grado_academico' => 'Grado Academico',
            'especialidad' => 'Especialidad',
            'active' => 'Active',
            'created' => 'Created',
            'updated' => 'Updated',
            'create_by' => 'Create By',
            'update_by' => 'Update By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCursoDocenteGrados()
    {
        return $this->hasMany(CursoDocenteGrado::className(), ['docente_id' => 'docente_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocente()
    {
        return $this->hasOne(Usuario::className(), ['usuario_id' => 'docente_id']);
    }
}
