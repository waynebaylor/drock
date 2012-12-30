<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('bs_text')) {
	function bs_text($name, $label, $value = NULL) {
		$error_text = form_error($name);
		$error_class = $error_text? 'error' : '';
		
		if(is_null($value)) {
			$value = set_value($name);
		}
		
		return <<<_
			<div class="control-group {$error_class}">
				<div class="control-label">${label}</div>
				<div class="controls">
					<input type="text" name="{$name}" value="{$value}">
					{$error_text}
				</div>
			</div>
_;
	}
}

if(!function_exists('bs_password')) {
	function bs_password($name, $label, $value = NULL) {
		$error_text = form_error($name);
		$error_class = $error_text? 'error' : '';
		
		if(is_null($value)) {
			$value = set_value($name);
		}
		
		return <<<_
			<div class="control-group {$error_class}">
				<div class="control-label">${label}</div>
				<div class="controls">
					<input type="password" name="{$name}" value="">
					{$error_text}
				</div>
			</div>
_;
	}
}