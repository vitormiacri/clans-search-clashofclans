<?php
	//Chave do site
	$key ="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiIsImtpZCI6IjI4YTMxOGY3LTAwMDAtYTFlYi03ZmExLTJjNzQzM2M2Y2NhNSJ9.eyJpc3MiOiJzdXBlcmNlbGwiLCJhdWQiOiJzdXBlcmNlbGw6Z2FtZWFwaSIsImp0aSI6ImJmNGNkYTEwLWI0MTctNDhjNS1iYzVlLTI2YTk4YTM1ODliNyIsImlhdCI6MTQ3NTA2NTY4Nywic3ViIjoiZGV2ZWxvcGVyLzZmMTNlNTAwLWM0NzctMTM5MS1mNTI2LTgwZjFjNmU0ZjYyOSIsInNjb3BlcyI6WyJjbGFzaCJdLCJsaW1pdHMiOlt7InRpZXIiOiJkZXZlbG9wZXIvc2lsdmVyIiwidHlwZSI6InRocm90dGxpbmcifSx7ImNpZHJzIjpbIjE5Mi45OS42OC45Il0sInR5cGUiOiJjbGllbnQifV19.tGHI6aHDqyD1HBITE0rob95o77OdELzvK6In70Sjd4aBDGbzYQN2iDX6flD6C089704s4oXZamLhFLKQtw_WUg";

	$tipo_busca = isset($_POST['tipo']) ? htmlspecialchars($_POST['tipo']) : FALSE;

	
	$tag = htmlspecialchars($_POST['tag']);
	if($tipo_busca !== "top-clans"){
		if($tag !== ""){
			$url = "https://api.clashofclans.com/v1/clans/%23$tag";
		} else {
			$query = "";
			foreach ($_POST as $chave => $valor) {
				if($valor !== ""){
					if(strlen($query) > 0){
						$query .= "&" . $chave . "=" . str_replace("#", "%23", htmlspecialchars($valor));
					} else {
						$query .= $chave . "=" . str_replace("#", "%23", $valor);
					}
				}
			}
			if(strlen($query) > 0){
				$query .= "&limit=10";
			} else {
				$query .= "limit=10";
			}

			$url = "https://api.clashofclans.com/v1/clans?$query";
		}
	} else {

		
		$location = htmlspecialchars($_POST['locationId']);
		$after = htmlspecialchars($_POST['after']);
		if($after != ""){
			$after = "&after=$after";
		} else {
			$after = "";
		}

		$url = "https://api.clashofclans.com/v1/locations/$location/rankings/clans?limit=10$after";
	}

	$lista_clans = json_decode(exec("curl -X GET --header 'Accept: application/json' --header \"authorization: Bearer $key\" '$url'"));
?>


	<?php if($tag === ""): ?>
		<?php if(count($lista_clans->items) > 0): ?>
			<?php foreach ($lista_clans->items as $clan): ?>
				<div class="item-clan">
					<div class="clan-info-left">
						<div class="container-info-img">
							<div class="clan-level">Nível: <?= $clan->clanLevel?></div>
							<img class="clan-flag" src="<?= $clan->badgeUrls->small?>" alt="Bandeira do clã">
						</div>
						<div class="container-text">
							<div class="clan-name"><?= $clan->name?></div>
							<div class="clan-tag"><?= $clan->tag?></div>
							<?php if($clan->type === "inviteOnly"): ?>
								<span class="clan-type">Somente Convidados</span>
							<?php elseif($clan->type === "closed"): ?>
								<span class="clan-type">Fechado</span>
							<?php else: ?>
								<span class="clan-type">Aberto a Todos</span>
							<?php endif; ?>
						</div>
					</div>
					<div class="clan-info-right">
						<div class="container-members">
							<div class="members-title">Membros:</div>
							<div class="total-members"><?=$clan->members?>/50</div>
						</div>
						<div class="container-points">
							<div class="points">
								<?=$clan->clanPoints?> <img src="img/trofeu.png" alt="Trofeús">
							</div>
						</div>
						<div class="container-detail">
							<div class="detail">
								<a href="info_clan.php?tag=<?= substr($clan->tag, 1)?>" title="">Detalhes</a>
							</div>
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
			<?php if(!empty($lista_clans->paging->cursors->after)): ?>
			<div class="more">
				<button class="btn-load-more" value="<?= $lista_clans->paging->cursors->after;?>">Mostrar Mais</button>
			</div>
			<?php endif; ?>
		<?php elseif (empty($lista_clans->items)): ?>
			<h2 style="margin: 0 auto; font-size: 1rem; text-align: center;" class="col-xs-12">Nenhum clã encontrado.</h2>
		<?php else: ?>
			<h2 style="margin: 0 auto; font-size: 1rem; text-align: center;" class="col-xs-12">Os servidores do Clash of Clans estão em manutenção, volte mais tarde.</h2>
		<?php endif; ?>
	<?php else: ?>
		<?php if($lista_clans->name != ""): ?>
			<div class="item-clan">
				<div class="clan-info-left">
					<div class="container-info-img">
						<div class="clan-level">Nível: <?= $lista_clans->clanLevel?></div>
						<img class="clan-flag" src="<?= $lista_clans->badgeUrls->small?>" alt="">
					</div>
					<div class="container-text">
						<div class="clan-name"><?= $lista_clans->name?></div>
						<div class="clan-tag"><?= $lista_clans->tag?></div>
						<?php if($lista_clans->type === "inviteOnly"): ?>
							<span class="clan-type">Somente Convidados</span>
						<?php elseif($lista_clans->type === "closed"): ?>
							<span class="clan-type">Fechado</span>
						<?php else: ?>
							<span class="clan-type">Aberto a Todos</span>
						<?php endif; ?>
					</div>
				</div>
				<div class="clan-info-right">
					<div class="container-members">
						<div class="members">
							<div class="members-title">Membros:</div>
							<div class="total-members"><?=$lista_clans->members?>/50</div>
						</div>
					</div>
					<div class="container-points">
						<div class="points">
							<?=$lista_clans->clanPoints?> <img src="img/trofeu.png" alt="">
						</div>
					</div>
					<div class="container-detail">
						<div class="detail">
							<a href="info_clan.php?tag=<?= substr($lista_clans->tag, 1)?>" title="">Detalhes</a>
						</div>
					</div>
				</div>
			</div>
		<?php else: ?>
			<?php if($lista_clans->reason == "notFound"): ?>
			<h2 style="margin: 0 auto; font-size: 1rem; text-align: center;" class="col-xs-12 text-center">Nenhum clã encontrado com esta TAG.</h2>
			<?php else: ?>
				<h2 style="margin: 0 auto; font-size: 1rem; text-align: center;" class="col-xs-12 text-center">Os servidores do Clash of Clans estão em manutenção, volte mais tarde.</h2>
			<?php endif; ?>
		<?php endif; ?>
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
	<?php endif; ?>
