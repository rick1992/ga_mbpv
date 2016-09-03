<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property integer $usuario_id
 * @property string $nombre
 * @property string $apellido_paterno
 * @property string $apellido_materno
 * @property string $dni
 * @property string $fecha_nacimiento
 * @property string $celular
 * @property string $estado_civil
 * @property string $telefono
 * @property string $tipo
 * @property string $usuario
 * @property string $contra
 * @property string $domicilio
 * @property string $distrito
 * @property string $sector
 * @property string $punto_referencia
 * @property string $tipo_seguro
 * @property string $correo
 * @property string $operadora_telefonica
 * @property string $genero
 * @property string $created
 * @property string $updated
 * @property integer $createby
 * @property integer $updateby
 * @property string $active
 *
 * @property Alumno $alumno
 * @property Apoderado $apoderado
 * @property Docente $docente
 * @property RolPermiso[] $rolPermisos
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha_nacimiento', 'created', 'updated'], 'safe'],
            [['operadora_telefonica', 'genero'], 'required'],
            [['createby', 'updateby'], 'integer'],
            [['nombre', 'celular', 'telefono', 'usuario', 'contra', 'distrito', 'sector', 'punto_referencia', 'tipo_seguro', 'correo'], 'string', 'max' => 45],
            [['apellido_paterno', 'apellido_materno'], 'string', 'max' => 20],
            [['dni'], 'string', 'max' => 8],
            [['estado_civil', 'active'], 'string', 'max' => 1],
            [['tipo'], 'string', 'max' => 10],
            [['domicilio'], 'string', 'max' => 100],
            [['operadora_telefonica'], 'string', 'max' => 50],
            [['genero'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'usuario_id' => 'Usuario ID',
            'nombre' => 'Nombre',
            'apellido_paterno' => 'Apellido Paterno',
            'apellido_materno' => 'Apellido Materno',
            'dni' => 'Dni',
            'fecha_nacimiento' => 'Fecha Nacimiento',
            'celular' => 'Celular',
            'estado_civil' => 'Estado Civil',
            'telefono' => 'Telefono',
            'tipo' => 'Tipo',
            'usuario' => 'Usuario',
            'contra' => 'Contra',
            'domicilio' => 'Domicilio',
            'distrito' => 'Distrito',
            'sector' => 'Sector',
            'punto_referencia' => 'Punto Referencia',
            'tipo_seguro' => 'Tipo Seguro',
            'correo' => 'Correo',
            'operadora_telefonica' => 'Operadora Telefonica',
            'genero' => 'Genero',
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
    public function getAlumno()
    {
        return $this->hasOne(Alumno::className(), ['alumno_id' => 'usuario_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApoderado()
    {
        return $this->hasOne(Apoderado::className(), ['usuario_id' => 'usuario_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocente()
    {
        return $this->hasOne(Docente::className(), ['docente_id' => 'usuario_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRolPermisos()
    {
        return $this->hasMany(RolPermiso::className(), ['usuario_id' => 'usuario_id']);
    }
}
