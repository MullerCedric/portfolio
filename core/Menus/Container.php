<?php
class Container
{
    protected $items = [];

    protected $location;

    protected $id;

    function __construct($location)
    {
        $this->location = $location;
        $this->id = $this->getMenuIdFromLocation( $location );
        $this->items = $this->fetchMenuItems();
    }

    public function getItems()
    {
        return $this->items;
    }

    protected function getMenuIdFromLocation( $location ) {
        $locations = get_nav_menu_locations();
        return $locations[$location] ?? '';
    }

    protected function fetchMenuItems() {
        if ( !$this->id ) return false;
        $nav = [];

        foreach ( wp_get_nav_menu_items( $this->id ) as $post ) {
            $item = new Item($post);
            $nav[] = $item;
        }
        return $nav;
    }
}