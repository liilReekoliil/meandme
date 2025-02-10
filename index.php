<?php
function ValidateEmail($email)
{
   $pattern = '/^([0-9a-z]([-.\w]*[0-9a-z])*@(([0-9a-z])+([-\w]*[0-9a-z])*\.)+[a-z]{2,6})$/i';
   return preg_match($pattern, $email);
}
function ReplaceVariables($code)
{
   foreach ($_POST as $key => $value)
   {
      if (is_array($value))
      {
         $value = implode(",", $value);
      }
      $name = "$" . $key;
      $code = str_replace($name, $value, $code);
   }
   $code = str_replace('$ipaddress', $_SERVER['REMOTE_ADDR'], $code);
   return $code;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['formid']) && $_POST['formid'] == 'contact')
{
   $mailto = 'info@acbl.net.ve';
   $mailfrom = isset($_POST['email']) ? $_POST['email'] : $mailto;
   $subject = 'Información de Contacto';
   $message = 'Su información ha sido recibida.';
   $success_url = './Gracias.html';
   $error_url = '';
   $error = '';
   $eol = "\n";
   $boundary = md5(uniqid(time()));

   $header  = 'From: '.$mailfrom.$eol;
   $header .= 'Reply-To: '.$mailfrom.$eol;
   $header .= 'MIME-Version: 1.0'.$eol;
   $header .= 'Content-Type: multipart/mixed; boundary="'.$boundary.'"'.$eol;
   $header .= 'X-Mailer: PHP v'.phpversion().$eol;
   if (!ValidateEmail($mailfrom))
   {
      $error .= "The specified email address is invalid!\n<br>";
   }

   if (!empty($error))
   {
      $errorcode = file_get_contents($error_url);
      $replace = "##error##";
      $errorcode = str_replace($replace, $error, $errorcode);
      echo $errorcode;
      exit;
   }

   $internalfields = array ("submit", "reset", "send", "filesize", "formid", "captcha_code", "recaptcha_challenge_field", "recaptcha_response_field", "g-recaptcha-response");
   $message .= $eol;
   $message .= "IP Address : ";
   $message .= $_SERVER['REMOTE_ADDR'];
   $message .= $eol;
   $message .= "Referer : ";
   $message .= $_SERVER['SERVER_NAME'];
   $message .= $_SERVER['PHP_SELF'];
   $message .= $eol;
   $logdata = '';
   foreach ($_POST as $key => $value)
   {
      if (!in_array(strtolower($key), $internalfields))
      {
         if (!is_array($value))
         {
            $message .= ucwords(str_replace("_", " ", $key)) . " : " . $value . $eol;
         }
         else
         {
            $message .= ucwords(str_replace("_", " ", $key)) . " : " . implode(",", $value) . $eol;
         }
      }
   }
   $body  = 'This is a multi-part message in MIME format.'.$eol.$eol;
   $body .= '--'.$boundary.$eol;
   $body .= 'Content-Type: text/plain; charset=ISO-8859-1'.$eol;
   $body .= 'Content-Transfer-Encoding: 8bit'.$eol;
   $body .= $eol.stripslashes($message).$eol;
   if (!empty($_FILES))
   {
       foreach ($_FILES as $key => $value)
       {
          if ($_FILES[$key]['error'] == 0)
          {
             $body .= '--'.$boundary.$eol;
             $body .= 'Content-Type: '.$_FILES[$key]['type'].'; name='.$_FILES[$key]['name'].$eol;
             $body .= 'Content-Transfer-Encoding: base64'.$eol;
             $body .= 'Content-Disposition: attachment; filename='.$_FILES[$key]['name'].$eol;
             $body .= $eol.chunk_split(base64_encode(file_get_contents($_FILES[$key]['tmp_name']))).$eol;
          }
      }
   }
   $body .= '--'.$boundary.'--'.$eol;
   if ($mailto != '')
   {
      mail($mailto, $subject, $body, $header);
   }
   $successcode = file_get_contents($success_url);
   $successcode = ReplaceVariables($successcode);
   echo $successcode;
   exit;
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ACBL de Venezuela C.A.</title>
<meta name="generator" content="WYSIWYG Web Builder 12 - http://www.wysiwygwebbuilder.com">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="Logo-ACBL.ico" rel="shortcut icon" type="image/x-icon">
<link href="font-awesome.min.css" rel="stylesheet">
<link href="ACBL19082017.css" rel="stylesheet">
<link href="index.css" rel="stylesheet">
</head>
<body data-spy="scroll">
<div id="wb_LayoutGrid1">
<div id="LayoutGrid1">
<div class="row">
<div class="col-1">
<div id="wb_home">
<a id="home">&nbsp;</a>

</div>
</div>
<div class="col-2">
<div id="wb_Image1">
<img src="images/000-LogoBandera-ACBL.png" id="Image1" alt="">
</div>
<div id="wb_Image10">
<img src="images/000-%20Nombre%20Logo.jpg" id="Image10" alt="">
</div>
</div>
<div class="col-3">
<div id="wb_Image9">
<img src="images/001-Nombre-ACBL.png" id="Image9" alt="">
</div>
</div>
<div class="col-4">
</div>
</div>
</div>
</div>
<div id="wb_LayoutGrid2">
<div id="LayoutGrid2">
<div class="row">
<div class="col-1">
</div>
<div class="col-2">
<div id="wb_CssMenu2">
<ul>
<li class="firstmain"><a class="active" href="./index.php" target="_self">Inicio</a>
</li>
<li><a class="withsubmenu active" href="./index.php#Empresa" target="_self">Empresa</a>

<ul>
<li class="firstitem"><a href="./Empresa.html" target="_self">Capital&nbsp;Humano</a>
</li>
<li><a href="./Empresa.html#CapOperativa" target="_self">Capacidad&nbsp;Operativa</a>
</li>
<li><a href="./Empresa.html#PCalidad" target="_self">Pol&#237;tica&nbsp;de&nbsp;Calidad</a>
</li>
<li><a href="./Empresa.html#RSocial" target="_self">Responsabilidad&nbsp;Social</a>
</li>
<li><a href="./Empresa.html#SComunitaria" target="_self">Salud&nbsp;Comunitaria</a>
</li>
<li class="lastitem"><a href="./Empresa.html#RAmbiental" target="_self">Responsabilidad&nbsp;Ambiental</a>
</li>
</ul>
</li>
<li><a class="withsubmenu active" href="./index.php#Servicios" target="_self">Servicios</a>

<ul>
<li class="firstitem"><a href="./Servicios.html#BookTransporte" target="_self">Transporte&nbsp;Fluvial</a>
</li>
<li><a href="#BookAntenimiento" target="_self">Mantenimiento&nbsp;Naval</a>
</li>
<li><a href="#BookTermi" target="_self">Terminal/Op.&nbsp;Portuarias</a>
</li>
<li class="lastitem"><a href="#BookPEsp" target="_self">Proyectos&nbsp;Especiales</a>
</li>
</ul>
</li>
<li><a class="active" href="./index.php#Contacto" target="_self">Contacto</a>
</li>
</ul>

</div>
</div>
</div>
</div>
</div>
<div id="wb_Carousel2">
<div id="Carousel2">
<div class="frame frame-1">
</div>
<div class="frame frame-2">
</div>
<div class="frame frame-3">
</div>
<div class="frame frame-4">
</div>
<div class="frame frame-5">
</div>
</div>
</div>
<div id="wb_LayoutGrid3">
<div id="LayoutGrid3">
<div class="row">
<div class="col-1">
<div id="wb_Shape1">
<img src="images/img0001.png" id="Shape1" alt="">
</div>
</div>
<div class="col-2">
</div>
</div>
</div>
</div>
<div id="wb_Carousel1">
<div id="Carousel1">
<div class="frame frame-1">
</div>
<div class="frame frame-2">
</div>
<div class="frame frame-3">
</div>
<div class="frame frame-4">
</div>
<div class="frame frame-5">
</div>
</div>
</div>
<div id="wb_Divider1">
<div id="Divider1-overlay"></div>
<div id="Divider1">
<div class="row">
<div class="col-1">
<hr id="DividerLine1">
<div id="wb_Empresa">
<a id="Empresa">&nbsp;</a>

</div>
</div>
</div>
</div>
</div>
<div id="wb_LayoutGrid4">
<div id="LayoutGrid4">
<div class="row">
<div class="col-1">
<div id="wb_Heading1">
<h1 id="Heading1">EMPRESA</h1>
</div>
</div>
</div>
</div>
</div>
<div id="wb_ReadMore">
<div id="ReadMore">
<div class="row">
<div class="col-1">
<div id="wb_LayoutGrid11">
<div id="LayoutGrid11">
<div class="row">
<div class="col-1">
<div id="wb_Image8">
<img src="images/000-Circulo_BaseAzul.png" id="Image8" alt="">
</div>
</div>
<div class="col-2">
<div id="wb_text">
<span style="color:#2E6B97;font-family:Arial;font-size:24px;"><strong>ACBL de Venezuela C.A.</strong></span><span style="color:#2E6B97;font-family:Arial;font-size:16px;"><br><br>Somos una empresa de servicios de transporte de mercancías en aguas interiores por medio de gabarras. Nuestros lineamientos están enmarcados en la cultura de la calidad, orientando la forma de vida y de trabajo en función de la productividad y la excelencia, permitiendo alcanzar un equilibrio armónico dentro de la organización.<br><br>Fundada en 1993, con sede en Ciudad Guayana, Venezuela, principal ciudad industrial del país, es la empresa de transporte fluvial y lacustre, por medio de barcazas, más grande que opera en el Río Orinoco y sus afluentes navegables.<br>.</span><span style="color:#34495E;font-family:Arial;font-size:16px;"><br></span>
</div>
<div id="wb_Shape2">
<a href="./Empresa.html"><div id="Shape2"><div id="Shape2_text"><span style="color:#FFFFFF;font-family:Arial;font-size:12px;">Leer más</span></div></div></a>
</div>
</div>
</div>
</div>
</div>
<div id="wb_LayoutGrid12">
<div id="LayoutGrid12">
<div class="row">
<div class="col-1">
<div id="wb_Text2">
<span style="color:#2E6B97;font-family:Arial;font-size:24px;"><strong>Misi&#0243;n</strong></span><span style="color:#2E6B97;font-family:Arial;font-size:16px;"><br><br>“Proveemos  soluciones en operaciones y transporte  fluvial para el éxito  de nuestros clientes”
<br><br></span><span style="color:#2E6B97;font-family:Arial;font-size:24px;"><strong>Visi&#0243;n<br></strong></span><span style="color:#2E6B97;font-family:Arial;font-size:16px;"><br>“Ser una de las  mejores alternativas en  operación  y transporte fluvial,  posicionándonos  en el  mercado global, de manera rentable y  en armonía con el medio  ambiente”  
<br> </span>
</div>
</div>
<div class="col-2">
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div id="wb_LayoutGrid9">
<div id="LayoutGrid9-overlay"></div>
<div id="LayoutGrid9">
<div class="row">
<div class="col-1">
<hr id="Line1">
<div id="wb_Servicios">
<a id="Servicios">&nbsp;</a>

</div>
</div>
</div>
</div>
</div>
<div id="wb_support">
<div id="support">
<div class="row">
<div class="col-1">
<div id="wb_Heading8">
<h1 id="Heading8">SERVICIOS</h1>
</div>
</div>
</div>
</div>
</div>
<div id="wb_LayoutGrid6">
<div id="LayoutGrid6">
<div class="row">
<div class="col-1">
<div id="wb_Image4">
<img src="images/Iconos01.png" id="Image4" alt="">
</div>
<div id="wb_Heading5">
<h1 id="Heading5">Transporte Fluvial</h1>
</div>
<div id="wb_Text7">
<span style="color:#2E6B97;font-family:Arial;font-size:15px;"><br>Operamos a lo largo de las 544 millas navegables del Río Orinoco y del Río Apure....</span>
</div>
<div id="wb_readmore1">
<a href="./Servicios.html"><div id="readmore1"><div id="readmore1_text"><span style="color:#FFFFFF;font-family:Arial;font-size:12px;">Leer más</span></div></div></a>
</div>
</div>
<div class="col-2">
<div id="wb_Image2">
<img src="images/Iconos02.png" id="Image2" alt="">
</div>
<div id="wb_Heading6">
<h1 id="Heading6">Mantenimiento Naval</h1>
</div>
<div id="wb_Text5">
<span style="color:#2E6B97;font-family:Arial;font-size:15px;"><br>Poseemos nuestro propio dique flotante así como talleres, para el mantenimiento adecuado de&nbsp; ...<br></span>
</div>
<div id="wb_readmore2">
<a href="./Servicios.html"><div id="readmore2"><div id="readmore2_text"><span style="color:#FFFFFF;font-family:Arial;font-size:12px;">Leer más</span></div></div></a>
</div>
</div>
<div class="col-3">
<div id="wb_Image3">
<img src="images/Iconos03.png" id="Image3" alt="">
</div>
<div id="wb_Heading7">
<h1 id="Heading7">Terminal/Operaciones Portuarias</h1>
</div>
<div id="wb_Text6">
<span style="color:#2E6B97;font-family:Arial;font-size:15px;">El Terminal Portuario Orinoco es la instalción portuaria de ACBL de Venezuela, que presta ....</span>
</div>
<div id="wb_readmore3">
<a href="./Servicios.html"><div id="readmore3"><div id="readmore3_text"><span style="color:#FFFFFF;font-family:Arial;font-size:12px;">Leer más</span></div></div></a>
</div>
</div>
<div class="col-4">
<div id="wb_Image5">
<img src="images/Iconos04.png" id="Image5" alt="">
</div>
<div id="wb_Heading3">
<h1 id="Heading3">Proyectos Especiales</h1>
</div>
<div id="wb_Text8">
<span style="color:#696969;font-family:Arial;font-size:15px;"><br></span><span style="color:#2E6B97;font-family:Arial;font-size:15px;">Asesoramos, diseñamos y ejecutamos proyectos especiales ...................</span><span style="color:#696969;font-family:Arial;font-size:15px;"><br></span>
</div>
<div id="wb_readmore4">
<a href="./Servicios.html"><div id="readmore4"><div id="readmore4_text"><span style="color:#FFFFFF;font-family:Arial;font-size:12px;">Leer más</span></div></div></a>
</div>
</div>
</div>
</div>
</div>
<div id="wb_LayoutGrid10">
<div id="LayoutGrid10-overlay"></div>
<div id="LayoutGrid10">
<div class="row">
<div class="col-1">
<hr id="Line2">
<div id="wb_Contacto">
<a id="Contacto">&nbsp;</a>

</div>
</div>
</div>
</div>
</div>
<div id="wb_LayoutGrid5">
<div id="LayoutGrid5">
<div class="row">
<div class="col-1">
<div id="wb_Heading2">
<h1 id="Heading2">CONTACTO</h1>
</div>
</div>
</div>
</div>
</div>
<div id="wb_contact">
<form name="contact" method="post" action="<?php echo basename(__FILE__); ?>" enctype="multipart/form-data" id="contact">
<input type="hidden" name="formid" value="contact">
<div class="row">
<div class="col-1">
<div id="wb_Text1">
<span style="color:#2E6B97;font-family:Arial;font-size:15px;"><strong>DIRECCION</strong><br>C/ El Callao, Torre Lloyd, Piso 3, Ofc. 3-C Puerto Ordaz Estado Bolívar Venezuela 8050<br><br><strong>CONTACTO</strong><br>Email: info@acbl.net.ve<br>Teléfonos:&nbsp; +58 286 923 45 42 <br>&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 923 32 86<br>&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 923 47 17</span><span style="color:#9C9C9C;font-family:Arial;font-size:15px;"><br></span>
</div>
</div>
<div class="col-2">
<div id="wb_Image7">
<img src="images/ubicacion01.jpg" id="Image7" alt="">
</div>
</div>
<div class="col-3">
<input type="text" id="Editbox1" name="nombre" value="" spellcheck="false" placeholder="Nombre">
<input type="text" id="Editbox2" name="email" value="" spellcheck="false" placeholder="Email">
<textarea name="mensaje" id="TextArea1" rows="4" cols="47" spellcheck="false" placeholder="Informaci&#243;n de contacto o requerimiento."></textarea>
<input type="submit" id="Button1" name="" value="Enviar La información ..">
</div>
</div>
</form>
</div>
<div id="wb_LayoutGrid7">
<div id="LayoutGrid7">
<div class="row">
<div class="col-1">
<div id="wb_Image6">
<img src="images/ISO.png" id="Image6">
</div>
</div>
<div class="col-2">
</div>
</div>
</div>
</div>
<div id="StickyLayer">
<div id="wb_up-arrow">
<a href="#home"><div id="up-arrow"><i class="fa fa-angle-up">&nbsp;</i></div></a></div>
</div>
<div id="wb_LayoutGrid8">
<div id="LayoutGrid8">
<div class="row">
<div class="col-1">
<div id="wb_FontAwesomeIcon3">
<a href="./index.php"><div id="FontAwesomeIcon3"><i class="fa fa-facebook">&nbsp;</i></div></a>
</div>
<div id="wb_FontAwesomeIcon8">
<a href="https://twitter.com/ACBLV" target="_blank"><div id="FontAwesomeIcon8"><i class="fa fa-twitter">&nbsp;</i></div></a>
</div>
<div id="wb_FontAwesomeIcon11">
<a href="./index.php"><div id="FontAwesomeIcon11"><i class="fa fa-youtube">&nbsp;</i></div></a>
</div>
<div id="wb_Text17">
<span style="color:#FFFFFF;font-family:Arial;font-size:12px;">Copyright 2017 ACBL de Venezuela C.A.<br>All Rights Reserved <br>Desarrollo AITO C.A.</span>
</div>
</div>
</div>
</div>
</div>
<script src="jquery-1.12.4.min.js"></script>
<script src="wb.carousel.min.js"></script>
<script src="jquery-ui.min.js"></script>
<script src="scrollspy.min.js"></script>
<script src="wwb12.min.js"></script>
<script src="index.js"></script>
</body>
</html>