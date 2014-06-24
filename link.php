<?php
class Link
{
    public $text;
    public $url;
    public $attributes;
    
    public function __construct( $text, $url, $attributes = array() )
    {
        $this->text         = $text;
        $this->url          = $url;
        $this->attributes   = $attributes;
    }
    
    public function get_url()
    {
        return $this->url;
    }
    
    public function get_text()
    {
        return $this->text;
    }
    
    public function append( $content )
    {
        $this->text .= $content;
        
        return $this;
    }

    public function prepend( $content )
    {
        $this->text = $content . $this->text;
        
        return $this;
    }

    public function attributes()
    {
        $args = func_get_args();
        
        if( is_array( $args[0] ) )
        {
            $this->attributes = array_merge( $this->attributes, $args[0] );
            return $this;
        }
        elseif( isset( $args[0] ) && isset( $args[1] ) )
        {
            $this->attributes[$args[0]] = $args[1];
            return $this;
        }
        elseif( isset( $args[0] ) )
        {
            return isset( $this->attributes[$args[0]] ) ? $this->attributes[$args[0]] : null;
        }

        return $this->attributes;
    }    
}
