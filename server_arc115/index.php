<?php
$servidor="localhost";
$usuario="id6216838_root";
$baseDatos="id6216838_lq12001";
$password="46471";
$conexion=mysqli_connect($servidor,$usuario,$password,$baseDatos) or die ("Problemas en la conexion");
$datos=mysqli_query($conexion,"SELECT * from ARC") or die("Problemas en el select:".mysqli_error($conexion));
$ultimos=mysqli_query($conexion,"SELECT * FROM ARC ORDER BY ID DESC LIMIT 1") or die("Problemas al obtener hr1:".mysqli_error($conexion));
$hr1=mysqli_query($conexion,"SELECT hr1 FROM ARC ORDER BY ID DESC LIMIT 1") or die("Problemas al obtener hr1:".mysqli_error($conexion));

while($row=mysqli_fetch_assoc($ultimos)){ 
    $t1= $row['t1'];
    $t2= $row['t2'];
    $t3= $row['t3'];
    $h1= $row['h1'];
    $h2= $row['h2'];
    $h3= $row['h3'];
    $hr1= $row['hr1'];
    $hr2= $row['hr2'];
}
    //valores clave:
    if($t1>=0 && $t1<=18){
        $t1_condition="El ambiente es demasiado frio en el Area 1.";
        $t1_color="blue";
    }
    elseif($t1>=18 && $t1<40){
        $t1_condition="El ambiente es propicio en el Area 1.";
        $t1_color="green";
    }
    elseif($t1>40) {
        $t1_condition="La temperatura es demasiado alta, podria dañar el cultivo!.";
        $t1_color="red";
    } //t2
    if($t2>=0 && $t2<=18){
        $t2_condition="El ambiente es demasiado frio en el Area 1.";
        $t2_color="blue";
    }
    elseif($t2>=18 && $t2<40){
        $t2_condition="El ambiente es propicio en el Area 1.";
        $t2_color="green";
    }
    elseif($t2>40) {
        $t2_condition="La temperatura es demasiado alta, podria dañar el cultivo!.";
        $t2_color="red";
    } //t3
    if($t3>=0 && $t3<=18){
        $t3_condition="El ambiente es demasiado frio en el Area 1.";
        $t3_color="blue";
    }
    elseif($t3>=18 && $t3<40){
        $t3_condition="El ambiente es propicio en el Area 1.";
        $t3_color="green";
    }
    elseif($t3>40) {
        $t3_condition="La temperatura es demasiado alta, podria dañar el cultivo!.";
        $t3_color="red";
    } 
    //valores clave humedades
    if($h1>=200 && $h1<=500){
        $h1_condition="El cultivo esta en riesgo, hay demasiada agua";
        $h1_color="red";
    }
    elseif($h1>500 && $h1<=900){
        $h1_condition="El suelo esta humedo, esta en sus valores permitidos";
        $h1_color="green";
    }
    elseif($h1>900){
        $h1_condition="Al cultivo le hace falta agua. Esta muy seco!";
        $h1_color="orange";
    }//h2
    if($h2>=200 && $h2<=500){
        $h1_condition="El cultivo esta en riesgo, hay demasiada agua";
        $h1_color="red";
    }
    elseif($h2>500 && $h2<=900){
        $h2_condition="El suelo esta humedo, esta en sus valores permitidos";
        $h2_color="green";
    }
    elseif($h2>900){
        $h2_condition="Al cultivo le hace falta agua. Esta muy seco!";
        $h2_color="orange";
    }//h3
    if($h3>=200 && $h3<=500){
        $h3_condition="El cultivo esta en riesgo, hay demasiada agua";
        $h3_color="red";
    }
    elseif($h3>500 && $h3<=900){
        $h3_condition="El suelo esta humedo, esta en sus valores permitidos";
        $h3_color="green";
    }
    elseif($h3>900){
        $h3_condition="Al cultivo le hace falta agua. Esta muy seco!";
        $h3_color="orange";
    }//hr1
    if($hr1>=0 && $hr1<=20){
        $hr1_condition="El nivel de humedad, es muy bajo...<br> Puede afectar el crecimiento de las plantas.";
        $hr1_color="red";
    }
    elseif($hr1>20 && $hr1<=50){
        $hr1_condition="El nivel de Humedad esta a un nivel adecuado para el cultivo!";
        $hr1_color="green";
    }
    elseif($hr1>50){
        $hr1_condition="Nivel de humedad demasiado alto,<br> el cultivo esta comprometido a perecer.";
        $hr1_color="orange";
    }//hr2
    if($hr2>=0 && $hr2<=20){
        $hr2_condition="El nivel de humedad, es muy bajo...<br> Puede afectar el crecimiento de las plantas.";
        $hr2_color="red";
    }
    elseif($hr2>20 && $hr2<=50){
        $hr2_condition="El nivel de Humedad esta a un nivel adecuado para el cultivo!";
        $hr2_color="green";
    }
    elseif($hr2>50){
        $hr2_condition="Nivel de humedad demasiado alto,<br> el cultivo esta comprometido a perecer.";
        $hr2_color="orange";
    }
    
?>
<!DOCTYPE html>
<html >
<head>
  <!-- Site made with Mobirise Website Builder v4.8.10, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v4.8.10, mobirise.com">
 <meta http-equiv="Refresh" content="120;url=index.php">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/minerva.jpg" type="image/x-icon">
  <meta name="description" content="">
  <title>ARC115_PROYECTO_IoT_FIA_UES</title>
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/socicon/css/styles.css">
  <link rel="stylesheet" href="assets/as-pie-progress/css/progress.min.css">
  <link rel="stylesheet" href="assets/datatables/data-tables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  
  
  
</head>
<body>
  <section class="menu cid-qTkzRZLJNu" once="menu" id="menu1-0">

    

    <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-toggleable-sm">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </button>
        <div class="menu-logo">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    <a href="#">
                         <img src="assets/images/logo.jpg" alt="minerva" title="" style="height: 3.8rem;">
                    </a>
                </span>
                <span class="navbar-logo">
                    <a href="#">
                         <img src="assets/images/2000px-arduino-logo.svg-122x83.png" alt="arduino-logo" title="" style="height: 3.8rem;">
                    </a>
                </span>
                <span class="navbar-logo">
                    <a href="#">
                         <img src="assets/images/android.png" alt="arduino-logo" title="" style="height: 3.8rem;">
                    </a>
                </span>
                <span class="navbar-caption-wrap"><a class="navbar-caption text-white display-4" href="#"><span class="mbri-mobile2 mbr-iconfont mbr-iconfont-btn"></span>
                        ADAPTABLE
                    </a></span>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true"><li class="nav-item">
                    <a class="nav-link link text-white display-4" href="#">
                        <span class="mbri-home mbr-iconfont mbr-iconfont-btn"></span>
                        Inicio<br><br></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link text-white display-4" href="#">
                        
                        <br><br></a>
                </li></ul>
            <div class="navbar-buttons mbr-section-btn"><a class="btn btn-sm btn-primary display-4" href="#"><span class="mbri-protect mbr-iconfont mbr-iconfont-btn"></span>Conectado</a></div>
        </div>
    </nav>
</section>

<section class="engine"><a href="#">build a website for free</a></section><section class="cid-qTkA127IK8 mbr-fullscreen mbr-parallax-background" id="header2-1">

    

    

    <div class="container align-center">
        <div class="row justify-content-md-center">
            <div class="mbr-white col-md-10">
                <h1 class="mbr-section-title mbr-bold pb-3 mbr-fonts-style display-1">
                Sistema Medidor de Humedad  Relativa y Temperatura</h1>
                
                <p class="mbr-text pb-3 mbr-fonts-style display-5">
                Proyecto de IoT realizado atraves de una comunicacion serial entre dispositivo Arduino y modulo Wifi, para un posterior envio de datos a un servidor configurado con web services php.                 <div class="mbr-section-btn"><a class="btn btn-md btn-secondary display-4" href="#">ver PAPER</a>
                
            </div>
        </div>
    </div>
    <div class="mbr-arrow hidden-sm-down" aria-hidden="true">
        <a href="#next">
            <i class="mbri-down mbr-iconfont"></i>
        </a>
    </div>
</section>

<section class="header12 cid-rfn5xj8q9c mbr-fullscreen mbr-parallax-background" id="header12-3">

    

    <div class="mbr-overlay" style="opacity: 0.9; background-color: rgb(15, 118, 153);">
    </div>

    <div class="container  ">
            <div class="media-container">
                <div class="col-md-12 align-center">
                    <h1 class="mbr-section-title pb-3 mbr-white mbr-bold mbr-fonts-style display-2">
                        Internet of Things (IoT)</h1>
                    <p class="mbr-text pb-3 mbr-white mbr-fonts-style display-5">
                         Concepto que se refiere a una interconexión digital de objetos cotidianos con internet,&nbsp;en definitiva, la conexión con más objetos que con personas.</p>
                    <div class="mbr-section-btn align-center py-2"><a class="btn btn-md btn-secondary display-4" href="https://hipertextual.com/archivo/2014/10/internet-cosas/">Saber más</a></div>

                    <div class="icons-media-container mbr-white">
                        <div class="card col-12 col-md-6 col-lg-3">
                            <div class="icon-block">
                            <a href="https://mobirise.co/">
                                <span class="mbr-iconfont mbri-upload"></span>
                            </a>
                            </div>
                            <h5 class="mbr-fonts-style display-5">Envio a Servidores</h5>
                        </div>

                        <div class="card col-12 col-md-6 col-lg-3">
                            <div class="icon-block">
                                <a href="https://mobirise.co/">
                                    <span class="mbr-iconfont mbri-globe-2"></span>
                                </a>
                            </div>
                            <h5 class="mbr-fonts-style display-5">Control en tiempo Real</h5>
                        </div>

                        <div class="card col-12 col-md-6 col-lg-3">
                            <div class="icon-block">
                                <a href="https://mobirise.co/">
                                    <span class="mbri-cash mbr-iconfont"></span>
                                </a>
                            </div>
                            <h5 class="mbr-fonts-style display-5">
                                Ahorro</h5>
                        </div>

                        <div class="card col-12 col-md-6 col-lg-3">
                            <div class="icon-block">
                                <a href="https://mobirise.co/">
                                    <span class="mbri-mobirise mbr-iconfont"></span>
                                </a>
                            </div>
                            <h5 class="mbr-fonts-style display-5">
                                Control Ambiental</h5>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <div class="mbr-arrow hidden-sm-down" aria-hidden="true">
        <a href="#next">
            <i class="mbri-down mbr-iconfont"></i>
        </a>
    </div>
</section>

<section class="progress-bars1 cid-rfopiPvt5s" id="progress-bars1-f">

    <div class="container">
        <h2 class="mbr-section-title pb-2 align-center mbr-fonts-style display-2">
            Temperaturas&nbsp;</h2>

        <h3 class="mbr-section-subtitle pb-5 mbr-fonts-style display-5"><em style="color:Blue;">DHT11:</em>&nbsp;es un sensor digital de temperatura y humedad relativa de bajo costo y fácil uso. Integra un sensor capacitivo de humedad y un termistor para medir el aire circundante, y muestra los datos mediante una señal digital en el pin de datos.<br></h3>
         
        <div class="progress_elements">
            <div class="progress1 pb-5">
                <div class="title-wrap">
                    <div class="progressbar-title mbr-fonts-style display-7 progress-bar-striped progress-bar-animated">
                        <p>T1-DHT11:    <?php echo $t1  ?> &deg C/ 50 &deg C</p>
                    </div>
                   
                </div>
                <progress class="progress progress-primary" max="50" value="<?php echo $t1 ?>">
                </progress>
                <h6 style="color:<?php echo $t1_color?>;"><span class="badge badge-warning"> Condicion Actual:</span> <?php echo $t1_condition ?></h6>
            </div>
            
            <div class="progress2 pb-5">
                <div class="title-wrap">
                    <div class="progressbar-title mbr-fonts-style display-7">
                    <p>T2-DHT11:    <?php echo $t2 ?> &deg C</p>
                    </div>
                <div class="progress_value mbr-fonts-style display-7">
                    
                </div>
                </div>
                <progress class="progress progress-primary" max="150" value="<?php echo $t2 ?>">
                </progress>
                <h6 style="color:<?php echo $t2_color?>;"><span class="badge badge-warning"> Condicion Actual:</span> <?php echo $t2_condition ?></h6>

            </div>
            
            <div class="progress3 pb-5">
                <div class="title-wrap">
                    <div class="progressbar-title mbr-fonts-style display-7">
                        <p>
                            T3-Termo Resistencia:   <?php echo $t3 ?> &deg C</p></p>
                    </div>
                    <div class="progress_value mbr-fonts-style display-7">
                        
                    </div>
                </div>
                <progress class="progress progress-primary" max="150" value="<?php echo $t3 ?>">
                </progress>
                <h6 style="color:<?php echo $t3_color?>;"><span class="badge badge-warning"> Condicion Actual:</span> <?php echo $t3_condition ?></h6>

            </div>
            
            
        </div>
    </div>
</section>

<section class="progress-bars1 cid-rfopnHaNtC" id="progress-bars1-g">
    
      

    

    <div class="container">
        <h2 class="mbr-section-title pb-2 align-center mbr-fonts-style display-2">
            Temperaturas de Suelo&nbsp;</h2>

        <h3 class="mbr-section-subtitle pb-5 mbr-fonts-style display-5"><em style="color:blue;">Sensores YL69:</em> Este sensor tiene la capacidad de medir la humedad del suelo. Aplicando una pequeña tensión entre los terminales del módulo YL-69 hace pasar una corriente que depende básicamente de la resistencia que se genera en el suelo y ésta depende mucho de la humedad. Por lo tanto al aumentar la humedad la corriente crece y al bajar la corriente disminuye.</h3>

        <div class="progress_elements">
        <div class="progress1 pb-5">
                <div class="title-wrap">
                    <div class="progressbar-title mbr-fonts-style display-7">
                        <p>
                        H1
                        </p>
                    </div>
                    <div class="progress_value mbr-fonts-style display-7">
                        
                           <h6 style="color:blue;"><?php echo $h1 ?>/1023</h6>
                    </div>
                </div>
                <progress class="progress progress-primary" max="1023" value="<?php echo $h1 ?>">
                </progress>
                <h6 style="color:<?php echo $h1_color?>;"><span class="badge badge-warning"> Condicion Actual:</span> <?php echo $h1_condition ?></h6>
            </div>
            
            <div class="progress2 pb-5">
                <div class="title-wrap">
                    <div class="progressbar-title mbr-fonts-style display-7">
                        <p>
                        H2
                        </p>
                    </div>
                    <div class="progress_value mbr-fonts-style display-7">
                        
                           <h6 style="color:blue;"><?php echo $h2 ?>/1023</h6>
                    </div>
                </div>
                <progress class="progress progress-primary" max="1023" value="<?php echo $h2 ?>">
                </progress>
                <h6 style="color:<?php echo $h2_color?>;"><span class="badge badge-warning"> Condicion Actual:</span> <?php echo $h2_condition ?></h6>
  
            </div>
            
            <div class="progress3 pb-5">
                <div class="title-wrap">
                    <div class="progressbar-title mbr-fonts-style display-7">
                        <p>
                        H3
                        </p>
                    </div>
                    <div class="progress_value mbr-fonts-style display-7">
                        
                           <h6 style="color:blue;"><?php echo $h3 ?>/1023</h6>
                    </div>
                </div>
                <progress class="progress progress-primary" max="1023" value="<?php echo $h3 ?>">
                </progress>
                <h6 style="color:<?php echo $h3_color?>;"><span class="badge badge-warning"> Condicion Actual:</span> <?php echo $h3_condition ?></h6>

            </div>
            
            
        </div>
    </div>
</section>

<section class="progress-bars3 cid-rfn7gPYS4l" id="progress-bars3-e">
 
     

    
    
    <div class="container">
        <h2 class="mbr-section-title pb-3 align-center mbr-fonts-style display-2">
            Humedad relativa en el aire.</h2>

        <h3 class="mbr-section-subtitle mbr-fonts-style display-5">Captadas atraves de los sensores DHT11, a una altura uniforme del suelo. <br> Valores entre </h3>
    
        <div class="media-container-row pt-5 mt-2">
            <div class="card p-3 align-center">
                <div class="wrap">
                    <div class="pie_progress progress1" role="progressbar" data-goal="<?php echo $hr1 ?>" data-barsize="15">
                        <p class="pie_progress__number mbr-fonts-style display-5"></p>
                    </div>
                </div> 
                <div class="mbr-crt-title pt-3">
                    <h4 class="card-title py-2 mbr-fonts-style display-5">HR1</h4>
                    <h6 style="color:<?php echo $hr1_color?>;"><span class="badge badge-warning"> Condicion Actual:</span> <?php echo $hr1_condition ?></h6>

                </div>                 
            </div>

            <div class="card p-3 align-center">
                <div class="wrap">
                    <div class="pie_progress progress2" role="progressbar" data-goal="<?php echo $hr2 ?>" data-barsize="15">
                        <p class="pie_progress__number mbr-fonts-style display-5"></p>
                    </div>
                </div> 
                <div class="mbr-crt-title pt-3">
                    <h4 class="card-title py-2 mbr-fonts-style display-5">
                        HR2</h4>
                        <h6 style="color:<?php echo $hr2_color?>;"><span class="badge badge-warning"> Condicion Actual:</span> <?php echo $hr2_condition ?></h6>

                </div>                 
            </div>
        </div>
</div></section>

<section class="section-table cid-rfn6NHrHLR" id="table1-a">

  
  
  <div class="container container-table">
      <h2 class="mbr-section-title mbr-fonts-style align-center pb-3 display-2">Registros de Temperatura y Humedad</h2>
      <h3 class="mbr-section-subtitle mbr-fonts-style align-center pb-5 mbr-light display-5">
            Se presenta a continuacion los ultimos registros que han sido enviados a la base de datos por parte del dispositivo ESP8266 y su coordinacion con el arduino Uno.</h3>
      <div class="table-wrapper">
        <div class="container scroll">
          <table class="table isSearch" cellspacing="0">
            <thead>
              <tr class="table-heads ">
                  
                  
                  
                  
              <th class="head-item mbr-fonts-style display-7">
                      ID</th><th class="head-item mbr-fonts-style display-7">
                      T1</th><th class="head-item mbr-fonts-style display-7">
                      T2</th><th class="head-item mbr-fonts-style display-7">
                          T3</th><th class="head-item mbr-fonts-style display-7">
                              H1</th><th class="head-item mbr-fonts-style display-7">
                                  H2</th><th class="head-item mbr-fonts-style display-7">
                                      H3</th><th class="head-item mbr-fonts-style display-7">
                                          HR1</th><th class="head-item mbr-fonts-style display-7">
                      HR2</th>
                      <th class="head-item mbr-fonts-style display-7">
                      FECHA</th>
                      <th class="head-item mbr-fonts-style display-7">
                      HORA</th>
                      </tr>
            </thead>

            <tbody>
              
              
              
              
<?php 
		$sql="SELECT * FROM ARC ORDER BY ID DESC LIMIT 15";
		$result=mysqli_query($conexion,$sql);

		while($mostrar=mysqli_fetch_array($result)){
		 ?>

		<tr>
			<td><?php echo $mostrar['id'] ?></td>
			<td><?php echo $mostrar['t1'] ?></td>
			<td><?php echo $mostrar['t2'] ?></td>
			<td><?php echo $mostrar['t3'] ?></td>
			<td><?php echo $mostrar['h1'] ?></td>
			<td><?php echo $mostrar['h2'] ?></td>
			<td><?php echo $mostrar['h3'] ?></td>
			<td><?php echo $mostrar['hr1'] ?></td>
			<td><?php echo $mostrar['hr2'] ?></td>
			<td><?php echo $mostrar['fecha'] ?></td>
			<td><?php echo $mostrar['hora'] ?></td>
            
		</tr>
	<?php 
	}
	 ?></tbody>
          </table>
        </div>
        <div class="container table-info-container">
          <div class="row info">
            <div class="col-md-6">
              <div class="dataTables_info mbr-fonts-style display-7">
                <span class="infoBefore">*Mostrando los ultimos 15 nuevos registros.&nbsp;</span>
                <span class="inactive infoRows"></span>
                <span class="infoAfter"></span>
                <span class="infoFilteredBefore"></span>
                <span class="inactive infoRows"></span>
                <span class="infoFilteredAfter"></span>
              </div>
            </div>
            <div class="col-md-6"></div>
          </div>
        </div>
      </div>
    </div>
</section>

<section class="cid-qTkAaeaxX5" id="footer1-2">

    

    

    <div class="container">
        <div class="media-container-row content text-white">
            <div class="col-12 col-md-3">
                <div class="media-wrap">
                    
                        <img src="assets/images/mbr-192x128.jpg" alt="Mobirise" title="">
                    
                </div>
            </div>
            <div class="col-12 col-md-3 mbr-fonts-style display-7">
                <h5 class="pb-3">
                    Direccion</h5>
                <p class="mbr-text">Final 25 Avenida Norte, San Salvador, El Salvador</p>
            </div>
            <div class="col-12 col-md-3 mbr-fonts-style display-7">
                <h5 class="pb-3">
                    Contacto</h5>
                <p class="mbr-text">
                    Email:&nbsp;<br>gm12006@ues.edu.sv</p>
            </div>
            <div class="col-12 col-md-3 mbr-fonts-style display-7">
                <h5 class="pb-3">Links
                </h5>
                <p class="mbr-text"><a href="index.html#header2-1">Home</a></p><p><a href="index.html#header12-3">Internet of Things&nbsp;</a><br></p><p><a href="index.html#progress-bars1-f">Datos Actuales</a><br><a href="index.html#table1-a">Ultimos Registros</a><br><br></p>
            </div>
        </div>
        <div class="footer-lower">
            <div class="media-container-row">
                <div class="col-sm-12">
                    <hr>
                </div>
            </div>
            <div class="media-container-row mbr-white">
                <div class="col-sm-6 copyright">
                    <p class="mbr-text mbr-fonts-style display-7">FIA-UES, Escuela de Sistemas Informaticos. <br>Instructor: Ing. Boris Alexander Montano Navarrete</p>
                </div>
                <div class="col-md-6">
                    <div class="social-list align-right">
                        <div class="soc-item">
                            <a href="https://twitter.com/mobirise" target="_blank">
                                <span class="socicon-twitter socicon mbr-iconfont mbr-iconfont-social"></span>
                            </a>
                        </div>
                        <div class="soc-item">
                            <a href="https://www.facebook.com/pages/Mobirise/1616226671953247" target="_blank">
                                <span class="socicon-facebook socicon mbr-iconfont mbr-iconfont-social"></span>
                            </a>
                        </div>
                        <div class="soc-item">
                            <a href="https://www.youtube.com/c/mobirise" target="_blank">
                                <span class="socicon-youtube socicon mbr-iconfont mbr-iconfont-social"></span>
                            </a>
                        </div>
                        <div class="soc-item">
                            <a href="https://instagram.com/mobirise" target="_blank">
                                <span class="socicon-instagram socicon mbr-iconfont mbr-iconfont-social"></span>
                            </a>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/popper/popper.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/smoothscroll/smooth-scroll.js"></script>
  <script src="assets/dropdown/js/script.min.js"></script>
  <script src="assets/parallax/jarallax.min.js"></script>
  <script src="assets/vimeoplayer/jquery.mb.vimeo_player.js"></script>
  <script src="assets/as-pie-progress/jquery-as-pie-progress.min.js"></script>
  <script src="assets/datatables/jquery.data-tables.min.js"></script>
  <script src="assets/datatables/data-tables.bootstrap4.min.js"></script>
  <script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>
  <script src="assets/theme/js/script.js"></script>
  
  
</body>
</html>