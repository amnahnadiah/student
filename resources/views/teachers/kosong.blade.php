<style>
#di, #de, .apepa, .submit {
  font-size: 30px;
}
</style>
<span id="de">No value</span>
<span id="di">🎠🐼🐣🐥</span>
<input type="text" class="apepa" value="">
<input type="text" class="apepa" value="">
<button class="submit">Submit</button>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    
    $(document).on('keyup','.apepa',function(){
        var txBoxVal=$(this).val();
        //var txBoxVal=$('.apepa').val();
        $('#de').html(txBoxVal);
    });

    $(document).on('click','.submit3',function(){
        var txBoxVal=$('#apepa').val();
        $('#de').html(txBoxVal);
    });

    $(document).on('click','.submit2',function(){
        alert('Hello World!');
        alert($('#apepa').val('apeape'));
        $('#apepa').val('apeape');
        $('#de').html('apeape');
        
    });
</script>