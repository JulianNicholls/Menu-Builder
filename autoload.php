<?php
function __autoload( $class )
{
  require_once( strtolower( $class ) . '.php' );
}

function bootstrapItems( $items )
{
  if( !is_array( $items ) )
    $items = $items->roots();
    
  foreach( $items as $item ) : ?>
    <li <?php if( $item->hasChildren() ) echo 'class="dropdown"'; ?>>
      <a href="<?php echo $item->link->get_url() ?>" <?php if( $item->hasChildren() ) echo 'class="dropdown-toggle" data-toggle="dropdown"'; ?>>
        <?php echo $item->link->get_text() ?> <?php if( $item->hasChildren() ) echo '<b class="caret"></b>'?>
      </a>
      <?php if( $item->hasChildren() ) : ?>
        <ul class="dropdown-menu">
          <?php bootstrapItems( $item->children() ); ?>
        </ul>
      <?php endif; ?>
    </li>
  <?php endforeach;
}
