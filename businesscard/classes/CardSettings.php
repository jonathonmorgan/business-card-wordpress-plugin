<?php
class CardSettings
	{
		private static $instance;
		//get and set options
		public static $options_namespace = 'businessCardSettings';
		public $options = array(
			'name' => array('value' => '', 'type' => 'text', 'description' => 'Your full name'),
			'title' => array('value' => '', 'type' => 'text', 'description' => 'Professional title'),
			'linkedIn' => array('value' => '', 'type' => 'url', 'description' => 'LinkedIn profile address'),
			'facebook' => array('value' => '', 'type' => 'url', 'description' => 'Facebook profile address'),
			'twitter' => array('value' => '', 'type' => 'url', 'description' => 'Link to your Twitter stream'),
			'resume' => array('value' => '', 'type' => 'url', 'description' => 'Link to your resume')
			);

		function getOptions()
		{
			//override defaults with values from db
			$cur_options = get_option(self::$options_namespace);
			if(!empty($cur_options)) {
				foreach($cur_options as $key => $option) {
					$this->options[$key] = $option;
				}
			}
			return $this->options;
		}
		
		//write prefs to wp_options table, hooked to plugin activation
		function setUp() 
		{
			update_option(self::$options_namespace, $this->options);
		}
		
		//me: dear singleton, i would like an object. singleton: your wish is my command.
		public static function get_instance() 
		{
			if (!isset(self::$instance)) {
				$c = __CLASS__;
				self::$instance = new $c;
			}
			return self::$instance;
		}
		
		// no cloning the instance
		public function __clone()
		{
			trigger_error('Not so fast. Clone is not allowed.', E_USER_ERROR);
		}
		
	}