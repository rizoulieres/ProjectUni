
// Add the following code if you want the name of the file appear on select
$("#photo").on("change", function() {
	var fileName = $(this).val().split("\\").pop();
	$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});

function show1(){
	document.getElementById('dateRetour').style.display ='none';
	document.getElementById("btnValid").innerText= "Mettre en vente";
}
function show2(){
	document.getElementById('dateRetour').style.display = 'block';
	document.getElementById("btnValid").innerText= 'Mettre en prêt';
}
