<body>

	<script type="text/javascript">
		var baseURL = "<?=base_url();?>";
		var apiURL = "<?=api_url();?>";
		var playerId = "<?=getPlayerId();?>";
		var gameId = "<?=getGameId();?>";
	</script>

	<div class="tic-tac-toe">
	  
	  <div class="board">
	  		<div class="row">
	  			<input type="button" class="cell" id="1" />
	  			<input type="button" class="cell" id="2" />
	  			<input type="button" class="cell" id="3" />
	  		</div>
	  		
	  		<div class="row">
	  			<input type="button" class="cell" id="4" />
	  			<input type="button" class="cell" id="5" />
	  			<input type="button" class="cell" id="6" />
	  		</div>
	  		
	  		<div class="row">
	  			<input type="button" class="cell" id="7" />
	  			<input type="button" class="cell" id="8" />
	  			<input type="button" class="cell" id="9" />
	  		</div> 		  		
	  </div>
	  
	  <div class="end">
	    <h3></h3>
	    <h5><a href="<?=base_url();?>pages/restart">Restart</a></h5>
	  </div>
	  
	</div>

</body>