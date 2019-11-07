<?php
	namespace app\components;

	use yii\bootstrap\Widget;
	use Yii;
	/**
	 * 
	 */
	class LanguageWidget extends Widget
	{
		public $language;

		public function init(){
			parent::init();
		}
		public function run(){
			$baseUrl = Yii::$app->homeUrl;
			$currUrl = Yii::$app->getRequest()->getUrl();
			$this->language = Yii::$app->language;
			$dropdown = '<div class = "row">
				<span class = "text-uppercase"></span>
			</div>'
		}
		
	}
?>