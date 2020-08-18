      <?php 
              if(isset($_SESSION["id_usuario"])){  
 ?>


<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="home">Clínica San Miguel</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">          
          <li class="nav-item dropdown">  
            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Turnos</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <?php if($_SESSION["id_tipo_usuario"] == USER_CLIENTE ){ ?>  
              <a class="dropdown-item " href="turnosPrestacionesAdd">Solicitar Turno</a>
              <?php } ?>
              <a class="dropdown-item" href="turnosPrestaciones">Cronograma de Turnos</a>
            </div>
          </li>
               
          <?php 
          if($_SESSION["id_tipo_usuario"] == USER_DOCTOR || $_SESSION["id_tipo_usuario"] == USER_ADMINISTRADOR){ ?>  
          </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pacientes</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item " href="#"></a>
              <a class="dropdown-item" href="buscadorPacientes">Consulta de Historia Clínica</a>
            </div>
          </li>
          <?php } ?>

 <?php 
          if($_SESSION["id_tipo_usuario"] == USER_ADMINISTRADOR){ ?>  
             <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Usuarios</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item " href="#"></a>
              <a class="dropdown-item" href="agregarUsuario">Agregar usuarios</a>
              <a class="dropdown-item" href="listaUsuarios">Lista de usuarios</a>
            </div>
          </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Especialidades</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item " href="#"></a>
              <a class="dropdown-item" href="agregarEspecialidad">Agregar especialidad</a>
              <a class="dropdown-item" href="listaEspecialidades">Lista de especialidades</a>
            </div>
          </li>
           <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Obras Sociales</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item " href="#"></a>
              <a class="dropdown-item" href="agregarObraSocial">Agregar obra social</a>
              <a class="dropdown-item" href="listaObrasSociales">Lista de obras sociales</a>
            </div>
          </li>


  <?php } ?>


   
        </ul>
        <ul class="nav navbar-nav flex-row navbar-right"><!-- MENU USUARIO -->
              <?php 
              if($_SESSION["id_tipo_usuario"] == USER_DOCTOR){  
                  $nombre_tipo = 'Doctor';
                 } elseif ($_SESSION["id_tipo_usuario"] == USER_CLIENTE){
                  $nombre_tipo = 'Cliente';
                 }elseif ($_SESSION["id_tipo_usuario"] == USER_ADMINISTRADOR){ 
                  $nombre_tipo = 'Administrador';            
                } else {
                  $nombre_tipo = 'Secretaria';
                }
                ?>
                  <li class="nav-item dropdown">
                    <a href="#" class=" nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user">  </i><?php echo "   ".$_SESSION["apellido"].', '.$_SESSION["nombre"]." ( ".$nombre_tipo." )"; ?> <span class="caret"></span></a>
                    <div class="dropdown-menu">                      
                      <a class="dropdown-item" href="logout"><i class="fa fa-sign-out-alt"></i> Cerrar Sesion</a>
                    </div>
                  </li>
            
        </ul>
      </div>
    </nav>

          <?php 
             }  
 ?>