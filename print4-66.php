<?php
include './connection/config.inc.php';
include './includes/function.php';
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit();
}

$sql = "select * from `register` where u_id='$_SESSION[id]' and s_check ='1' LIMIT 1";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);
$fet = mysqli_fetch_array($result);

$datetdigit = convert_date_func($fet['datet'], 'full');
$datetdigit2 = convert_date_func($fet['updated'], 'full');

if ($num == 0) {
    header('Location: index.php');
    exit();
}
$sql2 = "select * from `testroom`";
$result2 = mysqli_query($conn, $sql2);
while ($fet2 = mysqli_fetch_array($result2)) {
    if ($fet['idregister'] >= $fet2['number_begin'] && $fet['idregister'] <= $fet2['number_end']) {
        $testroom = $fet2['classroom'];
        $testid = $fet2['test_id'];
        break;
    }
}

$build1 = str_split($testroom);
//ห้องสอบ

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Sarabun:300,400&display=swap" rel="stylesheet">
    <title>:: ระบบรับสมัครนักเรียนออนไลน์ โรงเรียนยุพราชวิทยาลัย จังหวัดเชียงใหม่ ::</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #FAFAFA;
            font-family: 'Sarabun', sans-serif;
        }

        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            -webkit-print-color-adjust: exact;
        }

        .page {
            width: 21cm;
            min-height: 29.7cm;
            padding-top: 1.5cm;
            padding-left: 1.0cm;
            padding-right: 1.0cm;
            padding-bottom: 1.0cm;
            margin: 1cm auto;
            border: 1px #D3D3D3 solid;
            background: white;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .subpage {
            padding-left: 1.5cm;
            height: 256mm;
        }

        li.lh2 {
            line-height: 25px;
            padding: 0 0 2px 0;
        }

        p,
        span {
            margin: 0;
            padding: 0;
        }

        ul {
            padding: 0 0 10px 0;
        }

        .head-topic {
            color: #000;
            font-size: 14px;
            line-height: 24px;
            text-align: left;
        }

        input.MyButton {
            font-family: 'Sarabun', sans-serif;
            width: 140px;
            padding: 4px;
            cursor: pointer;
            font-weight: bold;
            font-size: 14px;
            background: #3366cc;
            color: #fff;
            border: 1px solid #3366cc;
            -moz-box-shadow: 6px 6px 5px #999;
            -webkit-box-shadow: 6px 6px 5px #999;
            box-shadow: 6px 6px 5px #999;
        }

        input.MyButton2 {
            font-family: 'Sarabun', sans-serif;
            width: 140px;
            padding: 4px;
            cursor: pointer;
            font-weight: bold;
            font-size: 14px;
            background: #ff9933;
            color: #fff;
            border: 1px solid #ff9933;
            -moz-box-shadow: 6px 6px 5px #999;
            -webkit-box-shadow: 6px 6px 5px #999;
            box-shadow: 6px 6px 5px #999;
        }

        input.MyButton:hover {
            color: #ffff00;
        }

        input.MyButton2:hover {
            color: #ffff00;
        }

        @page {
            size: A4;
            margin: 0;
        }

        @media print {
            .page {
                margin: 0;
                border: initial;
                border-radius: initial;
                width: initial;
                min-height: initial;
                box-shadow: initial;
                background: initial;
                page-break-after: always;
            }

            .MyButton,
            .MyButton * {
                display: none !important;
            }

            .MyButton2,
            .MyButton2 * {
                display: none !important;
            }
        }
    </style>
</head>

<body>

    <form style="text-align: center;">
        <input class="MyButton" type="button" value="กลับหน้าหลัก" onclick="window.location.href='index.php'" />
        <input class="MyButton2" type="button" value="พิมพ์บัตร" onclick="window.print();" />
    </form>
    <div class="page">
        <div class="subpage">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td colspan="2" align="center"><img width="300" src="img/dpstelogo.png" alt=""></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <strong>โรงเรียนยุพราชวิทยาลัย</strong><br />
                        <strong>โครงการห้องเรียน พสวท. (สู่ความเป็นเลิศ) ศูนย์โรงเรียนยุพราชวิทยาลัย</strong><br />
                        238 ถนนพระปกเกล้า ตำบลศรีภูมิ<br>
                        อำเภอเมือง จังหวัดเชียงใหม่ 50200 โทรศัพท์ 061-4268117
                    </td>
                </tr>
            </table>
            <div style="padding-top: 45px; float: right; padding-right: 40px;"><img width="136" src="./upload/<?php echo $_SESSION['id']; ?>/<?php echo $fet['evi_3']; ?>" alt=""></div>

            <p style="padding-top: 15px; font-weight: 700;">บัตรประจำตัวสอบ สมัครคัดเลือกเข้าเรียน ชั้น ม.4 ปีการศึกษา 2566</p>
            <p style="padding-top: 8px; font-weight: 700;">โครงการห้องเรียน พสวท. (สู่ความเป็นเลิศ) ศูนย์โรงเรียนยุพราชวิทยาลัย</p>
            <p style="padding-top: 15px; font-size: 15px; font-weight: 700;"><u>ข้อมูลผู้สมัคร</u></p>
            <p style="padding-top: 8px; font-size: 15px;"><strong>ชื่อ - สกุล</strong>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $fet['title'] .
                                                                                                                    $fet['name'] .
                                                                                                                    '&nbsp;&nbsp;&nbsp;&nbsp;' .
                                                                                                                    $fet['surname']; ?></p>
            <p style="padding: 8px 0 8px 0; font-size: 15px;"><strong>โรงเรียน</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $fet['school']; ?></p>
            <table width="70%" cellSpacing="0">
                <tr>
                    <td style="border-top:1px solid #000; border-left:1px solid #000; border-bottom:1px solid #000; padding: 8px; background-color:#eee; font-weight:bold; text-align:center;">เลขประจำตัวสอบ</td>
                    <td style="border-top:1px solid #000; border-left:1px solid #000; border-bottom:1px solid #000; padding: 8px; background-color:#eee; font-weight:bold; text-align:center;">ห้องสอบที่</td>
                    <td style="border-top:1px solid #000; border-left:1px solid #000; border-bottom:1px solid #000; padding: 8px; background-color:#eee; font-weight:bold; text-align:center;">ห้องสอบ</td>
                    <td style="border:1px solid #000; padding: 8px; background-color:#eee; font-weight:bold; text-align:center;">อาคาร</td>
                </tr>
                <tr>
                    <td style="border-left:1px solid #000; border-bottom:1px solid #000; padding: 8px; text-align:center;"><?php echo $fet['idregister']; ?></td>
                    <td style="border-left:1px solid #000; border-bottom:1px solid #000; padding: 8px; text-align:center;"><?php echo $testid; ?></td>
                    <td style="border-left:1px solid #000; border-bottom:1px solid #000; padding: 8px; text-align:center;"><?php echo $testroom; ?></td>
                    <td style="border-left:1px solid #000; border-bottom:1px solid #000; border-right:1px solid #000; padding: 8px; text-align:center;"> <?php
                                                                                                                                                            $cout = count($build1);
                                                                                                                                                            if ($cout == '4') { ?>
                            อาคาร&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $build1['0'] .
                                                                                                                                                                    $build1['1']; ?>&nbsp;&nbsp;ชั้น&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $build1['2']; ?>
                        <?php } elseif ($cout == '3') { ?>
                            <strong>อาคาร&nbsp;&nbsp;:</strong>&nbsp;&nbsp;<?php echo $build1['0']; ?>&nbsp;&nbsp;<strong>ชั้น&nbsp;&nbsp;:</strong>&nbsp;&nbsp;<?php echo $build1['1']; ?>
                        <?php }
                        ?>
                    </td>
                </tr>
            </table>

            <p style="padding-top: 15px; font-size: 15px; font-weight: 700;"><u>กำหนดการสอบข้อเขียน</u></p>
            <p style="padding-top: 8px; font-size: 15px;">
                <strong><u>สอบข้อเขียน</u></strong>&nbsp;&nbsp;&nbsp;&nbsp;สอบวันอาทิตย์&nbsp;&nbsp;ที่&nbsp;&nbsp;26&nbsp;&nbsp;กุมภาพันธ์&nbsp;&nbsp;พ.ศ.&nbsp;&nbsp;2566
            </p>
            <p style="padding-top: 8px; padding-left:40px; font-size: 15px;">
                <strong>เวลา&nbsp;&nbsp;&nbsp;08.30&nbsp;&nbsp;-&nbsp;&nbsp;10.00
                    น.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>วิชาคณิตศาสตร์&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </p>
            <p style="padding-top: 8px; padding-left:40px; font-size: 15px;">
                <strong>เวลา&nbsp;&nbsp;&nbsp;10.30&nbsp;&nbsp;-&nbsp;&nbsp;12.00
                    น.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>วิชาวิทยาศาสตร์&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </p>

            <div style="float: left; padding: 10px 20px 0 50px;"><img width="136" src="./img/qr.png" alt=""></div>

            <p style="text-align: left; padding-top: 35px; font-size: 15px;">
                <strong>*** โปรดติดตามข้อมูลข่าวสาร ***</strong>
            </p>

            <p style="text-align: left; padding-top: 10px; font-size: 15px;">
                <strong>ผ่านทางเพจโครงการ พสวท. และ พสวท. สู่ความเป็นเลิศ<br />ศูนย์โรงเรียนยุพราชวิทยาลัย</strong>
            </p>

            <p style="padding-top: 50px; font-size: 15px;"><strong>
                    <u>ข้อแนะนำและอุปกรณ์ที่ต้องนำมาในวันสอบข้อเขียน</u></strong></p>
            <p style="padding-top: 8px; font-size: 15px;">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.&nbsp;&nbsp;แต่งกายด้วยเครื่องแบบนักเรียนเท่านั้น
            </p>
            <p style="padding-top: 8px; font-size: 15px;">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.&nbsp;&nbsp;สวมหน้ากากอนามัยตลอดเวลา และควรพกเจลแอลกอฮอล์ล้างมือติดตัวมาด้วย
            <p style="padding-top: 8px; font-size: 15px;">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.
                &nbsp;&nbsp;ควรมาถึงสนามสอบก่อนเวลา&nbsp;&nbsp;08.00&nbsp;&nbsp;น.&nbsp;&nbsp;ของวันสอบข้อเขียน
            </p>
            <p style="padding-top: 8px; font-size: 15px;">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4.
                &nbsp;&nbsp;นำบัตรประจำตัวสอบมาด้วยในวันสอบ</p>
            <p style="padding-top: 8px; font-size: 15px;">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5.
                &nbsp;&nbsp;ให้นำบัตรประจำตัวประชาชน หรือบัตรประจำตัวนักเรียนมาด้วยในวันสอบ</p>
            <p style="padding-top: 8px; font-size: 15px;">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6.
                &nbsp;&nbsp;อุปกรณ์ที่ใช้ในการทำข้อสอบ ประกอบด้วย ดินสอ&nbsp;&nbsp;2B&nbsp;&nbsp;ปากกาสีน้ำเงิน&nbsp;&nbsp;และยางลบ</p>
            <div style="position: relative;">
                <div style="position: absolute; top: 50px; right: 110px;">
                    <img width="120" src="./img/yrc959844.png" alt="">
                </div>
            </div>
            <table style="padding-top: 80px;" width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td style="line-height: 25px; font-size: 14px;" align="center" valign="top">ลงชื่อ
                        .................................................... นักเรียน</td>
                    <td style="line-height: 25px; font-size: 14px;" align="center" valign="top">ลงชื่อ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ผู้ออกบัตร</td>
                </tr>
                <tr>
                    <td style="line-height: 25px; font-size: 14px;" align="center" valign="top">(<?php echo $fet['title'] .
                                                                                                        $fet['name'] .
                                                                                                        '&nbsp;&nbsp;' .
                                                                                                        $fet['surname']; ?>)</td>
                    <td style="line-height: 25px; font-size: 14px;" align="center" valign="top">(นายศรายุทธ&nbsp;&nbsp;&nbsp;&nbsp;วิริยะคุณานันท์)</td>
                </tr>
                <tr>
                    <td style="line-height: 25px; font-size: 14px;" align="center" valign="top">
                        <?php echo $datetdigit; ?></td>
                    <td style="line-height: 25px; font-size: 14px;" align="center" valign="top">
                        <?php echo $datetdigit2; ?></td>
                </tr>
            </table>
        </div>
    </div>


</body>

</html>