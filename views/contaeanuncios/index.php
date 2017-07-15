<?php 
	//print_r($_SESSION);
	//echo(Session::get('id'));
	//print_r($this->ads);
?>
<div class="row">
    <div class="col s12">
      	<ul class="tabs">
        	<li class="tab col s3"><a class="active black-text" href="#" id="tab_conta">Conta</a></li>
        	<li class="tab col s3"><a class="black-text" href="#" id="tab_meusanuncios">Meus Anúncios</a></li>
      	</ul>
    </div>
</div>

<div class="container">

	<div class="head">
		
	</div>

	<div class="main" id="main">
		<div class="row card-panel white">
			<div id="conta" >
				<h4 class="center">Conta</h4>
			    <form id="form_userupdate" action="user/update" method="post" class="col s12" action="ad/create">
			      	
			      	<div class="row">
						
						<div class="input-field col s12">
				          <input id="login" name="login" value="<?php echo Session::get('login'); ?>" type="text" class="validate">
				          <label for="first_name">Login</label>
				        </div>

				        <div class="input-field col s12">
				          <input id="fullname" name="fullname" value="<?php echo Session::get('fullname'); ?>" type="text" class="validate" required>
				          <label for="first_name">Nome Completo</label>
				        </div>

				        <div class="input-field col s12">
				          <input id="age" name="age" value="<?php echo Session::get('age'); ?>" type="text" class="validate" required>
				          <label for="first_name">Idade</label>
				        </div>
						
						<div class="input-field col s12">
				          <input id="email" name="email" value="<?php echo Session::get('email'); ?>" type="text" class="validate" required>
				          <label for="first_name">Email</label>
				        </div>
						
						<div class="input-field col s12">
						    <select name="servicetype">
								<option value="" <?php if (Session::get('servicetype') == "") echo "selected='selected'";?> >Tipo de Serviço não especificado</option>
								<option value="particular" <?php if (Session::get('servicetype') == "particular") echo "selected='selected'";?> >Particular</option>
								<option value="empresa" <?php if (Session::get('servicetype') == "empresa") echo "selected='selected'";?> >Empresa</option>
						    </select>
						</div>

				        <div class="input-field col s12">
				          	<input id="password" name="password" value="<?php echo Session::get('password'); ?>" type="text" class="validate" required>
				          	<label for="first_name">Senha</label>
				        </div>
				        
				        <div class="input-field col s4 m4 l4">
				          	<input id="zipcode" name="zipcode" value="<?php echo Session::get('zipcode'); ?>" type="text" class="validate" required>
				          	<label for="zipcode">Cep</label>
				        </div>

				        <div class="col s4 m4 l4">
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

				        <div class="col s4 m4 l4">
			          		<select name="city" class="browser-default">
								<option value="" selected="">Cidade</option>
			                </select>
				        </div>

				        <div class="input-field col s12">
			          		<textarea id="icon_prefix2" name="description" class="materialize-textarea"><?php echo Session::get('description'); ?></textarea>
			          		<label for="icon_prefix2"><i class="fa fa-pencil" aria-hidden="true"></i> Informações sobre o prestador de serviço</label>
			        	</div>

				    </div>
					
					<div class="right">
			    		<a id="btn_save" class="btn waves-effect waves-light">Salvar</a>
			    	</div>
			    </form>
			</div>
			<div id="meusanuncios" style="display: none;">
				<h4 class="center">Meus Anúncios</h4>
				<?php  
					$myads = $this->ads;

					foreach ($myads as $key => $value) {
						echo 
							'<div id=' . $value["id"] . ' class="card horizontal white">
								<div class="card-image">
									<img src="' . $value["path"] . '">
								</div>
								<span class="black-text">' . $value["title"] . '</span>
							</div>';
					}
				?>	
			</div>
			<div id="myselectedad" style="display: none;">
				<h4 class="center">Edição de Anúncio</h4>
			    <form id="form_adupdate" id_ad="..." action="ad/update" method="post" class="col s12">
			      	<input id="id_ad" name="id" value="..." type="text" style="display: none;">
			      	<div class="row">
						
						<div class="row">
							<div class="input-field col s12">
					          <input id="title" name="title" value="..." type="text" class="validate">
					          <label for="title">Título</label>
					        </div>
						</div>

						<div class="row">
					        <div class="input-field col s6 m6 l6">
					          <input id="zipcode" name="zipcode" value="..." type="text" class="validate" required>
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
				          		<textarea id="description" name="description" class="materialize-textarea">...</textarea>
				          		<label for="icon_prefix2"><i class="fa fa-pencil" aria-hidden="true"></i> Descrição do Anúncio</label>
				        	</div>
						</div>
				    </div>
					
					<div class="right">
						<a id="btn_remove" class="btn waves-effect waves-light red">Excluir Anúncio</a>
			    		<a id="btn_save" class="btn waves-effect waves-light">Salvar</a>
			    	</div>
			    </form>
			</div>
		</div>
	</div>
	

	<div class="footer">
		

	</div>
</div>