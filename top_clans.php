<?php 
$url = "http://clans.clashofclans-experts.com.br/top_clans.php";
$titulo = "Melhores Clans - Clash of Clans Experts";
$descricao = "Veja o rank dos melhores clans de Clash of Clans.";

include("header.php"); ?>
<main>
	<section>
		<div class="search-top">
			<h1 class="search-title">Top Clãs</h1>
			<p class="search-text">Confira o rank dos melhores clãs do Brasil e do mundo em Clash of Clans </p>
		</div>
		<div class="search-container">
			<form id="top-clans-form">
				<input type="hidden" name="tipo" value="top-clans">
				<div class="form-container">
					<select name="locationId" id="location" class="form-field">
						<option value="32000038" selected>Brasil</option>
						<option value="global">Global</option>
					</select>
				</div>
			</form>
		</div>
	</section>
	<section >
		<div class="result-clans"></div>
	</section>
</main>

<footer class="rodape">
	Copyright &copy <?= date("Y"); ?> | Desenvolvido por <a href="http://www.clashofclans-experts.com.br" title="" target="_blank">@Clash Experts</a>
	<div class="fb-share-button" data-href="http://clans.clashofclans-experts.com.br" data-layout="button" data-size="small">
</footer>
<script src="js/jquery.js"></script>
<script src="js/tether.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/top_clans-min.js"></script>
	
</body>
</html>
