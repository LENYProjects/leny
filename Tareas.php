<?php
   session_start();
   require 'funcs/conexion.php';
   require 'funcs/funcs.php'; 
   

   
 
?>

<!DOCTYPE html>
<html lang="es">
   <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <meta name="description" content="" />
      <link rel="icon" href="/assets/img/logo.ico">
      <meta name="author" content="" />
      <title> LENY | Inicio </title>
      <link rel="stylesheet" type="text/css" href="CSS/registro.css">
      <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
      <link href="css/styles.css" rel="stylesheet" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
   </head>
   <body class="sb-nav-fixed">
      <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
         <a class="navbar-brand ps-3" href="index.html">
            <h4> LENY Projects </h4>
         </a>
         <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
         <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
               <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#!"> Ajustes </a></li>
                  <li><a class="dropdown-item" href="#!">Actividades </a></li>
                  <li>
                     <hr class="dropdown-divider" />
                  </li>
                  <li><a class="dropdown-item" href="index.php"> Cerrar Sesion </a></li>
               </ul>
            </li>
         </ul>
      </nav>
      <div id="layoutSidenav">
      <div id="layoutSidenav_nav">
         <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
               <div class="nav">
                  <div class="sb-sidenav-menu-heading"> Inicio </div>
                  <a class="nav-link" href="index.html">
                     <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                     Portal Principal
                  </a>
                  <div class="sb-sidenav-menu-heading"> Opciones </div>
                  <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                     <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                     Roles
                     <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                  </a>
                  <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                     <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="Usuarios.php"> Usuarios </a>
                        <a class="nav-link" href="layout-sidenav-light.html"> Administradores </a>
                     </nav>
                  </div>
                  <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                     <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                     Paginas
                     <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                  </a>
                  <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                     <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                           Cuenta
                           <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                           <nav class="sb-sidenav-menu-nested nav">
                              <a class="nav-link" href="#"> Informacion de la cuenta </a>
                              <a class="nav-link" href="password.html"> Privacidad de la cuenta </a>
                           </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                           Secciones
                           <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                           <nav class="sb-sidenav-menu-nested nav">
                              <a class="nav-link" href="401.html"> Progresos </a>
                              <a class="nav-link" href="Proyectos.php"> Proyectos </a>
                              <a class="nav-link" href="404.html"> Tareas </a>
                              <a class="nav-link" href="500.html"> Progreso personal </a>
                           </nav>
                        </div>
                     </nav>
                  </div>
                  <div class="sb-sidenav-menu-heading">Addons</div>
                  <a class="nav-link" href="Progresos.html">
                     <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                     Progresos
                  </a>
                  <a class="nav-link" href="tables.html">
                     <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                     Usuarios y progresos
                  </a>
               </div>
            </div>
            <div class="sb-sidenav-footer">
               <div class="small"> Has Accedido como: </div>
               Usuario
            </div>
         </nav>
     </div>
         <div id="layoutSidenav_content">
         <main>
        	<div class="card mb-4">
         		<div class="card-header">
         			<i class="fas fa-table me-1"></i>
					Tareas
					<button class="buttons" onclick="location.href='CrearTareas.php'"> Crear Tarea </button>

         		</div>
         		
         		<div class="card-body">
         			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
         				<thead>
         					<tr>
         						<th> Nombre del Proyecto </th>
         						<th> Tarea</th>
         						<th> Id tarea </th>
         						<th> Estado </th>
         						<th> Participantes </th>
         						<th> Prioridad </th> 
         					</tr>
         				</thead>
                     <?php 
                        $sql = "SELECT * from tarea";
                        $result = mysqli_query($mysqli,$sql);
                        while($row = mysqli_fetch_array($result)) { ?>
                                    
                                    <tr>
                                       <td><?php echo $row['nom_proyecto']; ?></td>
                                       <td><?php echo $row['nom_T']; ?></td>
                                       <td><?php echo $row['id_tarea']; ?></td>
                                       <td><?php echo $row['estado']; ?></td>
                                       <td><?php echo $row['participantes']; ?></td>
                                       <td><?php echo $row['prioridad']; ?></td>
                                    </tr>
                                 <?php } ?>      
         			</table>
         		</div>
         	</div>
         </main>
     	</div>
     </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
      <script src="js/scripts.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
      <script src="assets/demo/chart-area-demo.js"></script>
      <script src="assets/demo/chart-bar-demo.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
      <script src="js/datatables-simple-demo.js"></script>
      <script src="assets/demo/chart-pie-demo.js"></script>
   </body>
</html>