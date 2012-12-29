<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

array_push($autoload['packages'], 
	APPPATH.'third_party/phpass/0.3'
);

array_push($autoload['helper'], 
	'url_helper',	
	'bootstrap_helper'
);

array_push($autoload['libraries'], 
	'form_validation'
);
