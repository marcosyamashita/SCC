<?php
// Inclui o arquivo de configuração
include('../back/config.php');

// Inclui o arquivo de verificação de login
include('../back/verifica.php');
include('../back/functions.php');


// Se não for permitido acesso nenhum ao arquivo
// Inclua o trecho abaixo, ele redireciona o usuário para 
// o formulário de login
$ano = date('Y');
$query = "SELECT * FROM `contratos` order by contrato_id desc limit 1";
$conexao = mysqli_connect('localhost', 'root', 'otrsdb', 'contratos');
$resultado = mysqli_query($conexao, $query);
$exibe = mysqli_fetch_assoc($resultado);
$contador = $exibe['contrato_id'];
$contador++;


//Query usuarios avatar
$id = $_SESSION['user_id'];
$queryusuario = "select * from usuarios where user_id= {$id}";
$resultadousuario = mysqli_query($conexao, $queryusuario);
$linhasusuario = mysqli_num_rows($resultadousuario);



//$linhas = mysqli_num_rows($resultado);
//$linhas++;
//$contador = $linhas + 1;
include('../back/redir.php');
?>
<html style="height: auto; min-height: 100%;"><head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistema De Contratos - Crediembrapa</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="../https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;box-sizing: content-box;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style><style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;box-sizing: content-box;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style><style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;box-sizing: content-box;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style><style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;box-sizing: content-box;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style><style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;box-sizing: content-box;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style><style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;box-sizing: content-box;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style><style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;box-sizing: content-box;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style><style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;box-sizing: content-box;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style><style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;box-sizing: content-box;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style><style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;box-sizing: content-box;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style><style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;box-sizing: content-box;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style><style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;box-sizing: content-box;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style></head>
<body class="skin-blue sidebar-mini wysihtml5-supported" style="height: auto; min-height: 100%;">
<div class="wrapper" style="height: auto; min-height: 100%;">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><img src="../dist/img/logo-pequeno.png" width="45" height="45"></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><img src="../dist/img/logomarca.jpg"></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="../#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

        <?php while($linhausuario = mysqli_fetch_assoc($resultadousuario)) {?>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                   <?= notificacao(); ?>
                </ul>
              </li>
              <li class="footer"><a href="../#">See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="../#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning"><?= contaNotificacoes(); ?></span>
            </a>
             <ul class="dropdown-menu">
              <li class="header">Você tem <?= contaNotificacoes(); ?> notificações</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">                    
                  <?= notificacao(); ?>
                </ul>
              </li>
              <li class="footer"><a href="../#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="../#">
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="../#">
                      <h3>
                        Create a nice theme
                        <small class="pull-right">40%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">40% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="../#">
                      <h3>
                        Some task I need to do
                        <small class="pull-right">60%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">60% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="../#">
                      <h3>
                        Make beautiful transitions
                        <small class="pull-right">80%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">80% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="../#">View all tasks</a>
              </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="../#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo $linhausuario['avatar_user']?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['nome_usuario']?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo $linhausuario['avatar_user']?>" class="img-circle" alt="User Image">

                  <p>
                      <?php echo $_SESSION['nome_usuario']?>
                      <small><?php echo date("d/m/Y");?></small>
                  </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="../#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="../#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="../#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="../#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                    <a href="../back/sair.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="../#" data-toggle="control-sidebar"></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" style="height: auto;">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo $linhausuario['avatar_user']?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['nome_usuario']?></p>
          <a href="../#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="pesquisa.php" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Pesquisar...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>

          <?php }; ?>

      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu tree" data-widget="tree">
        <li class="header">Navegação Principal</li>
        <li>
          <a href="index.php"><i class="fa fa-Dashboard"></i> <span>Home</span></a>
          
        </li>
        <li class="active menu-open">
          <a href="adicionar.php"><i class="fa fa-book"></i> <span>Adicionar Contrato</span></a>
      
        </li>

        <li>
          <a href="listar.php"><i class="fa fa-files-o"></i> <span>Listar Contratos</span></a>
        </li>
        
<li>
          <a href="notificacoes.php"><i class="fa fa-bell-o"></i> <span>Notificações</span></a>
        </li>
          <li>
              <a href="../paginas/relatorios.php"><i class="fa fa-line-chart"></i><span>Relatórios</span></a>
          </li>
          <li>
              <a href="config.php"><i class="fa fa-cog"></i><span>Configurações</span></a>
          </li>
          <li>
          <a href="../back/sair.php"><i class="ion-android-exit"></i> <span> Sair</span></a>
        </li>
        
        
        
        <li>
          
        </li>
        <li>
          
        </li>
        
        
        <li></li>
        <li class="header">Descrição</li>
        <li></li>
        <li><a href="../#"><i class="fa fa-circle-o text-red"></i> <span>Expirado</span></a></li>
        <li><a href="../#"><i class="fa fa-circle-o text-green"></i> <span>Em andamento</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="min-height: 942px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Adicionar Contrato<small>Contratos</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-info"></i> Alerta!</h4>Atenção com o preenchimento dos campos e com a data de vencimento!</div>
        <!-- FORMULARIO REGISTRO NOVO CONTRATO -->

        <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Novo Contrato</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <form class="form-horizontal" action="adiciona-contrato.php" enctype="multipart/form-data" method="post">
              <div class="box-body">
                  <!--Input Titulo-->
                <div class="form-group">
                    <label for="titulo" class="col-sm-2 control-label">Titulo</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="titulo" placeholder="Titulo" name="titulo" required>
                  </div>
                </div>
                  <!-- Input Numero Contrato -->
                  <div class="form-group">
                    <label for="titulo" class="col-sm-2 control-label">Numero</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="numero" placeholder="000/0000" name="numero" value="<?=$contador= str_pad($contador, 3, "0", STR_PAD_LEFT)?>" readonly>
                  </div>
                </div>
                  <!-- Input Numero Proton -->
                  <div class="form-group">
                      <label for="Próton" class="col-sm-2 control-label">Numero do Próton</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" id="numeroproton" placeholder="0000000" name="numeroproton" maxlength="45">
                      </div>
                  </div>
            <!--Input Descrição-->
                <div class="form-group">
                  <label for="desc" class="col-sm-2 control-label">Descrição</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" rows="3" placeholder="Descrição ..." id="desc" name="descricao" required></textarea>
                  </div>
                </div>
                  <!--Input Fornecedor-->
                  <div class="form-group">
                      <label for="fornecedor" class="col-sm-2 control-label">Contato Fornecedor</label>
                      <div class="col-sm-10">
                          <textarea class="form-control" rows="3" maxlength="200" placeholder="Contados do Fornecedor ..." id="fornecedor" name="fornecedor"></textarea>
                      </div>
                  </div>
                  <!--Input Tempo indeterminado-->
                  <div class="form-group">
                      <label for="tempo_indeterminado" class="col-sm-2 control-label">Tempo Indeterminado: </label><input type="checkbox" name="tempo_indeterminado" value="1" onclick="venci.disabled=this.checked;alerta_pagamento.disabled=this.checked;email_pagamento.disabled=this.checked;repetir.disabled=this.checked;">

                  </div>
                  <!-- Input Data De Inicio -->
                  <div class="form-group">
                  <label for="venci" class="col-sm-2 control-label">Data de inicio</label>

                  <div class="col-sm-2">
                    <input type="date" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" id="inicio" name="inicio" required>
                  </div>
                </div>    
                  <!--Input Vencimento-->
                  <div class="form-group">
                  <label for="venci" class="col-sm-2 control-label">Data de Vigência</label>

                  <div class="col-sm-2">
                    <input type="date" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" id="venci" name="venci">
                  </div>
                </div>
                  <!--Input Pagamento-->
                  <div class="form-group">
                      <label for="pagamento" class="col-sm-2 control-label">Data de Pagamento<h6><b>*Opcional</b></h6></label>

                      <div class="col-sm-2">
                          <input type="date" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" id="pagamento" name="pagamento">
                      </div>
                  </div>
                  <!--Input Alerta Vencimento de Contrato-->
                  <div class="form-group">
                      <label for="alertaContrato" class="col-sm-2 control-label">Alerta Vencimento de Contrato:</label>

                      <div class="col-sm-2">
                            <input type="date" class="col-sm-4 form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" id="alerta_contrato" name="alerta_contrato" required>
                      </div>
                      <label for="emailContrato" class="col-sm-4 control-label">E-mail para envio do Alerta de Contratos: </label>
                      <div class="col-sm-3">
                            <input type="email" class="form-control" id="email_contrato" name="email_contrato" required>
                      </div>
                  </div>
                  <!--Input Alerta Vencimento de Pagamento-->
                  <div class="form-group">
                      <label for="alertaPagamento" class="col-sm-2 control-label">Alerta Vencimento de Pagamento:</label>

                      <div class="col-sm-2">
                          <input type="date" class="col-sm-4 form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" id="alerta_pagamento" name="alerta_pagamento" >
                          <select name="repetir" class="col-sm-2 form-control">
                              <option value="mensal">Mensal</option>
                              <option value="Anual">Anual</option>
                          </select>
                      </div>
                      <label for="emailPagamento" class="col-sm-4 control-label">E-mail para envio do Alerta de Pagamentos: </label>
                      <div class="col-sm-3">
                          <input type="email" class="form-control" id="email_pagamento" name="email_pagamento">
                      </div>
                  </div>
                  <!-- Input tipo de Contrato -->
                      <div class="form-group">
                          <label class="control-label col-sm-2">Tipo de Contrato:</label>
                          <div class="col-sm-10">
                              <div class="form-check">
                                  <input class="form-check-input" type="radio" name="contrato" id="contrato" value="c" checked>
                                  <label class="form-check-label" for="Contratos">
                                      Contratos
                                  </label>
                              </div>
                              <div class="form-check">
                                  <input class="form-check-input" type="radio" name="contrato" id="oficial" value="o">
                                  <label class="form-check-label" for="DocOficiais">
                                      Documentos Oficiais
                                  </label>
                              </div>
                          </div>
                      </div>

                  <!--Input Arquivo-->
                  <div class="form-group">
                  <label for="anexar" class="col-sm-2 control-label">Anexar Contrato</label>

                  <div class="col-sm-10">
                    <input name="userfile" type="file">
                  </div>
                </div> 
              </div>
              
                <!-- Input Valor -->
                     <div class="form-group">
                  <label for="desc" class="col-sm-2 control-label">Valor</label>
                  <div class="col-sm-2">
                    <div class="input-group">
                <span class="input-group-addon">R$</span>
                <input type="text" class="form-control" id="valor" name="valor" required>
              </div>
                  </div>
                </div>
                <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" class="btn btn-danger">Cancelar</button>
                <button type="submit" class="btn btn-success pull-right">Adicionar</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Versão</b> 1.0
    </div>
      <strong>Copyright © 2018 <a href="http://www.sicoobcrediembrapa.com.br" target="_blank">Sicoob/Crediembrapa</a>.</strong>Todos os direitos reservados</footer>
  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Mascaras -->
<script src="..//plugins/input-mask/jquery.inputmask.js"></script>
<script src="..//plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="..//plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="../bower_components/raphael/raphael.min.js"></script>
<script src="../bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../bower_components/moment/min/moment.min.js"></script>
<script src="../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>


<div class="daterangepicker dropdown-menu ltr opensleft"><div class="calendar left"><div class="daterangepicker_input"><input class="input-mini form-control" type="text" name="daterangepicker_start" value=""><i class="fa fa-calendar glyphicon glyphicon-calendar"></i><div class="calendar-time" style="display: none;"><div></div><i class="fa fa-clock-o glyphicon glyphicon-time"></i></div></div><div class="calendar-table"></div></div><div class="calendar right"><div class="daterangepicker_input"><input class="input-mini form-control" type="text" name="daterangepicker_end" value=""><i class="fa fa-calendar glyphicon glyphicon-calendar"></i><div class="calendar-time" style="display: none;"><div></div><i class="fa fa-clock-o glyphicon glyphicon-time"></i></div></div><div class="calendar-table"></div></div><div class="ranges"><ul><li data-range-key="Today">Today</li><li data-range-key="Yesterday">Yesterday</li><li data-range-key="Last 7 Days">Last 7 Days</li><li data-range-key="Last 30 Days">Last 30 Days</li><li data-range-key="This Month">This Month</li><li data-range-key="Last Month">Last Month</li><li data-range-key="Custom Range">Custom Range</li></ul><div class="range_inputs"><button class="applyBtn btn btn-sm btn-success" disabled="disabled" type="button">Apply</button> <button class="cancelBtn btn btn-sm btn-default" type="button">Cancel</button></div></div></div><div class="jvectormap-label" style="left: 887px; top: 2136px; display: none;">Malaysia</div><div class="daterangepicker dropdown-menu ltr opensleft"><div class="calendar left"><div class="daterangepicker_input"><input class="input-mini form-control" type="text" name="daterangepicker_start" value=""><i class="fa fa-calendar glyphicon glyphicon-calendar"></i><div class="calendar-time" style="display: none;"><div></div><i class="fa fa-clock-o glyphicon glyphicon-time"></i></div></div><div class="calendar-table"></div></div><div class="calendar right"><div class="daterangepicker_input"><input class="input-mini form-control" type="text" name="daterangepicker_end" value=""><i class="fa fa-calendar glyphicon glyphicon-calendar"></i><div class="calendar-time" style="display: none;"><div></div><i class="fa fa-clock-o glyphicon glyphicon-time"></i></div></div><div class="calendar-table"></div></div><div class="ranges"><ul><li data-range-key="Today">Today</li><li data-range-key="Yesterday">Yesterday</li><li data-range-key="Last 7 Days">Last 7 Days</li><li data-range-key="Last 30 Days">Last 30 Days</li><li data-range-key="This Month">This Month</li><li data-range-key="Last Month">Last Month</li><li data-range-key="Custom Range">Custom Range</li></ul><div class="range_inputs"><button class="applyBtn btn btn-sm btn-success" disabled="disabled" type="button">Apply</button> <button class="cancelBtn btn btn-sm btn-default" type="button">Cancel</button></div></div></div><div class="jvectormap-label"></div><div class="daterangepicker dropdown-menu ltr opensleft"><div class="calendar left"><div class="daterangepicker_input"><input class="input-mini form-control" type="text" name="daterangepicker_start" value=""><i class="fa fa-calendar glyphicon glyphicon-calendar"></i><div class="calendar-time" style="display: none;"><div></div><i class="fa fa-clock-o glyphicon glyphicon-time"></i></div></div><div class="calendar-table"></div></div><div class="calendar right"><div class="daterangepicker_input"><input class="input-mini form-control" type="text" name="daterangepicker_end" value=""><i class="fa fa-calendar glyphicon glyphicon-calendar"></i><div class="calendar-time" style="display: none;"><div></div><i class="fa fa-clock-o glyphicon glyphicon-time"></i></div></div><div class="calendar-table"></div></div><div class="ranges"><ul><li data-range-key="Today">Today</li><li data-range-key="Yesterday">Yesterday</li><li data-range-key="Last 7 Days">Last 7 Days</li><li data-range-key="Last 30 Days">Last 30 Days</li><li data-range-key="This Month">This Month</li><li data-range-key="Last Month">Last Month</li><li data-range-key="Custom Range">Custom Range</li></ul><div class="range_inputs"><button class="applyBtn btn btn-sm btn-success" disabled="disabled" type="button">Apply</button> <button class="cancelBtn btn btn-sm btn-default" type="button">Cancel</button></div></div></div><div class="jvectormap-label"></div><div class="jvectormap-label"></div><div class="jvectormap-label"></div><div class="jvectormap-label"></div><div class="jvectormap-label"></div><div class="jvectormap-label"></div><div class="jvectormap-label"></div><div class="jvectormap-label"></div><div class="jvectormap-label"></div><div class="jvectormap-label"></div></body></html>