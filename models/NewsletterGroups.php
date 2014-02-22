<?php

/**
 * This is the model class for table "{{newsletter_groups}}".
 *
 * The followings are the available columns in table '{{newsletter_groups}}':
 * @property string $id
 * @property string $name
 * @property string $data_attributes_fields
 * @property integer $is_active
 * @property string $created
 *
 * The followings are the available model relations:
 * @property NewsletterContactList[] $newsletterContactLists
 */
class NewsletterGroups extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return NewsletterGroups the static model class
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
		return 'yp_newsletter_groups';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, data_attributes_fields', 'required'),
			array('is_active', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>45),
			array('name', 'unique'),
			array('created,updated', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, data_attributes_fields, is_active, created, updated', 'safe', 'on'=>'search'),
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
			'newsletterContactLists' => array(self::HAS_MANY, 'NewsletterContactList', 'yp_newsletter_groups_id'),
			'newsletterTemplate' => array(self::HAS_ONE, 'NewsletterTemplate', 'yp_newsletter_groups_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'data_attributes_fields' => 'Data Attributes Fields',
			'is_active' => 'Is Active',
			'created' => 'Created',
			'updated' => 'Updated',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('data_attributes_fields',$this->data_attributes_fields,true);
		$criteria->compare('is_active',$this->is_active);
		$criteria->compare('created',$this->created,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function generateFields($id){
		
		$fields = self::getFields($id);	
		foreach($fields as $field){
			$label = ucfirst(trim($field));
			
			$fieldValue = '';
			
			if(isset($_POST[trim($field)])){
				$fieldValue = $_POST[trim($field)];
			}
			
			echo CHtml::openTag('div',array('class'=>'form-group'))."\n";
			echo (CHtml::label($label,$label));
			echo CHtml::textfield($field,$fieldValue,array(
			'class'=>'form-control',
			'name'=>$field
			));
			echo CHtml::closeTag('div')."\n";
		}
		
	}
	
	public function setDataArr($arr,$groupId){
		$fields = self::getFields($groupId);

		$dataArr = array();
		foreach($fields as $field){
			$dataArr[trim($field)] = $arr[trim($field)];
		}		
		return $dataArr;
	}

	function getFields($id){
		$fields = NewsletterGroups::model()->findByAttributes(array(
		'is_active'=>1,
		'id'=>$id,		
		));
		
		$fields = explode(',',$fields->data_attributes_fields);
		$fields = array_filter($fields);
		return $fields;
	}
	
	function renderFieldsData($dataArr){
		$dataArr = unserialize($dataArr);
		$html = '';
		if(is_array($dataArr)){
		foreach($dataArr as $key=>$val){
			$html .= '<strong>'.$key.'</strong>:'.$val.' ';
		}
		}
		return $html;
	}
	
}