<?php
  // for localhost case, use PHPMailer 
    use PHPMailer\PHPMailer\PHPMailer;
    session_start();

    if(isset($_POST['submit'])){
 
        if(!empty($_POST['email']) && !empty($_POST['subject']) && !empty($_POST['content'])){

        $email =$_POST['email'] ;
        $name =$_POST['name'] ;
        $subject = $_POST['subject'];
        $content = $_POST['content'];
        $text ="الإسم  :".$name."<br>"."عنوان الإيميل  :".$email."<br>"."المحتوى  :".$content;

        require_once "PHPMailer\src\PHPMailer.php" ;
        require_once "PHPMailer\src\SMTP.php";
        require_once "PHPMailer\src\Exception.php";

        $mail = new PHPMailer();

        //SMTP Settings
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;

        $mail->Username = "Affaqhelpcenter@gmail.com";
        $mail->Password = 'Affaq12345';
        $mail->Port = 465; 
        $mail->SMTPSecure = "ssl"; 

        //Email Settings
        $mail->isHTML(true);
        $mail->setFrom($email,'User');
        $mail->addAddress("Affaqhelpcenter@gmail.com");
        $mail->Subject = $subject;
        $mail->Body = $text;

        if ($mail->send()) {
            $_SESSION['status'] = "done";
            header('Location: Main.php');
        } else {
            $status = "failed";
            $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
        }

       }

        exit(json_encode(array("status" => $status, "response" => $response)));
    }

                                                             // in live server case 

// if(isset($_POST['submit']) && $_POST['email'] != NULL)
// {
//         $email =$_POST['email'] ;
//         $subject = $_POST['subject'];
//         $content = $_POST['content'];
        
//         $to ='Affaqhelpcenter@gmail.com';

//         $text = 'الايميل : '.$email.'\r\n المحتوى:'.$content;

//         require_once "PHPMailer\PHPMailerr.php";
//         require_once "PHPMailer\SMTP.php";
//         require_once "PHPMailer\Exception.php";
        
//         $mail = new PHPMailer();

//         mail($to,$subject,$text);
//         $_SESSION['status'] = "done";
//         header('Location: Main.php');  
//         }
//        else
//            echo"faild";
       
                                           //store the mails in DB

// session_start();
// $server = 'localhost';
// $email = 'root';
// $subject ='';
// $content = '';
// $dbPort = 
// $dbname = 'affaq' ; 
 
// $con = mysqli_connect($server ,$email , $subject , $dbname,'3306',$content ) ;

// if(isset($_POST['submit'])){
 
//     if(!empty($_POST['email']) && !empty($_POST['subject']) && !empty($_POST['content'])){
       
//        $email = $_POST['email'] ;
//        $subject = $_POST['subject'];
//        $content = $_POST['content'];

//        $query = "insert into comment(email , subject , content) values ('$email' , '$subject' , '$content')";

//        $run = mysqli_query($con , $query) or die(mysqli_error($con));

//        if($run){
//            $_SESSION['status'] = "done";
//           header('Location: Main.php');
//        }
//        else{
//            echo"faild";
//        }
//     }
// }
?>