<?php
	class CardAdmin
	{
		public $options;
		
		function __construct() 
		{
			$this->options = CardSettings::get_instance()->getOptions();
			
			//form
			if( isset($_POST['update_'.CardSettings::$options_namespace]) ) {
				foreach ($this->options as $key => $value) {
					if($_POST[$key] && $_POST[$key]!=$this->options[$key]['description']) {
						$this->options[$key]['value'] = $_POST[$key];
					}
				}
					
				if(update_option(CardSettings::$options_namespace, $this->options)) {
					echo '<div><p>Your settings were successfully updated.</p></div>';
				}
			}
		}
		
		//show descript if there's no value
		function defaultFormValue($value)
		{
			if ($this->options[$value]['value']=='') {
				return $this->options[$value]['description'];
			}
			else {
				return $this->options[$value]['value'];
			}
		}
		
		function printForm()
		{
				?>
				<!--normally this would go in a stylesheet-->
				<style>
					#businessCard label {clear:both; margin-bottom:4px; display:block;}
					#businessCard input {clear:both; margin-bottom:15px;}
				</style>
				<div class=wrap>
					<h2>Business Card Settings</h2>
					<form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>" id="businessCard">
						<?php foreach ($this->options as $key => $value): ?>
							<label for="<?php echo $key; ?>"><?php echo ucwords($key); ?></label>
							<input name="<?php echo $key; ?>" value="<?php echo $this->defaultFormValue($key); ?>">
						<? endforeach; ?>
						<div class="submit">
							<input type="submit" name="update_<?php echo CardSettings::$options_namespace; ?>" value="Update Options" />
						</div>
					</form>
				</div>
				<?php
		}
		
	}