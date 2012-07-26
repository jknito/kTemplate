<?php

/**
 * This is the model class for table "mail".
 *
 * The followings are the available columns in table 'mail':
 * @property string $id
 * @property string $referencia
 * @property string $tipo
 * @property string $to
 * @property string $cc
 * @property string $bcc
 * @property string $subject
 * @property string $attach
 * @property string $body
 * @property string $registro
 * @property string $envio
 * @property integer $status
 * @property string $tabla
 * @property string $campo
 */
class Mail extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Mail the static model class
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
		return 'mail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('status', 'numerical', 'integerOnly'=>true),
			array('referencia, tipo, tabla, campo', 'length', 'max'=>250),
			array('subject', 'length', 'max'=>1000),
			array('to, cc, bcc, attach, body, registro, envio', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, referencia, tipo, to, cc, bcc, subject, attach, body, registro, envio, status, tabla, campo', 'safe', 'on'=>'search'),
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
			'referencia' => 'Referencia',
			'tipo' => 'Tipo',
			'to' => 'To',
			'cc' => 'Cc',
			'bcc' => 'Bcc',
			'subject' => 'Subject',
			'attach' => 'Attach',
			'body' => 'Body',
			'registro' => 'Registro',
			'envio' => 'Envio',
			'status' => 'Status',
			'tabla' => 'Tabla',
			'campo' => 'Campo',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('referencia',$this->referencia,true);
		$criteria->compare('tipo',$this->tipo,true);
		$criteria->compare('to',$this->to,true);
		$criteria->compare('cc',$this->cc,true);
		$criteria->compare('bcc',$this->bcc,true);
		$criteria->compare('subject',$this->subject,true);
		$criteria->compare('attach',$this->attach,true);
		$criteria->compare('body',$this->body,true);
		$criteria->compare('registro',$this->registro,true);
		$criteria->compare('envio',$this->envio,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('tabla',$this->tabla,true);
		$criteria->compare('campo',$this->campo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
                'defaultOrder'=>'id DESC',
            ),
		));
	}
}