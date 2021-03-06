<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('bs_input')) {
	function bs_input($params) {
		$params = array_merge(array(
			'type' => 'text',
			'value' => NULL,
			'use_placeholder' => FALSE
		), $params);
		
		$name = $params['name'];
		$value = $params['value'];
		$type = $params['type'];
		
		$error_text = form_error($name);
		$error_class = $error_text? 'error' : '';
		
		if(is_null($value)) {
			$value = set_value($name);
		}
		
		if($params['use_placeholder']) {
			$control_label = '';
			$placeholder = $params['label'];
		}
		else {
			$control_label = "<div class=\"control-label\">{$params['label']}</div>";
			$placeholder = '';
		}
		
		return <<<_
			<div class="control-group {$error_class}">
				{$control_label}
				<div class="controls">
					<input type="{$type}" name="{$name}" placeholder="{$placeholder}" value="{$value}">
					{$error_text}
				</div>
			</div>
_;
	}
}

if(!function_exists('bs_text')) {
	function bs_text($params) {
		$params['type'] = 'text';
		return bs_input($params);
	}
}

if(!function_exists('bs_password')) {
	function bs_password($params) {
		$params['type'] = 'password';
		return bs_input($params);
	}
}

if(!function_exists('bs_hidden')) {
	function bs_hidden($params) {
		if(empty($params['label'])) {
			$value = set_value($params['name'], $params['value']);
			return "<input type='hidden' name='{$params['name']}' value='{$value}'>";
		}
		else {
			$params['type'] = 'hidden';
			return bs_input($params);
		}		
	}
}

if(!function_exists('bs_select')) {
	function bs_select($params) {
		$html = '';
		
		$name = $params['name'];
		$value = set_value($params['name'], $params['value']);
		
		$error_text = form_error($name);
		$error_class = $error_text? 'error' : '';
		
		foreach($params['options'] as $option) {
			$selected = ($option['value'] == $params['value'])? 'selected="selected"' : '';
			$html .= "<option value='{$value}' {$selected}>{$option['label']}</option>";
		}
		
		return <<<_
			<div class="control-group {$error_class}">
				<div class=\"control-label\">{$params['label']}</div>
				<div class="controls">
					<select name='{$name}'>{$html}</select>
					{$error_text}
				</div>
			</div>
_;
	}
}


