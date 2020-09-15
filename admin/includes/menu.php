<div class=" sidebar" role="navigation">
    <div class="navbar-collapse">
        <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="dashboard.php"><i class="fa fa-dashboard nav_icon"></i>Dashboard</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-cogs nav_icon"></i>Election Setting <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li>
                            <a href="Post_add.php">Add Position</a>
                        </li>
                        <li>
                            <a href="view_modified.php">View Position</a>
                        </li>
                        <li>
                            <a href="voting_activation.php">Activate & Deactive Pages</a>
                        </li>
                    </ul>
                    <!-- /nav-second-level -->
                </li>

                <li>
                    <a href="#"><i class="fa fa-group nav_icon"></i>Team <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li>
                            <a href="teamADD.php">Add Team</a>
                        </li>
                        <li>
                            <a href="teams.php">View Team</a>
                        </li>

                    </ul>
                    <!-- /nav-second-level -->
                </li>
                <li class="">
                    <a href="#"><i class="fa fa-user nav_icon"></i>Users Database<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li>
                            <a href="contestant_data_validation.php">Contestant Database</a>
                        </li>
                        <li>
                            <a href="voters_view.php">voters Database</a>
                        </li>
                    </ul>
                    <!-- /nav-second-level -->
                </li>


                <!-- <li>
							<a href=""><i class="fa fa-envelope nav_icon"></i>Mailbox<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level collapse">
								<li>
									<a href="#">Inbox </a>
								</li>
								<li>
									<a href="#">Compose email</a>
								</li>
							</ul>
							 //nav-second-level 
						</li>-->
                <li>
                    <a href="#"><i class="fa fa-laptop nav_icon"></i>Pages<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li>
                            <a href="../index.php">Visit site</a>
                        </li>
                        <li>
                            <a href="../result.php">View result</a>
                        </li>
                    </ul>
                    <!-- //nav-second-level -->
                </li>

            </ul>
            <!-- //sidebar-collapse -->
        </nav>
    </div>
</div>




<div class="sticky-header header-section ">
    <div class="header-left">
        <!--toggle button start-->
        <button id="showLeftPush"><i class="fa fa-bars"></i></button>
        <!--toggle button end-->
        <!--logo -->
        <div class="logo">
            <a href="index.php">
                <h1>Tescode</h1>
                <span>AdminPanel</span>
            </a>
        </div>
        <!--//logo-->
        <!--search-box
				<div class="search-box">
					<form class="input">
						<input class="sb-search-input input__field--madoka" placeholder="Search..." type="search" id="input-31" />
						<label class="input__label" for="input-31">
							<svg class="graphic" width="100%" height="100%" viewBox="0 0 404 77" preserveAspectRatio="none">
								<path d="m0,0l404,0l0,77l-404,0l0,-77z"/>
							</svg>
						</label>
					</form>
				</div><!//end-search-box-->
        <div class="clearfix"> </div>
    </div>
    <div class="header-right">
        <div class="profile_details_left">
            <!--notifications of menu start -->
            <ul class="nofitications-dropdown">

            </ul>
            <div class="clearfix"> </div>
        </div>
        <!--notification menu end -->
        <div class="profile_details">
            <ul>
                <li class="dropdown profile_details_drop">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <div class="profile_img">
                            <span class="prfil-img"><img src="images/a.png" alt=""> </span>
                            <div class="user-name">
                                <p><?=$_SESSION['name'];?></p>
                                <span>Administrator</span>
                            </div>
                            <i class="fa fa-angle-down lnr"></i>
                            <i class="fa fa-angle-up lnr"></i>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                    <ul class="dropdown-menu drp-mnu">
                        <li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li>
                        <li> <a href="#"><i class="fa fa-user"></i> Profile</a> </li>
                        <li> <a href="index.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="clearfix"> </div>
    </div>
    <div class="clearfix"> </div>
</div>