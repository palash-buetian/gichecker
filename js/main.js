


$(document).ready(function () {

	//convert bangla to eng


	var numbers = {
		'০': 0,
		'১': 1,
		'২': 2,
		'৩': 3,
		'৪': 4,
		'৫': 5,
		'৬': 6,
		'৭': 7,
		'৮': 8,
		'৯': 9
	};

	function replaceNumbers(input) {
		var output = [];
		for (var i = 0; i < input.length; ++i) {
			if (numbers.hasOwnProperty(input[i])) {
				output.push(numbers[input[i]]);
			} else {
				output.push(input[i]);
			}
		}
		return output.join('');
	}

	// for edit and add page input fields
	$("form#add_edit :input").each(function(){
		var input = $(this); // This is the jquery object of the input, do what you will

		$(input).keyup( function()
		{

			var searchQuery = $(input).val();

			var bangla = replaceNumbers(searchQuery);
			//alert(bangla);
			$(input).val(bangla);
		});

	});

	// for dashboard input fields
	$("form#dashboard :input").each(function(){
		var input = $(this); // This is the jquery object of the input, do what you will

		$(input).keyup( function()
		{

			var searchQuery = $(input).val();

			var bangla = replaceNumbers(searchQuery);
			//alert(bangla);
			$(input).val(bangla);
		});

	});



	//for default
	var bs_jl = $('#mouja_id option:selected').attr('bs_jl');

	if(bs_jl=='' || bs_jl=='0'){

		$("#sa_dag").attr("required","required");

		$("#bs_khatian").attr("readonly","readonly");
		$("#bs_khatian").val("");

		$("#bs_land_amount").attr("readonly","readonly");
		$("#bs_land_amount").val("");


		$("#bs_dag").attr("readonly", "readonly");
		$("#bs_dag").val("");

	}

	$("#add_edit").submit(function (e) {

	//	e.preventDefault();

		var sa_dag = $.trim($('#sa_dag').val());
		var bs_dag = $.trim($('#bs_dag').val());


		if (sa_dag  === '' && bs_dag ==='') {
			alert('এসএ অথবা বিএস দাগ দিন।');
			return false;
		}else return true
	});




	$("#mouja_id").on("change",function(){

		var bs_jl = $('#mouja_id option:selected').attr('bs_jl');

		if(bs_jl=='' || bs_jl=='0'){

			$("#sa_dag").attr("required","required");

			$("#bs_khatian").attr("readonly","readonly");
			$("#bs_khatian").val("");

			$("#bs_land_amount").attr("readonly","readonly");
			$("#bs_land_amount").val("");


			$("#bs_dag").attr("readonly", "readonly");
			$("#bs_dag").val("");

		}else{
			$("#bs_khatian").removeAttr("readonly");
			$("#bs_dag").removeAttr("readonly");
			$("#bs_land_amount").removeAttr("readonly");
		}


	// for both edit and add page


	});



	$("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
		$("#success-alert").slideUp(500);
	});


});