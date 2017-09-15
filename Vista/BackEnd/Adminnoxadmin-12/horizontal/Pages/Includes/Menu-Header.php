<!-- Navigation Bar-->

    <div class="topbar-main">
        <div class="container">

            <!-- Logo container-->
            <div class="logo">
                <!-- Text Logo -->
                <!--<a href="Index.php" class="logo">-->
                <!--Zircos-->
                <!--</a>-->
                <!-- Image Logo -->
                <a href="Index.php" class="logo">
                    <img src="assets/images/LogoLittleFrase.png" alt="" height="50">
                </a>

            </div>
            <!-- End Logo container-->


            <div class="menu-extras">

                <ul class="nav navbar-nav navbar-right pull-right">


                    <li class="dropdown navbar-c-items">
                        <span class="badge badge-topbar badge-success">4</span>
                        <a href="#" class="right-menu-item dropdown-toggle waves-effect" data-toggle="dropdown">
                            <i class="mdi mdi-bell"></i>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right dropdown-lg user-list notify-list">
                            <li class="text-center">
                                <h5>Notifications</h5>
                            </li>
                            <li>
                                <a href="#" class="user-list-item">
                                    <div class="icon bg-info">
                                        <i class="mdi mdi-account"></i>
                                    </div>
                                    <div class="user-desc">
                                        <span class="name">New Signup</span>
                                        <span class="time">5 hours ago</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="user-list-item">
                                    <div class="icon bg-danger">
                                        <i class="mdi mdi-comment"></i>
                                    </div>
                                    <div class="user-desc">
                                        <span class="name">New Message received</span>
                                        <span class="time">1 day ago</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="user-list-item">
                                    <div class="icon bg-warning">
                                        <i class="mdi mdi-settings"></i>
                                    </div>
                                    <div class="user-desc">
                                        <span class="name">Settings</span>
                                        <span class="time">1 day ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="all-msgs text-center">
                                <p class="m-0"><a href="#">See all Notification</a></p>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown navbar-c-items">
                        <a href="" class="dropdown-toggle waves-effect profile" data-toggle="dropdown" aria-expanded="true"><img src="archivos/<?php echo $_SESSION["DataUser"]["Foto"]; ?>" alt="user-img" class="img-circle"> </a>
                        <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                            <li class="text-center">
                                <h5>Hola, <?php echo $_SESSION["DataUser"]["Nombres"] ?></h5>
                            </li>
                            <li><a href="javascript:void(0)"><i class="dripicons-user m-r-10"></i> Profile</a></li>
                            <li><a href="adminSujetos.php"><i class="mdi mdi-paw m-r-10"></i> Mis Huellitas</a></li>
                            <li><a href="javascript:void(0)"><i class="dripicons-gear m-r-10"></i> Settings</a></li>
                            <li><a href="javascript:void(0)"><i class="dripicons-lock m-r-10"></i> Lock screen</a></li>
                            <li><a href="../../../../Controlador/UsuarioController.php?action=CerrarSession"><i class="dripicons-power m-r-10"></i> Salir</a></li>
                        </ul>

                    </li>
                </ul>
                <div class="menu-item">
                    <!-- Mobile menu toggle-->
                    <a class="navbar-toggle">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                    <!-- End mobile menu toggle-->
                </div>
            </div>
            <!-- end menu-extras -->

        </div> <!-- end container -->
    </div>
    <!-- end topbar-main -->

    <div class="navbar-custom">
        <div class="container" >
            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">



                    <li class="has-submenu">
                        <a href="../../Adminnoxadmin-12/horizontal/Index.php"><i class="dripicons-home" ></i>INICIO</a>
                    </li>

                    <li class="has-submenu">
                        <a href="#"><i class="fi-paper"></i>ADOPTAR</a>
                        <ul class="submenu megamenu">
                            <li>
                                <ul>
                                    <li><a href="form-elements.html">Form Elements</a></li>
                                    <li><a href="form-advanced.html">Form Advanced</a></li>
                                    <li><a href="form-layouts.html">Form Layouts</a></li>
                                    <li><a href="form-validation.html">Form Validation</a></li>
                                    <li><a href="form-pickers.html">Form Pickers</a></li>
                                    <li><a href="form-wizard.html">Form Wizard</a></li>
                                </ul>
                            </li>
                            <li>
                                <ul>
                                    <li><a href="form-mask.html">Form Masks</a></li>
                                    <li><a href="form-summernote.html">Summernote</a></li>
                                    <li><a href="form-wysiwig.html">Wysiwig Editors</a></li>
                                    <li><a href="form-typeahead.html">Typeahead</a></li>
                                    <li><a href="form-x-editable.html">X Editable</a></li>
                                    <li><a href="form-uploads.html">Multiple File Upload</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li class="has-submenu">
                        <a href="../../Adminnoxadmin-12/horizontal/IndexSujeto.php"><i class="fi-paper-stack"></i>DAR EN ADOPCÍON</a>
                    </li>

                    <li class="has-submenu">
                        <a href="#"><i class="fi-layers"></i>Extras</a>
                        <ul class="submenu megamenu">
                            <li>
                                <ul>
                                    <li><a href="extras-about.html">About Us</a></li>
                                    <li><a href="extras-contact.html">Contact</a></li>
                                    <li><a href="extras-companies.html">Companies</a></li>
                                    <li><a href="extras-members.html">Members</a></li>
                                    <li><a href="extras-members-2.html">Membars 2</a></li>
                                    <li><a href="extras-timeline.html">Timeline</a></li>
                                    <li><a href="extras-invoice.html">Invoice</a></li>
                                    <li><a href="extras-maintenance.html">Maintenance</a></li>
                                </ul>
                            </li>

                        </ul>
                    </li>

                </ul>
                <!-- End navigation menu -->
            </div> <!-- end #navigation -->
        </div> <!-- end container -->
    </div> <!-- end navbar-custom -->

<!-- End Navigation Bar-->
