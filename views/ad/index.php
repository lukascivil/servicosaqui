<div class="container">

	<div class="head">
		
	</div>

	<div class="main" id="main">
		<div class="row card-panel white">
			<h4 class="center">Anúncio</h4>
		    <form id="form_ad" action="ad/create" method="post" class="col s12" action="ad/create">
		      	
		      	<div class="row">
					
					<div class="row">
				        <div class="input-field col s12">
				          <input id="first_name" name="title" type="text" class="validate" required>
				          <label for="first_name">Título</label>
				        </div>
					</div>
					<div class="row">
				        <div class="input-field col s6 m6 l6">
				          	<input id="zipcode" name="zipcode" type="text" class="validate" required>
				          	<label for="zipcode">Cep</label>
				        </div>
				        <div class="col s6 m6 l6">
			          		<select name="service" class="browser-default">
			          			<?php
			          				
			          				$variable = $this->listofservices;

			          				echo '<option value="" selected="">Serviço</option>';

			          				foreach ($variable as $key => $value) {
			          					echo "<option value=". $value["id"] . ">". $value["type"] . "</option>";
			          				}
								?>
			                </select>
			            </div>
					</div>

					<div class="row">
				        <div class="col s6 m6 l6">
			          		<select name="state" class="browser-default">
								<option value="" disabled="" selected="">Estado</option>
									<option value="">Selecione</option>
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

				        <div class="col s6 m6 l6">
			          		<select name="city" class="browser-default">
								<option  value="" selected="">Cidade</option>
			                </select>
				        </div>
					</div>
					
					<div class="row">
				        <div class="input-field col s12">
			          		<textarea id="icon_prefix2" name="description" required class="materialize-textarea"></textarea>
			          		<label for="icon_prefix2"><i class="fa fa-pencil" aria-hidden="true"></i> Descrição</label>
			        	</div>
					</div>
			    </div>
		   
		      	<div class="file-field input-field">
			      	<div class="btn">
			        	<span>Imagens</span>
			        	<input type="file" name="images[]" multiple accept="image/*"/>
			      	</div>
					<div class="file-path-wrapper">
						<input class="file-path validate" type="text" placeholder="Selecione imagens para seu anúncio">
					</div>
			  	</div>
				
				<div class="right">
		    		<a id="btn_create" class="btn waves-effect waves-light">Enviar</a>
		    		<a href="index" class="btn waves-effect waves-light">Cancelar</a>
		    	</div>
		    </form>
		</div>
	</div>
	

	<div class="footer">
		

	</div>
</div>