<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "alumno".
 *
 * @property integer $alumno_id
 * @property integer $colegio_id
 * @property string $nombre_madre
 * @property string $dni_madre
 * @property string $nombre_padre
 * @property string $dni_padre
 * @property integer $apoderado_id
 * @property string $created
 * @property string $updated
 * @property integer $createby
 * @property integer $updateby
 * @property string $active
 *
 * @property ColegioProcedencia $colegio
 * @property Usuario $alumno
 * @property Apoderado $apoderado
 * @property MatriculaAlumno[] $matriculaAlumnos
 */
class Alumno extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'alumno';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alumno_id'], 'required'],
            [['alumno_id', 'colegio_id', 'apoderado_id', 'createby', 'updateby'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['nombre_madre', 'nombre_padre'], 'string', 'max' => 100],
            [['dni_madre', 'dni_padre'], 'string', 'max' => 8],
            [['active'], 'string', 'max' => 1],
            [['colegio_id'], 'exist', 'skipOnError' => true, 'targetClass' => ColegioProcedencia::className(), 'targetAttribute' => ['colegio_id' => 'colegio_id']],
            [['alumno_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['alumno_id' => 'usuario_id']],
            [['apoderado_id'], 'exist', 'skipOnError' => true, 'targetClass' => Apoderado::className(), 'targetAttribute' => ['apoderado_id' => 'usuario_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'alumno_id' => 'Alumno ID',
            'colegio_id' => 'Colegio ID',
            'nombre_madre' => 'Nombre Madre',
            'dni_madre' => 'Dni Madre',
            'nombre_padre' => 'Nombre Padre',
            'dni_padre' => 'Dni Padre',
            'apoderado_id' => 'Apoderado ID',
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
    public function getColegio()
    {
        return $this->hasOne(ColegioProcedencia::className(), ['colegio_id' => 'colegio_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlumno()
    {
        return $this->hasOne(Usuario::className(), ['usuario_id' => 'alumno_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApoderado()
    {
        return $this->hasOne(Apoderado::className(), ['usuario_id' => 'apoderado_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMatriculaAlumnos()
    {
        return $this->hasMany(MatriculaAlumno::className(), ['alumno_id' => 'alumno_id']);
    }
}
