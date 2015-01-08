function page (page) {
$( '#site' ).load( ''+page+'.php', function(){$('#wait').fadeOut(); $('#content').addClass(''+pag+'-bg').fadeIn(1200);});
}
// affichage popup contact
$('#contact').click(function(){
$('#pop-contact').load('index.php?page=contact', function(){$('#pop-contact').fadeIn();});
});
// affichage popup newsletter
$('#newsletter').click(function(){
$('#pop-contact').load('index.php?page=newsletter', function(){$('#pop-contact').fadeIn();});
});