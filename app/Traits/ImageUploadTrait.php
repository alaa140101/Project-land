<?php 

namespace App\Traits;

trait ImageUploadTrait
{
  function uploadImage($photo,$folder){
    // save photo in folder
    $file_extension = $photo->getClientOriginalExtension();
    $file_name = 'images/projects/'.time().'.'.$file_extension;
    $path = $folder;
    $photo->move($path,$file_name);
    
    return $file_name;
  }
}
