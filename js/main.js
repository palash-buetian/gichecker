function validateNumberAndForwardSlash(e) {
    var key = window.event ? event.keyCode : event.which;

  if (event.keyCode >= 48 && event.keyCode <= 57 || event.keyCode == 191) {
    return true;
  } else {
    return false;
  }
    
	
	
	

};


	

$(document).ready(function () {
	
	$("#submitBtn").click(function () {
		var dag = $('#search').val();
		var mouza = $('select').val()
		
		if (dag != "") {
			$.ajax({
				url: 'ajax.php',
				method: 'POST',
				data: {dag: dag, mouza: mouza},
				success: function (data) {
					
					$('#output').hide();
					$('#output').html(data);
					$('#output').slideDown(500);
					
					$("#search").focusout(function () {
						$('#output').css('display', 'block');
					});
					$("#search").focusin(function () {
						$('#output').css('display', 'block');
					});
				}
			});
		} else {
			$('#output').html('');
			$('#output').slideUp(500);
		}
	});
	
	
	$("#search").keyup(function () {
		var dag = $(this).val();
		var mouza = $('select').val()
		
		if (dag != "") {
			$.ajax({
				url: 'ajax.php',
				method: 'POST',
				data: {dag: dag, mouza: mouza},
				success: function (data) {
					
					$('#output').hide();
					$('#output').html(data);
					$('#output').slideDown(500);
					
					$("#search").focusout(function () {
						$('#output').css('display', 'block');
					});
					$("#search").focusin(function () {
						$('#output').css('display', 'block');
					});
				}
			});
		} else {
			$('#output').html('');
			$('#output').slideUp(500);
		}
	});

	//delete data


		$('a.delete').click(function (e) {
			e.preventDefault();
			var link = this;
			var deleteModal = $("#deleteDataModal");
			// open modal
			deleteModal.modal();
		});


	
	// on select change
	$('select').on('change', function () {
		var dag = $("#search").val();
		mouza = $('select').val()
		if (dag != "") {
			$.ajax({
				url: 'ajax.php',
				method: 'POST',
				data: {dag: dag, mouza: mouza},
				success: function (data) {
					
					$('#output').html(data);
					$('#output').slideDown(500);
					
					$("#search").focusout(function () {
						$('#output').slideDown(500);
					});
					$("#search").focusin(function () {
						$('#output').slideUp(500);
					});
				}
			});
		} else {
			$('#output').css('display', 'none');
		}
	});
	

	
});