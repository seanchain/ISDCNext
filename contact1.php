<?php 

// EDIT THE FOLLOWING LINE BELOW AS REQUIRED

$send_email_to = "info@scuisdc.com";

function send_email($fname,$email,$email_message)
{
  global $send_email_to;  
  $email_subject = "Feedback";

  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=utf8" . "\r\n";
  $headers .= "From: ".$email. "\r\n";
  $message = "<strong>Email = </strong>".$email."<br>";
  $message .= "<strong>Name = </strong>".$fname."<br>";
  $message .= "<strong>Message = </strong>".$email_message."<br>";
  @mail($send_email_to,$email_subject,$message,$headers);
  return true;
}

function validate($fname,$email,$message)
{
  $return_array = array();
  $return_array['success'] = '1';
  $return_array['fname_msg'] = '';
  $return_array['email_msg'] = '';
  $return_array['message_msg'] = '';

 if($email == '')
  {
    $return_array['success'] = '0';
    $return_array['email_msg'] = '邮箱是要输入的哦，以便我们能够做出及时的反馈';
  }
  else
  {
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
    if(!preg_match($email_exp,$email)) {
      $return_array['success'] = '0';
      $return_array['email_msg'] = '邮箱是不是写错了呢？再检查检查';  
    }
  }

  if($fname == '')
  {
    $return_array['success'] = '0';
    $return_array['fname_msg'] = '把你的大名填好，不然我们可不知道你是谁';
  }
  
  if($message == '')
  {
    $return_array['success'] = '0';
    $return_array['message_msg'] = '咋不写反馈内容呢？';
  }
  else
  {
    if (strlen($message) < 2) {
      $return_array['success'] = '0';
      $return_array['message_msg'] = '写的太少了，不要惜字如金嘛';
    }
  }
  return $return_array;
}

$fname = $_POST['fname'];
$email = $_POST['email'];
$message = $_POST['message'];

$return_array = validate($fname,$email,$message);
if($return_array['success'] == '1')
{
  send_email($fname,$email,$message);
}

header('Content-type: text/json');
echo json_encode($return_array);
die();

?>
