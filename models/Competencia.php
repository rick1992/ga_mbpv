<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "competencia".
 *
 * @property integer $competencia_id
 * @property string $descripcion
 * @property string $competencia_min
 * @property string $created
 * @property string $updated
 * @property integer $createby
 * @property integer $updateby
 * @property string $active
 *
 * @property AreaCompetencia[] $areaCompetencias
 * @property FormulaArea[] $anios
 * @property PromedioCompetencia[] $promedioCompetencias
 * @property PromedioBimestral[] $bimestres
 */
class Competencia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'competencia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['competencia_id'], 'required'],
            [['competencia_id', 'createby', 'updateby'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['descripcion'], 'string', 'max' => 45],
            [['competencia_min'], 'string', 'max' => 5],
            [['active'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'competencia_id' => 'Competencia ID',
            'descripcion' => 'Descripcion',
            'competencia_min' => 'Competencia Min',
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
    public function getAreaCompetencias()
    {
        return $this->hasMany(AreaCompetencia::className(), ['competencia_id' => 'competencia_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnios()
    {
        return $this->hasMany(FormulaArea::className(), ['anio_id' => 'anio_id', 'area_id' => 'area_id'])->viaTable('area_competencia', ['competencia_id' => 'competencia_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPromedioCompetencias()
    {
        return $this->hasMany(PromedioCompetencia::className(), ['competencia_id' => 'competencia_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBimestres()
    {
        return $this->hasMany(PromedioBimestral::className(), ['bimestre_id' => 'bimestre_id', 'codigo_matricula' => 'codigo_matricula', 'curso_docente_grado_id' => 'curso_docente_grado_id'])->viaTable('promedio_competencia', ['competencia_id' => 'competencia_id']);
    }
}
