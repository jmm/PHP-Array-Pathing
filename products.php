<?php

$products = array(

  'literature' => array(

    'books' => array()

    ,

    'audiobooks' => array(

      'cd' => array(),

      'mp3' => array()

    )
    // array 'audiobooks'

  )
  // array 'literature'

  ,

  'electronics' => array(

    'tv-video' => array(),

    'computers' => array(

      'desktops' => array(

        'windows' => array(),

        'apple' => array()

      )
      // array 'desktops'

      ,

      'laptops' => array()

    )
    // array 'computers'

  )
  // array 'electronics'

);
// array $products


$product_id_string = 'electronics/computers/desktops';

$product_id_array = explode( "/", $product_id_string );

