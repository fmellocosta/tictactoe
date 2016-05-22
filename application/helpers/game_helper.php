<?php
if(!function_exists('generateRandomGameId')) {
	function generateRandomGameId()	{
		return md5(uniqid(rand(), true));
	}
}

if(!function_exists('api_url')) {	
	function api_url() {
		return 'http://localhost/tictactoe_api/api/games/users/';
	}
}

if(!function_exists('getGameId')) {
	function getGameId() {
		$CI =& get_instance();
		return $CI->session->userdata('sessionId');
	}
}

if(!function_exists('getPlayerId')) {
	function getPlayerId() {
		$CI =& get_instance();
		return $CI->session->userdata('playerId');
	}
}

?>