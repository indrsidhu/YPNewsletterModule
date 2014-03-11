<?php
/**
 * YPNewsletterModule
 *
 * @author YiiPlugins.com
 * @link http://yiiplugins.com/plugin/newsletter-module
 * @license http://www.opensource.org/licenses/bsd-license.php
 */
/**
 * This is the model class for table "{{newsletter_log}}".
 *
 * The followings are the available columns in table '{{newsletter_log}}':
 * @property string $id
 * @property string $created
 * @property string $yp_newsletter_contact_list_id
 *
 * The followings are the available model relations:
 * @property NewsletterContactList $ypNewsletterContactList
 */
class NewsletterLog extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return NewsletterLog the static model class
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
		return 'yp_newsletter_log';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('yp_newsletter_contact_list_id', 'required'),
			array('yp_newsletter_contact_list_id', 'length', 'max'=>10),
			array('created', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, created, yp_newsletter_contact_list_id', 'safe', 'on'=>'search'),
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
			'ypNewsletterContactList' => array(self::BELONGS_TO, 'NewsletterContactList', 'yp_newsletter_contact_list_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'created' => 'Created',
			'yp_newsletter_contact_list_id' => 'Yp Newsletter Contact List',
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
		$criteria->compare('created',$this->created,true);
		$criteria->compare('yp_newsletter_contact_list_id',$this->yp_newsletter_contact_list_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}