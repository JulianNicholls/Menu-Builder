<?php
function __autoload( $class )
{
  require_once( strtolower( $class ) . '.php' );
}
