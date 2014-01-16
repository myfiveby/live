<?php
/**
 * Configure here your aws access data to be able to test through Amazon SES
 * 
 * Notice that you'll need and account with the SES Service enabled and
 * ready to send emails.
 */
 
if(!defined('AMAZON_AWS_ACCESS_KEY')){
    define('AMAZON_AWS_ACCESS_KEY', 'AKIAJPHQ2EV4FAPOIKZA');
}

if(!defined('AMAZON_AWS_PRIVATE_KEY')){
    define('AMAZON_AWS_PRIVATE_KEY', 'IJsQw7XEKCynib9sVO4dl64pektG2uvqdrTM9O0h');
}

if(!defined('AMAZON_SES_FROM_ADDRESS')){
    define('AMAZON_SES_FROM_ADDRESS', 'do_not_reply@myfiveby.com');
}

if(!defined('AMAZON_SES_TO_ADDRESS')){
    define('AMAZON_SES_TO_ADDRESS', 'garciatoscano@gmail.com');
}