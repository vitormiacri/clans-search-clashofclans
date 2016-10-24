<?php
	//Chave do site
	$key ="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiIsImtpZCI6IjI4YTMxOGY3LTAwMDAtYTFlYi03ZmExLTJjNzQzM2M2Y2NhNSJ9.eyJpc3MiOiJzdXBlcmNlbGwiLCJhdWQiOiJzdXBlcmNlbGw6Z2FtZWFwaSIsImp0aSI6ImJmNGNkYTEwLWI0MTctNDhjNS1iYzVlLTI2YTk4YTM1ODliNyIsImlhdCI6MTQ3NTA2NTY4Nywic3ViIjoiZGV2ZWxvcGVyLzZmMTNlNTAwLWM0NzctMTM5MS1mNTI2LTgwZjFjNmU0ZjYyOSIsInNjb3BlcyI6WyJjbGFzaCJdLCJsaW1pdHMiOlt7InRpZXIiOiJkZXZlbG9wZXIvc2lsdmVyIiwidHlwZSI6InRocm90dGxpbmcifSx7ImNpZHJzIjpbIjE5Mi45OS42OC45Il0sInR5cGUiOiJjbGllbnQifV19.tGHI6aHDqyD1HBITE0rob95o77OdELzvK6In70Sjd4aBDGbzYQN2iDX6flD6C089704s4oXZamLhFLKQtw_WUg";

	$tipo_busca = isset($_POST['tipo']) ? htmlspecialchars($_POST['tipo']) : FALSE;	
	$tag = htmlspecialchars($_REQUEST['tag']);

	if($tipo_busca !== "top-players"){
		$url = "https://api.clashofclans.com/v1/clans/%23$tag/members";
	} else {
		
		$location = htmlspecialchars($_POST['locationId']);
		$after = htmlspecialchars($_POST['after']);
		if($after != ""){
			$after = "&after=$after";
		} else {
			$after = "";
		}

		if($location === "")
			$location = "global";

		$url = "https://api.clashofclans.com/v1/locations/$location/rankings/players?limit=10$after";
	}
	
	$lista_membros = json_decode(exec("curl -X GET --header 'Accept: application/json' --header \"authorization: Bearer $key\" '$url'"));
?>

<?php if($lista_membros->items !== ""): ?>
	<?php foreach ($lista_membros->items as $membro): ?>
		<div class="item-membro">
			<div class="info-left">
				<div class="info-left-container">
					<?php if($tipo_busca == 'top-players'): ?>
						<div class="posicao"><?=$membro->rank?></div>
					<?php else: ?>
						<div class="posicao"><?=$membro->clanRank?></div>
					<?php endif; ?>
					<div class="liga"><img src="<?= $membro->league->iconUrls->small?>" alt=""></div>
					<div class="nivel">
						<div class="img-nivel">
							<img src="img/estrela-nivel.svg" alt="">
						</div>
						<div class="nivel-exp"><?=$membro->expLevel?></div>
					</div>
				</div>
				<div class="nome-container">
					<div class="nome"><?=$membro->name?></div>
					<?php if($membro->role == 'admin'): ?>
						<div class="cargo">Ancião</div>
					<?php elseif ($membro->role == 'coLeader'): ?>
						<div class="cargo">Co-líder</div>
					<?php else: ?>
						<div class="cargo">Membro</div>
					<?php endif; ?>
				</div>
			</div>
			<div class="info-right">
				<div class="container-doacoes">
					<div class="doacoes">
						<?php if($tipo_busca == 'top-players'): ?>
							<div class="titulo-top">Ataques:</div>
							<div class="tropas"><?=$membro->attackWins?></div>
						<?php else: ?>
							<div class="titulo">Tropas Doadas:</div>
							<div class="tropas"><?=$membro->donations?></div>
						<?php endif; ?>
					</div>
					<div class="doacoes">
						<?php if($tipo_busca == 'top-players'): ?>
							<div class="titulo-top">Defesas:</div>
							<div class="tropas"><?=$membro->defenseWins?></div>
						<?php else: ?>
							<div class="titulo">Tropas Recebidas:</div>
							<div class="tropas"><?=$membro->donationsReceived?></div>

						<?php endif; ?>
					</div>
				</div>
				<div class="container-trofeus">
					<div class="trofeus"><span><?=$membro->trophies?></span></div>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
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
	<?php if($tipo_busca === "top-players"): ?>
		<div class="more">
			<button class="btn-load-more" value="<?= $lista_membros->paging->cursors->after;?>">Mostrar Mais</button>
		</div>
	<?php endif; ?>
<?php else: ?>
	<h2 style="margin: 0 auto; font-size: 1rem; text-align: center;" class="col-xs-12">Nenhum resultado encontrado. Os servidores de consulta do Clash of Clans podem estar em manutenção, por favor, volte mais tarde.</h2>
<?php endif; ?>
