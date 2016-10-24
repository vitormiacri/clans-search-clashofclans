<?php include("header.php"); ?>
	<main>
		<section>
			<div class="search-top">
				<h1 class="search-title">Busca de Clans</h1>
				<p class="search-text">Encontre qualquer clã pela <span>tag</span> ou use a pesquisa avançada</p>
			</div>
			<div class="search-container">
				<ul class="search-tabs" role="tablist">
					<li class="search-item">
						<a class="search-link" data-toggle="tab" href="#tag" role="tab"><i class="fa fa-tag fa-fw"></i> Tag</a>
					</li>
					<li class="search-item">
						<a class="search-link" data-toggle="tab" href="#advanced" role="tab"><i class="fa fa-search-plus fa-fw"></i> Avançada</a>
					</li>
				</ul>

				<div class="tab-content">
					<div class="tab-pane fade in" id="tag" role="tabpanel">
						<form action="" id="tag-form" method="post" accept-charset="utf-8">
							<div class="row">
								<div class="form-container">
									<div class="input-group">
										<div class="input-group-addon">#</div>
										<input type="text" class="form-field" id="tag-field" name="tag" title="TAG Inválida" pattern="[\w\d]{8}" id="tag" placeholder="QDF342H9" required >
									</div>
								</div>
								<div class="form-container">
									<button type="submit" class="btn-search"><i class="fa fa-search fa-fw"></i> Buscar</button>
								</div>
							</div>
						</form>
					</div>
					<div class="tab-pane fade" id="advanced" role="tabpanel">
						<form action="" id="advanced-form" method="post" accept-charset="utf-8">
							<div class="row">
								<div class="form-container form-advanced">
									<input type="text" class="form-field" minlength="3" id="name" name="name" placeholder="Nome do Clã" >
								</div>
								<div class="form-container form-advanced">
									<input type="number" class="form-field" min="3" max="50" name="minMembers" placeholder="Total de Membros" >
								</div>
								<div class="form-container form-advanced">
									<input type="number" class="form-field" min="2" name="minClanPoints" placeholder="Pontos (Troféus)">
								</div>
								<div class="form-container form-advanced">
									<label for="location" >Localização</label>
									<select name="locationId" id="location" class="form-field">
										<option value="32000038" selected>Brasil</option>
										<option value="">Qualquer</option>
									</select>
								</div>
								<div class="form-container form-advanced">
									<label for="warFrequency" >Guerras</label>
									<select name="warFrequency" id="warFrequency" class="form-field">
										<option value="always">Sempre</option>
									  	<option value="moreThanOncePerWeek">Duas Vezes Por Semana</option>
										<option value="oncePerWeek">Uma Vez Por Semana</option>
										<option value="lessThanOncePerWeek">Raramente</option>
										<option value="never">Nunca</option>
									</select>
								</div>
								<div class="form-container form-advanced">
									<label for="minClanLevel" >Nível do Clã</label>
									<select name="minClanLevel" id="minClanLevel" class="form-field">
										<option value="">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
										<option value="9">9</option>
										<option value="10">10</option>
									</select>
								</div>
								
								
								<div class="form-container form-advanced">
									<button type="submit" class="btn-search"><i class="fa fa-search fa-fw"></i> Buscar</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
		<section >
			<div class="result-clans"></div>
		</section>
		
	</main>

<footer class="rodape">
	Copyright &copy <?= date("Y"); ?> | Desenvolvido por <a href="http://www.clashofclans-experts.com.br" title="" target="_blank">@Clash Experts</a>
	<div class="fb-share-button" 
		data-href="http://clans.clashofclans-experts.com.br" 
		data-layout="button" data-size="small">
	</div>
</footer>
<script src="js/jquery.js"></script>
<script src="js/tether.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/search-min.js"></script>
	
</body>
</html>