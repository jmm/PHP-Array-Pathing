<?php

/*

Dynamically access array elements at arbitrary nesting depth.

Copyright 2011 Jesse McCarthy <http://jessemccarthy.net/>

All rights reserved.

This code is not meant for production, it's for illustrative purposes
only.  The whole point is that it shouldn't be necessary to create
user-defined code to have access to this functionality.  See TODO.

*/

function &array_get_path( &$array, $path, $delim = NULL, $value = NULL, $unset = false ) {

  $num_args = func_num_args();

  $element = &$array;


  if ( ! is_array( $path ) && strlen( $delim = (string) $delim ) ) {

    $path = explode( $delim, $path );

  }
  // if


  if ( ! is_array( $path ) ) {

    // Exception?

  }
  // if


  while ( $path && ( $key = array_shift( $path ) ) ) {

    if ( ! $path && $num_args >= 5 && $unset ) {

      unset( $element[ $key ] );

      unset( $element );

      $element = NULL;

    }
    // if


    else {

      $element =& $element[ $key ];

    }
    // else

  }
  // while


  if ( $num_args >= 4 && ! $unset ) {

    $element = $value;

  }
  // if


  return $element;

}
// array_get_path


function array_set_path( $value, &$array, $path, $delimiter = NULL ) {

  array_get_path( $array, $path, $delimiter, $value );


  return;

}
// array_set_path


function array_unset_path( &$array, $path, $delimiter = NULL ) {

  array_get_path( $array, $path, $delimiter, NULL, true );


  return;

}
// array_unset_path


function array_has_path( $array, $path, $delimiter = NULL ) {

  $has = false;


  if ( ! is_array( $path ) ) {

    $path = explode( $delimiter, $path );

  }
  // if


  foreach ( $path as $key ) {

    if ( $has = array_key_exists( $key, $array ) ) {

      $array = $array[ $key ];

    }
    // if

  }
  // foreach


  return $has;

}
// array_has_path;

