$(document).ready(function () {
	$("#mouja_id").select2();
	$("#interest_id").select2();
	
	const toEn = n => n.replace(/[০-৯]/g, d => "০১২৩৪৫৬৭৮৯".indexOf(d));

	// for edit and add page input fields except comments section
	$("form#add_edit :input").not("#comments").each(function(){
		var input = $(this); // This is the jquery object of the input, do what you will

		$(input).keyup( function()
		{
			var searchQuery = $(input).val();
			var bangla = toEn(searchQuery);
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
		$("#bs_land_amount").attr("type","number");
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


	});

// mouja add/edit page
	$("#bs_jl_unpublished").on("change",function(){

		if(this.checked) {
			$("#bs_jl").attr("readonly","readonly");
			$("#bs_jl").val("");
		}else{

			$("#bs_jl").removeAttr("readonly");
			$("#bs_jl").attr("required","required");
		}


	});

	$("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
		$("#success-alert").slideUp(500);
	});


});