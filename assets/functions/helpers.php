<?php
/**
 * telephone_url function.
 *
 * @access public
 * @param mixed $number
 * @return void
 */
function telephone_url($number)
{
    $nationalprefix = '+41';
    $protocol       = 'tel:';
    $formattedNumber = $number;
    if ($formattedNumber !== '') {
        // add national dialing code prefix to tel: link if it's not already set
        if (strpos($formattedNumber, '00') !== 0 && strpos($formattedNumber, '0800') !== 0 && strpos($formattedNumber, '+') !== 0 && strpos($formattedNumber, $nationalprefix) !== 0) {
            $formattedNumber = preg_replace('/^0/', $nationalprefix, $formattedNumber);
        }
    }
    $formattedNumber = str_replace('(0)', '', $formattedNumber);
    $formattedNumber = preg_replace('~[^0-9\+]~', '', $formattedNumber);
    $formattedNumber = trim($formattedNumber);
    return $protocol . $formattedNumber;
}


// check if month has events in future and should be shown by default
function month_has_events_in_future( $events ) {
	
	$in_future = false;
	foreach($events as $event) {
		if($event['in_future'] === true) {
			$in_future = true;
		}	
	}
	
	return $in_future;
}

function umlauteumwandeln($str){
	$tempstr = Array("Ä" => "AE", "Ö" => "OE", "Ü" => "UE", "ä" => "ae", "ö" => "oe", "ü" => "ue"); 
	return strtr($str, $tempstr);
}