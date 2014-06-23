class Menu {
    protected   $menu       = array();
    protected   $reserved   = array( 'pid', 'url' );
    
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
    {
        $items = '';
        
        $element = in_array( $type, ['ul', 'ol'] ) ? 'li' : $type;
        
        foreach( $this->whereParent( $pid ) as $item )
        {
            $items .= "<{$element}{$this->parseAttr( $item->attributes() )}>";
            
            if( $item->hasChildren() ) 
            {
                $items .= "<$type>";
                $items .= $this->render( $type, $item->get_id() );
                $items .= "</$type>";
            }
            
            $items .= "</$element>";
        }
        
        return $items;
    }
    
    public function getUrl( $options )
    {
        if( !is_array( $options ) )
            return $options;
        elseif( isset( $options['url'] ) )
            return $options['url'];
            
        return null;
    }
    
    public function extractAttr( $options )
    {
        return array_diff_key( $options, array_flip( $this->reserved ) );
    }
    
    public function parseAttr( $attributes )
    {
        $html = array();
        
        foreach( $attributes as $key => $value )
        {
            if( is_numeric( $key ) )
                $key = $value;
                
            $element = is_null( $value ) ? null : $key . '="' . $value . '"';
            
            unless( is_null( $element ) )
                $html[] = $element;
        }
        
        return count( $html ) > 0 ? ' ' . implode( ' ', $html ) : '';
    }
    
    public function length()
    {
        return count( $this->menu );
    }
    
    public function asUl( $attributes = array() )
    {
        return "<ul{$this->parseAttr( $attributes )}>{$this->render( 'ul' )}</ul>";
    }

    public function asOl( $attributes = array() )
    {
        return "<ol{$this->parseAttr( $attributes )}>{$this->render( 'ol' )}</ol>";
    }

    public function asDiv( $attributes = array() )
    {
        return "<div{$this->parseAttr( $attributes )}>{$this->render( 'div' )}</div>";
    }
}
