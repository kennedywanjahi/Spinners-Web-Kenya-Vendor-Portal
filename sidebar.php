
<?php
if (!isset($_SESSION['username'])) {
  echo '<script>window.location="index.php" </script>';
}
 ?><div class="left-sidebar-pro">
    <nav id="sidebar">
        <div class="sidebar-header">

            <h3>User :
            <?php
            echo $_SESSION['username']; ?></h3>
            <p>Role:
              <?php echo $_SESSION['role']; ?></p>
              <?php
              $role = $_SESSION['role'];
              if ($role === 'Vendor' ) {
                ?>
                <p>Vatable ? :
                  <?php echo $_SESSION['vatable']; ?></p>
                <?php
              }
                ?>

        </div>
        <div class="left-custom-menu-adp-wrap">
            <ul class="nav navbar-nav left-sidebar-menu-pro">
                <li class="nav-item">
                  <a href="<?php
                  if ($_SESSION['role'] === 'Vendor') {
                    echo "vendor_home.php";
                  }else {
                    echo "admin_home.php";
                  } ?>" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-home"></i> <span class="mini-dn">Home</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
                  <?php
                  $role = $_SESSION['role'];
                  if ($role === 'Vendor' ) {
                    ?>
                    <li class="nav-item"><a href="vendor_weekly.php" ><i class="fa big-icon fa-flask"></i> <span class="mini-dn">Weekly Sales</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>

                    <li class="nav-item"><a href="vendoritems.php" ><i class="fa big-icon fa-bar-chart-o"></i> <span class="mini-dn">Item List</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
                    </li>
                    <li class="nav-item"><a href="downloads.php" ><i class="fa big-icon fa-bar-chart-o"></i> <span class="mini-dn">Downloads</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
                    </li>

                    <?php
                  }else {
                    ?>
                </li>
                <li class="nav-item"><a href="users.php" ><i class="fa big-icon fa-user"></i> <span class="mini-dn">Users</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
                </li>
                <li class="nav-item"><a href="items.php" ><i class="fa big-icon fa-list"></i> <span class="mini-dn">Item List</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
                </li>
              </li>
              <li class="nav-item"><a href="payouts.php" ><i class="fa big-icon fa-calendar-times"></i> <span class="mini-dn"> Monthly Summaries</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
              </li>
            </li>
            <li class="nav-item"><a href="payoutdetails.php" ><i class="fa big-icon fa-info"></i> <span class="mini-dn"> Monthly Details</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
            </li>
          </li>
          <li class="nav-item"><a href="weeklysummaries.php" ><i class="fa big-icon fa-calendar-plus"></i> <span class="mini-dn"> Weekly Summaries</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
          </li>
        </li>
        <li class="nav-item"><a href="weeklydetails.php" ><i class="fa big-icon fa-info-circle"></i> <span class="mini-dn"> Weekly Details</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
        </li>
            <li class="nav-item"><a href="payoutperiods.php" ><i class="fa big-icon fa-bar-chart-o"></i> <span class="mini-dn">Payout Periods</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
            </li>
            <li class="nav-item"><a href="weeklyperiods.php" ><i class="fas big-icon fa-calendar-week"></i> <span class="mini-dn">Weekly Periods</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
            </li>
          </li>
          <li class="nav-item"><a href="weeklyperiods.php" ><i class="fas big-icon fa-calendar-week"></i> <span class="mini-dn">Payment Methods</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
          </li>
        
                <?php
              }
               ?>



            </ul>
        </div>
    </nav>
</div>
<!-- Header top area start-->
<div class="content-inner-all">
    <div class="header-top-area">
        <div class="fixed-header-top">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-1 col-md-6 col-sm-6 col-xs-12">
                        <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                            <i class="fa fa-bars"></i>
                        </button>
                        <div class="admin-logo logo-wrap-pro">
                            <a href="#"><img src="img/logo/log.png" alt="" />
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-1 col-sm-1 col-xs-12">
                        <div class="header-top-menu tabl-d-n">

                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                        <div class="header-right-info">
                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                <li class="nav-item dropdown">
                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span class="adminpro-icon adminpro-chat-pro"></span><span class="indicator-ms"></span></a>
                                    <div role="menu" class="author-message-top dropdown-menu animated flipInX">
                                        <div class="message-single-top">
                                            <h1>Message</h1>
                                        </div>
                                        <ul class="message-menu">
                                            <li>
                                                <a href="#">
                                                    <div class="message-img">
                                                        <img src="img/message/1.jpg" alt="">
                                                    </div>
                                                    <div class="message-content">
                                                        <span class="message-date">16 Sept</span>
                                                        <h2>Advanda Cro</h2>
                                                        <p>Please done this project as soon possible.</p>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <div class="message-img">
                                                        <img src="img/message/4.jpg" alt="">
                                                    </div>
                                                    <div class="message-content">
                                                        <span class="message-date">16 Sept</span>
                                                        <h2>Sulaiman din</h2>
                                                        <p>Please done this project as soon possible.</p>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <div class="message-img">
                                                        <img src="img/message/3.jpg" alt="">
                                                    </div>
                                                    <div class="message-content">
                                                        <span class="message-date">16 Sept</span>
                                                        <h2>Victor Jara</h2>
                                                        <p>Please done this project as soon possible.</p>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <div class="message-img">
                                                        <img src="img/message/2.jpg" alt="">
                                                    </div>
                                                    <div class="message-content">
                                                        <span class="message-date">16 Sept</span>
                                                        <h2>Victor Jara</h2>
                                                        <p>Please done this project as soon possible.</p>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="message-view">
                                            <a href="#">View All Messages</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a href="logout.php"  role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                        <span class="adminpro-icon adminpro-user-rounded header-riht-inf"></span>
                                        <span class="admin-name">LOG OUT

                                    </a>

                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header top area end-->
    <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul class="mobile-menu-nav">
                                      <li class="nav-item">

                                        <a href="#" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                          <i class="fa big-icon fa-home"></i> <span class="mini-dn">Home</span>
                                          <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>

                                      </li>
                                      <li class="nav-item"><a href="users.php" ><i class="fa big-icon fa-flask"></i> <span class="mini-dn">Users</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
                                      </li>
                                      <li class="nav-item"><a href="sales.php" ><i class="fa big-icon fa-flask"></i> <span class="mini-dn">Sales</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
                                      </li>
                                      <li class="nav-item"><a href="payouts.php" ><i class="fa big-icon fa-pie-chart"></i> <span class="mini-dn">Monthly Payouts</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
                                      </li>
                                      <li class="nav-item"><a href="statistics.php" ><i class="fa big-icon fa-bar-chart-o"></i> <span class="mini-dn">Statistics</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
                                      </li>
                                      <li class="nav-item"><a href="messages.php" ><i class="fa big-icon fa-bar-chart-o"></i> <span class="mini-dn">Messages</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
                                      </li>

                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu end -->
