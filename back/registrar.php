<?php
// Inclui o arquivo de configuração
include('config.php');

// Inclui as funções
include ('../class/setorDAO.php');

$setorDAO = new setorDAO();

$resultado = $setorDAO->exibirSetores();

// Variavél para preencher o erro (se existir)
$erro = false;

// Apaga usuários
if ( isset( $_GET['del'] ) ) {
	// Delete de cara (sem confirmação)
	$pdo_insere = $conexao_pdo->prepare('DELETE FROM usuarios WHERE user_id=?');
	$pdo_insere->execute( array( (int)$_GET['del'] ) );

	// Redireciona para o index.php
	header('location: index.php');
}

// Verifica se algo foi postado para publicar ou editar
if ( isset( $_POST ) && ! empty( $_POST ) ) {
	// Cria as variáveis
	foreach ( $_POST as $chave => $valor ) {
		$$chave = $valor;

		// Verifica se existe algum campo em branco
		if ( empty ( $valor ) ) {
			// Preenche o erro
			$erro = 'Existem campos em branco.';
		}
	}

	// Verifica se as variáveis foram configuradas
	if ( empty( $form_usuario ) || empty( $form_senha ) || empty( $form_nome ) ) {
		$erro = 'Existem campos em branco.';
	}

	// Verifica se o usuário existe
	$pdo_verifica = $conexao_pdo->prepare('SELECT * FROM usuarios WHERE user = ?');
	$pdo_verifica->execute( array( $form_usuario ) );

	// Captura os dados da linha
	$user_id = $pdo_verifica->fetch();
	$user_id = $user_id['user_id'];

	// Verifica se tem algum erro
	if ( ! $erro ) {
		// Se o usuário existir, atualiza
		if ( ! empty( $user_id ) ) {
			$pdo_insere = $conexao_pdo->prepare('UPDATE usuarios SET user=?, user_password=?, user_name=?, setor_id=?, user_email=? WHERE user_id=?');
			$pdo_insere->execute( array( $form_usuario,  crypt( $form_senha ), $form_nome, $user_id, $form_setor, $form_email ) );

		// Se o usuário não existir, cadastra novo
		} else {
			$pdo_insere = $conexao_pdo->prepare('INSERT INTO usuarios (user, user_password, user_name, setor_id, user_email) VALUES (?, ?, ?, ?, ?)');
			$pdo_insere->execute( array( $form_usuario, crypt( $form_senha ), $form_nome, $form_setor, $form_email ) );
            echo '<script>alert("Usuario Cadastrado Com Sucesso!");</script>';
            echo '<meta http-equiv="refresh" content="0;url=../paginas/login.php" />';
		}
	}
}
?>
<html><head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistema De Contratos - SICOOB</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="../https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="../https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="../https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
      <a href="http://www.sicoobcrediembrapa.com.br/" target="_blank"><img src="../dist/img/logo.png" class="logo-sicoob"><p class="logo-crediembrapa"><p class="logo-crediembrapa">/CREDIEMBRAPA</p></a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Registrar Novo Usuario</p>

    <form action="" method="post">
      <div class="form-group has-feedback">
        <input type="text" name="form_usuario" class="form-control" placeholder="Usuario" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input input type="text" name="form_nome" class="form-control" placeholder="Nome" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
        <div class="form-group has-feedback">
            <input input type="email" name="form_email" class="form-control" placeholder="E-mail" required>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
      <div class="form-group has-feedback">
        <input input type="password" name="form_senha" required class="form-control" placeholder="Senha">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Repetir senha" name="senha2">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
<div class="form-group has-feedback">
    <?php
        /*echo "<select name='form_setor' id='setores' class='form-control'>";
            for ($i = 0; $i < mysqli_num_rows($resultado); $i++) {
               $linha = mysqli_fetch_array($resultado);
                echo "<option value='".$linha['setor_id']."'>".$linha['setor_id']." - ".$linha['nome_setor']."</option>";
            }*/

    ?>

        <select name="form_setor" id="setores" class="form-control">
				<option value="1">SPL/SEFIN</option>
				<!--<option value="2">SEFIN</option>
				<option value="3">STI</option>
				<option value="4">GESEP</option>
				<option value="5">PA's</option>
				<option value="6">DIREX</option>
				<option value="7">SGQ</option>
				<option value="8">SGP</option>
				<option value="9">GESEP</option>
				<option value="10">GECRE</option>-->
			</select>
        <span class="glyphicons glyphicons-suitcase form-control-feedback"></span>      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label class="">
              <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Eu aceito os <a href="../#">termos</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Registrar</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">



    </div>

    <a href="../paginas/login.php" class="text-center">Já sou cadastrado</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>


</body></html>
