


$(document).ready(function () {

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