<?php 

namespace App\Traits;

trait ImageUploadTrait
{

  protected $image_path = "storage/images/projects";
  protected $img_height = 600;
  protected $img_width = 600;

  public function uploadImage($img)
  {
     
    $img_name = $this->imageName($img);
    \Image::make($img)->resize($this->img_width, $this->img_height);

    $img->move($this->image_path,$img_name);
      
    return "images/projects/".$img_name;
  }

  public function imageName($image)
  {
    $file_extension = $image->getClientOriginalExtension();
    $file_name = time().'.'.$file_extension;

    return $file_name;
  }

}