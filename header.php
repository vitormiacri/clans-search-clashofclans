<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title><?= isset($titulo) ? $titulo : "Pesquisa de Clãs - Clash Experts"; ?>" /></title>
	<meta name="description" content="Pesquise qualquer clã por sua TAG ou faça uma busca avançada para encontrar o seu próximo clã!"/>
	<meta name="robots" content="noodp"/>
	<meta name="keywords" content="Clash of Clans, busca de clãs, clans, pesquisar clans, pesquisa de clan"/>
	<meta property="og:url"           content="<?= isset($url) ? $url : "http://clans.clashofclans-experts.com.br"; ?>" />
	<meta property="og:type"          content="website" />
	<meta property="og:title"         content="<?= isset($titulo) ? $titulo : "Pesquisa de Clãs - Clash Experts"; ?>" />
	<meta property="og:description"   content="<?= isset($descricao) ? $descricao : "Encontre e divulgue o seu clã para seus amigos ou procure um novo para participar! Acesse!"; ?>" />
	<meta property="og:image"         content="<?= isset($imagem) ? $imagem : "http://clans.clashofclans-experts.com.br/img/topo-site.jpeg"; ?>" />
	<meta property="og:image:width"       content="1200">
    <meta property="og:image:height"       content="1200">
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<script>
	  (adsbygoogle = window.adsbygoogle || []).push({
	    google_ad_client: "ca-pub-1527561757591074",
	    enable_page_level_ads: true
	  });
	</script>
</head>
<body>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-64569761-1', 'auto');
	  ga('send', 'pageview');

	</script>

	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.7";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
	</script>
	
	<nav >
		<div class="menu-top">
			<button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar2" aria-controls="exCollapsingNavbar2" aria-expanded="false" aria-label="Toggle navigation">&#9776;</button>
			<div class="collapse navbar-toggleable-xs" id="exCollapsingNavbar2">
				<ul class="lista-menu">
					<li class="menu-item">
						<a class="menu-link" href="index.php" title="O Clã">Busca de Clans</a>
					</li>
					<li class="menu-item">
						<a class="menu-link" href="top_clans.php" title="Membros">Top Clans</a>
					</li>
					<li class="menu-item">
						<a class="menu-link" href="top_players.php" title="Membros">Top Jogadores</a>
					</li>
					<li class="menu-item">
						<a class="menu-link" href="http://www.clashofclans-experts.com.br" target="_blank" title="Membros">Clash Experts</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
