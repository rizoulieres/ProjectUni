
var lundi = document.getElementById('lundiJs').value;
var mardi = document.getElementById('mardiJs').value;
var mercredi = document.getElementById('mercrediJs').value;
var jeudi = document.getElementById('jeudiJs').value;
var vendredi = document.getElementById('vendrediJs').value;
var samedi = document.getElementById('samediJs').value;
var dimanche = document.getElementById('dimancheJs').value;
var date = document.querySelector('[type=date]');

function noMondays(e){

	var day = new Date( e.target.value ).getUTCDay();

	// Days in JS range from 0-6 where 0 is Sunday and 6 is Saturday

	if( day == 1 && lundi==0){

		e.target.setCustomValidity("Le professeur n'est pas disponible le lundi");

	}else if( day == 2 && mardi==0){

		e.target.setCustomValidity("Le professeur n'est pas disponible le mardi");

	}else if( day == 3 && mercredi==0){

		e.target.setCustomValidity("Le professeur n'est pas disponible le mercredi");

	}else if( day == 4 && jeudi==0){

		e.target.setCustomValidity("Le professeur n'est pas disponible le jeudi");

	}else if( day == 5 && vendredi==0){

		e.target.setCustomValidity("Le professeur n'est pas disponible le vendredi");

	}else if( day == 6 && samedi==0){

		e.target.setCustomValidity("Le professeur n'est pas disponible le samedi");

	}else if( day == 0 && dimanche==0){

		e.target.setCustomValidity("Le professeur n'est pas disponible le dimanche");

	} else {

		e.target.setCustomValidity('');

	}

}

date.addEventListener('input',noMondays);
