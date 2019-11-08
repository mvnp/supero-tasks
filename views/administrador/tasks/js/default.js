$(function(){

	let url = "https://palhocasites.com.br/supero/"

	//Datemask dd/mm/yyyy
	$('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })

	//Datemask2 mm/dd/yyyy
	$('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })

	//Money Euro
	$('[data-mask]').inputmask()

	//Date range picker with time picker
	$('#reservationtime').daterangepicker({ 
		timePicker: true, 
		timePickerIncrement: 30, 
		locale: { 
			daysOfWeek: [
				"Dom",
				"Seg",
				"Ter",
				"Qua",
				"Qui",
				"Sex",
				"Sáb"
			],
			monthNames: [
				"Janeiro",
				"Fevereiro",
				"Março",
				"Abril",
				"Maio",
				"Junho",
				"Julho",
				"Agosto",
				"Setembro",
				"Outubro",
				"Novembro",
				"Dezembro"
			],
			format: 'DD/MM/YYYY' 
			}
		})

	      $('#reservation').daterangepicker({ 
	        timePicker: true, 
	        timePickerIncrement: 30, 
	        locale: { 
	          daysOfWeek: [
	              "Dom",
	              "Seg",
	              "Ter",
	              "Qua",
	              "Qui",
	              "Sex",
	              "Sáb"
	          ],
	          monthNames: [
	              "Janeiro",
	              "Fevereiro",
	              "Março",
	              "Abril",
	              "Maio",
	              "Junho",
	              "Julho",
	              "Agosto",
	              "Setembro",
	              "Outubro",
	              "Novembro",
	              "Dezembro"
	          ],
	          format: 'DD/MM/YYYY' 
	        }
	      })	

		//Date range as a button
		$('#daterange-btn').daterangepicker(
		{
			ranges   : {
				'Today'       : [moment(), moment()],
				'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month'  : [moment().startOf('month'), moment().endOf('month')],
				'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
			},
			startDate: moment().subtract(29, 'days'),
			endDate  : moment()
		},
		function (start, end) {
			$('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
		}
	)

	//Date picker
	$('#datepicker, #datepicker_2').datepicker({
		autoclose: true,
		language: 'pt-BR',
		startDate: new Date()
	})

	//iCheck for checkbox and radio inputs
	$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
		checkboxClass: 'icheckbox_minimal-blue',
		radioClass   : 'iradio_minimal-blue'
	})
	//Red color scheme for iCheck
	$('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
		checkboxClass: 'icheckbox_minimal-red',
		radioClass   : 'iradio_minimal-red'
	})
	//Flat red color scheme for iCheck
	$('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
		checkboxClass: 'icheckbox_flat-green',
		radioClass   : 'iradio_flat-green'
	})

	//Colorpicker
	$('.my-colorpicker1').colorpicker()

	//color picker with addon
	$('.my-colorpicker2').colorpicker()

	//Timepicker
	$('.timepicker').timepicker({
		showInputs: false
	})	

	/**
	 * Implemented by Marcos Vinicius
	 * @return {[type]}[description]
	 */
	$(".acao").on('click', function(event) {
		event.preventDefault();
		/* Act on the event */
		let acao = $(this).data('acao');
		let idtask = $(this).data('task');

		if(
			acao !== undefined && acao !== "" &&
			idtask !== undefined && idtask !== ""
		){
			$.ajax({
				url: url+"tasks/managetask", type: 'POST', 
				dataType: 'json', data: {acao:acao, idtask:idtask},
				success: function(ret){
					let result = "#task_"+idtask

					$(result).alterClass("bg-*", "")

					$('[data-task="'+idtask+'"]')
						.removeClass("btn-success")
						.addClass("bg-primary")

					if(ret == 'NEW'){
						$(result).addClass("bg-new-mod")
						$(result).find('[data-task="'+idtask+'"][data-acao="'+acao+'"]').addClass('btn-success')
					}
					if(ret == 'WORK'){
						$(result).addClass("bg-white-mod")
						$(result).find('[data-task="'+idtask+'"][data-acao="'+acao+'"]').addClass('btn-success')
					}
					if(ret == 'WAITING'){
						$(result).addClass("bg-yellow-mod")
						$(result).find('[data-task="'+idtask+'"][data-acao="'+acao+'"]').addClass('btn-success')
					}
					if(ret == 'URGENT'){
						$(result).addClass("bg-red-mod")
						$(result).find('[data-task="'+idtask+'"][data-acao="'+acao+'"]').addClass('btn-success')
					}
					if(ret == 'FINISHED'){
						$(result).addClass("bg-green-mod")
						$(result).find('[data-task="'+idtask+'"][data-acao="'+acao+'"]').addClass('btn-success')
					}
				}
			})
		}
	});

	/**
	 * Delete a Specific Task
	 * @return {[type]} [description]
	 */
	$(".delete").on('click', function(event) {
		event.preventDefault();
		/* Act on the event */
		let idtask = $(this).data('task')
		let telement = $(this).data('telement')
		
		if(idtask !== undefined && idtask !== "")
		{
			$.ajax({
				url: url+"tasks/delspecifictask", type: 'POST',
				dataType: 'json', data: {idtask:idtask},
				success: function(ret){
					if(ret == true){
						$("#"+telement+"").css('display', 'none')
						$("*[data-itask='"+idtask+"']").css('display', 'none')
						return false
					}
				}
			});
		}
	});
})