<?php
//error_reporting(0);
session_start();
$errors=array();
$success=false;
if (preg_match('/tempsite.ws$|locaweb.com.br$|hospedagemdesites.ws$|websiteseguro.com$/i', $_SERVER['HTTP_HOST'])) {
        $emailsender='no-reply@pixhaus.com.br';
} else {
        $emailsender = "contato@" . $_SERVER['HTTP_HOST'];
        //    Na linha acima estamos forçando que o remetente seja 'webmaster@seudominio',
        // você pode alterar para que o remetente seja, por exemplo, 'contato@seudominio'.
}
/* Verifica qual é o sistema operacional do servidor para ajustar o cabeçalho de forma correta. Não alterar */
if(PHP_OS == "Linux") $quebra_linha = "\n"; //Se for Linux
elseif(PHP_OS == "WINNT") $quebra_linha = "\r\n"; // Se for Windows
else{
	$errors["security"]="OS";	
}

if($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
	if(@isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], 'http://'.$_SERVER['HTTP_HOST']) !== FALSE){
			$whitelist = array("name","email","subject","message","token");
			foreach ($_POST as $key=>$item) {
				if (!in_array($key, $whitelist)) {
					echo "unexpected post";	
				}
				if(empty($item)){
					$errors["missing"][]=$key;
					$$key = "";
				}else{
					$$key = cleanInput($item);
				}
			}
			
			if (!preg_match("/^[a-zA-Z ]*$/u",$name)) {
     			$errors["validate"][] = "name"; 
    		}
			if (!filter_var($email, FILTER_VALIDATE_EMAIL) && $email !== "") {
     			$errors["validate"][] = "email";
    		}
			date_default_timezone_set('America/Sao_Paulo');
			$date = date('m/d/Y h:i:s a', time());
			$mensagemHTML = 'Mensagem enviada em:'.$date."<br><hr><br>".$message.'<br><hr>';
			if(empty($errors)){
				$emaildestinatario = "contato@pixhaus.com.br";
				$comcopia          = trim("");
				$comcopiaoculta    = trim("");
				$headers = "MIME-Version: 1.1".$quebra_linha;
				$headers .= "Content-type: text/html; charset=iso-8859-1".$quebra_linha;
				// Perceba que a linha acima contém "text/html", sem essa linha, a mensagem não chegará formatada.
				$headers .= "From: ".$name." <".$emailsender.">".$quebra_linha;
				$headers .= "Return-Path: " . $emailsender . $quebra_linha;
				// Esses dois "if's" abaixo são porque o Postfix obriga que se um cabeçalho for especificado, deverá haver um valor.
				// Se não houver um valor, o item não deverá ser especificado.
				if(strlen($comcopia) > 0) $headers .= "Cc: ".$comcopia.$quebra_linha;
				if(strlen($comcopiaoculta) > 0) $headers .= "Bcc: ".$comcopiaoculta.$quebra_linha;
				$headers .= "Reply-To: ".$email.$quebra_linha;
				try {
					$success=mail($emaildestinatario, $subject, $mensagemHTML, $headers, "-r". $emailsender);
					if($success==false){
						$errors["security"]="smtp";
					}
					//$success=true;
				}
				catch(Exception $e) {
					$success=false;
				}
					
				
			}else{
				$success=false;	
			}
	}else{
		$errors["security"]="referrer";
	}
}else{
	$errors["security"]="ajax";	
}
$jsonArray=array("errors"=>$errors,"success"=>$success);
echo json_encode($jsonArray);
function cleanInput($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>