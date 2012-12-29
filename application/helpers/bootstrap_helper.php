<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function bs_text($name, $label, $value) {
	$error_text = form_error('username');
	$error_class = $error_text? 'error' : '';
	
	
	return <<<_
		<div class="control-group {$error}">
			<div class="control-label">${label}</div>
			<div class="controls">
				<input type="text" name="{$name}" value="{$value}">
				{$error_text}
			</div>
		</div>
_;
}