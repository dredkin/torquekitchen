<?php 

class Dial {
  public $w, $h;
  private $img;
  function __construct($width, $height) {
    $this->w = $width * 4;
    $this->h = $height * 4;
    $this->img = @imagecreatetruecolor($this->w,  $this->h) or die('Ќевозможно инициализировать GD поток');
  }

  public function __destruct() {
    imagedestroy($this->img);
  }
  
  
  function Draw(){
  
    $color = imagecolorallocate($this->img, 0, 0, 255);
    imagefilledellipse($this->img, $this->w/2, $this->h/2 , $this->h/3 , $this->h/3 , $color );
  }
  
  function Send(){
    header ('Content-Type: image/png');
    
    $png = imagecreatetruecolor($this->w/4, $this->h/4);
    imagecopyresampled($png, $this->img, 0, 0, 0, 0, $this->w/4, $this->h/4, $this->w, $this->h);
    imagepng($png);
    imagedestroy($png);
  }
  
}

$width = $_REQUEST['width'];
$height = $_REQUEST['height'];

if($width < 50 or $width > 500)
  $width = 200;
if($height < 50 or $height > 500)
  $height = 200;

$Dial = new Dial($width, $height);

$Dial->Draw();
$Dial->Send();
?>