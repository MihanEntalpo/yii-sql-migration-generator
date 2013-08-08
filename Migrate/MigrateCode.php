<?php

/**
 * Description of MigrateCode

 */
class MigrateCode extends CCodeModel
{

	public $migrateName;
	public $code;
	public $codeDown;
    public $enableDown;
	public $clearCache;
	public $clearAssets;
	public $_migrateName;

	public function rules()
	{
		return array_merge(parent::rules(), array(
			array('migrateName', 'required'),
			array('migrateName', 'match', 'pattern' => '/^\w+$/'),
			array('_migrateName','match','pattern' => '#m[0-9]{6}_[0-9]{6}_[a-zA-Z0-9\._]+#i'),
			array('clearCache, clearAssets, enableDown', 'boolean'),
			array('code, codeDown','safe'),
		));
	}

	public function attributeLabels()
	{
		return array_merge(parent::attributeLabels(), array(
			'migrateName' => 'Имя класса миграции',
			'code'		  => 'SQL',
			'clearCache'  => 'Сбросить кэш (не работает)',
			'clearAssets' => 'Очистить assets (не работает)',
		));
	}

	public function prepare()
	{
		$this->_migrateName = $this->_migrateName
			? $this->_migrateName
			: 'm' . date('ymd_His_') . $this->migrateName;

		$path = Yii::getPathOfAlias('application.migrations.' . $this->_migrateName) . '.php';
		$code = $this->render($this->templatepath . '/migrate.php');

//		Y::dump($path);

		$this->files[] = new CCodeFile($path, $code);
	}

}