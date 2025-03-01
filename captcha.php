<?php
session_start();

function acakCaptcha()
{
    $alphabet = "ABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";

    // untuk menyatakan $pass sebagai array
    $pass = array();

    // masukkan -2 dalam string length
    $panjangAlpha = strlen($alphabet) - 2;
    for ($i = 0; $i < 5; $i++) {
        $n = rand(0, $panjangAlpha);
        $pass[] = $alphabet[$n];
    }
    // ubah array menjadi string
    return implode($pass);
}

// untuk mengacak captcha
$code = acakCaptcha();
$_SESSION["code"] = $code;

// lebar dan tinggi captcha
$wh = imagecreatetruecolor(173, 50);

// background color hitam
$bgc = imagecolorallocate($wh, 0, 0, 0);

// text color putih
$fc = imagecolorallocate($wh, 255, 255, 255);

imagefill($wh, 0, 0, $bgc);

// ( $image , $fontsize , $string , $fontcolor )
imagestring($wh, 10, 50, 15, $code, $fc);

// buat gambar
header('content-type: image/jpeg');
imagejpeg($wh);
imagedestroy($wh);
?>
