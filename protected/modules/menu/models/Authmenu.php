<?php

/**
 * This is the model class for table "authmenu".
 *
 * The followings are the available columns in table 'authmenu':
 * @property integer $id
 * @property string $itemname
 * @property integer $menu_id
 */
class Authmenu extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Authmenu the static model class
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
		return 'authmenu';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('itemname, menu_id', 'required'),
			array('menu_id', 'numerical', 'integerOnly'=>true),
			array('itemname', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, itemname, menu_id', 'safe', 'on'=>'search'),
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
			'itemname' => 'Itemname',
			'menu_id' => 'Menu',
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
		$criteria->compare('itemname',$this->itemname,true);
		$criteria->compare('menu_id',$this->menu_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function asignar(){
    		$cmd = db()->createCommand("SELECT * FROM authitem WHERE TYPE = 2 and name <> 'Admin'");
    		$data=$cmd->queryAll();
    		$select = "";
    		foreach ($data as $rol) {
    			$select .= ", MAX(IF(itemname='".$rol['name']."', 1, 0)) ".$rol['name'];
    		}

		$sql = "
SELECT menu.id, menu.path $select FROM (
SELECT CONCAT(LPAD(m1.orden,5,'0'), '0000000000') orden, CONCAT('/',m1.nombre) AS path, m1.id, m1.nombre, m1.tipo
FROM menu m1
WHERE m1.tipo = 'C'
UNION
SELECT CONCAT(LPAD(m1.orden,5,'0'), LPAD(m2.orden,5,'0'), '00000') orden, CONCAT('/',m1.nombre,'/',m2.nombre) AS path, m2.id, m2.nombre, m2.tipo
FROM menu m1, menu m2
WHERE m2.menu_id = m1.id
AND m2.tipo = 'G'
UNION
SELECT CONCAT(LPAD(m1.orden,5,'0'), LPAD(m2.orden,5,'0'), LPAD(m3.orden,5,'0')) orden, CONCAT('/',m1.nombre,'/',m2.nombre,'/',m3.nombre) AS path, m3.id, m3.nombre, m3.tipo
FROM menu m1, menu m2, menu m3
WHERE m2.menu_id = m1.id
AND m3.menu_id = m2.id
AND m3.tipo = 'O') menu LEFT OUTER JOIN authmenu  ON authmenu.menu_id = menu.id
GROUP BY menu.id, menu.path
ORDER BY orden, path;
		";
		$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>false,
		));
		
		return $dataProvider;
	}
}