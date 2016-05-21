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
?>