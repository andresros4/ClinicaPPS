

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  <div class="container-fluid">
      <div class="row justify-content-center">
          <div class="col-6 align-self-center text-center">
            <form class="form-signin" method="post">                
                <h1 class="h3 mb-3 font-weight-normal">Clínica San Miguel</h1>
                <h4 class="h3 mb-3 font-weight-normal">Inicio de sesión</h4>
                <label for="inputEmail" class="sr-only">Email address</label>
                <input type="text" id="user" name="user" class="form-control" placeholder="Ingrese DNI" required autofocus>
                <label for="inputEmailPassword" class="sr-only">Password</label>
                <input type="password" id="pass" name="pass" class="form-control" placeholder="Ingrese constraseña" required>
                <div class="checkbox mb-3">
                </div>
               
                <button class="btn btn-lg btn-primary" type="submit">Ingresar</button>
                <a href="/clinica/registro" class="btn btn-lg btn-primary">Registrarse</a>
                <p class="mt-5 mb-3 text-muted">&copy; Andrés Rosa 2020</p>
            </form>
            <?php echo $this->info; ?>
          </div>
      </div>
  </div>
