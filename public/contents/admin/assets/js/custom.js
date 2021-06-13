
$(document).ready(function(){
    //modal js
    $(document).on("click", "#softDelete", function () {
        var deleteID = $(this).data('id');
        $(".modal-body #modal_id").val( deleteID );
    });

//data table
    $('#dataTable_c').DataTable({
		"paging": true,
		"lengthChange": true,
		"searching": true,
		"ordering": true,
		"order": [[ 0, "desc" ]],
		"info": false,
		"autoWidth": false
	});

	$('#dataTable_s').DataTable({
		"paging": false,
		"lengthChange": false,
		"searching": false,
		"ordering": true,
		"order": [[ 0, "desc" ]],
		"info": false,
		"autoWidth": false,

	});
	$('#dataTable_R').DataTable({
		"paging": true,
		"lengthChange": false,
		"searching": true,
		"ordering": true,
		"order": [[ 0, "desc" ]],
		"info": false,
		"autoWidth": false,

	});

});


//Datepicker setting code start
$(function(){
	$('#income_date').datepicker({
	   autoclose: true,
	   format: 'yyyy-mm-dd',
	   todayHighlight: true
   });

   $('#datepickerForm').datepicker({
	   autoclose: true,
	   format: 'yyyy-mm-dd',
	   todayHighlight: true
   });

   $('#datepickerTo').datepicker({
	   autoclose: true,
	   format: 'yyyy-mm-dd',
	   todayHighlight: true
   });

   $('#datepicker_one').datepicker({
	   autoclose: true,
	   format: 'yyyy-mm-dd',
	   todayHighlight: true
   });

   $('#datepicker_two').datepicker({
	   autoclose: true,
	   format: 'yyyy-mm-dd',
	   todayHighlight: true
   });

   $('.datepicker_date').datepicker({
	   autoclose: true,
	   format: 'yyyy-mm-dd',
	   todayHighlight: true
   });

   $('.datepicker_redate').datepicker({
	   autoclose: true,
	   format: 'yyyy-mm-dd',
	   todayHighlight: true
   });
});

//Image Upload Script
$(document).ready(function () {
    $(document).on('change', '.btn-file :file', function () {
        var input = $(this),
                label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [label]);
    });

    $('.btn-file :file').on('fileselect', function (event, label) {

        var input = $(this).parents('.input-group').find(':text'),
                log = label;

        if (input.length) {
            input.val(log);
        } else {
            if (log)
                alert(log);
        }

    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img-upload').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function () {
        readURL(this);
    });

});
