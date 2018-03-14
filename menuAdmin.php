<!DOCTYPE html>
<html>
  <head>
    <title>Admin</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
 
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	<div class="container">
		<header>
			<div width="860px" height="530px">
				<img src="img/chi-siamo.jpg" class="img-rounded" width="860px" height="530px" alt="Rounded Image">	
			</div>
		</header>
		
		<nav>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			
				<ul class="nav navbar-nav">
					<li class="dropdown">
							<a href="#" data-toggle="dropdown" class="dropdown-toggle">Inserimento <b class="caret"></b></a>
							<ul class="dropdown-menu">
                                                            <li><a href="/PhpProject2/InserisciAssistiti.php">Assistiti</a></li>
								<li><a href="#">Interventi</a></li>
								<li><a href="#">Operatori</a></li>
							</ul>
						</li>
					<li class="dropdown">
							<a href="#" data-toggle="dropdown" class="dropdown-toggle">Modifica <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="#">Assistiti</a></li>
								<li><a href="#">Interventi</a></li>
								<li><a href="#">Operatori</a></li>
							</ul>
						</li>        
					<li class="dropdown">
							<a href="#" data-toggle="dropdown" class="dropdown-toggle">Elimina <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="#">Assistiti</a></li>
								<li><a href="#">Interventi</a></li>
								<li><a href="#">Operatori</a></li>
							</ul>
						</li>
					
				</ul>
			</div>
		</nav>
		
	</div>
 
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="//code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>