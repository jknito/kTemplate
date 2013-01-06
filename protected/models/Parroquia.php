<?php

/**
 * This is the model class for table "parroquia".
 *
 * The followings are the available columns in table 'parroquia':
 * @property integer $id
 * @property integer $canton_id
 * @property string $nombre
 * @property integer $status
 * @property string $codigo
 *
 * The followings are the available model relations:
 * @property Distribuidor[] $distribuidors
 * @property Canton $canton
 */
class Parroquia extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Parroquia the static model class
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
		return 'parroquia';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('canton_id, nombre, status', 'required'),
			array('canton_id, status', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>100),
			array('codigo', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, canton_id, nombre, status, codigo, paisNombre, provinciaNombre, cantonNombre', 'safe', 'on'=>'search'),
		);
	}
	//nueva propiedad para pais
	private $_paisId = null;
	public function getPais_Id(){
		if($this->_paisId === null && $this->canton !== null && $this->canton->provincia !== null && $this->canton->provincia->pais !== null){
			$this->_paisId = $this->canton->provincia->pais->id;
		}
		return $this->_paisId;
	}
	public function setPais_Id($value){
		$this->_paisId = $value;
	}
	private $_paisNombre = null;
	public function getPaisNombre(){
		if($this->_paisNombre === null && $this->canton !== null && $this->canton->provincia !== null && $this->canton->provincia->pais !== null){
			$this->_paisNombre = $this->canton->provincia->pais->nombre;
		}
		return $this->_paisNombre;
	}
	public function setPaisNombre($value){
		$this->_paisNombre = $value;
	}
	//id de provincia
	private $_provinciaId = null;
	public function getProvincia_Id(){
		if($this->_provinciaId === null && $this->canton !== null && $this->canton->provincia !== null){
			$this->_provinciaId = $this->canton->provincia->id;
		}
		return $this->_provinciaId;
	}
	public function setProvincia_Id($value){
		$this->_provinciaId = $value;
	}
	//fin provincia_id
	private $_provinciaNombre = null;
	public function getProvinciaNombre(){
		if($this->_provinciaNombre === null && $this->canton !== null && $this->canton->provincia !== null ){
			$this->_provinciaNombre = $this->canton->provincia->nombre;
		}
		return $this->_provinciaNombre;
	}
	public function setProvinciaNombre($value){
		$this->_provinciaNombre = $value;
	}
	//id de canton
	private $_cantonId = null;
	public function getCanton_Id(){
		if($this->_cantonId === null && $this->canton !== null){
			$this->_cantonId = $this->canton->id;
		}
		return $this->_cantonId;
	}
	public function setCanton_Id($value){
		$this->_cantonId = $value;
	}
	//fin canton_id
	private $_cantonNombre = null;
	public function getCantonNombre(){
		if($this->_cantonNombre === null && $this->canton !== null){
			$this->_cantonNombre = $this->canton->nombre;
		}
		return $this->_cantonNombre;
	}
	public function setCantonNombre($value){
		$this->_cantonNombre = $value;
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'distribuidors' => array(self::HAS_MANY, 'Distribuidor', 'parroquia_id'),
			'canton' => array(self::BELONGS_TO, 'Canton', 'canton_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'canton_id' => 'Canton',
			'nombre' => 'Nombre',
			'status' => 'Status',
			'codigo' => 'Codigo',
			'paisNombre' => 'Pais',
			'provinciaNombre' => 'Provincia',
			'cantonNombre' => 'canton',
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
		$criteria->with = array("canton","canton.provincia","canton.provincia.pais");

		$criteria->compare('t.id',$this->id);
		$criteria->compare('t.canton_id',$this->canton_id);
		$criteria->compare('t.nombre',$this->nombre,true);
		$criteria->compare('canton.nombre',$this->cantonNombre,true);
		$criteria->compare('provincia.nombre',$this->provinciaNombre,true);
		$criteria->compare('pais.nombre',$this->paisNombre,true);
		$criteria->compare('t.status',$this->status);
		$criteria->compare('t.codigo',$this->codigo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}