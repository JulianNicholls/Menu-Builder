<?php
require_once( 'autoload.php' );

$menu = new Menu;

$about = $menu->add( 'About', 'about' );

// Add a caret because the item has sub items
// and attach some HTML attributes too

$about->link->append( ' <span class="caret"></span>' );
$about->link->attributes( ['class' => 'link-item', 'target' => '_blank'] );

// Add an attribute to the item wrapper itself

$about->attributes( 'data-model', 'info' );

$t = $about->add( 'Who are we?', array( 'url' => 'who-we-are', 'class' => 'navbar-item whoweare' ) );
$about->add( 'What do we do?', array( 'url' => 'what-we-do', 'class' => 'navbar-item whatwedo' ) );

$about->add( 'Goals', array( 'url' => 'goals', 'display' => false ) ); 

$about->add( 'Portfolio', 'portfolio' ); 
$about->add( 'Contact', 'contact' );

// Now filter out the item with display set to false

$menu->filter( function( $item ) {
  return $item->meta( 'display' ) !== false;
});
?>
<!DOCTYPE html>
<html>
<head>
	<title>Simple Usage</title>

	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>
<?php
  // echo $menu->asUl( array( 'class' => 'ausomw-ul' ) );
  // echo $menu->asOl( array( 'class' => 'ausomw-ol') );
  echo $menu->asDiv( array( 'class' => 'ausomw-div') );
?>
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
</body>