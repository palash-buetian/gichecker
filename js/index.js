


$(document).ready(function () {
	
	
	const choices = new Choices('[data-trigger]',
		{
			searchEnabled: true,
			itemSelectText: '',
			items: [],
			choices: [],
			renderChoiceLimit: -1,
			maxItemCount: -1,
			addItems: true,
			addItemFilter: null,
			removeItems: true,
			removeItemButton: false,
			editItems: false,
			allowHTML: true,
			duplicateItemsAllowed: true,
			delimiter: ',',
			paste: true,
			searchEnabled: true,
			searchChoices: true,
			searchFloor: 1,
			searchResultLimit: 4,
			searchFields: ['label', 'value'],
			position: 'auto',
			resetScrollPosition: true,
			shouldSort: false,
			shouldSortItems: false,
		});


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

	$("#search").keyup( function()
	{

		var searchQuery = $("#search").val();

		var bangla = replaceNumbers(searchQuery);
		//alert(bangla);
		$("#search").val(bangla);
	});



	$("#search").keyup( function() {
		var dag = $(this).val();
		var mouza = $('select').val()
		
		if (dag != "") {
			$.ajax({
				url: 'ajax.php',
				method: 'POST',
				async: false,
				cache: true,
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
	
	

	//delete data





	
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