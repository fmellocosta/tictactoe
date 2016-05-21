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
	
	function game() {
		
		$data = $this->data;
		$this->load->view ( 'templates/header', $data );
		$this->load->view ( 'pages/game', $data );
		$this->load->view ( 'templates/footer', $data );
		
	}
	
}
?>