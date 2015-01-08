<div id="popupn">
<span id="close">X</span>
<form>

</form>
</div>
<script>
$('#nl').click(function(){
	$('#popupn').load('index.php?page=newsletter', {
     email : $("#email").val()
});
});
$('#close').click(function(){
$('#pop-contact').fadeOut();
});
</script>