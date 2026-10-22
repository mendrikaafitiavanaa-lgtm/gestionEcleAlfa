$(document).ready(function () {
	
	var ajoutenote = $('button');

	
	ajoutenote.on('click', function (e) {
		e.preventDefault();
		
		var numtri = $('#numtrimestre').val();
		var idmat = $('#idmatiere').val();

        // Ligne <tr> du bouton cliqué
		var ligne = $(this).closest("tr");

		// Récupération des données


		var matricule = ligne.find(".matricule").text().trim();
		var numeroclasse = ligne.find("td:eq(1) label").text().trim();
		var nomprenom = ligne.find("td:eq(2) label").text().trim();

		var noteds = ligne.find(".noteds").val();
		var notecahier = ligne.find(".notecahier").val();
		var notecomportement = ligne.find(".notecomportement").val();

		// console.log("Trimestre :", numtri);
		// console.log("Matiere :", idmat);
		// console.log("Matricule :", matricule);
		// console.log("Classe :", numeroclasse);
		// console.log("Nom :", nomprenom);
		// console.log("Note DS :", noteds);
		// console.log("Note Cahier :", notecahier);
		// console.log("Note Comportement :", notecomportement);
		
		$.post(
			//'../../assets/javascript/deten.php', 
			'insertionnote',
			{
				numtrimestre : numtri,
				idmatiere : idmat,
				matricule : matricule,
				noteds : noteds,				
                notecahier :  notecahier,
				notecomportement : notecomportement
				
			},
			function (data, status) {
				//$("#montant").html(data);
				//alert(data);
			},
			'html'
		);	

		ligne.find(".noteds, .notecahier, .notecomportement").prop("readonly", true);
		

		var $noteds = ligne.find(".noteds");
		$noteds.prop("readonly", true);

	});

	noteds = $('.noteds');
	noteds.on('blur', function (e) {
		e.preventDefault();	
	
		if($(this).val() < 0 || $(this).val() > 20){
			$(this).css({
				borderColor : 'red',
				color : 'red'
			});
		}
		else{
			$(this).css({
				borderColor : 'green',
				color : 'green'
			});	
		}
		
		
	});


	notecahier = $('.notecahier');
	notecahier.on('blur', function (e) {
		e.preventDefault();	
	
		if($(this).val() < 0 || $(this).val() > 20){
			$(this).css({
				borderColor : 'red',
				color : 'red'
			});
		}
		else{
			$(this).css({
				borderColor : 'green',
				color : 'green'
			});	
		}
		
		
	});


	notecahier = $('.notecahier');
	notecahier.on('blur', function (e) {
		e.preventDefault();	
	
		if($(this).val() < 0 || $(this).val() > 20){
			$(this).css({
				borderColor : 'red',
				color : 'red'
			});
		}
		else{
			$(this).css({
				borderColor : 'green',
				color : 'green'
			});	
		}
		
		
	});



	notecomportement = $('.notecomportement');
	notecomportement.on('blur', function (e) {
		e.preventDefault();	
	
		if($(this).val() < 0 || $(this).val() > 20){
			$(this).css({
				borderColor : 'red',
				color : 'red'
			});
		}
		else{
			$(this).css({
				borderColor : 'green',
				color : 'green'
			});	
		}
		
		
	});

	var modifienote = $('.modifier');
	modifienote.on('click', function (e) {
		e.preventDefault();	
		var ligne = $(this).closest("tr");

		ligne.find(".noteds, .notecahier, .notecomportement").prop("readonly", false);
		//alert("ok");
		
	});

});	