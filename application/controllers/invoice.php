<?php 
function generate_invoice($length){
    $data = '1234567890';
    $string = 'SM-';

    for($i=0; $i<$length; $i++){
        $pos= rand(0, strlen($data)-1);
        $string .= $pos;
    }

    return $string;
}

$invoice = generate_invoice(10);
