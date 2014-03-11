<?php
/**
 * YPNewsletterModule
 *
 * @author YiiPlugins.com
 * @link http://yiiplugins.com/plugin/newsletter-module
 * @license http://www.opensource.org/licenses/bsd-license.php
 */
class YPNewsletterImportCsv extends CFormModel
{
	public $csvfile;
	public $ypNewsletterGroups;
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
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
            array('csvfile', 'file', 'types'=>'csv'),
        );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'csvfile' => 'Select CSV file to upload',
		);
	}

}