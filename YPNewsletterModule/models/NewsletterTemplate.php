<?php

/**
 * This is the model class for table "{{newsletter_template}}".
 *
 * The followings are the available columns in table '{{newsletter_template}}':
 * @property integer $id
 * @property string $yp_newsletter_groups_id
 * @property string $name
 * @property string $email_from
 * @property string $header
 * @property string $body
 * @property string $footer
 * @property string $create
 * @property string $updated
 * @property integer $is_active
 *
 * The followings are the available model relations:
 * @property NewsletterGroups $ypNewsletterGroups
 */
class NewsletterTemplate extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return NewsletterTemplate the static model class
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
		return '{{newsletter_template}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('yp_newsletter_groups_id, name, email_from, body', 'required'),
			array('is_active', 'numerical', 'integerOnly'=>true),
			array('yp_newsletter_groups_id', 'length', 'max'=>10),
			array('name, email_from', 'length', 'max'=>45),
			array('header, footer, create, updated', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, yp_newsletter_groups_id, name, email_from, header, body, footer, create, updated, is_active', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'email_from' => 'Email From',
			'header' => 'Header',
			'body' => 'Body',
			'footer' => 'Footer',
			'create' => 'Create',
			'updated' => 'Updated',
			'is_active' => 'Is Active',
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
		$criteria->compare('yp_newsletter_groups_id',$this->yp_newsletter_groups_id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('email_from',$this->email_from,true);
		$criteria->compare('header',$this->header,true);
		$criteria->compare('body',$this->body,true);
		$criteria->compare('footer',$this->footer,true);
		$criteria->compare('create',$this->create,true);
		$criteria->compare('updated',$this->updated,true);
		$criteria->compare('is_active',$this->is_active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}