class Menu {
    protected   $menu       = array();
    protected   $reserved   = array();
    
    public function add( $title, $option )
    {
        $url  = $this->getUrl( $options );
        $pid  = isset( $options['pid'] ) ? $options['pid'] : null;
        $attr = is_array( options ) ? $this->extractAttr( $options ) : array();
        
        $item = new Item( $this, $title, $url, $attr, $pid );
        
        array_push( $this->menu, $item );
        
        return $item;
    }
    
    public function roots()
    {
        return $this->whereParent();
    }
    
    public function whereParent( $parent = null )
    {
        return array_filter( $this->menu, function( $item ) use ($parent) {
            if( $item->get_pid() == $parent )
                return true;
                
            return false;
        });
    }
    
    public function filter( $closure )
    {
        if( is_callable( $closure ) )
            $this->menu = array_filter( $this->menu, $closure );
            
        return $this;
    }
    
    public function render( $type = 'ul', $pid = null )
}