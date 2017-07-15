<div class="container">

	<div class="head">
		
	</div>

	<div class="main" id="main">
		<div class="row card-panel white">
			<div id="conta" >
				<h4 class="center"><?php echo $this->adview[0]["title"]?></h4>
			    <form id="form_userupdate" action="user/update" method="post" class="col s12" action="ad/create">
			      	
			      	<div class="row">
						
						<div class="slider">
						    <ul class="slides">
								<?php  
									$adview = $this->adview;

									foreach ($adview[0]["paths"] as $key => $value) {
										echo 
											'<li>
									        	<img src="' . $value . '">
									        	<div class="caption center-align">
									          		<h3>Imagem: ' . $key . '</h3>
									          		<h5 class="light grey-text text-lighten-3">texto.</h5>
									        	</div>
									      	</li>';
									}
								?>	
							</ul>

						 </div>
							
						<table>
					        <thead>
					          	<tr>
					              	<th data-field="id">Detalhes</th>
					          	</tr>
					        </thead>

					        <tbody>
					          	<tr>
					            	<td>Categoria:</td>
					            	<td><?php echo $this->adview[0]["type"]?></td>
					          	</tr>
					          	<tr>
					            	<td>Tipo:</td>
					            	<td><?php echo $this->adview[0]["servicetype"]?></td>
					          	</tr>
					          	<tr>
					            	<td>Estado:</td>
					            	<td><?php echo $this->adview[0]["state"]?></td>
					          	</tr>
					          	<tr>
					            	<td>Cidade:</td>
					            	<td><?php echo $this->adview[0]["city"]?></td>
					          	</tr>
					          	<tr>
					            	<td>Cep:</td>
					            	<td><?php echo $this->adview[0]["zipcode"]?></td>
					          	</tr>
					          	<tr>
					            	<td>Anúncio criado em:</td>
					            	<td><?php echo $this->adview[0]["datetime"]?></td>
					          	</tr>
					        </tbody>
				      	</table>

				      	<table>
					        <thead>
					          	<tr>
					              	<th data-field="id">Descrição</th>
					          	</tr>
					        </thead>

					        <tbody>
					          	<tr>
					            	<td><?php echo $this->adview[0]["description"]?></td>
					          	</tr>
					        </tbody>
				      	</table>

				      	<table>
					        <thead>
					          	<tr>
					              	<th data-field="id">Contato</th>
					          	</tr>
					        </thead>

					        <tbody>
					          	<tr>
					            	<td>Nome:</td>
					            	<td><?php echo $this->adview[0]["fullname"]?></td>
					          	</tr>
					          	<tr>
					            	<td>Celular:</td>
					            	<td>...</td>
					          	</tr>
					          	<tr>
					            	<td>Telefone:</td>
					            	<td>...</td>
					          	</tr>
					          	<tr>
					            	<td>Email:</td>
					            	<td><?php echo $this->adview[0]["email"]?></td>
					          	</tr>
					        </tbody>
				      	</table>

				    </div>
			    </form>
			</div>
			<div id="meusanuncios" style="display: none;">
				<h4 class="center">Meus Anúncios</h4>
				<?php  
					$myads = $this->ads;

					foreach ($myads as $key => $value) {
						echo 
							'<div class="card horizontal white">
								<div class="card-image">
									<img src="http://localhost:81/ad/getimage?id=' . $value["path"] . '">
								</div>
								<span class="black-text">' . $value["title"] . '</span>
							</div>';
					}
				?>	
			</div>
		</div>
	</div>
	

	<div class="footer">
		

	</div>
</div>