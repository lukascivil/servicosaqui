<div class="container">

	<div class="head">
		
	</div>

	<div class="main" id="main">
		<div class="row card-panel white">
			<h4 class="center">Faça seu login ou crie uma conta gratuita!</h4>
		    <h6 class="center">Veja todos os seus anúncios em um só lugar. Edite e exclua seus anúncios de forma rápida e fácil, altere seu perfil com segurança e envie e receba pagamentos através do nosso serviço de pagamento online.</h6>
		    
	    	<form class="col s6 m6 l6" id="form_login" method="post"  action="login/login" >
	    		
			      	<h5 class="center">Acessar meus Anúncios</h5>
			      	<div class="input-field col s12">
			          	<input id="search" name="login" type="text" class="validate" required>
			          	<label for="search" data-error="wrong" data-success="right">Login</label>
			        </div>
			        <div class="input-field col s12">
			          	<input id="search" name="password" type="password" class="validate" required>
			          	<label for="search" data-error="wrong" data-success="right">Senha</label>
			        </div>
			        <input name="task" type="text" value="login" hidden>
			        <div class="modal-footer">
			        	<div class="row">
					    	<div class="col s12 m12 l12">
					      		<a href="#!" id="btn_login" class="center waves-effect waves-green btn-flat white-text orange">Entrar</a>
					      	</div>
					    </div>
					</div>
		    </form>
			
			<form class="col s6 m6 l6" id="form_createaccount" method="post" action="user/create" >
		      	<h5 class="center">Ainda não tenho cadastro</h5>

		      	<div class="input-field col s12">
		          	<input id="search" name="fullname" type="password" class="validate" required>
		          	<label for="search" data-error="wrong" data-success="right">Nome Completo</label>
		        </div>
		        <div class="input-field col s12">
		          	<input id="search" name="age" type="password" class="validate" required>
		          	<label for="search" data-error="wrong" data-success="right">Idade</label>
		        </div>
		      	<div class="input-field col s12">
		          	<input id="search" name="login" type="text" class="validate" required>
		          	<label for="search" data-error="wrong" data-success="right">Login</label>
		        </div>
		        <div class="input-field col s12">
		          	<input id="search" name="email" type="text" class="validate" required>
		          	<label for="search" data-error="wrong" data-success="right">Email</label>
		        </div>

				<div class="input-field col s12">
				    <select name="servicetype">
						<option value="" disabled selected>Tipo de Serviço</option>
						<option value="empresa">Empresa</option>
						<option value="particular">Particular</option>
				    </select>
				</div>

		        <div class="input-field col s12">
		          	<input name="password" id="search" type="password" class="validate" required>
		          	<label for="search" data-error="wrong" data-success="right">Senha</label>
		        </div>

		        <input name="task" type="text" value="login" hidden>
				
		        <div class="col s12">
			      	<a href="#!" id="btn_create" class="center waves-effect waves-green btn-flat white-text orange">Criar Conta</a>
		    	</div>
		    	<p class="agree-terms-text center">Ao se cadastrar, eu concordo com os Termos de Uso e a Política de Privacidade da OLX, e também, em receber comunicações da OLX, por exemplo, mensagens via e-mail de compradores interessados, promoções da OLX, dicas e recomendações sobre produtos e serviços.</p>
		    </form>
		</div>
	</div>
	

	<div class="footer">
		

	</div>
</div>