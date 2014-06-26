<?php
require_once( 'autoload.php' );

$main = new Menu;

$main->add( '<span class="glyphicon glyphicon-home"></span>', '' );

$about = $main->add( 'About', 'about' );
  $about->add( 'Who are we?', array( 'url' => 'who-we-are', 'class' => 'navbar-item whoweare' ) );
  $about->add( 'What do we do?', array( 'url' => 'what-we-do', 'class' => 'navbar-item whatwedo' ) );
  $about->add( 'Services', 'services' ); 
  $about->add( 'Portfolio', 'portfolio' ); 
  $about->add( 'Contact', 'contact' );

// Second menu

$user = new Menu;

$user->add( 'Log in', 'login' );

$profile = $user->add( 'Profile', 'profile' ); 
  $profile->add( 'Account', 'account' )
          ->link->prepend( '<span class="glyphicon glyphicon-user"></span> ' );
  $profile->add( 'Settings', 'settings' )
          ->link->prepend( '<span class="glyphicon glyphicon-cog"></span> ' );
?>        

<!DOCTYPE html>
<html>
<head>
	<title>Bootstrap Usage</title>

	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>
  <nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse-1">
          <span class="sr-only">Toggle Navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="#" class="navbar-brand">Menu Builder</a>
      </div>
      
      <div class="collapse navbar-collapse" id="collapse-1">
        <ul class="nav navbar-nav">
          <?php echo bootstrapItems( $main ); ?>
        </ul>
        <form class="navbar-form navbar-left" role="search">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
          </div>
          <button type="submit" class="btn btn-default">Search</button>
        </form>
        <ul class="nav navbar-nav navbar-right">
          <?php echo bootstrapItems( $user ); ?>
        </ul>
      </div>  <!--collapse-1 -->
    </div>  <!-- container-fluid -->
  </nav>
  
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
</body>