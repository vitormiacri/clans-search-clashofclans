
<?php
	//Chave do site
	$key ="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiIsImtpZCI6IjI4YTMxOGY3LTAwMDAtYTFlYi03ZmExLTJjNzQzM2M2Y2NhNSJ9.eyJpc3MiOiJzdXBlcmNlbGwiLCJhdWQiOiJzdXBlcmNlbGw6Z2FtZWFwaSIsImp0aSI6ImJmNGNkYTEwLWI0MTctNDhjNS1iYzVlLTI2YTk4YTM1ODliNyIsImlhdCI6MTQ3NTA2NTY4Nywic3ViIjoiZGV2ZWxvcGVyLzZmMTNlNTAwLWM0NzctMTM5MS1mNTI2LTgwZjFjNmU0ZjYyOSIsInNjb3BlcyI6WyJjbGFzaCJdLCJsaW1pdHMiOlt7InRpZXIiOiJkZXZlbG9wZXIvc2lsdmVyIiwidHlwZSI6InRocm90dGxpbmcifSx7ImNpZHJzIjpbIjE5Mi45OS42OC45Il0sInR5cGUiOiJjbGllbnQifV19.tGHI6aHDqyD1HBITE0rob95o77OdELzvK6In70Sjd4aBDGbzYQN2iDX6flD6C089704s4oXZamLhFLKQtw_WUg";

	//chave local
	//$key = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiIsImtpZCI6IjI4YTMxOGY3LTAwMDAtYTFlYi03ZmExLTJjNzQzM2M2Y2NhNSJ9.eyJpc3MiOiJzdXBlcmNlbGwiLCJhdWQiOiJzdXBlcmNlbGw6Z2FtZWFwaSIsImp0aSI6IjNjY2VlYmZkLTUzMTgtNDMzZC1hMGMxLTg4OTQwNWEwNGYyZSIsImlhdCI6MTQ3MTAwMDA4NSwic3ViIjoiZGV2ZWxvcGVyLzVmYTBhODQ3LWJjZDItMzIxZS1kZTljLTgzZDZhN2ZlYTZmZiIsInNjb3BlcyI6WyJjbGFzaCJdLCJsaW1pdHMiOlt7InRpZXIiOiJkZXZlbG9wZXIvc2lsdmVyIiwidHlwZSI6InRocm90dGxpbmcifSx7ImNpZHJzIjpbIjE4Ny4xMC42MS42Il0sInR5cGUiOiJjbGllbnQifV19.clyEBdreYuqPM0N1Tv4PbnFUMjv1nPY1f_ZwPjUFdZfAFWFCU8som5nEGzri_gJF8hh8F4DcbMMvY7n4CfCAIw";

	//$key = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiIsImtpZCI6IjI4YTMxOGY3LTAwMDAtYTFlYi03ZmExLTJjNzQzM2M2Y2NhNSJ9.eyJpc3MiOiJzdXBlcmNlbGwiLCJhdWQiOiJzdXBlcmNlbGw6Z2FtZWFwaSIsImp0aSI6IjkxY2I2OWVkLTVmNzktNGRkZC1iYWZkLTNhZGU1NzI5MGMzMiIsImlhdCI6MTQ3MDkyODEzMiwic3ViIjoiZGV2ZWxvcGVyLzVmYTBhODQ3LWJjZDItMzIxZS1kZTljLTgzZDZhN2ZlYTZmZiIsInNjb3BlcyI6WyJjbGFzaCJdLCJsaW1pdHMiOlt7InRpZXIiOiJkZXZlbG9wZXIvc2lsdmVyIiwidHlwZSI6InRocm90dGxpbmcifSx7ImNpZHJzIjpbIjIwMC4xOTIuMjQzLjUwIl0sInR5cGUiOiJjbGllbnQifV19.UaAggyMEkbPwU9xNOu_iQJDrWzoSkOjpP22dRmmAzyQXkp7mns0qCGYhq_ClRRV8yBk_abKN6BsqV5hiC8xtGw";

	$tag = htmlspecialchars($_REQUEST['tag']);
	
	if($tag !== ""){
		$url_clan = "https://api.clashofclans.com/v1/clans/%23$tag";		
	}	

	$clan = json_decode(exec("curl -X GET --header 'Accept: application/json' --header \"authorization: Bearer $key\" '$url_clan'"));
?>

<?php 
$url = "http://clans.clashofclans-experts.com.br/info_clan.php?tag=". substr($clan->tag, 1);
$titulo = "$clan->name - Clash Experts";
$descricao = "Veja este e muitos outros clãs de Clash of Clans!";
$imagem = $clan->badgeUrls->large;

include("header.php"); ?>

		<main>
			<section>
				<div class="info-clan-container">
					<div class="flag-container">
						<figure>
							<img class="flag" src="<?= $clan->badgeUrls->medium ?>" alt="Bandeira do Clã">
						</figure>
						<h1 class="clan-name"><?= $clan->name ?></h1>
						<div class="level-clan">Nível: <?= $clan->clanLevel ?></div>
						<div class="clan-tag-container"><span class="clan-tag"><?= $clan->tag ?></span></div>
					</div>
					<div class="description"><?= $clan->description ?></div>
					<div class="clan-details">
						<div class="container-detail clan-points">Pontos: <?= $clan->clanPoints ?></div>
						<?php if($clan->type === "inviteOnly"): ?>
							<div class="container-detail type">Somente Convidados</div>
						<?php elseif($clan->type === "closed"): ?>
							<div class="container-detail type">Fechado</div>
						<?php else: ?>
							<div class="container-detail type">Aberto a Todos</div>
						<?php endif; ?>
						
						<?php 
							$frequencia = "";
							if($clan->warFrequency == 'always')
								$frequencia = "Sempre";
							elseif ($clan->warFrequency == 'never')
								$frequencia = "nunca";
							elseif ($clan->warFrequency == 'any')
								$frequencia = "Qualquer";
							elseif ($clan->warFrequency == 'moreThanOncePerWeek')
								$frequencia = "2x por semana";
							elseif ($clan->warFrequency == 'oncePerWeek')
								$frequencia = "1x por semana";
							elseif ($clan->warFrequency == 'rarely')
								$frequencia = "Raramente";
						?>
						<div class="container-detail wars">Guerras: <?= $frequencia ?></div>
						<div class="container-detail required">Trofeús Requeridos: <?= $clan->requiredTrophies ?></div>
						<?php if($clan->isWarLogPublic === TRUE): ?>
							<div class="container-detail war-log"><a href="guerras.php?tag=<?= substr($clan->tag, 1) ?>" title="Ver Estatisticas de Guerras">Estatisticas de Guerra</a></div>
						<?php endif; ?>
						
						
					</div>
				</div>
			</section>
			<section>
			<div class="share-info-clan">
				<div class="fb-share-button " data-href="http://clans.clashofclans-experts.com.br/info_clan.php?tag=<?= substr($clan->tag, 1) ?>" data-layout="button" data-size="large">
			</div>
			</section>
			
			<section>
				<center>
					<button class="btn btn-primary" id="show-members" type="button" data-toggle="collapse" data-target="#result-players" aria-expanded="false" aria-controls="result-players">
				    Exibir a Lista de Membros
			    </center>
			  </button>
				<div class="result-players" id="result-players"></div>
			</section>

			<section>
				<div class="row">
					<div class="facebook-comments">
						<h2>Deixe seu comentário para este clã!</h2>
						<center>
						<div class="fb-comments" data-href="<?= $url ?>" data-numposts="5"></div>
						</center>
					</div>
				</div>
			</section>
			
		</main>
		<footer class="rodape">
			Copyright &copy <?= date("Y"); ?> | Desenvolvido por <a href="http://www.clashofclans-experts.com.br" title="" target="_blank">@Clash Experts</a>
		</div>
		</footer>
		<script src="js/jquery.js"></script>
		<script src="js/tether.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/info_clan-min.js"></script>
		
	</body>
</html>
