<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );

class Games extends CI_Controller {

	var $data;
	
	function __construct(){
		parent::__construct();
		$this->data = array(
							
		);
	}	
	
	function start() {

		$this->load->library('session');
		$this->load->library('PHPRequests');
		$this->load->helper('game');
		
		$data = $this->data;
		
		if (empty($this->session->userdata('sessionId'))) {
			
			$gameId = generateRandomGameId();
			
			$postData = array(
					'action' => 'register',				
					'gameId' => $gameId
			);
			
			$response = Requests::post(api_url(), array(), $postData);
			
			if ($response->success) {
				
				$sessionData = array(
						'sessionId' => $gameId,
						'playerId' => 'PLAYER_1'
				);
				
				$this->session->set_userdata($sessionData);
			}
			
			print_r("You are: " . $this->session->userdata('playerId'));
			echo "<br/>";
			print_r("Game url: <a href='" . base_url() . 'pages/join/' . $this->session->userdata('sessionId') . "'>link</a>");
			
		} else {
			
			print_r("You are: " . $this->session->userdata('playerId'));
			echo "<br/>";
			print_r("Game url: <a href='" . base_url() . 'pages/join/' . $this->session->userdata('sessionId') . "'>link</a>");
			
		}
		
	}
	
	function restart() {
		
		$this->load->library('session');
		$this->load->library('PHPRequests');
		$this->load->helper('game');
		
		$data = $this->data;
		
		if (!empty($this->session->userdata('sessionId'))) {
			
			$postData = array(
					'action' => 'unregister',
					'gameId' => $this->session->userdata('sessionId')
			);
			
			$response = Requests::post(api_url(), array(), $postData);
			
			if ($response->success) {
				$this->session->sess_destroy();
			}
			
			redirect('/pages/start');
			
		} else {
			
			print_r("Nenhum jogo ativo! Clique aqui para iniciar um novo");
			
		}
	}
	
	function join() {
		
		$this->load->library('session');
		
		$gameId = $this->uri->rsegment(3);
		
		if (empty($this->session->userdata('sessionId'))) {
			
			$sessionData = array(
					'sessionId' => $gameId,
					'playerId' => 'PLAYER_2'
			);
			
			$this->session->set_userdata($sessionData);			

		}
			
		redirect('/pages/start');
		
	}
	
	function killall() {
		$this->load->library('session');
		$this->session->sess_destroy();
	}
	
	
}
?>