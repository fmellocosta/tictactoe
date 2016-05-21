<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );

class Pages extends CI_Controller {

	var $data;
	
	function __construct(){
		parent::__construct();
		$this->data = array(
				'page_title' => 'Tic Tac Toe'
		);
	}	
	
	function index() {
		
		$data = $this->data;
		$this->load->view ( 'templates/header', $data );
		$this->load->view ( 'pages/index', $data );
		$this->load->view ( 'templates/footer', $data );
		
	}
	
	function start() {
		
		$data = $this->data;
		
		$this->load->controller('games');
		$this->games->start();
		
		$this->load->view ( 'templates/header', $data );
		$this->load->view ( 'pages/game', $data );
		$this->load->view ( 'templates/includes/footer_games', $data );
		$this->load->view ( 'templates/footer', $data );
		
	}
	
	function restart() {
	
		$data = $this->data;
	
		$this->load->controller('games');
		$this->games->restart();
	
		$this->load->view ( 'templates/header', $data );
		$this->load->view ( 'pages/game', $data );
		$this->load->view ( 'templates/includes/footer_games', $data );
		$this->load->view ( 'templates/footer', $data );
	
	}	
	
}
?>