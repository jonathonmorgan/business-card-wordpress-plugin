<?php
	class Card
	{
		public $options;
		
		function __construct()
		{
			$this->options= CardSettings::get_instance()->getOptions();
		}
		
		function makeListItem($key,$value)
		{
			if($value['type']=='url') {
				$a = '<a href="'.$value['value'].'">';
				$a_close = '</a>';
				$data = ucwords($key); 
			}
			else {
				$data = $value['value'];
			}
			return '<li>'.$a.htmlentities($data).$a_close.'</li>';
		}
			
		function showCard()
		{
			echo '<div id="bcard_container">';
			echo '<h3>'.htmlentities($this->options['name']['value']).'</h3>';
			echo '<ul class="bcard_options">';
			
			foreach ($this->options as $key => $value) {
				if($key != 'name' && $value['value']!='') {
					echo $this->makeListItem($key, $value);
				}
			}
				
			echo '</ul>';
			echo '</div>';
		}
	}