<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
class email  extends PHPMailer{
    private $mail;
    function __construct(){
        $this->mail = new PHPMailer(true);
        $h=new SMTP();
       
    }
        
       
    /**
     * send
     *
     * @param  string $dest
     * @param  string $name
     * @param  string $object
     * @param  string $cont
     * @return void
     */
    public function sende($dest,$name,$object,$cont){
        try {
            //Server settings
            $this->mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
            $this->mail->isSMTP();                                            
            $this->mail->Host       = 'smtp.gmail.com';                    
            $this->mail->SMTPAuth   = true;                                 
            $this->mail->Username   = 'fahlaouimohammed@gmail.com';                   
            $this->mail->Password   = 'nmdftcxzpycuqqfy';                              
            $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
            $this->mail->Port       = 465;                                   
            //Recipients
            $this->mail->setFrom('fahlaouimohammed@gmail.com', 'Mailer');
            $this->mail->addAddress($dest, $name);    
            $this->mail->isHTML(true);                                  
            $this->mail->Subject = $object;
            $this->mail->Body    = $cont;
            
        
            $this->mail->send();
            
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
        }
    }

}
?>