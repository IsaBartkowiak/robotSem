function page (page) {
$( '#site' ).load( ''+page+'.php', function(){$('#wait').fadeOut(); $('#content').addClass(''+pag+'-bg').fadeIn(1200);});
}