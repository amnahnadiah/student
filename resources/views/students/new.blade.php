<span id="ntah" >no value </span>
<input type="text" class="nothing" value="">
<input type="text" class="nothing" value="">
<button class="submit">submit</button>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
	
	$(document).on('click','.submit',function(){
		var txbox=$('#nothing').val();
		$('#ntah').html(txbox);
	});

	$(document).on('click','.ssdsadfs',function(){
		console.log('robi');
		$('#nothing').val('asa');
	});

	$(document).on('keyup','.nothing',function(){
	 	var txbox=$(this).val();
		$('#ntah').html(txbox);
	});
</script>
  