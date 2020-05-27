<?php 

require_once('vendor/autoload.php');
\Stripe\Stripe::setApiKey('sk_test_0gCS2wDOsTWp0XEiTpWAPewe00VQyZUeOP
');
\Stripe\Stripe::setVerifySslCerts(false);


// sanitize the variable 

$POST = filter_var_array($_POST,FILTER_SANITIZE_STRING);
$firstname = $_POST['first_name'];
$lastname = $_POST['last_name'];
$email  = $_POST['email'];
$taken = $_POST['stripeToken'];

// create customer in stripe 

$customer = \Stripe\Customer::create(array(
    'email' => $email,
    'source' => $taken
));

// charge the custormer 

$charge = \Stripe\Charge::create(array(
    'amount' =>5000,
    "currency" => "usd",
    "description" => "intro to react course",
    "customer" => $customer->id,

));

// print out of charge 

print_r($charge);