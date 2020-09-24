<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">
    <img src="./recursos/logo.png" class="logo" alt="" />
  </a>
  <button
    class="navbar-toggler"
    type="button"
    data-toggle="collapse"
    data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent"
    aria-expanded="false"
    aria-label="Toggle navigation"
  >
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#"
          >Home <span class="sr-only">(current)</span></a
        >
      </li>
      <?php
listarCategorias();
?>
    </ul>
    <form class="form-inline my-6 my-lg-0">
      <input
        class="filtro form-control mr-sm-1"
        type="search"
        placeholder="Intenta buscar 'Paleta de agua'"
        aria-label="Search"
      />
    </form>
    <?php if (!empty($_SESSION['id_usuario'])) {?>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" >
    <div class="my-3 my-sm-0">
        <button
            class="btn  btn-danger my-3 my-sm-1"
            name="cerrarSesion"
            type="submit"
            value="1"
        >
           Cerrar sesión
        </button>
    </div>
    </form>

    <?php } else {?>
    <div class="my-3 my-sm-0">
        <button
            class="btn btn-link my-3 my-sm-1"
            data-toggle="collapse"
            href="#collapseExample"
            type="submit"
        >
            Iniciar sesión
        </button>

        <button class="btn btn-primary my-3 my-sm-1" type="submit">
            Registrarme
        </button>
    </div>

    <?php }?>

  </div>
</nav>
<?php
if (!empty($msgAlert)) {
    echo $msgAlert;
}?>
<div class="collapse" id="collapseExample">

  <div class="card card-body login-card">
    <form name="login" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="form-signin">
      <h1 class="h3 mb-3 font-weight-normal">Iniciar sesión</h1>
      <label for="inputEmail" class="sr-only">Usuario</label>
      <input
        type="User"
        id="inputUser"
        class="form-control"
        placeholder="Nombre de usuario"
        name="usuario"
        required
        autofocus
      />
      <br>
      <label for="inputPassword" class="sr-only">Contraseña</label>
      <input
        type="password"
        id="inputPassword"
        class="form-control"
        name="clave"
        placeholder="Contraseña"
    required
      />
      <br>
      <button class="btn  btn-primary btn-block" type="submit">
        Iniciar sesión
      </button>
      <p class="mt-5 mb-3 text-muted">
        &copy;
        <?php echo date('Y/m/d'); ?>
      </p>
    </form>
  </div>
</div>
