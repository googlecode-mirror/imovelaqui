Index = {
	
	init: function(){
		Index.setObserverTap();
	},
	
	onSuccess: function(position){
			var params = new Array();

			params = {
					pesquisa : 'posicaoAtual',
					latitude : position.coords.latitude,
					longitude : position.coords.longitude,
					distancia : $('#distancia').val()
			};

			Index.doSearch(params);
	},
	
	onError: function(){
		alert('code: ' + error.code + '\n' + 'message: ' + error.message + '\n');
	},
	
	setObserverTap: function(){
		var btnPosicaoAtual = document.getElementById('btnPosicaoAtual'),
				btnLocEspecifica = document.getElementById('btnLocEspecifica');
		
		btnPosicaoAtual.onclick = function(){

			navigator.geolocation.getCurrentPosition(Index.onSuccess, Index.onError);

		};
		
		btnLocEspecifica.onclick = function(){
			var params = new Array();

			params = {
					pesquisa : 'locEspecifica',
					cidade : $("#cidade").val(),
					bairro : $("#bairro").val(),
					rua : $("#rua").val()
			};

			Index.doSearch(params);
			
		};
		
	},
	
	doSearch: function(params) {
		$.ajax({
			url : 'http://imovelaqui.co.cc/ModuloWeb/boundary/ModuloWebBoundary.action.php',
			type : 'post',
			data : params,
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
				$('.loader').css({
					display : "block"
				});
			},
			// This method run when complete ajax request.
			complete : function() {
				$.mobile.changePage("#resultPage", {
					transition : "slide"
				});
				$('.loader').css({
					display : "none"
				});
			}
		});
	}

};
Index.init();