<?php

/**
 * This is the model class for table "parametro".
 *
 * The followings are the available columns in table 'parametro':
 * @property integer $id
 * @property string $escenario
 * @property string $parametro
 * @property string $valor
 * @property string $referencia_1
 * @property string $referencia_2
 * @property string $referencia_3
 * @property string $comentario
 * @property integer $status
 */
class Parametro extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Parametro the static model class
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
		return 'parametro';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('escenario, parametro', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('escenario', 'length', 'max'=>50),
			array('parametro, valor, referencia_1, referencia_2', 'length', 'max'=>250),
			array('referencia_3, comentario', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, escenario, parametro, valor, referencia_1, referencia_2, referencia_3, comentario, status', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'escenario' => 'Escenario',
			'parametro' => 'Parametro',
			'valor' => 'Valor',
			'referencia_1' => 'Referencia 1',
			'referencia_2' => 'Referencia 2',
			'referencia_3' => 'Referencia 3',
			'comentario' => 'Comentario',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('escenario',$this->escenario,true);
		$criteria->compare('parametro',$this->parametro,true);
		$criteria->compare('valor',$this->valor,true);
		$criteria->compare('referencia_1',$this->referencia_1,true);
		$criteria->compare('referencia_2',$this->referencia_2,true);
		$criteria->compare('referencia_3',$this->referencia_3,true);
		$criteria->compare('comentario',$this->comentario,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}