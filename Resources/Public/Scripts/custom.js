$(document).ready(function() { 
	$(".table-sort").tablesorter(); 
	
	$('body').on('click','.addPosition',function () {
		var positionsIndex = $('.position').length+1;
		$('<div class="position well"><div class="row"><div class="col-sm-1"><h4>Position ' + positionsIndex + ':</h4></div><div class="col-sm-10"><input type="text" class="form-control" id="exampleInputAmount" placeholder="Titel der Position"></div><div class="col-sm-1 text-right"><button type="button" class="btn btn-danger removePosition"><i class="glyphicon glyphicon-trash"></i></button></div></div><button type="button" class="btn btn-success addPositionPoint"><i class="glyphicon glyphicon-plus-sign"></i> Positionpunkt hinzufügen</button></div>').appendTo('.positions');
	});
	
	$('body').on('click','.removePosition',function () {
		$(this).parents('.position').remove();
	});
	
	$('body').on('click','.addPositionPoint',function () {
		var positionsIndex = $(this).parent().index();
		var positionsPointIndex = $('.positionPoint').length+1;
		$(this).before($('<div class="positionPoint panel panel-default"><div class="panel-body"><h5>Positionspunkt ' + positionsPointIndex + ':</h5></div></div>'));
	});
	$('input.search').on('input',function() {
		if (!$(this).val() == '') {
			$('.searchclear').show();
		}
	});
	$('filterform').on('click','.searchclear',function () {
		clearsearch();
	});
	$('input.search').keypress(function(e) {
		if (e.keyCode == 27) {
			clearsearch();
		}
	});
});

function clearsearch() {
    $('input.search').val('');
    $('.searchclear').hide();
}