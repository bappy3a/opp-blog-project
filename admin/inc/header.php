<?php 
    include '../lib/session.php'; 
    Session::chesksession();
?>
<?php include '../config/config.php'; ?>
<?php include '../lib/Database.php'; ?>
<?php include '../helpers/formeting.php'; ?>
<?php
    $db = new Database();
    $fm = new format();
?>
<?php
  header("Cache-Control: no-cache, must-revalidate"); 
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000"); 
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
    <!--[if IE 6]><link rel="stylesheet" type="text/css" href="css/ie6.css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" type="text/css" href="css/ie.css" media="screen" /><![endif]-->
    <link href="css/fancy-button/fancy-button.css" rel="stylesheet" type="text/css" />
    <!--Jquery UI CSS-->
    <link href="css/themes/base/jquery.ui.all.css" rel="stylesheet" type="text/css" />
    <!-- BEGIN: load jquery -->
    <script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-ui/jquery.ui.core.min.js"></script>
    <script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
    <!-- END: load jquery -->
    <!--jQuery Date Picker-->
    <script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.datepicker.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.progressbar.min.js" type="text/javascript"></script>
    <!-- jQuery dialog related-->
    <script src="js/jquery-ui/external/jquery.bgiframe-2.1.2.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.mouse.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.draggable.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.position.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.resizable.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.dialog.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.blind.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.explode.min.js" type="text/javascript"></script>
    <!-- jQuery dialog end here-->
    <script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <!--Fancy Button-->
    <script src="js/fancy-button/fancy-button.js" type="text/javascript"></script>
    <script src="js/setup.js" type="text/javascript"></script>
    <!-- Load TinyMCE -->
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>
        <script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            setSidebarHeight();
        });
    </script>
    <!-- /TinyMCE -->
    <style type="text/css">
        #tinymce{font-size:15px !important;}
    </style>
</head>
<body>
    <div class="container_12">
        <div class="grid_12 header-repeat">
            <div id="branding">
                <div class="floatleft logo">
                    <img src="img/livelogo.png" alt="Logo" />
				</div>
				<div class="floatleft middle">
					<h1>Training with live project</h1>
					<p>www.trainingwithliveproject.com</p>
				</div>
                <div class="floatright">
                    <div class="floatleft">
                        <img src="img/img-profile.jpg" alt="Profile Pic" /></div>

            <?php
                if (isset($_GET['action']) && $_GET['action'] == "logout" ) {
                    session::destroy();
                }
            ?>
                    <div class="floatleft marginleft10">
                        <ul class="inline-ul floatleft">
                            <li>Hello Admin</li>
                            <li><a href="?action=logout">Logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="clear">
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
        <div class="grid_12">
            <ul class="nav main">
                <li class="ic-dashboard"><a href="index.php"><span>Dashboard</span></a> </li>
                <li class="ic-form-style"><a href=""><span>User Profile</span></a></li>
				<li class="ic-typography"><a href="changepassword.php"><span>Change Password</span></a></li>
				<li class="ic-grid-tables"><a href="inbox.php"><span>Inbox</span></a></li>
                <li class="ic-charts"><a href="postlist.php"><span>Visit Website</span></a></li>
            </ul>
        </div>
<?php include'inc/sidebar.php'; ?>