var actualPosition;

$(document).ready(function() {

	navigator.geolocation.getCurrentPosition(onSuccess, onError);

});

// onSuccess Geolocation
function onSuccess(position) {
	actualPosition = position.coords;
}

function getPosition() {
	return actualPosition;
}

// onError Callback receives a PositionError object
function onError(error) {
	alert('code: ' + error.code + '\n' + 'message: ' + error.message + '\n');
}

function loadRequestPosAtual() {
	var pos = getPosition();
	$.ajax({
		url : 'http://imovelaqui.co.cc/ModuloWeb/boundary/ModuloWebBoundary.action.php',
		type : 'post',
		data : {
			pesquisa : 'posicaoAtual',
			latitude : pos.latitude,
			longitude : pos.longitude,
			// latitude: "-22.237233",
			// longitude: "-45.9544205",
			distancia : $('#distancia').val()
		},
		dataType : 'json',
		// This method called when ajax request is succeful.
		success : function(jsonResponse) {
			var listContainer = $('#listView');
			listContainer.empty();
	
			var list = new Array();
			var html = "";
	
			$.each(jsonResponse, function(i, objJsonResponse) {
				list[i] = $('<li class="ui-li ui-li-static ui-btn-up-c"></li>');
	
				html += objJsonResponse.imovel_tipo;
				html += ": "
						+ objJsonResponse.contrato_tipo;
				html += " - "
						+ objJsonResponse.endereco;
				html += ", " + objJsonResponse.numero;
	
				$(listContainer).append(
						$(list[i]).html(html));
				html = "";
			});
	
		},
		// This method is called case request fail.
		error : function(xhr, err) {
			alert("readyState: " + xhr.readyState + "\nstatus: "
					+ xhr.status);
			alert("responseText: " + xhr.responseText);
		},
		// This method run before send ajax request.
		beforeSend : function() {
			$.mobile.loading( 'show', {
				text: "Carregando",
				textonly: true,
			});
		},
		// This method run when complete ajax request.
		complete : function() {
			$.mobile.changePage("#resultPage", {
				transition : "slide"
			});

			$.mobile.loading( 'hide' );
		}
	});
}

function loadRequestPosEsp() {
	$.ajax({
		url : 'http://imovelaqui.co.cc/ModuloWeb/boundary/ModuloWebBoundary.action.php',
		type : 'post',
		data : {
			pesquisa : 'locEspecifica',
			cidade : $("#cidade").val(),
			bairro : $("#bairro").val(),
			rua : $("#rua").val()
		},
		dataType : 'json',
		// This method called when ajax request is succeful.
		success : function(jsonResponse) {
			var listContainer = $('#listView');
			listContainer.empty();

			var list = new Array();
			var html = "";

			$.each(jsonResponse, function(i, objJsonResponse) {
				list[i] = $('<li class="ui-li ui-li-static ui-btn-up-c"></li>');

				html += objJsonResponse.imovel_tipo;
				html += ": "
						+ objJsonResponse.contrato_tipo;
				html += " - "
						+ objJsonResponse.endereco;
				html += ", " + objJsonResponse.numero;

				$(listContainer).append(
						$(list[i]).html(html));
				html = "";
			});

		},
		// This method is called case request fail.
		error : function(xhr, err) {
			alert("readyState: " + xhr.readyState + "\nstatus: "
					+ xhr.status);
			alert("responseText: " + xhr.responseText);
		},
		// This method run before send ajax request.
		beforeSend : function() {
			$.mobile.loading( 'show', {
				text: "Carregando",
				textonly: true,
			});
		},
		// This method run when complete ajax request.
		complete : function() {
			$.mobile.changePage("#resultPage", {
				transition : "slide"
			});

			$.mobile.loading( 'hide' );
		}
	});
}