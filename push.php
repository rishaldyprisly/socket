<?php
$img = $_POST['image'];
//$img = $_SESSION['image'];
    $folderPath = "upload/";
  
    $image_parts = explode(";base64,", $img);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
  
    $image_base64 = base64_decode($image_parts[1]);
    $fileName = uniqid() . '.png';
  
    $file = $folderPath . $fileName;
    file_put_contents($file, $image_base64);

    



session_start();
$_SESSION['Username'];
  $con = mysqli_connect("localhost", "root", "root", "avparkin_parking");
  $Username             = $_SESSION['Username'];  
  $Time_In              = $_POST['Time_In'];
  $Ticket_Time          = $_POST['Ticket_Time'];
  $Check_Out_Date       = $_POST['Check_Out_Date'];
  $Check_Out_Time       = $_POST['Check_Out_Time'];
  $Durations            = $_POST['Durations'];
  $QR_Code              = $_POST['QR_Code'];
  $Type                 = $_POST['Type'];
  $Gate                 = $_POST['Gate'];
  $Status_Member        = $_POST['Status_Member'];
  $Price                = $_POST['Price'];
  $Ticket_Loss_Penalty  = $_POST['Ticket_Loss_Penalty'];
  $Plate                = $_POST['Plate'];
  $Trans_ID             = $_POST['Trans_ID'];
  $Status               = $_POST['Status'];


$string = file_get_contents("data.json");
$json_a = json_decode($string, true);
                     

   
   $idtransaksi =   $json_a['idtransaksi'];
   $jumlah      =   $json_a['jumlah'];
   $pan         =   $json_a['pan'];
   $bank        =   $json_a['bank'];
   $sa          =   $json_a['sa'];
   $sk          =   $json_a['sk'];
   $tanggal     =   $json_a['tanggal'];


    $query = mysqli_query($con, "INSERT INTO Transaction (Plate, Time_In, Ticket_Time, Check_Out_Date, Check_Out_Time, Durations, QR_Code, Type, Gate, Status_Member,   
                                              Ticket_Loss_Penalty, Price, Img_Check_Out, idtransaksi, jumlah, pan, bank, sa, sk, tanggal) 

                                      VALUES            ('$Plate', '$Time_In', '$Ticket_Time', '$Check_Out_Date', '$Check_Out_Time', '$Durations', '$QR_Code', '$Type', '$Gate', '$Status_Member', '$Ticket_Loss_Penalty', '$Price', '$fileName', '$idtransaksi', '$jumlah', '$pan', '$bank', '$sa', '$sk', '$tanggal')");

    $query_log = mysqli_query($con, "INSERT INTO Transaction_Log (Officer, Plate, Time_In, Ticket_Time, Check_Out_Date, Check_Out_Time, Durations, QR_Code, Type, Gate, Status_Member, Ticket_Loss_Penalty, Price, Img_Check_Out) 
                                            VALUES ('$Username', '$Plate', '$Time_In', '$Ticket_Time', '$Check_Out_Date', '$Check_Out_Time', '$Durations', '$QR_Code', '$Type', '$Gate', '$Status_Member',  '$Ticket_Loss_Penalty', '$Price', '$fileName')");


    $query = mysqli_query($con, "UPDATE Check_In SET QR_Code='$QR_Code', Time_In='$Time_In',Ticket_Time='$Ticket_Time',Gate='$Gate',Type='$Type',Status='$Status' Where Trans_ID ='$Trans_ID'"); 


  if ($query_log && $query){ ?>
 <?php
date_default_timezone_set("Asia/Bangkok");
$time = date("l jS \of F Y");
$hour = date("H:i:s");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html style="width:100%;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0;">
 <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 

  <meta content="width=device-width, initial-scale=1" name="viewport"> 
   
  <meta name="x-apple-disable-message-reformatting"> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
  <meta content="telephone=no" name="format-detection"> 
  <title>AV PARK TICKET</title>
  <link href="https://fonts.googleapis.com/css?family=Merriweather:400,400i,700,700i" rel="stylesheet"> 
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,400i,700,700i" rel="stylesheet"> 
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,700,700i" rel="stylesheet">
  <style type="text/css">
@media only screen and (max-width:600px) {.st-br { padding-left:10px!important; padding-right:10px!important } p, ul li, ol li, a { font-size:16px!important; line-height:150%!important } h1 { font-size:30px!important; text-align:center; line-height:120%!important } h2 { font-size:26px!important; text-align:center; line-height:120%!important } h3 { font-size:20px!important; text-align:center; line-height:120%!important } h1 a { font-size:30px!important; text-align:center } h2 a { font-size:26px!important; text-align:center } h3 a { font-size:20px!important; text-align:center } .es-menu td a { font-size:14px!important } .es-header-body p, .es-header-body ul li, .es-header-body ol li, .es-header-body a { font-size:16px!important } .es-footer-body p, .es-footer-body ul li, .es-footer-body ol li, .es-footer-body a { font-size:14px!important } .es-infoblock p, .es-infoblock ul li, .es-infoblock ol li, .es-infoblock a { font-size:12px!important } *[class="gmail-fix"] { display:none!important } .es-m-txt-c, .es-m-txt-c h1, .es-m-txt-c h2, .es-m-txt-c h3 { text-align:center!important } .es-m-txt-r, .es-m-txt-r h1, .es-m-txt-r h2, .es-m-txt-r h3 { text-align:right!important } .es-m-txt-l, .es-m-txt-l h1, .es-m-txt-l h2, .es-m-txt-l h3 { text-align:left!important } .es-m-txt-r img, .es-m-txt-c img, .es-m-txt-l img { display:inline!important } .es-button-border { display:block!important } a.es-button { font-size:16px!important; display:block!important; border-left-width:0px!important; border-right-width:0px!important } .es-btn-fw { border-width:10px 0px!important; text-align:center!important } .es-adaptive table, .es-btn-fw, .es-btn-fw-brdr, .es-left, .es-right { width:100%!important } .es-content table, .es-header table, .es-footer table, .es-content, .es-footer, .es-header { width:100%!important; max-width:600px!important } .es-adapt-td { display:block!important; width:100%!important } .adapt-img { width:100%!important; height:auto!important } .es-m-p0 { padding:0px!important } .es-m-p0r { padding-right:0px!important } .es-m-p0l { padding-left:0px!important } .es-m-p0t { padding-top:0px!important } .es-m-p0b { padding-bottom:0!important } .es-m-p20b { padding-bottom:20px!important } .es-mobile-hidden, .es-hidden { display:none!important } .es-desk-hidden { display:table-row!important; width:auto!important; overflow:visible!important; float:none!important; max-height:inherit!important; line-height:inherit!important } .es-desk-menu-hidden { display:table-cell!important } table.es-table-not-adapt, .esd-block-html table { width:auto!important } table.es-social { display:inline-block!important } table.es-social td { display:inline-block!important } }
#outlook a {
	padding:0;
}
.ExternalClass {
	width:100%;
}
.ExternalClass,
.ExternalClass p,
.ExternalClass span,
.ExternalClass font,
.ExternalClass td,
.ExternalClass div {
	line-height:100%;
}
.es-button {
	mso-style-priority:100!important;
	text-decoration:none!important;
}
a[x-apple-data-detectors] {
	color:inherit!important;
	text-decoration:none!important;
	font-size:inherit!important;
	font-family:inherit!important;
	font-weight:inherit!important;
	line-height:inherit!important;
}
.es-desk-hidden {
	display:none;
	float:left;
	overflow:hidden;
	width:0;
	max-height:0;
	line-height:0;
	mso-hide:all;
}
.es-button-border:hover {
	border-style:solid solid solid solid!important;
	background:#d6a700!important;
	border-color:#42d159 #42d159 #42d159 #42d159!important;
}
.es-button-border:hover a.es-button {
	background:#d6a700!important;
	border-color:#d6a700!important;
}
</style> 
 </head> 
 <body onload="window.print();" style="width:100%;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0;"> 
  <div class="es-wrapper-color" style="background-color:#F6F6F6;">
   <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;padding:0;Margin:0;width:100%;height:100%;background-repeat:repeat;background-position:center top;"> 
     <tr style="border-collapse:collapse;"> 
      <td class="st-br" valign="top" style="padding:0;Margin:0;"> 
       <table cellpadding="0" cellspacing="0" class="es-content" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;"> 
         <tr style="border-collapse:collapse;"> 
          <td align="center" style="padding:0;Margin:0;"> 
           <table bgcolor="transparent" class="es-content-body" align="center" cellpadding="0" cellspacing="0" width="250" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;"> 
             <tr style="border-collapse:collapse;"> 
              <td align="left" style="padding:0;Margin:0;"> 
               <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
                 <tr style="border-collapse:collapse;"> 
                  <td width="350" align="center" valign="top" style="padding:0;Margin:0;"> 
                   <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
                     <tr style="border-collapse:collapse;"> 
                      <td align="center" style="padding:0;Margin:0;"><img class="adapt-img" src="https://gennv.stripocdn.email/content/guids/CABINET_6bcc721e394d61e12ba3e6dc4219a749/images/71131575971749662.png" alt style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;" width="315"></td> 
                     </tr> 
                   </table></td> 
                 </tr> 
               </table></td> 
             </tr> 
             <tr style="border-collapse:collapse;"> 
              <td align="left" style="Margin:0;padding-bottom:10px;padding-top:30px;padding-left:30px;padding-right:30px;border-radius:10px 10px 0px 0px;background-position:left bottom;background-color:#FFFFFF;" bgcolor="#ffffff"> 
               <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
                 <tr style="border-collapse:collapse;"> 
                  <td width="290" align="center" valign="top" style="padding:0;Margin:0;"> 
                   <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
                     <tr style="border-collapse:collapse;"> 
                      <td align="left" style="padding:0;Margin:0;"> 
                       <div style="font-size:16px;font-family:'merriweather sans', 'helvetica neue', helvetica, arial, sans-serif;text-align:center;">
                         SELAMAT JALAN
                       </div></td> 
                     </tr> 
                     <tr style="border-collapse:collapse;"> 
                      <td align="left" style="padding:0;Margin:0;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:17px;color:#131313;text-align:center;">SAMPAI BERJUMPA KEMBALI DI BANDARA INTERNASIONAL KUALANAMU</p></td> 
                     </tr>
                   </table></td> 
                 </tr> 
               </table></td> 
             </tr>
             <?php
            $con3=mysqli_connect("localhost", "root", "root", "avparkin_parking");
            $result3 = mysqli_query($con3,"SELECT * FROM Transaction WHERE QR_Code = '$QR_Code'");
            ?>
             <tr style="border-collapse:collapse;">
                  <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
                     <tr style="border-collapse:collapse;"> 
                      <td align="left" style="padding:0;Margin:0;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:13px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:13px;color:#131313;">&nbsp;</p></td> 
                     </tr>
                     <tr style="border-collapse:collapse;"> 
                      <td align="left" style="padding:0;Margin:0;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:13px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:13px;color:#131313;">
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php while($data3=mysqli_fetch_array($result3))
                        { ?><?php echo "In : ".  $data3['Time_In']; ?> </p></td> 
                     </tr>
                     
                     <tr style="border-collapse:collapse;"> 
                     <td align="left" style="padding:0;Margin:0;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:13px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:13px;color:#131313;"> 
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo "Out : ".  $data3['Check_Out_Date']; ?> </p></td> 
                     </tr>
                     
                     <tr style="border-collapse:collapse;"> 
                      <td align="left" style="padding:0;Margin:0;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:13px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:13px;color:#131313;"> 
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo "Durations  :  ". $data3['Durations']; ?> </p></td> 
                     </tr>
                     
                      <tr style="border-collapse:collapse;"> 
                      <td align="left" style="padding:0;Margin:0;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:13px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:13px;color:#131313;"> 
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo "Parking Rates : ".  $data3['Price']; ?> </p></td> 
                     </tr>

                    <tr style="border-collapse:collapse;"> 
                      <td align="left" style="padding:0;Margin:0;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:13px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:13px;color:#131313;"> 
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo "Pinalti Lost Ticket : ".  $data3['Ticket_Loss_Penalty']; ?> </p></td> 
                     </tr>

                     <tr style="border-collapse:collapse;"> 
                      <td align="left" style="padding:0;Margin:0;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:13px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:13px;color:#131313;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $time; ?></p></td> 
                     </tr> 

                     <tr style="border-collapse:collapse;"> 
                      <td align="left" style="padding:0;Margin:0;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:13px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:13px;color:#131313;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $hour; ?></p></td> 
                     </tr> 

                

                    
                     <tr style="border-collapse:collapse;"> 
                      <td align="left" style="padding:0;Margin:0;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:13px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:13px;color:#131313;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo "TID    :  " . $json_a['idtransaksi']; ?></p></td> 
                     </tr> 


                     <tr style="border-collapse:collapse;"> 
                      <td align="left" style="padding:0;Margin:0;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:13px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:13px;color:#131313;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo "Rp   :  " . $json_a['jumlah']; ?></p></td> 
                     </tr> 

                     <tr style="border-collapse:collapse;"> 
                      <td align="left" style="padding:0;Margin:0;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:13px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:13px;color:#131313;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo "PAN   :  " . $json_a['pan'] . "  [ " . $json_a['bank'] . " ] "; ?></p></td> 
                     </tr> 

                     <tr style="border-collapse:collapse;"> 
                      <td align="left" style="padding:0;Margin:0;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:13px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:13px;color:#131313;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo "SALDO AWAL  :  " . $json_a['sa']; ?></p></td> 
                     </tr> 

                      <tr style="border-collapse:collapse;"> 
                      <td align="left" style="padding:0;Margin:0;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:13px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:13px;color:#131313;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo "SALDO AKHIR  :  " . $json_a['sk']; ?></p></td> 
                     </tr>

                     <tr style="border-collapse:collapse;"> 
                      <td align="left" style="padding:0;Margin:0;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:13px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:13px;color:#131313;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo "Tanggal  :  " . $json_a['tanggal']; ?></p></td> 
                     </tr> 


                     <tr style="border-collapse:collapse;"> 
                      <td align="center" style="padding:0;Margin:0;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:13px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:13px;color:#131313;">AV PARKING SYSTEM</p></td> 
                     </tr> 
                     <tr style="border-collapse:collapse;"> 
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<td align="left" style="padding:0;Margin:0;"> 
                       <table border="0" cellspacing="1" cellpadding="1" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%;" class="cke_show_border"> 
                         <tr style="border-collapse:collapse;"> 
                          <td style="padding:0;Margin:0;font-size:16px;">Gate 1</td> 
                          <td style="padding:0;Margin:0;text-align:right;font-size:16px;">CAR</td> 
                         </tr> 
                       </table>
                       </td> 
                     </tr>
                     <tr style="border-collapse:collapse;"> 
                      <td align="left" style="padding:0;Margin:0;"> 
                       <table border="0" cellspacing="1" cellpadding="1" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%;" class="cke_show_border"> 
                         <tr style="border-collapse:collapse;"> 
                          <td style="padding:0;Margin:0;font-size:16px;"><br></td> 
                          <td style="padding:0;Margin:0;text-align:right;font-size:16px;"><br></td> 
                         </tr>
                       </table></td> 
                     </tr> 
                         <?php } ?>
                          <?php
            $con4=mysqli_connect("localhost", "root", "root", "avparkin_parking");
            $result4 = mysqli_query($con4,"SELECT * FROM Information");
            ?>
                     <tr style="border-collapse:collapse;"> 
                      <td align="center" style="padding:0;Margin:0;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:19px;color:#131313;"><span data-cke-bookmark="1" id="cke_bm_2326C" style="display:none;">&nbsp;</span><span style="font-size:11px;">
                         <?php while($data4=mysqli_fetch_array($result4))
                        { ?><?php echo $data4['Information_II']; ?> 
                          </span></p> 
                       <ul></ul></td> 
                     </tr> 
                     <tr style="border-collapse:collapse;"> 
                      <td align="center" style="padding:0;Margin:0;"> 
                       <table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
                         <tr style="border-collapse:collapse;"> 
                          <td style="padding:0;Margin:0px 0px 0px 0px;border-bottom:1px solid #CCCCCC;background:none;height:1px;width:100%;margin:0px;"></td> 
                         </tr> 
                       </table></td> 
                     </tr> 
                   </table></td> 
                 </tr> 
               </table></td> 
             </tr> 
             <?php } ?>
             <tr style="border-collapse:collapse;"> 
              <td align="left" style="padding:0;Margin:0;padding-left:20px;padding-right:20px;background-position:left bottom;"> 
               <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
                 <tr style="border-collapse:collapse;"> 
                  <td width="310" align="center" valign="top" style="padding:0;Margin:0;"> 
                   <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
                     <tr style="border-collapse:collapse;"> 
                      <td align="center" height="40" style="padding:0;Margin:0;"></td> 
                     </tr> 
                   </table></td> 
                 </tr> 
               </table></td> 
             </tr> 
             <tr style="border-collapse:collapse;"> 
              <td align="left" style="padding:0;Margin:0;padding-left:20px;padding-right:20px;background-position:left bottom;"> 
               <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
                 <tr style="border-collapse:collapse;"> 
                  <td width="310" align="center" valign="top" style="padding:0;Margin:0;"> 
                   <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-position:left bottom;"> 
                     <tr style="border-collapse:collapse;"> 
                      <td align="center" height="40" style="padding:0;Margin:0;"></td> 
                     </tr> 
                   </table></td> 
                 </tr> 
               </table></td> 
             </tr> 
           </table></td> 
         </tr> 
       </table></td> 
     </tr> 
   </table> 
  </div>  
 </body>
</html>
      
       
      
    <?php
            } else {

           echo "<script type='text/javascript'>alert('Fail To Record Transaction Data!'); window.location = '../car'</script>";
           echo("Error description: " . mysqli_error($query));
           }
?>

