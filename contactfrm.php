<?php

// Server side validation

$name = $_POST['name'];
$bsubject = $_POST['subject'];
$email= $_POST['email'];
$message= $_POST['message'];
$to = "support@ttliveline.com";
$subject = "Mail From TT LiveLine";
$cc = "jasonroy0507@gmail.com";
$txt ="";
$txt .="<html><body>";
$txt .= "<table style='border-collapse: collapse; width: 30%; background: #ddd7d769;'><tr>
<th style='border: 1px solid #0000004f; text-align: left; padding: 8px;'>Name</th>";
$txt .= "<td  style='  border: 1px solid #0000004f;text-align: left;padding: 8px;'>".$name."</td></tr>";

$txt .= "<tr><th style='border: 1px solid #0000004f; text-align: left; padding: 8px;'>Subject</th>";
$txt .= "<td style='border: 1px solid #0000004f; text-align: left; padding: 8px;'>".$bsubject."</td></tr>";

$txt .= "<tr style='background: lightgrey;'><th style='border: 1px solid #0000004f; text-align: left; padding: 8px;'>Email</th>";
$txt .= "<td style='border: 1px solid #0000004f; text-align: left; padding: 8px;'>".$email."</td></tr>";
$txt .= "<tr><th style='border: 1px solid #0000004f; text-align: left; padding: 8px;'>Message</th>";
$txt .= "<td style='border: 1px solid #0000004f; text-align: left; padding: 8px;'>".$message."</td></tr>";
$txt .= "</table>";
$txt .="</body></html>";


$headers = "From: ttliveline.com" . "\r\n" ;

$headers .= 'Cc: '.$cc . "\r\n";
$headers .= "MIME-Version: 1.0'.PHP_EOL'\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        if(!empty($email))
        {
            mail($to,$subject,$txt,$headers);
            $success_output = "Your message sent successfully, We will contact you soon. Thank You";
        }
        else
        {
            $error_output = "Something went wrong. Please try again later";
        }

$output = array(
    'error'     =>  $error_output,
    'success'   =>  $success_output
);

// Output needs to be in JSON format
echo json_encode($output);

?>