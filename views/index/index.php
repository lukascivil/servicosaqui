<div class="container">

	<div class="head">
		<div class="row" >
	      	<div class="col s12" id="topconfig">
	      		<div class="row card-panel white" id="topconfig_form">
			        <div class="input-field col s12 m12 l12">
			          	<input id="filter_text" type="text">
			          	<label for="filter_text" data-error="wrong" data-success="right">Pesquisar...</label>
			        </div>
	        	</div>
	       	</div>
	    </div>
	</div>

	<div class="main" id="main">
		<div class="row" >
			<div class="col s12 m12 l3 " id="leftconfig">
				<div class="row card-panel white" id="leftconfig_02">
					
	          		<div class="row col s12">
		          		<select id="filter_state" class="browser-default">
							<option value="" selected="">Estado</option>
						    <option value="AC">Acre</option>
						    <option value="AL">Alagoas</option>
						    <option value="AP">Amapá</option>
						    <option value="AM">Amazonas</option>
						    <option value="BA">Bahia</option>
						    <option value="CE">Ceará</option>
						    <option value="DF">Distrito Federal</option>
						    <option value="ES">Espirito Santo</option>
						    <option value="GO">Goiás</option>
						    <option value="MA">Maranhão</option>
						    <option value="MS">Mato Grosso do Sul</option>
						    <option value="MT">Mato Grosso</option>
						    <option value="MG">Minas Gerais</option>
						    <option value="PA">Pará</option>
						    <option value="PB">Paraíba</option>
						    <option value="PR">Paraná</option>
						    <option value="PE">Pernambuco</option>
						    <option value="PI">Piauí</option>
						    <option value="RJ">Rio de Janeiro</option>
						    <option value="RN">Rio Grande do Norte</option>
						    <option value="RS">Rio Grande do Sul</option>
						    <option value="RO">Rondônia</option>
						    <option value="RR">Roraima</option>
						    <option value="SC">Santa Catarina</option>
						    <option value="SP">São Paulo</option>
						    <option value="SE">Sergipe</option>
						    <option value="TO">Tocantins</option>
		                </select>
		            </div>
					
					<div class="row col s12">
		          		<select id="filter_city" class="browser-default">
							<option value="" disabled="" selected="">Cidade</option>
		                </select>
		            </div>

		            <div class="row col s12">
		          		<select id="filter_service" class="browser-default">
		          			<?php
		          				
		          				$variable = $this->listofservices;

		          				echo '<option value="" selected="">Serviço</option>';

		          				foreach ($variable as $key => $value) {
		          					echo "<option value=". $value["id"] . ">". $value["type"] . "</option>";
		          				}
							?>
		                </select>
		            </div>
					
					<div class="row col s12">
		          		<select id="filter_servicetype" class="browser-default">
							<option value="" selected="">Tipo de serviço</option>
							<option value="particular">Particular</option>
						    <option value="empresa">Empresa</option>
		                </select>
		            </div>

					<div class="row col s12">
		          		<select id="filter_sort" class="browser-default">
							<option value="" selected="">Odernar</option>
							<option value="new">Mais atual</option>
						    <option value="old">Mais antigo</option>
		                </select>
		            </div>

		            <div class="row col s12">
		            	<h6 class="center">Quantidade por Página</h6>
					    <p class="range-field">
					      	<input id="filter_limit" name="filter_limit" value="10" type="range" min="5" max="50" step="5"/>
					    </p>
		            </div>
	 			
					<div id="achados" class="row col s12">
						<hr>
		            	Anuncios Encontrados: 
						<achados>...</achados>
		            </div>
	            
	        	</div>
			</div>
	      	<div class="col s12 m12 l9">
	      		<div class="progress">
				    <div class="indeterminate"></div>
				</div>
				<div id="cardsmain"></div>
	       	</div>
	    </div>
	</div>
	
	<div class="footer">
		<div class="row">
      		<div class="col s12 ">
				<div id="pagination-long"></div>
			</div>
	    </div>
	</div>

</div>