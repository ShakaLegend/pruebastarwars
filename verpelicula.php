<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
   <link rel="shortcut icon" href="img/3xhumed-Star-Wars.ico"/>
    <style>
        .bg-custom {background-color: black !important;}
    </style>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-custom">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><h4>Star Wars</h4></a>
    
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Inicio
                <span class="sr-only">(current)</span>
              </a>
            </li>
          
          </ul>
        </div>
      </div>
    </nav>
        
        <div class="container-fluid">
        <div class="row">
                   <?php
            if(isset($_GET['id'])){
                
            $indice=$_GET['id'];
$err_status = "";
/* Define the URL endpoint where you will get JSON data from */
$apifullurl = "https://swapi.co/api/films/$indice/?format=json";
/* Since we are using GET, attach the name-values to the endpoint URL */
/* Create the CURL Handler */
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $apifullurl);
curl_setopt($curl, CURLOPT_TIMEOUT, 30);
curl_setopt($curl, CURLOPT_MAXREDIRS, 2);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE); /* Follow redirects, the number of which is defined in CURLOPT_MAXREDIRS */
curl_setopt($curl, CURLOPT_FORBID_REUSE, TRUE);
curl_setopt($curl, CURLOPT_FRESH_CONNECT, TRUE);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
$response = curl_exec($curl);
$err_status = curl_error($curl);
curl_close($curl);
/* Handle Response */
if (strlen($err_status) == 0) {
if (strlen($response) > 0) {
/* Read the JSON, if any */
$apiresponse = json_decode($response, TRUE);
if (count($apiresponse) > 0) {
/* There may be other data aside from the main JSON message, in the JSON response so the example below just shows getting a simple name-value pair */
echo '<div class="col-12"><h4>Información de episodio</h4></div>';
        
        //  print_r($apiresponse['results'][$i]); 
            $idepisodio=$apiresponse['episode_id'];
            $titulo="Star Wars ".$idepisodio.": ".$apiresponse['title'];
            $fechadelanzamiento=$apiresponse['release_date'];
            $director=$apiresponse['director'];
            $opening=$apiresponse['opening_crawl'];
            $productor=$apiresponse['producer'];
    $urlimagen="img/".$idepisodio.".jpg";
            
            ?>
               <div class="col-12">
            <div class="row">
                   <div class="col-12 col-sm-6 col-md-7">
                <h3><?php echo $titulo; ?></h3>
                                  <div class="table-responsive">
<table class="table">
    <tbody>
      <tr>
        <td>Fecha de lanzamiento</td>
        <td><?php echo $fechadelanzamiento; ?></td>
        
      </tr>
      <tr>
        <td>Director</td>
        <td><?php echo $director; ?></td>
       
      </tr>
      <tr>
        <td>Productor</td>
        <td><?php echo $productor; ?></td>
        
      </tr>
    </tbody>
  </table>
                    
</div>  
                        <p><?php echo $opening; ?></p>
                </div>
                <div class="col-12 col-sm-6 col-md-5 text-center">
                <img src="<?php echo $urlimagen; ?>" class="img-fluid img-thumbnail" style="max-height:500px;">
                </div>
                   </div>
            </div> 
                <?php
       //ver personajes
     echo '<h4>Información de personajes</h4>';
    ?>
            <div class="col-12"><div class="row">    
            <?php
    for($i=0;$i<count($apiresponse['characters']);$i++){
       
        $urlpersonaje=$apiresponse['characters'][$i];
        $err_status2 = "";
/* Define the URL endpoint where you will get JSON data from */
$apifullurl2 = $urlpersonaje;
/* Since we are using GET, attach the name-values to the endpoint URL */
/* Create the CURL Handler */
$curl2 = curl_init();
curl_setopt($curl2, CURLOPT_URL, $apifullurl2);
curl_setopt($curl2, CURLOPT_TIMEOUT, 30);
curl_setopt($curl2, CURLOPT_MAXREDIRS, 2);
curl_setopt($curl2, CURLOPT_FOLLOWLOCATION, TRUE); /* Follow redirects, the number of which is defined in CURLOPT_MAXREDIRS */
curl_setopt($curl2, CURLOPT_FORBID_REUSE, TRUE);
curl_setopt($curl2, CURLOPT_FRESH_CONNECT, TRUE);
curl_setopt($curl2, CURLOPT_RETURNTRANSFER, TRUE);
$response2 = curl_exec($curl2);
$err_status2 = curl_error($curl2);
curl_close($curl2);
/* Handle Response */
if (strlen($err_status2) == 0) {
if (strlen($response2) > 0) {
/* Read the JSON, if any */
$apiresponse2 = json_decode($response2, TRUE);
if (count($apiresponse2) > 0) {
/* There may be other data aside from the main JSON message, in the JSON response so the example below just shows getting a simple name-value pair */

        
          
           
          
$nombrepersonaje=$apiresponse2['name'];
$fechapersonaje=$apiresponse2['birth_year'];
$generopersonaje=$apiresponse2['gender'];
$masapersonaje=$apiresponse2['mass']." kg";
$alturapersonaje="".intval($apiresponse2['height'])." cms";
$enlacepersonaje="verpersonaje.php?id=".$nombrepersonaje;
          
            ?>
                    <div class="col-12 col-md-6" style="padding-top:8px;">
            <div class="card">
  <div class="card-header bg-dark text-light"><h4 class="text-center"><?php echo $nombrepersonaje; ?></h4></div>
  <div class="card-body">
                <div class="table-responsive">
<table class="table">
    <thead>
      <tr>
        <td>Fecha de nacimiento</td>
        <td><?php echo $fechapersonaje; ?></td>
       
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Genero</td>
        <td><?php echo $generopersonaje; ?></td>
      
      </tr>
      <tr>
        <td>Masa</td>
        <td><?php echo $masapersonaje; ?></td>
       
      </tr>
      <tr>
        <td>Altura</td>
        <td><?php echo $alturapersonaje; ?></td>
       
      </tr>
    </tbody>
  </table>
</div>
                </div> 
  <div class="card-footer"><a href="<?php echo $enlacepersonaje; ?>" class="btn btn-block btn-info">Ver personaje</a></div>
</div>
            </div>
                <?php
       
        
    
}
else {
print "No es JSON.";
}
}
else {
print "Hay un error y no se obtuvo respuesta.";
}
}
else {
print $err_status2;
}
    }
     ?>
                </div></div>
                <?php
    
}
else {
print "No es JSON.";
}
}
else {
print "Hay un error y no se obtuvo respuesta.";
}
}
else {
print $err_status;
}
                }else{
                ?>
            <p>No se pudo encontrar pelicula.</p>
            <a href="index.php" class="btn btn-block btn-info">Ir a pelicula</a>
               <?php
            }
?>
        
            </div>
        
        </div>
    </body>
</html>
