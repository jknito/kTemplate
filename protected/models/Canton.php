<?php

/**
 * This is the model class for table "canton".
 *
 * The followings are the available columns in table 'canton':
 * @property integer $id
 * @property integer $provincia_id
 * @property string $nombre
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Provincia $provincia
 */
class Canton extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Canton the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'canton';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('provincia_id, nombre, status', 'required'),
			array('provincia_id, status', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, provincia_id, nombre, codigo, status, paisNombre, provinciaNombre', 'safe', 'on'=>'search'),
		);
	}
	//nueva propiedad para pais
	private $_paisId = null;
	public function getPais_Id(){
		if($this->_paisId === null && $this->provincia !== null && $this->provincia->pais !== null){
			$this->_paisId = $this->provincia->pais->id;
		}
		return $this->_paisId;
	}
	public function setPais_Id($value){
		$this->_paisId = $value;
	}
	private $_paisNombre = null;
	public function getPaisNombre(){
		if($this->_paisNombre === null && $this->provincia !== null && $this->provincia->pais !== null){
			$this->_paisNombre = $this->provincia->pais->nombre;
		}
		return $this->_paisNombre;
	}
	public function setPaisNombre($value){
		$this->_paisNombre = $value;
	}
	private $_provinciaNombre = null;
	public function getProvinciaNombre(){
		if($this->_provinciaNombre === null && $this->provincia !== null){
			$this->_provinciaNombre = $this->provincia->nombre;
		}
		return $this->_provinciaNombre;
	}
	public function setProvinciaNombre($value){
		$this->_provinciaNombre = $value;
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'provincia' => array(self::BELONGS_TO, 'Provincia', 'provincia_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'provincia_id' => 'Provincia',
			'nombre' => 'Nombre',
			'status' => 'Status',
			'paisNombre' => 'Pais',
			'codigo' => 'Codigo',
			'provinciaNombre' => 'Provincia',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$criteria->with = array("provincia","provincia.pais");


		$criteria->compare('t.id',$this->id);
		$criteria->compare('t.provincia_id',$this->provincia_id);
		$criteria->compare('t.nombre',$this->nombre,true);
		$criteria->compare('pais.nombre',$this->paisNombre,true);
		$criteria->compare('provincia.nombre',$this->provinciaNombre,true);
		$criteria->compare('t.codigo',$this->codigo,true);
		$criteria->compare('t.status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}