$(document).ready(function(){
	
	$('input[type="button"]').click(function(){
		
		var element = $(this);
		
		doAction();
		changeBackground(element);
		
	});
	
	function doAction() {
		register();
	}
	
	function register() {

		$.post(apiURL, { action: "register_move", gameId: gameId, playerId: playerId }).done(function(data) {
			
			if (data === 'NOT_YOUR_MOVE') {
				changeMessage("Wait, it's not your turn yet!");
				return;
			} 
			
			if (data === 'OUT_OF_MOVES') {
				changeMessage('Game ended!');
				disableBoard();
				return;
			}			
			
			if (data === 'EXCEPTION') {
				changeMessage('Ops, we found an error and will need to restart the game, click <a href="' + baseURL + 'game/start">here</a>!');
				return;
			}
			
			changeMessage("Let's wait the other player turn");
			
		});	

	}
	
	function changeBackground(element) {
		
		var playerIcon = 'cross';
		if (playerId === 'PLAYER_2') {
			playerIcon = 'circle';
		}

		$(element).addClass(playerIcon).prop("disabled",true);
		
	}
	
	function disableBoard() {
		$('input[type="button"]').prop("disabled",true);
	}
	
	function changeMessage(message) {
		$(".end > h3").html(message);
	}
	
});