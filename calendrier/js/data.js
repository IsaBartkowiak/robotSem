var codropsEvents = {};



jQuery.extend({
				getValues: function(url) {
				    var result = null;
				    var result = new Object();
				    $.ajax({
				        url: url,
				        type: 'get',
				        dataType: 'json',
				        async: false,
				        success: function(data) {
				            result = JSON.stringify(data);
							result = JSON.parse(result);
				        }
				    });
				   return result;
				}
});




var testData = $.getValues("getSeminaire.php");
			
			testData.forEach(function(entry) {
		
			date = entry.date;
			imglab= entry.cdlab;	

			console.log(date);
			//codropsEvents[date] = '<a href="http://www.wincalendar.com/Great-American-Smokeout">tesssssssst</a>';


			if(typeof codropsEvents[date] == 'undefined') {
			   codropsEvents[date] = '<span><h2>'+entry.titre+'</h2><p>'+entry.orateur+'</p><p>'+entry.lieu+'</p>';
			}
			else {

				
				codropsEvents[date] += '<span><h2>'+entry.titre+'</h2><p>'+entry.orateur+'</p><p>'+entry.lieu+'</p>';
			
				
			   	
			  
			}

			if (entry.labo != 'none'){

				codropsEvents[date] += '<img src="images/logo-'+entry.labo+'.png"/>';
			}

			if (entry.lien != 'none'){

				codropsEvents[date] += '<a href="'+entry.lien+'">Plus de détails</a>';

			}

			codropsEvents[date] += '</span>';


				
			
			console.log(codropsEvents);


			    			
			
			});






				









