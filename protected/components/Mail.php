<?php
	class Mail
	{
		public static function send($to, $subject, $body, $attachment = null, $filename = null) {
			$message = new YiiMailMessage;
			$message->setFrom(array('pln@pln.co.id'=>'PLN'));
			$message->setTo($to);
			$message->setSubject($subject);
			$message->setBody($body, 'text/html');
			if (isset($attachment)) {
				if (isset($filename)) {
					$message->attach(Swift_Attachment::fromPath($attachment)->setFilename($filename));
				}
				else {
					$message->attach(Swift_Attachment::fromPath($attachment));
				}
			}
			Yii::app()->mail->send($message);
		}
	}
?>