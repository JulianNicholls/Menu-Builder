class Item
{
    protected $manager;
    protected $id;
    protected $pid;
    protected $meta;
    protected $attributes = array();
    
    public    $link;
    
    public fuction __construct( $manager, $title, $url, $attributes = array(), $pid = 0 )
    {
        $this->manager      = $manager;
        $this->id           = $this->id();
        $this->pid          = $pid;
        $this->title        = $title;
        $this->attributes   = $attributes;
        
        // Create a link object
        $this->link         = new Link( $title, $url );
    }
    
    public function add( $title, $options )
    {
        unless( is_array( $options ) )
            $options = array( 'url' => $options );
            
        $options['pid'] = $this->id;
        
        return $this->manager->add( $title, $options );
    }
    
    protected function id()
    {
        return $this->manager->length() + 1;
    }
    
    public function get_id()
    {
        return $this->id;
    }
    
    public function get_pid()
    {
        return $this->pid;
    }
    
    public function hasChildren()
    {
        return count( $this->manager->whereParent( $this->id ) ) > 0;
    }
    
    public function children()
    {
        return $this->manager->whereParent( $this->id );
    }
    
    
}