<?php
	//Chave do site
	$key ="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiIsImtpZCI6IjI4YTMxOGY3LTAwMDAtYTFlYi03ZmExLTJjNzQzM2M2Y2NhNSJ9.eyJpc3MiOiJzdXBlcmNlbGwiLCJhdWQiOiJzdXBlcmNlbGw6Z2FtZWFwaSIsImp0aSI6ImJmNGNkYTEwLWI0MTctNDhjNS1iYzVlLTI2YTk4YTM1ODliNyIsImlhdCI6MTQ3NTA2NTY4Nywic3ViIjoiZGV2ZWxvcGVyLzZmMTNlNTAwLWM0NzctMTM5MS1mNTI2LTgwZjFjNmU0ZjYyOSIsInNjb3BlcyI6WyJjbGFzaCJdLCJsaW1pdHMiOlt7InRpZXIiOiJkZXZlbG9wZXIvc2lsdmVyIiwidHlwZSI6InRocm90dGxpbmcifSx7ImNpZHJzIjpbIjE5Mi45OS42OC45Il0sInR5cGUiOiJjbGllbnQifV19.tGHI6aHDqyD1HBITE0rob95o77OdELzvK6In70Sjd4aBDGbzYQN2iDX6flD6C089704s4oXZamLhFLKQtw_WUg";

	$tag = htmlspecialchars($_REQUEST['tag']);
	$lista_guerras = json_decode(exec("curl -X GET --header 'Accept: application/json' --header \"authorization: Bearer $key\" 'https://api.clashofclans.com/v1/clans/%23$tag/warlog?limit=15'"));

	$clan_info = json_decode(exec("curl -X GET --header 'Accept: application/json' --header \"authorization: Bearer $key\" 'https://api.clashofclans.com/v1/clans/%23$tag'"));

	$total_guerras = intval($clan_info->warWins) + intval($clan_info->warTies) + intval($clan_info->warLosses);

	$url = "http://clans.clashofclans-experts.com.br/guerras.php?tag=". substr($clan->tag, 1);
	$titulo = "$clan_info->name - Histórico de guerras - Clash of Clans Experts";
	$descricao = "Veja o histórico de guerras do clã $clan_info->name";
	$imagem = $clan_info->badgeUrls->large;

	include("header.php");
?>
	<main>
		<div class="info-clan-container">
			<div class="flag-container">
				<figure>
					<img class="flag" src="<?= $clan_info->badgeUrls->medium ?>" alt="Bandeira do Clã">
				</figure>
				<h1 class="clan-name"><?= $clan_info->name ?></h1>
				<div class="level-clan">Nível: <?= $clan_info->clanLevel ?></div>
			</div>
		</div>
		<div class="conteudo">
			<section class="guerras">				
				<h1>Estatísticas de Guerras</h1>
				<div class="dados-gerais">
					<div class="dados-detalhe ">
						<div class="titulo vitorias">Vitórias</div>
						<?= $clan_info->warWins ?>
					</div>
					<div class="dados-detalhe ">
						<div class="titulo derrotas">Derrotas</div>
						<?= $clan_info->warLosses ?>
					</div>
					<div class="dados-detalhe">
						<div class="titulo">Empates</div>
						<?= $clan_info->warTies ?>
					</div>
					<div class="dados-detalhe">
						<div class="titulo total">Total</div>
						<?= $total_guerras ?>
					</div>
				</div>
				<h3>Últimas 15 Guerras</h3>
				<?php foreach ($lista_guerras->items as $guerra): ?>
					<?php if($guerra->result == "lose"): ?>
						<div class="item-guerra bg-danger">
					<?php else :?>
						<div class="item-guerra bg-success">
					<?php endif;?>
							
								<div class="nivel-oponente">Nível: <?= $guerra->opponent->clanLevel ?></div>
								<div class="nome-oponente"><?= $guerra->opponent->name ?></div>
								<div class="tamanho-time">
									<?= $guerra->teamSize ?>x<?= $guerra->teamSize ?>
								</div>
								<div class="bandeiras">
									<span class="total-porcento"><?= number_format($guerra->clan->destructionPercentage, 2) ?>% </span>
									<span class="total-estrelas"><?= $guerra->clan->stars ?> </span>
									<img class="estrela display-inline" src="img/estrela.png" alt="">
									<img class="display-inline" src="<?= $clan_info->badgeUrls->small ?>" alt="">x<img class="display-inline" src="<?= $guerra->opponent->badgeUrls->small ?>" alt="">
									<img class="estrela display-inline" src="img/estrela.png" alt="">
									<span class="total-estrelas"> <?= $guerra->opponent->stars ?></span>
									<span class="total-porcento"><?= number_format($guerra->opponent->destructionPercentage, 2) ?>% </span>
								</div>
						</div>
				<?php endforeach; ?>
			</section>
		</div>

		<div class="row">
			<div class="ads">
				<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
				<!-- busca clans 1 -->
				<ins class="adsbygoogle"
				     style="display:block"
				     data-ad-client="ca-pub-1527561757591074"
				     data-ad-slot="7308847349"
				     data-ad-format="auto"></ins>
				<script>
				(adsbygoogle = window.adsbygoogle || []).push({});
				</script>
			</div>
		</div>
		
	</main>
	<div class="container-rodape">
<footer class="rodape">
	Copyright &copy <?= date("Y"); ?> | Desenvolvido por <a href="http://www.clashofclans-experts.com.br" title="" target="_blank">@Clash Experts</a>
	<div class="fb-share-button" 
		data-href="http://clans.clashofclans-experts.com.br" 
		data-layout="button" data-size="small">
	</div>
</footer>
</div>
<script src="js/jquery.js"></script>
	<script src="js/tether.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script>
		
		var aposCarregar = function(){
			
		}
		$(aposCarregar);
	</script>
</body>
</html>
