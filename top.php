<div class="navbar-inner">
    <div class="container-fluid">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <a class="brand" href="index.php?modul=home"> <img src="img/resto.png" /> <span>SISTEM INFORMASI <br/> PENJUALAN MASAKAN</span></a>

        <!-- theme selector ends -->

        <!-- user dropdown starts -->
        <div class="btn-group pull-right" >
            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="icon-user"></i><span class="hidden-phone"><?php echo ucfirst($_SESSION['nama_user']);?></span>
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
        <!-- user dropdown ends -->
    </div>
</div>