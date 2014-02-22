<?php

/**
 * This is the model class for table "{{newsletter_contact_list}}".
 *
 * The followings are the available columns in table '{{newsletter_contact_list}}':
 * @property string $id
 * @property string $yp_newsletter_groups_id
 * @property string $data_attributes_data
 * @property integer $is_active
 * @property string $created
 *
 * The followings are the available model relations:
 * @property NewsletterGroups $ypNewsletterGroups
 */
class NewsletterContactList extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return NewsletterContactList the static model class
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
		return 'yp_newsletter_contact_list';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('yp_newsletter_groups_id', 'required'),
			array('is_active', 'numerical', 'integerOnly'=>true),
			array('yp_newsletter_groups_id', 'length', 'max'=>10),
			array('data_attributes_data, created, updated', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, yp_newsletter_groups_id, data_attributes_data, is_active, created, updated', 'safe', 'on'=>'search'),
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
			'ypNewsletterGroups' => array(self::BELONGS_TO, 'NewsletterGroups', 'yp_newsletter_groups_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'yp_newsletter_groups_id' => 'Yp Newsletter Groups',
			'data_attributes_data' => 'Data Attributes Data',
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
		$criteria->compare('yp_newsletter_groups_id',$this->yp_newsletter_groups_id,true);
		$criteria->compare('data_attributes_data',$this->data_attributes_data,true);
		$criteria->compare('is_active',$this->is_active);
		$criteria->compare('created',$this->created,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}