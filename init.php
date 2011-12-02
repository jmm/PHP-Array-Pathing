<?php

$array_pathing_path = dirname( __FILE__ );

foreach ( array( 'products', 'array_get_path', 'MapPath' ) as $script ) {

  require_once "{$array_pathing_path}/{$script}.php";

}
// foreach

