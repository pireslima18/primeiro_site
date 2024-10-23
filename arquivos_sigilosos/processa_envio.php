<?php
	
	require "./bibliotecas/PHPMailer/Exception.php";
	require "./bibliotecas/PHPMailer/OAuth.php";
	require "./bibliotecas/PHPMailer/PHPMailer.php";
	require "./bibliotecas/PHPMailer/POP3.php";
	require "./bibliotecas/PHPMailer/SMTP.php";

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	//require 'vendor/autoload.php';

	//print_r($_POST);
	class Mensagem{
		private $nome = null;
		private $email = null;
		private $assunto = null;
		private $mensagem = null;

		public function __get($atributo){
			return $this->$atributo;
		}
		public function __set($atributo ,$valor){
			$this->$atributo = $valor;
		}
		public function mensagemValida(){
			return true;
			if (/*empty($this->nome) || empty($this->email) ||*/ empty($this->assunto) || empty($this->mensagem)) {
				return false;
			}
		}
	}

	$mensagem = new Mensagem();

	$mensagem->__set('nome',$_POST['nome']);
	$mensagem->__set('email',$_POST['email']);
	$mensagem->__set('assunto',$_POST['assunto']);
	$mensagem->__set('mensagem',$_POST['mensagem']);

	
	

	

	/*
	echo "<pre>";
	print_r($mensagem);
	echo "</pre>";
	*/
	
	if (!$mensagem->mensagemValida()) {
		//echo 'TESTE Mensagem não é válida';
		header('Location: index.php?login=erro1');
		die();
	}

	$mail = new PHPMailer(true);

	$mail->SMTPOptions = array(
		'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
		)
	);

	try {
		$nome = $mensagem->__get('nome');
		$email = $mensagem->__get('email');
		$assunto = $mensagem->__get('assunto');
		$mensagem = $mensagem->__get('mensagem');
		$mensagemEmail = 'Nome: ' . $nome . '<br>' . 'E-mail: ' . $email . '<br>' . 'Assunto: ' . $assunto . '<br>' . 'Mensagem: ' . $mensagem;
		$mensagemRetorno = 'Olá, ' . $nome . '! Seu e-mail foi recebido com sucesso, entraremos em contato assim que possível! Por favor confira os dados abaixo: <br>' . 'Nome: '. $nome . '<br>' . 'E-mail: ' . $email . '<br>' . 'Assunto: ' . $assunto . '<br>' . 'Mensagem: ' . $mensagem . '<br>';


	    //Server settings
    	//$mail->SMTPDebug = 2;
    	$mail->CharSet = 'UTF-8';               
	    $mail->isSMTP();
	    $mail->Host       = 'smtp.gmail.com';
		$mail->SMTPAuth   = true;             
	    $mail->Username   = 'suamelhorface@gmail.com';                
	    $mail->Password   = '';                         
    	$mail->SMTPSecure = 'tls';
	    $mail->Port       = 587;

	    //Recipients
	    $mail->setFrom('suamelhorface@gmail.com', $nome);
	    $mail->addAddress('suamelhorface@gmail.com', 'Destinatário');     //Add a recipient
	    //$mail->addReplyTo('info@example.com', 'Information'); // Destinatário terciario
	    //$mail->addCC('cc@example.com'); //Destinatários de cópia
	    //$mail->addBCC('bcc@example.com'); //Cópia oculta

	    //Attachments
	    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
	    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

	    //Content
	    $mail->isHTML(true); //Set email format to HTML
	    $mail->Subject = $assunto;
	    $mail->Body    = $mensagemEmail;
	    $mail->AltBody = $mensagemEmail; //body alternativo

	    $mail->send();


	    //Mensagem de recebimento
	    $mail->setFrom('suamelhorface@gmail.com', 'suamelhorface');
	    $mail->addAddress($email, 'Destinatário');
	    $mail->isHTML(true);
	    $mail->Subject = "E-mail recebido!";
	    $mail->Body    = $mensagemRetorno;
	    $mail->AltBody = $mensagemRetorno; //body alternativo

	    $mail->send();

		header('Location: index.php?message=send');
	} catch (Exception $e) {
	    echo "Não foi possivel enviar esse email!";
	    echo "<br>";
	    echo "{$mail->ErrorInfo}";
	}

?>

