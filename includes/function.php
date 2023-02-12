<?php
function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function CheckInject($strTxt)
{
  $strTxt = str_replace("'", "''", $strTxt);
  $strTxt = str_replace("--", "", $strTxt);
  return $strTxt;
}

function getUserIpAddr()
{
  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    //ip from share internet
    $ip = $_SERVER['HTTP_CLIENT_IP'];
  } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    //ip pass from proxy
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  } else {
    $ip = $_SERVER['REMOTE_ADDR'];
  }
  return $ip;
}

function convert_date_func($strDate, $mode, $type = '')
{
  $month_key = array(
    '01',
    '02',
    '03',
    '04',
    '05',
    '06',
    '07',
    '08',
    '09',
    '10',
    '11',
    '12'
  );
  $month_full = array(
    'มกราคม',
    'กุมภาพันธ์',
    'มีนาคม',
    'เมษายน',
    'พฤษภาคม',
    'มิถุนายน',
    'กรกฎาคม',
    'สิงหาคม',
    'กันยายน',
    'ตุลาคม',
    'พฤศจิกายน',
    'ธันวาคม'
  );
  $month_short = array(
    'ม.ค.',
    'ก.พ.',
    'มี.ค.',
    'เม.ย.',
    'พ.ค.',
    'มิ.ย.',
    'ก.ค.',
    'ส.ค.',
    'ก.ย.',
    'ต.ค.',
    'พ.ย.',
    'ธ.ค.'
  );

  $dYear = substr($strDate, 0, 4); //format Y-m-d H:i:s
  $dMonth = substr($strDate, 5, 2);
  $dDay = substr($strDate, 8, 2);
  if ($dYear < 2550) {
    $dYear += 543;
  }

  switch ($mode) {
    case 'full': // วันที่ 23 เดือนสิงหาคม พ.ศ. 2526
      if (substr($dDay, 0, 1) == 0) {
        // 02 ตัด 0 ออก เพื่อให้เป็นตัวเลขนับ
        $dDay = substr($dDay, 1, 1);
      }
      $thMonth = array_combine($month_key, $month_full);
      $new_date =
        'วันที่ ' . $dDay . ' เดือน' . $thMonth[$dMonth] . ' พ.ศ. ' . $dYear;
      break;
    case 'short': // 23 ส.ค. 26
      $thMonth = array_combine($month_key, $month_short);
      $new_date = $dDay . ' ' . $thMonth[$dMonth] . ' ' . substr($dYear, 2, 2);
      break;
    case 'digit': // 23/08/2550
      $new_date = $dDay . '/' . $dMonth . '/' . $dYear;
      break;
  }
  switch ($type) {
    case 'datetime':
      $dTime = substr($strDate, 11, 8);
      $new_date = $new_date . ' ' . $dTime . ' น.';
      break;
  }
  return $new_date;
}

//Credit www.goragod.com
function resizeImage($source, $target, $name, $width)
{
  // Exif
  $imageinfo = getImageSize($source);
  // ปรับขนาดรูปถ้า $source มีขนาดใหญ่กว่าค่า $width
  if ($imageinfo[0] > $width || $imageinfo[1] > $width) {
    //คำนวณขนาดใหม่
    if ($imageinfo[0] <= $imageinfo[1]) {
      //รูปสูงกว่ากว้าง
      $h = $width;
      $w = round(($h * $imageinfo[0]) / $imageinfo[1]);
    } else {
      $w = $width;
      $h = round(($w * $imageinfo[1]) / $imageinfo[0]);
    }
    switch ($imageinfo['mime']) {
      case 'image/gif':
        $o_im = imageCreateFromGIF($source);
        break;
      case 'image/jpg':
      case 'image/jpeg':
      case 'image/pjpeg':
        $o_im = imageCreateFromJPEG($source);
        break;
      case 'image/png':
      case 'image/x-png':
        $o_im = imageCreateFromPNG($source);
        break;
    }
    // สร้าง รูป jpg จากรูปที่ส่งเข้ามา
    $o_wd = @imagesx($o_im);
    $o_ht = @imagesy($o_im);
    // สร้าง image ใหม่ ขนาดที่กำหนดมา
    $t_im = @ImageCreateTrueColor($w, $h);
    // วาดลงบน image ใหม่
    @ImageCopyResampled($t_im, $o_im, 0, 0, 0, 0, $w + 1, $h + 1, $o_wd, $o_ht);
    // jpg เท่านั้น
    $newname = substr($name, 0, strrpos($name, '.')) . '.jpg';
    if (!@ImageJPEG($t_im, $target . $newname, '90')) {
      $ret = false;
    } else {
      $ret['name'] = $newname;
      $ret['width'] = $w;
      $ret['height'] = $h;
    }
    @imageDestroy($o_im);
    @imageDestroy($t_im);
    return $ret;
  } elseif (@copy($source, $target . $name)) {
    $ret['name'] = $name;
    $ret['width'] = $imageinfo[0];
    $ret['height'] = $imageinfo[1];
    return $ret;
  }
  return false;
}

//Credit www.goragod.com
// สร้าง thumbnail ตัดส่วนที่เกิน เพื่อให้ได้ขนาดที่กำหนด
function cropImage($source, $target, $thumbwidth, $thumbheight)
{
  $size = getImageSize($source);
  $w = $size[0];
  $h = $size[1];

  switch ($size['mime']) {
    case 'image/gif':
      $o_im = imageCreateFromGIF($source);
      break;
    case 'image/jpeg':
      $o_im = imageCreateFromJPEG($source);
      break;
    case 'image/png':
      $o_im = imageCreateFromPNG($source);
      break;
    default:
      $error = $size['mime'] . ' ไม่รองรับ.';
      break;
  }

  if ($error == '') {
    $wm = $w / $thumbwidth;
    $hm = $h / $thumbheight;
    $h_height = $thumbheight / 2;
    $w_height = $thumbwidth / 2;

    $t_im = ImageCreateTrueColor($thumbwidth, $thumbheight);

    if ($w > $h) {
      $adjusted_width = $w / $hm;
      $half_width = $adjusted_width / 2;
      $int_width = $half_width - $w_height;
      ImageCopyResampled(
        $t_im,
        $o_im,
        -$int_width,
        0,
        0,
        0,
        $adjusted_width,
        $thumbheight,
        $w,
        $h
      );
    } elseif ($w < $h || $w == $h) {
      $adjusted_height = $h / $wm;
      $half_height = $adjusted_height / 2;
      $int_height = $half_height - $h_height;
      ImageCopyResampled(
        $t_im,
        $o_im,
        0,
        -$int_height,
        0,
        0,
        $thumbwidth,
        $adjusted_height,
        $w,
        $h
      );
    } else {
      ImageCopyResampled(
        $t_im,
        $o_im,
        0,
        0,
        0,
        0,
        $thumbwidth,
        $thumbheight,
        $w,
        $h
      );
    }

    if (!@ImageJPEG($t_im, $target, '90')) {
      $error = 'ไม่สามารถสร้างรูปได้, ตรวจสอบไดเร็คทอรี่ให้ถูกต้อง';
    }

    imageDestroy($o_im);
    imageDestroy($t_im);
  }

  return $error;
}
// Flash message helper
function flash($name = '', $message = '', $class = 'alert alert-success')
{
  if (!empty($name)) {
    //No message, create it
    if (!empty($message) && empty($_SESSION[$name])) {
      if (!empty($_SESSION[$name])) {
        unset($_SESSION[$name]);
      }
      if (!empty($_SESSION[$name . '_class'])) {
        unset($_SESSION[$name . '_class']);
      }
      $_SESSION[$name] = $message;
      $_SESSION[$name . '_class'] = $class;
    }
    //Message exists, display it
    elseif (!empty($_SESSION[$name]) && empty($message)) {
      $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : 'success';
      echo '<div class="' . $class . '" id="msg-flash">' . $_SESSION[$name] . '</div>';
      unset($_SESSION[$name]);
      unset($_SESSION[$name . '_class']);
    }
  }
}

function redirect($location)
{
  header("location: $location");
  exit();
}

function password_generate($chars)
{
  $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
  return substr(str_shuffle($data), 0, $chars);
}

function imageResize($imageResourceId,$width,$height) {
  $targetWidth = $width < 1280 ? $width : 1280 ;
  $targetHeight = ($height/$width)* $targetWidth;
  $targetLayer = imagecreatetruecolor($targetWidth,$targetHeight);
  imagecopyresampled($targetLayer, $imageResourceId, 0, 0, 0, 0, $targetWidth, $targetHeight, $width, $height);
  return $targetLayer;
}

/** show details */
function size_as_kb($size = 0) {
  if($size < 1048576) {
      $size_kb = round($size / 1024, 2);
      return "{$size_kb} KB";
  } else {
      $size_mb = round($size / 1048576, 2);
      return "{$size_mb} MB";
  }
}

function imgSize($img) {
  $targetWidth = $img[0] < 1280 ? $img[0] : 1280 ;
  $targetHeight = ($img[1] / $img[0])* $targetWidth;
  return [round($targetWidth, 2), round($targetHeight, 2)];
}
