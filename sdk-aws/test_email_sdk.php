<?php


	// Enable full-blown error reporting. http://twitter.com/rasmus/status/7448448829
	//error_reporting(-1);

	// Set plain text headers
	header("Content-type: text/plain; charset=utf-8");


	// Include the SDK 
	// Include the SDK
	require_once 'sdk.class.php';

/*%******************************************************************************************%*/


// Instantiate the class
$email = new AmazonSES();
 $response = $email->list_verified_email_addresses();
 
 
 

$response = $email->send_email(
    'do_not_reply@myfiveby.com', // Source (aka From)
    array('ToAddresses' => array('garciatoscano@gmail.com')),
    array( // Message (short form)
        'Subject.Data' => 'First Email Test form AW SES  for myFIVEby' . time(),
        'Body.Text.Data' => 'HELLOOOOOO  : This is a simple test message ' . time()
    )
);

// Success?
var_dump($response->isOK());
 
 
 
 
/*  
 $emails_list = $email->listVerifiedEmailAddresses();
 
var_dump($emails_list);

 //$response1= $response1->body->ListVerifiedEmailAddressesResult->VerifiedEmailAddresses->to_array();
 
 $response1= $response1->body->ListVerifiedEmailAddressesResult;
 
 
var_dump($response1);


$con=new SimpleEmailService("your access key","your secretKey ");
$con->listVerifiedEmailAddresses();

$m = new SimpleEmailServiceMessage();
$m->addTo('anilmathewm@mail.com');
$m->setFrom('anilmathewm@mail.com');
$m->setSubject('Hello, world!');
$m->setMessageFromString('This is the message body.');
$con->sendEmail($m);

  */

?>  