var searchClans = function($type, $more){

	var dadosPost = {};
	if($type === "tag"){
		var tag = $("#tag-field").val();
		dadosPost = {tag: tag};
	} else {
		$("#tag-field").val("");
		dadosPost = $("#advanced-form").serialize();
		if($more !== undefined){
			var offset = $(".btn-load-more").val();
			dadosPost += "&after="+offset;
		}
	}

	var lista_clans = $(".result-clans");

    $.ajax({
        url: "busca_clans.php",
            type: "POST",
            data: dadosPost,
            dataType: "html",
            beforeSend: function(data){
            	if($more === "more"){
            		$(".more").remove().fadeOut("fast");
            		var icon = "<span class='col-xs-12 loading' style='padding: 1.5rem 0; text-align: center;'><i class='fa fa-spinner fa-pulse fa-2x fa-fw'></i> Buscando...<span>";
            		lista_clans.append(icon);
            	} else {
            		var icon = "<span class='col-xs-12 loading' style='padding: 1.5rem 0; text-align: center;'><i class='fa fa-spinner fa-pulse fa-2x fa-fw'></i> Buscando...<span>";
            		lista_clans.html(icon);
            	}
            	
            },
            success: function(data){
                if($more === "more"){
                	$(".loading").remove().fadeOut("fast");
            		lista_clans.append(data).fadeIn("fast");
            	} else {
            		lista_clans.html(data).fadeIn("fast");
            	}
            },
            error:function(){
                console.log("erro");
            }
    });

}

var aposCarregar = function(){
	$('.search-tabs a:first').tab('show');
	
	$('.search-tabs a').click(function (e) {		
		$('.search-tabs a').removeClass("active");
		$(this).tab('show');
	});

	$("#tag-form").submit(function(event){
		event.preventDefault();		
		searchClans("tag");
	});

	$("#advanced-form").submit(function(event){
		event.preventDefault();
		searchClans("advanced");
	});

	$(document).on("click", ".btn-load-more", function(event){
        searchClans("advanced", "more");
    });
	
}
$(aposCarregar);