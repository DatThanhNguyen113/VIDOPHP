<?php
class Ultility_model extends CI_Model
{
	function sendMail($to_mail, $subject, $body, $callbackMessage)
	{

		$from_email = "gorila113114@gmail.com"; //Email khi khách hàng nhận mail và bấm reply -> sẽ gửi tới dchi này
		//echo "$from_email <br> $to_email <br> $subject <hr>";  print_r($_POST);
		//exit; 
		//echo "== to: $to_email ==";       
		$config = array();
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'ssl://smtp.googlemail.com';
		//$config['smtp_host'] = 'tls://smtp.googlemail.com';
		$config['smtp_user'] = 'gorila113114@gmail.com';
		$config['smtp_pass'] = '0975565710dat';
		$config['smtp_port'] = 465;
		//$config['smtp_port'] = 579;
		$config['mailtype']  = 'html';
		$config['starttls']  = true;
		$config['newline']   = "\r\n";

		$this->load->library('email', $config);
		$this->email->initialize($config);
		$this->email->from($from_email, 'Electro Identification');
		$this->email->to($to_mail);
		$this->email->subject($subject);
		$this->email->message($body);

		//Send mail
		if ($this->email->send()) {
			$this->session->set_flashdata("email_sent", $callbackMessage);
		} else {
			$this->session->set_flashdata("email_sent", "You have encountered an error");
			ob_start();
			$this->email->print_debugger();
			$error = ob_end_clean();
			$errors[] = $error;
			print_r($errors);
		}
		$resp = ['status' => 1, 'message' => 'ok'];
		return json_encode($resp);
	}
}
