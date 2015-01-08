<div id="popupn">
<span id="close">X</span>
Merci, votre adresse e-mail <?php echo $mail; ?> a bien été ajoutée à notre liste.
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