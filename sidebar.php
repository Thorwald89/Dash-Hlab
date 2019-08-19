  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/avatar.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= $login?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Cerca...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Navigatore</li>
        <li class="active treeview menu-open">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?=$navigazione_http?>home.php"><i class="fa fa-circle-o"></i> Home</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Accettazione</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=$navigazione_http?>accettazione.php?pos=paziente"><i class="fa fa-circle-o"></i>Inserisci Paziente/Familiare</a></li>
            <li><a href="<?=$navigazione_http?>accettazione.php?pos=cordone"><i class="fa fa-circle-o"></i>Inserisci Cordone</a></li>
       <!-- esmpio di navigatore tra directory     <li><a href="<?=$navigazione_http?>accettazione.php?pos=familiare&navigatore=1" ><i class="fa fa-circle-o"></i>Inserisci Familiare</a></li>  -->
                     </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-th"></i> <span>Campioni</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
           <ul class="treeview-menu">
         <li> <a  href="<?=$navigazione_http?>lavorazioni/find.php?user=<?=$login?>&navigatore=1" ><i class="fa fa-circle-o"></i>Cerca Campione</a></li>
         <li> <a  href="<?=$navigazione_http?>lavorazioni/inserisci.php?user=<?=$login?>&navigatore=1" ><i class="fa fa-circle-o"></i>Prenota Esame</a></li>
            <li><a href="<?=$navigazione_http?>lavorazioni/fogli_lavoro.php?user=<?=$login?>&navigatore=1" ><i class="fa fa-circle-o"></i>Fogli di Lavoro</a></li>
            <li><a href="<?=$navigazione_http?>lavorazioni/hla_risultati.php?user=<?=$login?>&navigatore=1" ><i class="fa fa-circle-o"></i>Refertazione</a></li>
               </ul>
         
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Gestione Laboratorio</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=$navigazione_http?>magazzino/magazzino.php?user=<?=$login?>&navigatore=1"><i class="fa fa-circle-o"></i> Magazzino</a></li>

          </ul>
        </li>
        
        
        
        
        
        
        
        <li>
          <a href="<?=$navigazione_http?>calendar.php">
            <i class="fa fa-calendar"></i> <span>Calendario & Appuntamenti</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red">3</small>
              <small class="label pull-right bg-blue">17</small>
            </span>
          </a>
        </li>
      
        <li><a href="h#"><i class="fa fa-book"></i> <span>Documentazione</span></a></li>
        <li class="header">Legenda</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Importante!</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Attenzione!</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Informazione</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>








<!--

  <li>
          <a href="pages/mailbox/mailbox.html">
            <i class="fa fa-envelope"></i> <span>Mailbox</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow">12</small>
              <small class="label pull-right bg-green">16</small>
              <small class="label pull-right bg-red">5</small>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Examples</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
            <li><a href="pages/examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
            <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
            <li><a href="pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
            <li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
            <li><a href="pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
            <li><a href="pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
            <li><a href="pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
            <li><a href="pages/examples/pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Multilevel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Level One
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Level Two
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
          </ul>
        </li>
        
        
        -->
