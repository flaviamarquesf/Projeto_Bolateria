<ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fa fa-birthday-cake"></i>
    </div>
    <div class="sidebar-brand-text mx-3">RD Admin</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="index.php">
    <i class="fas fa-home"></i>
        <span>Inicio</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFluxo"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-piggy-bank"></i>
        <span>Fluxo financeiro</span>
    </a>
    <div id="collapseFluxo" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">tipos:</h6>
            <?php 
               require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/bo/UsuarioPermissaoBO.php';
              if (UsuarioPermissaoBO::usuarioPossuiPermissao($_SESSION['idUsuarioLogado'], "Cadastrar Fluxo")){
                  echo "<a class='collapse-item' href='cadastrarFluxo.php'>Cadastrar</a>";
              }
              if (UsuarioPermissaoBO::usuarioPossuiPermissao($_SESSION['idUsuarioLogado'], "Listar Fluxo")){
                echo "<a class='collapse-item' href='listarFluxo.php'>Listar</a>";
            }
            ?>
           
            
        </div>
    </div>
</li>
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsuario"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-male"></i>
        <span>Usuário</span>
    </a>
    <div id="collapseUsuario" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">tipos:</h6>
            <?php 
               require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/bo/UsuarioPermissaoBO.php';
              if (UsuarioPermissaoBO::usuarioPossuiPermissao($_SESSION['idUsuarioLogado'], "Cadastrar Usuário")){
                  echo "<a class='collapse-item' href='cadastrarUsuario.php'>Cadastrar</a>";
              }
              if (UsuarioPermissaoBO::usuarioPossuiPermissao($_SESSION['idUsuarioLogado'], "Listar Usuário")){
                echo "<a class='collapse-item' href='listarUsuario.php'>Listar</a>";
            }
            ?>
        </div>
    </div>
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProduto"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-gift"></i>
        <span>Produto</span>
    </a>
    <div id="collapseProduto" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">tipos:</h6>
            <?php 
               require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/bo/UsuarioPermissaoBO.php';
              if (UsuarioPermissaoBO::usuarioPossuiPermissao($_SESSION['idUsuarioLogado'], "Cadastrar Produto")){
                  echo "<a class='collapse-item' href='cadastrarProduto.php'>Cadastrar</a>";
              }
              if (UsuarioPermissaoBO::usuarioPossuiPermissao($_SESSION['idUsuarioLogado'], "Listar Produto")){
                echo "<a class='collapse-item' href='listarProduto.php'>Listar</a>";
            }
            ?>
        </div>
    </div>
</li>
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCliente"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-user-plus"></i>
        <span>Cliente</span>
    </a>
    <div id="collapseCliente" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">tipos:</h6>
            <?php 
               require_once $_SERVER['DOCUMENT_ROOT'].'/aulaphp/bolateria/model/bo/UsuarioPermissaoBO.php';
              if (UsuarioPermissaoBO::usuarioPossuiPermissao($_SESSION['idUsuarioLogado'], "Cadastrar Cliente")){
                  echo "<a class='collapse-item' href='cadastrarCliente.php'>Cadastrar</a>";
              }
              if (UsuarioPermissaoBO::usuarioPossuiPermissao($_SESSION['idUsuarioLogado'], "Listar Cliente")){
                echo "<a class='collapse-item' href='listarCliente.php'>Listar</a>";
            }
            ?>
           
            
        </div>
    </div>
</li>

<!--uto
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProduto"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Produto</span>
    </a>
    <div id="collapseProduto" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">tipos:</h6>
            <a class="collapse-item" href="utilities-color.html">cadastrar</a>
            <a class="collapse-item" href="utilities-border.html">listar</a>
            <a class="collapse-item" href="utilities-animation.html">Animations</a>
            <a class="collapse-item" href="utilities-other.html">Other</a>
        </div>
    </div>
</li>
-->

<!-- Nav Item - Utilities Collapse Menu -->

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Addons
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Pages</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
            <a class="collapse-item" href="login.html">Login</a>
            <a class="collapse-item" href="register.html">Register</a>
            <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item" href="blank.html">Blank Page</a>
        </div>
    </div>
</li>

<!-- Nav Item - Charts -->
<li class="nav-item">
    <a class="nav-link" href="charts.html">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Charts</span></a>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item">
    <a class="nav-link" href="tables.html">
        <i class="fas fa-fw fa-table"></i>
        <span>Tables</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

<!-- Sidebar Message -->
<div class="sidebar-card d-none d-lg-flex">
    <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
    <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
    <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
</div>

</ul>