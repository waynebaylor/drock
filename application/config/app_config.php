<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['encryption_key'] = 'drock_enc_key';

$config['sess_cookie_name']		= 'drock';
$config['sess_expiration']		= 7200;
$config['sess_expire_on_close']	= FALSE;
$config['sess_encrypt_cookie']	= FALSE;
$config['sess_use_database']	= FALSE;
$config['sess_table_name']		= 'ci_sessions';
$config['sess_match_ip']		= FALSE;
$config['sess_match_useragent']	= TRUE;
$config['sess_time_to_update']	= 300;
