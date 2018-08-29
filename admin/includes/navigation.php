<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                   <li><a href="../index.php">Početna</a></li>
                   
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['firstname']." ".$_SESSION['lastname']; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="users.php?source=edit_user&user_id=<?php echo $_SESSION['id']; ?>"><img height="30" width="30" src="../img/<?php echo $_SESSION['image']; ?>" style="border-radius:50%"> </a>
                        </li>
                        <li>
                            <a href="users.php?source=edit_user&user_id=<?php echo $_SESSION['id']; ?>">Izmijeni profil</a>
                        </li>
                        
                        <li class="divider"></li>
                        <li>
                            <a href="../logout.php"><i class="fa fa-fw fa-power-off"></i>Odjavi me</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i>Glavna strana</a>
                    </li>
                   <li>
                        <a href="meetings.php"><i class="fa fa-fw fa-calendar"></i> Sastanci</a>
                    </li>
                    
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demoPlus"><i class="fa fa-fw fa-arrows-v"></i>Korisnici<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demoPlus" class="collapse">
                            <li>
                                <a href="users.php">Svi korisnici</a>
                            </li>
                            <li>
                                <a href="users.php?source=add_user">Dodaj korisnike</a>
                            </li>
                            
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demoAbout"><i class="fa fa-fw fa-arrows-v"></i>About sadržaj<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demoAbout" class="collapse">
                            <li>
                                <a href="about_content.php">About sadržaj</a>
                            </li>
                            <li>
                                <a href="about_column.php">About kolumne</a>
                            </li>
                            <li>
                                <a href="about_column.php?option=add_new">Dodaj kolumnu</a>
                            </li>
                            
                        </ul>
                    </li>
                    <li>
                        <a href="header_content.php">Zaglavlje sadržaj</a>
                    </li>
                    <li>
                        <a href="pr.php">PR sadržaj</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demoOffice"><i class="fa fa-fw fa-arrows-v"></i>OFFICES SADRŽAJ<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demoOffice" class="collapse">
                            <li>
                                <a href="offices.php">Sve poslovnice</a>
                            </li>
                            <li>
                                <a href="offices.php?option=add_new">Dodaj poslovnicu</a>
                            </li>
                            
                        </ul>
                    </li>
                    <li>
                        <a href="contact.php">KONTAKT</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>