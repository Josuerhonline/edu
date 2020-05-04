	function valores(){
		document.getElementById('preg2').style.display = 'block';
		var pregunta1 = document.getElementById("pregunta1").value;

		var pregunta2 = document.getElementById("pregunta2").value;

		var pregunta3 = document.getElementById("pregunta3").value;

		var pregunta4 = document.getElementById("pregunta4").value;

		var pregunta5 = document.getElementById("pregunta5").value;

		var pregunta6 = document.getElementById("pregunta6").value;

		var pregunta7 = document.getElementById("pregunta7").value;

		var pregunta8 = document.getElementById("pregunta8").value;

		var pregunta9 = document.getElementById("pregunta9").value;

		var pregunta10 = document.getElementById("pregunta10").value;

		if(pregunta1 == pregunta2){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 2',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta1").val('0');
			
		}
		else if(pregunta1 == pregunta3){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 3',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta3").val('0');
		}
		else if(pregunta1 == pregunta4){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 4',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta4").val('0');
		}
		else if(pregunta1 == pregunta5){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 5',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta5").val('0');
		}
		else if(pregunta1 == pregunta6){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 6',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta6").val('0');
		}
		else if(pregunta1 == pregunta7){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 7',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta7").val('0');
		}
		else if(pregunta1 == pregunta8){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 8',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta8").val('0');
		}
		else if(pregunta1 == pregunta9){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 9',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta9").val('0');
		}
		else if(pregunta1 == pregunta10){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 10',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta10").val('0');


		}else{
			document.getElementById("pregunta_1").value = pregunta1;
			document.getElementById("pregunta_2").value = pregunta2;
			document.getElementById("pregunta_3").value = pregunta3;
			document.getElementById("pregunta_4").value = pregunta4;
			document.getElementById("pregunta_5").value = pregunta5;
			document.getElementById("pregunta_6").value = pregunta6;
			document.getElementById("pregunta_7").value = pregunta7;
			document.getElementById("pregunta_8").value = pregunta8;
			document.getElementById("pregunta_9").value = pregunta9;
			document.getElementById("pregunta_10").value = pregunta10;


		}

	}
	function valores2(){

		document.getElementById('preg3').style.display = 'block';
		var pregunta1 = document.getElementById("pregunta1").value;

		var pregunta2 = document.getElementById("pregunta2").value;

		var pregunta3 = document.getElementById("pregunta3").value;

		var pregunta4 = document.getElementById("pregunta4").value;

		var pregunta5 = document.getElementById("pregunta5").value;

		var pregunta6 = document.getElementById("pregunta6").value;

		var pregunta7 = document.getElementById("pregunta7").value;

		var pregunta8 = document.getElementById("pregunta8").value;

		var pregunta9 = document.getElementById("pregunta9").value;

		var pregunta10 = document.getElementById("pregunta10").value;

		if(pregunta2 == pregunta1){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 1',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta1").val('0');

		}
		else if(pregunta2 == pregunta3){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 3',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta3").val('0');

		}
		else if(pregunta2 == pregunta4){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 4',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta4").val('0');
		}
		else if(pregunta2 == pregunta5){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 5',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta5").val('0');
		}
		else if(pregunta2 == pregunta6){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 6',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta6").val('0');
		}
		else if(pregunta2 == pregunta7){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 7',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta7").val('0');
		}
		else if(pregunta2 == pregunta8){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 8',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta8").val('0');
		}
		else if(pregunta2 == pregunta9){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 9',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta9").val('0');
		}
		else if(pregunta2 == pregunta10){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 10',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta10").val('0');


		}else{
			document.getElementById("pregunta_1").value = pregunta1;
			document.getElementById("pregunta_2").value = pregunta2;
			document.getElementById("pregunta_3").value = pregunta3;
			document.getElementById("pregunta_4").value = pregunta4;
			document.getElementById("pregunta_5").value = pregunta5;
			document.getElementById("pregunta_6").value = pregunta6;
			document.getElementById("pregunta_7").value = pregunta7;
			document.getElementById("pregunta_8").value = pregunta8;
			document.getElementById("pregunta_9").value = pregunta9;
			document.getElementById("pregunta_10").value = pregunta10;


		}


		

	}
	function valores3(){
		document.getElementById('preg4').style.display = 'block';
		var pregunta1 = document.getElementById("pregunta1").value;

		var pregunta2 = document.getElementById("pregunta2").value;

		var pregunta3 = document.getElementById("pregunta3").value;
		
		var pregunta4 = document.getElementById("pregunta4").value;

		var pregunta5 = document.getElementById("pregunta5").value;

		var pregunta6 = document.getElementById("pregunta6").value;

		var pregunta7 = document.getElementById("pregunta7").value;

		var pregunta8 = document.getElementById("pregunta8").value;

		var pregunta9 = document.getElementById("pregunta9").value;

		var pregunta10 = document.getElementById("pregunta10").value;

		if(pregunta3 == pregunta1){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 1',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta1").val('0');
		}
		else if(pregunta3 == pregunta2){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 2',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta3").val('0');

		}
		else if(pregunta3 == pregunta4){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 3',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta4").val('0');
		}
		else if(pregunta3 == pregunta5){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 5',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta5").val('0');
		}
		else if(pregunta3 == pregunta6){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 6',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta6").val('0');
		}
		else if(pregunta3 == pregunta7){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 7',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta7").val('0');
		}
		else if(pregunta3 == pregunta8){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 8',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta8").val('0');
		}
		else if(pregunta3 == pregunta9){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 9',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta9").val('0');
		}
		else if(pregunta3 == pregunta10){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 10',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta10").val('0');


		}else{
			document.getElementById("pregunta_1").value = pregunta1;
			document.getElementById("pregunta_2").value = pregunta2;
			document.getElementById("pregunta_3").value = pregunta3;
			document.getElementById("pregunta_4").value = pregunta4;
			document.getElementById("pregunta_5").value = pregunta5;
			document.getElementById("pregunta_6").value = pregunta6;
			document.getElementById("pregunta_7").value = pregunta7;
			document.getElementById("pregunta_8").value = pregunta8;
			document.getElementById("pregunta_9").value = pregunta9;
			document.getElementById("pregunta_10").value = pregunta10;


		}

	}
	function valores4(){
		document.getElementById('preg5').style.display = 'block';
		var pregunta1 = document.getElementById("pregunta1").value;

		var pregunta2 = document.getElementById("pregunta2").value;

		var pregunta3 = document.getElementById("pregunta3").value;
		
		var pregunta4 = document.getElementById("pregunta4").value;

		var pregunta5 = document.getElementById("pregunta5").value;

		var pregunta6 = document.getElementById("pregunta6").value;

		var pregunta7 = document.getElementById("pregunta7").value;

		var pregunta8 = document.getElementById("pregunta8").value;

		var pregunta9 = document.getElementById("pregunta9").value;

		var pregunta10 = document.getElementById("pregunta10").value;

		if(pregunta4 == pregunta1){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 1',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta1").val('0');

		}
		else if(pregunta4 == pregunta2){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 2',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta3").val('0');

		}
		else if(pregunta4 == pregunta3){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 3',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta4").val('0');
		}
		else if(pregunta4 == pregunta5){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 5',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta5").val('0');
		}
		else if(pregunta4 == pregunta6){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 6',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta6").val('0');
		}
		else if(pregunta4 == pregunta7){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 7',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta7").val('0');
		}
		else if(pregunta4 == pregunta8){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 8',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta8").val('0');
		}
		else if(pregunta4 == pregunta9){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 9',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta9").val('0');
		}
		else if(pregunta4 == pregunta10){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 10',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta10").val('0');


		}else{
			document.getElementById("pregunta_1").value = pregunta1;
			document.getElementById("pregunta_2").value = pregunta2;
			document.getElementById("pregunta_3").value = pregunta3;
			document.getElementById("pregunta_4").value = pregunta4;
			document.getElementById("pregunta_5").value = pregunta5;
			document.getElementById("pregunta_6").value = pregunta6;
			document.getElementById("pregunta_7").value = pregunta7;
			document.getElementById("pregunta_8").value = pregunta8;
			document.getElementById("pregunta_9").value = pregunta9;
			document.getElementById("pregunta_10").value = pregunta10;


		}

	}
	function valores5(){
		document.getElementById('preg6').style.display = 'block';
		var pregunta1 = document.getElementById("pregunta1").value;

		var pregunta2 = document.getElementById("pregunta2").value;

		var pregunta3 = document.getElementById("pregunta3").value;
		
		var pregunta4 = document.getElementById("pregunta4").value;

		var pregunta5 = document.getElementById("pregunta5").value;

		var pregunta6 = document.getElementById("pregunta6").value;

		var pregunta7 = document.getElementById("pregunta7").value;

		var pregunta8 = document.getElementById("pregunta8").value;

		var pregunta9 = document.getElementById("pregunta9").value;

		var pregunta10 = document.getElementById("pregunta10").value;

		if(pregunta5 == pregunta1){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 1',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta1").val('0');

		}
		else if(pregunta5 == pregunta2){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 2',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta3").val('0');

		}
		else if(pregunta5 == pregunta3){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 3',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta4").val('0');
		}
		else if(pregunta5 == pregunta4){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 4',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta5").val('0');
		}
		else if(pregunta5 == pregunta6){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 6',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta6").val('0');
		}
		else if(pregunta5 == pregunta7){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 7',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta7").val('0');
		}
		else if(pregunta5 == pregunta8){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 8',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta8").val('0');
		}
		else if(pregunta5 == pregunta9){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 9',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta9").val('0');
		}
		else if(pregunta5 == pregunta10){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 10',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta10").val('0');


		}else{
			document.getElementById("pregunta_1").value = pregunta1;
			document.getElementById("pregunta_2").value = pregunta2;
			document.getElementById("pregunta_3").value = pregunta3;
			document.getElementById("pregunta_4").value = pregunta4;
			document.getElementById("pregunta_5").value = pregunta5;
			document.getElementById("pregunta_6").value = pregunta6;
			document.getElementById("pregunta_7").value = pregunta7;
			document.getElementById("pregunta_8").value = pregunta8;
			document.getElementById("pregunta_9").value = pregunta9;
			document.getElementById("pregunta_10").value = pregunta10;


		}

	}
	function valores6(){
		document.getElementById('preg7').style.display = 'block';
		var pregunta1 = document.getElementById("pregunta1").value;

		var pregunta2 = document.getElementById("pregunta2").value;

		var pregunta3 = document.getElementById("pregunta3").value;
		
		var pregunta4 = document.getElementById("pregunta4").value;

		var pregunta5 = document.getElementById("pregunta5").value;

		var pregunta6 = document.getElementById("pregunta6").value;

		var pregunta7 = document.getElementById("pregunta7").value;

		var pregunta8 = document.getElementById("pregunta8").value;

		var pregunta9 = document.getElementById("pregunta9").value;

		var pregunta10 = document.getElementById("pregunta10").value;

		if(pregunta6 == pregunta1){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 1',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta1").val('0');

		}
		else if(pregunta6 == pregunta2){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 2',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta3").val('0');

		}
		else if(pregunta6 == pregunta3){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 3',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta4").val('0');
		}
		else if(pregunta6 == pregunta4){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 4',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta5").val('0');
		}
		else if(pregunta6 == pregunta5){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 5',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta6").val('0');
		}
		else if(pregunta6 == pregunta7){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 7',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta7").val('0');
		}
		else if(pregunta6 == pregunta8){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 8',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta8").val('0');
		}
		else if(pregunta6 == pregunta9){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 9',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta9").val('0');
		}
		else if(pregunta6 == pregunta10){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 10',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta10").val('0');


		}else{
			document.getElementById("pregunta_1").value = pregunta1;
			document.getElementById("pregunta_2").value = pregunta2;
			document.getElementById("pregunta_3").value = pregunta3;
			document.getElementById("pregunta_4").value = pregunta4;
			document.getElementById("pregunta_5").value = pregunta5;
			document.getElementById("pregunta_6").value = pregunta6;
			document.getElementById("pregunta_7").value = pregunta7;
			document.getElementById("pregunta_8").value = pregunta8;
			document.getElementById("pregunta_9").value = pregunta9;
			document.getElementById("pregunta_10").value = pregunta10;


		}

	}
	function valores7(){
		document.getElementById('preg8').style.display = 'block';
		var pregunta1 = document.getElementById("pregunta1").value;

		var pregunta2 = document.getElementById("pregunta2").value;

		var pregunta3 = document.getElementById("pregunta3").value;
		
		var pregunta4 = document.getElementById("pregunta4").value;

		var pregunta5 = document.getElementById("pregunta5").value;

		var pregunta6 = document.getElementById("pregunta6").value;

		var pregunta7 = document.getElementById("pregunta7").value;

		var pregunta8 = document.getElementById("pregunta8").value;

		var pregunta9 = document.getElementById("pregunta9").value;

		var pregunta10 = document.getElementById("pregunta10").value;

		if(pregunta7 == pregunta1){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 1',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta1").val('0');

		}
		else if(pregunta7 == pregunta2){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 2',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta3").val('0');

		}
		else if(pregunta7 == pregunta3){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 3',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta4").val('0');
		}
		else if(pregunta7 == pregunta4){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 4',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta5").val('0');
		}
		else if(pregunta7 == pregunta5){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 5',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta6").val('0');
		}
		else if(pregunta7 == pregunta6){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 6',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta7").val('0');
		}
		else if(pregunta7 == pregunta8){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 8',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta8").val('0');
		}
		else if(pregunta7 == pregunta9){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 9',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta9").val('0');
		}
		else if(pregunta7 == pregunta10){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 10',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta10").val('0');


		}else{
			document.getElementById("pregunta_1").value = pregunta1;
			document.getElementById("pregunta_2").value = pregunta2;
			document.getElementById("pregunta_3").value = pregunta3;
			document.getElementById("pregunta_4").value = pregunta4;
			document.getElementById("pregunta_5").value = pregunta5;
			document.getElementById("pregunta_6").value = pregunta6;
			document.getElementById("pregunta_7").value = pregunta7;
			document.getElementById("pregunta_8").value = pregunta8;
			document.getElementById("pregunta_9").value = pregunta9;
			document.getElementById("pregunta_10").value = pregunta10;


		}

	}
	function valores8(){
		document.getElementById('preg9').style.display = 'block';
		var pregunta1 = document.getElementById("pregunta1").value;

		var pregunta2 = document.getElementById("pregunta2").value;

		var pregunta3 = document.getElementById("pregunta3").value;
		
		var pregunta4 = document.getElementById("pregunta4").value;

		var pregunta5 = document.getElementById("pregunta5").value;

		var pregunta6 = document.getElementById("pregunta6").value;

		var pregunta7 = document.getElementById("pregunta7").value;

		var pregunta8 = document.getElementById("pregunta8").value;

		var pregunta9 = document.getElementById("pregunta9").value;

		var pregunta10 = document.getElementById("pregunta10").value;

		if(pregunta8 == pregunta1){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 1',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta1").val('0');

		}
		else if(pregunta8 == pregunta2){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 2',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta3").val('0');

		}
		else if(pregunta8 == pregunta3){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 3',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta4").val('0');
		}
		else if(pregunta8 == pregunta4){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 4',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta5").val('0');
		}
		else if(pregunta8 == pregunta5){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 5',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta6").val('0');
		}
		else if(pregunta8 == pregunta6){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 6',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta7").val('0');
		}
		else if(pregunta8 == pregunta7){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 7',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta8").val('0');
		}
		else if(pregunta8 == pregunta9){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 9',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta9").val('0');
		}
		else if(pregunta8 == pregunta10){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 10',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark',addclass: 'dark'
			});
			document.getElementById("pregunta10").val('0');


		}else{
			document.getElementById("pregunta_1").value = pregunta1;
			document.getElementById("pregunta_2").value = pregunta2;
			document.getElementById("pregunta_3").value = pregunta3;
			document.getElementById("pregunta_4").value = pregunta4;
			document.getElementById("pregunta_5").value = pregunta5;
			document.getElementById("pregunta_6").value = pregunta6;
			document.getElementById("pregunta_7").value = pregunta7;
			document.getElementById("pregunta_8").value = pregunta8;
			document.getElementById("pregunta_9").value = pregunta9;
			document.getElementById("pregunta_10").value = pregunta10;


		}

	}
	function valores9(){
		document.getElementById('preg10').style.display = 'block';
		var pregunta1 = document.getElementById("pregunta1").value;

		var pregunta2 = document.getElementById("pregunta2").value;

		var pregunta3 = document.getElementById("pregunta3").value;
		
		var pregunta4 = document.getElementById("pregunta4").value;

		var pregunta5 = document.getElementById("pregunta5").value;

		var pregunta6 = document.getElementById("pregunta6").value;

		var pregunta7 = document.getElementById("pregunta7").value;

		var pregunta8 = document.getElementById("pregunta8").value;

		var pregunta9 = document.getElementById("pregunta9").value;

		var pregunta10 = document.getElementById("pregunta10").value;

		if(pregunta9 == pregunta1){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 1',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta1").val('0');

		}
		else if(pregunta9 == pregunta2){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 2',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta3").val('0');

		}
		else if(pregunta9 == pregunta3){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 3',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta4").val('0');
		}
		else if(pregunta9 == pregunta4){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 4',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta5").val('0');
		}
		else if(pregunta9 == pregunta5){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 5',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta6").val('0');
		}
		else if(pregunta9 == pregunta6){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 6',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta7").val('0');
		}
		else if(pregunta9 == pregunta7){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 7',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta8").val('0');
		}
		else if(pregunta9 == pregunta8){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 8',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta9").val('0');
		}
		else if(pregunta8 == pregunta10){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 10',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta10").val('0');


		}else{
			document.getElementById("pregunta_1").value = pregunta1;
			document.getElementById("pregunta_2").value = pregunta2;
			document.getElementById("pregunta_3").value = pregunta3;
			document.getElementById("pregunta_4").value = pregunta4;
			document.getElementById("pregunta_5").value = pregunta5;
			document.getElementById("pregunta_6").value = pregunta6;
			document.getElementById("pregunta_7").value = pregunta7;
			document.getElementById("pregunta_8").value = pregunta8;
			document.getElementById("pregunta_9").value = pregunta9;
			document.getElementById("pregunta_10").value = pregunta10;


		}

	}
	function valores10(){
		var pregunta1 = document.getElementById("pregunta1").value;

		var pregunta2 = document.getElementById("pregunta2").value;

		var pregunta3 = document.getElementById("pregunta3").value;
		
		var pregunta4 = document.getElementById("pregunta4").value;

		var pregunta5 = document.getElementById("pregunta5").value;

		var pregunta6 = document.getElementById("pregunta6").value;

		var pregunta7 = document.getElementById("pregunta7").value;

		var pregunta8 = document.getElementById("pregunta8").value;

		var pregunta9 = document.getElementById("pregunta9").value;

		var pregunta10 = document.getElementById("pregunta10").value;

		if(pregunta10 == pregunta1){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 1',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta1").val('0');

		}
		else if(pregunta10 == pregunta2){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 2',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta3").val('0');
		}
		else if(pregunta10 == pregunta3){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 3',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta4").val('0');
		}
		else if(pregunta10 == pregunta4){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 4',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta5").val('0');
		}
		else if(pregunta10 == pregunta5){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 5',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta6").val('0');
		}
		else if(pregunta10 == pregunta6){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 6',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta7").val('0');
		}
		else if(pregunta10 == pregunta7){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 7',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta8").val('0');
		}
		else if(pregunta10 == pregunta8){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 8',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta9").val('0');
		}
		else if(pregunta10 == pregunta9){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Esta pregunta ya ha sido seleccionada en la pregunta 9',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("pregunta10").val('0');


		}else{
			document.getElementById("pregunta_1").value = pregunta1;
			document.getElementById("pregunta_2").value = pregunta2;
			document.getElementById("pregunta_3").value = pregunta3;
			document.getElementById("pregunta_4").value = pregunta4;
			document.getElementById("pregunta_5").value = pregunta5;
			document.getElementById("pregunta_6").value = pregunta6;
			document.getElementById("pregunta_7").value = pregunta7;
			document.getElementById("pregunta_8").value = pregunta8;
			document.getElementById("pregunta_9").value = pregunta9;
			document.getElementById("pregunta_10").value = pregunta10;


		}

	}
// <!-- Temas de capacitación -->
$(document).ready(function(){
	$('#pregunta1').val();
	recargarTema1();
	valores();

	$('#pregunta1').change(function(){
		recargarTema1();
	});
})


function recargarTema1(){
	$.ajax({
		type:"POST",
		url:"/CatalogosEvaluacion/SeleccionarPregunta/tema1",
		data:{'id1' : $('#pregunta1').val()},
		success:function(p){
			$('#tema1').html(p);
		}
	});
}



$(document).ready(function(){
	$('#pregunta2').val();
	recargarTema2();

	$('#pregunta2').change(function(){
		recargarTema2();
	});
})


function recargarTema2(){
	$.ajax({
		type:"POST",
		url:"/CatalogosEvaluacion/SeleccionarPregunta/tema2",
		data:"idTema2=" + $('#pregunta2').val(),
		success:function(p){
			$('#tema2').html(p);
		}
	});
}



$(document).ready(function(){
	$('#pregunta3').val();
	recargarTema3();

	$('#pregunta3').change(function(){
		recargarTema3();
	});
})


function recargarTema3(){
	$.ajax({
		type:"POST",
		url:"/CatalogosEvaluacion/SeleccionarPregunta/tema3",
		data:"idTema3=" + $('#pregunta3').val(),
		success:function(p){
			$('#tema3').html(p);
		}
	});
}



$(document).ready(function(){
	$('#pregunta4').val();
	recargarTema4();

	$('#pregunta4').change(function(){
		recargarTema4();
	});
})


function recargarTema4(){
	$.ajax({
		type:"POST",
		url:"/CatalogosEvaluacion/SeleccionarPregunta/tema4",
		data:"idTema4=" + $('#pregunta4').val(),
		success:function(p){
			$('#tema4').html(p);
		}
	});
}



$(document).ready(function(){
	$('#pregunta5').val();
	recargarTema5();

	$('#pregunta5').change(function(){
		recargarTema5();
	});
})


function recargarTema5(){
	$.ajax({
		type:"POST",
		url:"/CatalogosEvaluacion/SeleccionarPregunta/tema5",
		data:"idTema5=" + $('#pregunta5').val(),
		success:function(p){
			$('#tema5').html(p);
		}
	});
}


$(document).ready(function(){
	$('#pregunta6').val();
	recargarTema6();

	$('#pregunta6').change(function(){
		recargarTema6();
	});
})


function recargarTema6(){
	$.ajax({
		type:"POST",
		url:"/CatalogosEvaluacion/SeleccionarPregunta/tema6",
		data:"idTema6=" + $('#pregunta5').val(),
		success:function(p){
			$('#tema6').html(p);
		}
	});
}


$(document).ready(function(){
	$('#pregunta7').val();
	recargarTema7();

	$('#pregunta7').change(function(){
		recargarTema7();
	});
})


function recargarTema7(){
	$.ajax({
		type:"POST",
		url:"/CatalogosEvaluacion/SeleccionarPregunta/tema7",
		data:"idTema7=" + $('#pregunta7').val(),
		success:function(p){
			$('#tema7').html(p);
		}
	});
}


$(document).ready(function(){
	$('#pregunta8').val();
	recargarTema8();

	$('#pregunta8').change(function(){
		recargarTema8();
	});
})


function recargarTema8(){
	$.ajax({
		type:"POST",
		url:"/CatalogosEvaluacion/SeleccionarPregunta/tema8",
		data:"idTema8=" + $('#pregunta8').val(),
		success:function(p){
			$('#tema8').html(p);
		}
	});
}



$(document).ready(function(){
	$('#pregunta9').val();
	recargarTema9();


	$('#pregunta9').change(function(){
		recargarTema9();
	});
})


function recargarTema9(){
	$.ajax({
		type:"POST",
		url:"/CatalogosEvaluacion/SeleccionarPregunta/tema9",
		data:"idTema9=" + $('#pregunta9').val(),
		success:function(p){
			$('#tema9').html(p);
		}
	});
}


$(document).ready(function(){
	$('#pregunta10').val();
	recargarTema10();

	$('#pregunta10').change(function(){
		recargarTema10();
	});
})


function recargarTema10(){
	$.ajax({
		type:"POST",
		url:"/CatalogosEvaluacion/SeleccionarPregunta/tema10",
		data:"idTema10=" + $('#pregunta10').val(),
		success:function(p){
			$('#tema10').html(p);
		}
	});
}

// SELECT2
$(document).ready(function(){
	$('#area').select2();
});
$(document).ready(function(){
	$('#pregunta1').select2();

});
$(document).ready(function(){
	$('#pregunta2').select2();
});
$(document).ready(function(){
	$('#pregunta3').select2();
});
$(document).ready(function(){
	$('#pregunta4').select2();
});
$(document).ready(function(){
	$('#pregunta5').select2();
});
$(document).ready(function(){
	$('#pregunta6').select2();
});
$(document).ready(function(){
	$('#pregunta7').select2();
});
$(document).ready(function(){
	$('#pregunta8').select2();
});
$(document).ready(function(){
	$('#pregunta9').select2();
});
$(document).ready(function(){
	$('#pregunta10').select2();
});

$(document).ready(function(){
	$('#area_editar').select2();
});