<?php

    header("Access-Control-Allow-Credentials: true");
    header("Access-Control-Allow-Origin: https://amp.gmail.dev");
    header("AMP-Access-Control-Allow-Source-Origin: amp@gmail.dev");

    header("Content-type: application/json");
    header("access-control-allow-methods:POST, GET, OPTIONS");
    header("access-control-allow-headers:Content-Type, Content-Length, Accept-Encoding, X-CSRF-Token");



//Added AMP-Redirect-To to support AMP-Redirect-To Header
header("Access-Control-Expose-Headers: AMP-Access-Control-Allow-Source-Origin, AMP-Redirect-To");


//pull variables from form
$loanPurpose = $_POST['purpose'];
$loanAmount = (int)$_POST['loanamt'];


$response = array();
$response['loanPurpose']=$loanPurpose;
$response['loanAmount']=$loanAmount;




if ($loanPurpose != blank and $loanAmount != blank and $loanPurpose != 'ERROR' ) {
    //Here is where you can append variables to a url to pass users into whatever experience you like. For this example I am using a simple url with no additional parameters
    header("HTTP/1.0 200 OK");
    $response['output'] = ['msg'=>'Yay! Success'];
    echo $post_string=json_encode($response[output]);
    header("AMP-Redirect-To: https://www.lendingtree.com/personal-loan");

}
else if ($loanPurpose == 'ERROR') {
    // If for the loan reason you select the option to generate an error you will get the error message below
    header("HTTP/1.0 400 Bad Request", true, 400);
    $response['output'] = ['msg'=>'You selected a loan amount of $'.$loanAmount.', however since you wanted to generate an error, here it is! Change your loan reason to something different to proceed'];
    echo $post_string=json_encode($response[output]);
    exit;
}
else {
    // FAIL
    header("HTTP/1.0 400 Bad Request", true, 400);
    $response['output'] = ['msg'=>'Sorry an error occured!'];
    echo $post_string=json_encode($response['output']);
        exit;
    }
?>


