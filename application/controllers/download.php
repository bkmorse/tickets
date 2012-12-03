<?php

class Download_Controller extends Base_Controller {

  public $restful = true;

  function __construct()
  {
    //
  }

  public function get_index($file_id)
  {
    $file = Upload::find($file_id);

    if(!isset( $file->name )) die("Sorry, file does not exist");

    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    header("Content-type: {$file->type};\n"); //or yours?
    header("Content-Transfer-Encoding: binary");
    $len = strlen( base64_decode( $file->contents ) );

    header("Content-Length: $len;\n");
    header ('Content-Disposition: attachment; filename="'. $file->name .'.'. $file->extension .'"');

    echo base64_decode( $file->contents );
  }
}