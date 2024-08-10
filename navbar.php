    <div class="navbar navbar-fixed-top navbar-inverse">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
                    </a>
                    
                    <div id="coll" class="nav-collapse collapse">
                        <ul class="nav pull-right">
						<?php 
                        require_once 'dbcon.php';
						$query= mysqli_query($connection,"select * from usuarios where us_codigo = '$session_id'")or die(mysql_error());
						$row = mysqli_fetch_array($query);
						
						?>
                            <li class="dropdown">
                                <a href="#" id="name123" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user icon-large"></i><?php echo $row['us_nombre']." ".$row['us_apellido'];  ?> <i class="caret"></i></a>
                                <ul class="dropdown-menu">
									<!--  <li><a class="jkl" tabindex="-1" href="#">Profile</a></li> -->
									<li>
                                        <a tabindex="-1" href="change_password.php" class="jkl">Cambiar Contrase&#241;a</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li><a  class="jkl" tabindex="-1" href="logout.php"><i class="icon-signout icon-large"></i>&nbsp;Cerrar Sesi&#243;n</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
    </div>