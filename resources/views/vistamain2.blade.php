<!DOCTYPE html>


<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>MyCan&Cat</title>
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Icons-->
    <link href="https://coreui.io/demo/vendors/@coreui/icons/css/coreui-icons.min.css" rel="stylesheet">
    <link href="https://coreui.io/demo/vendors/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
    <link href="https://coreui.io/demo/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://coreui.io/demo/vendors/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <link href = "https://unpkg.com/ionicons@4.4.6/dist/css/ionicons.min.css"  rel = "hoja de estilo" >

    <!-- Main styles for this application-->
    <link href="https://coreui.io/demo/css/style.css" rel="stylesheet">
    <link href="https://coreui.io/demo/vendors/pace-progress/css/pace.min.css" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      // Shared ID
      gtag('config', 'UA-118965717-3');
      // Bootstrap ID
      gtag('config', 'UA-118965717-5');
    </script>
  </head>
  <body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
  
  @include('plantilla.navc')

    <div class="app-body">
      @include('plantilla.sidebarc')
      <main class="main">
        <!-- Breadcrumb-->
    
        <div class="container-fluid">
          <div class="animated fadeIn"></div>
          <div class="card mt-2 mb-3">
		<div class="card-header">
		</div>
		<div class="card-body">
		@yield('contenido')
		</div>
		</div>
        </div>
      </main>
    </div>

    <footer class="app-footer">
      <div>
        <a href="#">MyCant&Cat</a>
        <span>&copy; 2018</span>
      </div>
      <div class="ml-auto">
        <span>MyCant&Cat</span>
        <a href="#"></a>
      </div>
    </footer>
    <!-- CoreUI and necessary plugins-->
    <script src="https://coreui.io/demo/vendors/jquery/js/jquery.min.js"></script>
	<script src="https://coreui.io/demo/vendors/bootstrap/js/bootstrap.min.js"></script>
	<script src="https://coreui.io/demo/vendors/pace-progress/js/pace.min.js"></script>
	<script src="https://coreui.io/demo/vendors/perfect-scrollbar/js/perfect-scrollbar.min.js"></script>
	<script src="https://coreui.io/demo/vendors/@coreui/coreui-pro/js/coreui.min.js"></script><script src="vendors/@coreui/coreui-pro/js/coreui.min.js"></script>
  <script  src = "https://unpkg.com/ionicons@4.4.6/dist/ionicons.js"></script>
  </body>
</html>
