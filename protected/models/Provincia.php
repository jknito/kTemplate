<?php

/**
 * This is the model class for table "provincia".
 *
 * The followings are the available columns in table 'provincia':
 * @property integer $id
 * @property integer $pais_id
 * @property string $nombre
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Canton[] $cantons
 * @property Pais $pais
 */
class Provincia extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Provincia the static model class
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
		return 'provincia';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pais_id, nombre, status', 'required'),
			array('pais_id, status', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, pais_id, nombre, status, paisNombre', 'safe', 'on'=>'search'),
		);
	}

	//nueva propiedad para pais
	private $_paisNombre = null;
	public function getPaisNombre(){
		if($this->_paisNombre === null && $this->pais !== null){
			$this->_paisNombre = $this->pais->nombre;
		}
		return $this->_paisNombre;
	}
	public function setPaisNombre($value){
		$this->_paisNombre = $value;
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'cantons' => array(self::HAS_MANY, 'Canton', 'provincia_id'),
			'pais' => array(self::BELONGS_TO, 'Pais', 'pais_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'pais_id' => 'Pais',
			'nombre' => 'Nombre',
			'status' => 'Status',
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
		$criteria->with = "pais";

		$criteria->compare('id',$this->id);
		$criteria->compare('pais_id',$this->pais_id);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('t.status',$this->status);
		$criteria->compare('pais.nombre',$this->paisNombre,true);

		$sort = new CSort();
		$sort->attributes = array(
		    'paisNombre'=>array(
		        'asc'=>'pais.nombre',
		        'desc'=>'pais.nombre desc',
		    ),
		);

		$provider = new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
		return $provider;
	}
}