<?php

session_start();
$_SESSION['sauer1'] =  "Alexandre";
$_SESSION['sauer2'] =  "Sauer";

session_name("PaginaSauer");


if(isset($_SESSION['sauer1'])){
	header("Location:https://www.google.com");	
}else{
	echo "Sessao não registrada";
}




?>