<div id="popupn">
<span id="close">X</span>
<form>
	<label for="name">Email</label>
	<input name="mail" id="email" type="email" placeholder="votre@email.com"/>
	<span id="nl">Envoyer</span>
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