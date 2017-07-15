<?php Session::init(); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta name="theme-color" content="#00bcd4">
		<?php html::echoAllcssImports($this->css);?>
		<?php html::echoTitle($this->title);?>
	</head>
	<body>
		<?php if($this->title == "index") { ?>
			<div class="navbar-fixed">
				<nav>
				    <div class="nav-wrapper cyan">
				    	<a id="URL" hidden><?php echo URL; ?></a>
				      	<a href="index" class="brand-logo center"><i class="fa fa-life-ring" aria-hidden="true"></i>Serviços Aqui</a>
				      	<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="fa fa-bars" aria-hidden="true"></i></a>
				      	<ul class="right hide-on-med-and-down">
				      		<?php if(!Session::get('loggedIn')) { ?>
				      			<li><a onclick="signIn();">Entrar</a></li>
				      			<li><a onclick="signUp();">Cadastro</a></li>
				      		<?php } else { ?>
				      			<li><a href="<?php echo URL . "contaeanuncios"; ?>">Conta & Anuncios</a></li>
								<li><a href="login/logout">Sair</a></li>
				      		<?php } ?>
				      		<li><a href="<?php echo URL . "ad"; ?>" class="waves-effect waves-light btn orange">Inserir Anuncio</a></li>
				      	</ul>
				      	<ul class="side-nav" id="mobile-demo">
				      		<li><a href="<?php echo URL . "ad"; ?>" class="waves-effect waves-light btn orange">Inserir Anuncio</a></li>
							<?php if(!Session::get('loggedIn')) { ?>
				      			<li><a onclick="signIn();">Entrar</a></li>
				      			<li><a onclick="signUp();">Cadastro</a></li>
				      		<?php } else { ?>
								<li><a href="<?php echo URL . "contaeanuncios"; ?>">Conta & Anuncios</a></li>
								<li><a onclick="logOut();">Sair</a></li>
				      		<?php } ?>
				      	</ul>
				    </div>
				</nav>
			</div>
		<?php } else if($this->title == "ad") { ?>
			<nav>
			    <div class="nav-wrapper cyan">
			      	<a href="index" class="brand-logo center"><i class="fa fa-life-ring" aria-hidden="true"></i>Serviços Aqui</a>
			      	<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="fa fa-bars" aria-hidden="true"></i></a>
			      	<ul class="right hide-on-med-and-down">
			      		<li><a href="<?php echo URL . "contaeanuncios"; ?>">Conta & Anuncios</a></li>
						<li><a href="login/logout">Sair</a></li>
			      	</ul>
			      	<ul class="side-nav" id="mobile-demo">
						<li><a href="<?php echo URL . "contaeanuncios"; ?>">Conta & Anuncios</a></li>
						<li><a href="login/logout">Sair</a></li>
			      	</ul>
			    </div>
			</nav>
		<?php } else if($this->title == "login") { ?>
			<nav>
			    <div class="nav-wrapper cyan">
			      <a href="index" class="brand-logo center"><i class="fa fa-life-ring" aria-hidden="true"></i>Serviços Aqui</a>
			      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="fa fa-bars" aria-hidden="true"></i></a>
			      <ul class="right hide-on-med-and-down">
			      		
			      </ul>
			      <ul class="side-nav" id="mobile-demo">

			      </ul>
			    </div>
			</nav>
		<?php } else if($this->title == "contaeanuncios") { ?>
			<nav>
			    <div class="nav-wrapper cyan">
			      	<a href="index" class="brand-logo center"><i class="fa fa-life-ring" aria-hidden="true"></i>Serviços Aqui</a>
			      	<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="fa fa-bars" aria-hidden="true"></i></a>
			      	<ul class="right hide-on-med-and-down">
			      		<li><a href="<?php echo URL . "contaeanuncios"; ?>">Conta & Anuncios</a></li>
						<li><a href="login/logout">Sair</a></li>
						<li><a href="<?php echo URL . "ad"; ?>" class="waves-effect waves-light btn orange">Inserir Anuncio</a></li>
			      	</ul>
			      	<ul class="side-nav" id="mobile-demo">
						<li><a href="<?php echo URL . "contaeanuncios"; ?>">Conta & Anuncios</a></li>
						<li><a href="login/logout">Sair</a></li>
						<li><a href="<?php echo URL . "ad"; ?>" class="waves-effect waves-light btn orange">Inserir Anuncio</a></li>
			      	</ul>
			    </div>
			</nav>
		<?php } else if($this->title == "404 Error") { ?>
			<nav>
			    <div class="nav-wrapper cyan">
			      	<a href="index" class="brand-logo center"><i class="fa fa-life-ring" aria-hidden="true"></i>Serviços Aqui</a>
			      	<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="fa fa-bars" aria-hidden="true"></i></a>
			      	<ul class="right hide-on-med-and-down">
			      		<?php if(!Session::get('loggedIn')) { ?>
				      			<li><a onclick="signIn();">Entrar</a></li>
				      			<li><a onclick="signUp();">Cadastro</a></li>
				      	<?php } else { ?>
				      			<li><a href="<?php echo URL . "contaeanuncios"; ?>">Conta & Anuncios</a></li>
								<li><a href="<?php echo URL . "login/logout"; ?>">Sair</a></li>
				      	<?php } ?>
				      	<li><a href="<?php echo URL . "ad"; ?>" class="waves-effect waves-light btn orange">Inserir Anuncio</a></li>
			      	</ul>
			      	<ul class="side-nav" id="mobile-demo">
						<li><a href="<?php echo URL . "ad"; ?>" class="waves-effect waves-light btn orange">Inserir Anuncio</a></li>
						<?php if(!Session::get('loggedIn')) { ?>
				      			<li><a onclick="signIn();">Entrar</a></li>
				      			<li><a onclick="signUp();">Cadastro</a></li>
				      	<?php } else { ?>
								<li><a href="<?php echo URL . "contaeanuncios"; ?>">Conta & Anuncios</a></li>
								<li><a onclick="logOut();">Sair</a></li>
				      	<?php } ?>
			      	</ul>
			    </div>
			</nav>
		<?php } else if($this->title == "adview") { ?>
			<nav>
			    <div class="nav-wrapper cyan">
			      	<a href="index" class="brand-logo center"><i class="fa fa-life-ring" aria-hidden="true"></i>Serviços Aqui</a>
			      	<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="fa fa-bars" aria-hidden="true"></i></a>
			      	<ul class="right hide-on-med-and-down">
			      		<?php if(!Session::get('loggedIn')) { ?>
				      			<li><a onclick="signIn();">Entrar</a></li>
				      			<li><a onclick="signUp();">Cadastro</a></li>
				      	<?php } else { ?>
				      			<li><a href="<?php echo URL . "contaeanuncios"; ?>">Conta & Anuncios</a></li>
								<li><a href="<?php echo URL . "login/logout"; ?>">Sair</a></li>
				      	<?php } ?>
				      	<li><a href="<?php echo URL . "ad"; ?>" class="waves-effect waves-light btn orange">Inserir Anuncio</a></li>
			      	</ul>
			      	<ul class="side-nav" id="mobile-demo">
						<li><a href="<?php echo URL . "ad"; ?>" class="waves-effect waves-light btn orange">Inserir Anuncio</a></li>
						<?php if(!Session::get('loggedIn')) { ?>
				      			<li><a onclick="signIn();">Entrar</a></li>
				      			<li><a onclick="signUp();">Cadastro</a></li>
				      	<?php } else { ?>
								<li><a href="<?php echo URL . "contaeanuncios"; ?>">Conta & Anuncios</a></li>
								<li><a onclick="logOut();">Sair</a></li>
				      	<?php } ?>
			      	</ul>
			    </div>
			</nav>
		<?php } ?>
		
		<!-- Login has specials modals for login/sing in  --> 
		<?php if($this->title != "login") { ?>
			<div id="modal_signIn" class="modal">
			    <div class="modal-content">
			    	<form id="form_login" method="post"  action="login/login" >
			    		
					      	<h4>Entrar</h4>
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
						        	<div class="col s6 m6 l6">
							    		<a href="#!" id="btn_cancel" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>
							    	</div>
							    	
							    	<div class="col s6 m6 l6">
							      		<a href="#!" id="btn_login" class=" modal-action waves-effect waves-green btn-flat">Entrar</a>
							      	</div>
							    </div>
							</div>
				    </form>
			    </div> 
			</div>

			<div id="modal_signUp" class="modal">
				<div class="modal-content">
				    <form id="form_createaccount" method="post" action="user/create" >
				      	<h4>Cadastro</h4>

				      	<div class="input-field col s12">
				          	<input id="search" name="fullname" type="text" class="validate" required>
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

				        <div class="modal-footer">
					    	<a href="#!" id="btn_cancel" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>
					      	<a href="#!" id="btn_create" class=" modal-action modal-close waves-effect waves-green btn-flat">Criar</a>
				    	</div>
				    </form>
				</div>
			</div>
		<?php } ?>

    
    