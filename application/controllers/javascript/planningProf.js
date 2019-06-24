$( document ).ready(function() {
	var id = document.getElementById('id_prof').value;


});


document.addEventListener('DOMContentLoaded', function() {

	var id = document.getElementById('id_prof').value;

	$.ajax({
		// chargement du fichier externe monfichier-ajax.php
		url      : 'http://localhost/univshop/index.php/Cours/getAllRDVProf/'+id,
		dataType : "json",

		success  : function(data) {
			// Informe l'utilisateur que l'opération est terminé et renvoie le résultat

			var calendarEl = document.getElementById('calendar');
			var calendar = new FullCalendar.Calendar(calendarEl, {
				events: data,
				eventColor: '#42b6f4',   // an option!
				eventTextColor: 'black',
				eventBorderColor: 'black',// an option!
				plugins: [ 'timeGrid' ],
				defaultView: 'timeGridWeek',
				timeFormat: 'H(:mm)',
				minTime: '08:00:00',
				maxTime: '24:00:00',
				nowIndicator:'true',
				locale: 'fr'
			});


			calendar.render();
		},
		error    : function(request, error) { // Info Debuggage si erreur
			//alert(base+"index.php/AjaxGraph/getGraphYearRecap/"+id);
			alert("test");
		}
	});


});




