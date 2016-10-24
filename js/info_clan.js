var searchClansMembers = function(){

	
	dadosPost = {tag: $(".clan-tag").html().substring(1) };
    var lista_members = $(".result-players");

    $.ajax({
        url: "busca_players.php",
            type: "POST",
            data: dadosPost,
            dataType: "html",
            beforeSend: function(data){
                var icon = "<span class='col-xs-12 loading' style='padding: 1.5rem 0; text-align: center;'><i class='fa fa-spinner fa-pulse fa-2x fa-fw'></i> Buscando...<span>";
            	lista_members.html(icon);
            },
            success: function(data){
            	lista_members.html(data).fadeIn("fast");
            },
            error:function(){
                console.log("erro");
            }
    });

}

var aposCarregar = function(){
	
	
	$('.collapse').collapse();
    $('#result-players').on('hidden.bs.collapse', function () {
        searchClansMembers();
    })
}
$(aposCarregar);