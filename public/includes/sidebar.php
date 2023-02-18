<aside class="left-sidebar" style="background-color: #1a1d59 !important;">

            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" >
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav" >
                    <ul id="sidebarnav" style="background-color: #1a1d59 !important;">
                        <!-- User Profile-->
                        <li>
                            <!-- User Profile-->
                            <div class="user-profile d-flex no-block dropdown mt-3">
                                <div class="user-pic"><img src="assets/images/users/1.jpg" alt="users" class="rounded-circle" width="40" /></div>
                                <div class="user-content hide-menu ml-2">
                                <?php
                                    $id =  $_SESSION['admin_login'];
                                    $sql = "SELECT * FROM admin WHERE id='{$id}'";
                                    $query =  mysql_query($sql);
                                    $data =  mysql_fetch_assoc($query);
                                    ?>
                                    <a href="javascript:void(0)" class="" id="Userdd" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <h5 class="mb-0 user-name font-medium"><?php  echo $data['username'] ?> <i class="fa fa-angle-down"></i></h5>
                                        <span class="op-5 user-email"><?php  echo $data['email'] ?></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="Userdd">
                                        <a class="dropdown-item" href="javascript:void(0)"><i class="ti-settings mr-1 ml-1"></i> Account Setting</a>
                                        <a class="dropdown-item" href="login.php?logout=true"><i class="fa fa-power-off mr-1 ml-1"></i> Logout</a>
                                    </div>
                                </div>
                            </div>
                            <!-- End User Profile-->
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.php" aria-expanded="false"><i class="mdi mdi-server"></i><span class="hide-menu">Dashboard</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="users.php" aria-expanded="false"><i class="mdi mdi-user"></i><span class="hide-menu">Users</span></a></li>
                        <!-- <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="add-user.php" aria-expanded="false"><i class="mdi mdi-airplay"></i><span class="hide-menu">Add Coach</span></a></li> -->
                        <!-- <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="users.php?user_type=1" aria-expanded="false"><i class="mdi mdi-airplay"></i><span class="hide-menu">Coaches</span></a></li> -->
                        <!-- <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="leagues.php" aria-expanded="false"><i class="mdi mdi-airplay"></i><span class="hide-menu">Leagues</span></a></li> -->
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="categories.php" aria-expanded="false"><i class="mdi mdi-airplay"></i><span class="hide-menu">Categories</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="items.php" aria-expanded="false"><i class="mdi mdi-airplay"></i><span class="hide-menu">Items</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="login.php?logout=true" aria-expanded="false"><i class="mdi mdi-logout"></i><span class="hide-menu">Logout</span></a></li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>