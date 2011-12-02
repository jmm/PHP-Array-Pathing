<?php

/*

Dynamically access array elements at arbitrary nesting depth.

Copyright 2011 Jesse McCarthy <http://jessemccarthy.net/>

All rights reserved.

This code is not meant for production, it's for illustrative purposes
only.  The whole point is that it shouldn't be necessary to create
user-defined code to have access to this functionality.
See http://thehighcastle.com/blog/38/php-dynamic-access-array-elements-arbitrary-nesting-depth.
Since this code is for illustration only, class methods rely on
array_get_path().

*/


function MapPath( &$array, $path = NULL, $delimiter = NULL ) {

  return new MapPath( $array, $path, $delimiter );

}
// MapPath


class MapPath {

  protected $map;

  protected $path;

  protected $delimiter;


  public function __construct( &$array, $path = NULL, $delimiter = NULL ) {

    $this->map( $array );

    $this->path( $path, $delimiter );


    return;

  }
  // __construct


  public static function make( &$array, $path = NULL, $delimiter = NULL ) {

    return new self( $array, $path, $delimiter );

  }
  // make


  public function &map( &$array = NULL ) {

    if ( ! is_null( $array ) ) {

      $return = $this;

      $this->map =& $array;

    }
    // if


    if ( ! $return ) {

      $return =& $this->map;

    }
    //


    return $return;

  }
  // map


  public function path( $path = false, $delimiter = false ) {

    foreach ( array( 'path', 'delimiter' ) as $arg ) {

      if ( $$arg !== false ) {

        $return = $this;

        $this->$arg = $$arg;

      }
      // if

    }
    // foreach


    $return = $return ? $return : $this->path;


    return $return;

  }
  // path


  public function delim( $delimiter = NULL ) {

    if ( ! is_null( $delimiter ) ) {

      $return = $this;

      $this->delimiter = $delimiter;

    }
    // if


    $return = $return ? $return : $this->delimiter;


    return $return;

  }
  // delim


  public function &get( $path = NULL, $delimiter = NULL ) {

    $return =& array_get_path(

      $this->map(),

      ! is_null( $path ) ? $path : $this->path(),

      ! is_null( $delimiter ) ? $delimiter : $this->delimiter

    );


    return $return;

  }
  // get


  public function set( $value, $path = NULL, $delimiter = NULL ) {

    array_get_path(

      $this->map(),

      ! is_null( $path ) ? $path : $this->path(),

      ! is_null( $delimiter ) ? $delimiter : $this->delimiter,

      $value

    );


    return;

  }
  // set


  public function drop( $path = NULL, $delimiter = NULL ) {

    array_get_path(

      $this->map(),

      ! is_null( $path ) ? $path : $this->path(),

      ! is_null( $delimiter ) ? $delimiter : $this->delimiter,

      NULL,

      true

    );


    return;

  }
  // drop


  public function has( $path = NULL, $delimiter = NULL ) {

    $has = array_has_path(

      $this->map(),

      ! is_null( $path ) ? $path : $this->path(),

      ! is_null( $delimiter ) ? $delimiter : $this->delimiter

    );


    return $has;

  }
  // has

}
// MapPath

