<?php 
error_reporting(0);
$file=$_POST['file'];
$destination=$_POST['destination'];
$name=$_POST['name'];
$format=$_POST['format'];

//converter
if (isset($_POST['convert'])) {
  $comand='ffmpeg -i '.$file." ".$destination."\\".$name.".".$format;
echo shell_exec($comand);
    echo"<script>alert('Succesfully converted')</script>";
    
// header("Refresh:1; url=index.html");
}

//pdf merge 
if (isset($_POST['merge'])){
    $comand='pdftk "'.$file."\\*.pdf\""." cat output \"".$destination."\\".$name.".pdf\"";
    echo shell_exec($comand);
    
     echo"<script>alert('Succesfully merged')</script>";
   header("Refresh:1; url=index.html");
}
//"pdftk "+"\""+FileHandler.source+"\\*.pdf"+"\""+" cat output "+" \""+file.destination+"/"+file.filename+"."+"pdf";
//pdf split
if (isset($_POST['split'])){
    $comand='pdftk '.$file." burst output \"".$destination."\\".$name."-%d.pdf\"";
    echo shell_exec($comand);

     echo"<script>alert('Succesfully split')</script>";
    header("Refresh:1; url=index.html");
}

//folder encrypt
if (isset($_POST['encrypt'])){
   
    $comand2="cipher/e \"".$file."\"";
    echo shell_exec($comand2);
     echo"<script>alert('Succesfully encrypted')</script>";
    header("Refresh:1; url=index.html");
}

//folder decrypt
if (isset($_POST['decrypt'])){
   
    
    $comand2="cipher/d \"".$file."\"";
    
    echo shell_exec($comand2);
     echo"<script>alert('Succesfully decrypted')</script>";
    header("Refresh:1; url=index.html");
}

?>