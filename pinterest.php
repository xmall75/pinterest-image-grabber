<?php

/* Pinterest Image Grabber by Keyword
** @author Rep - Xmall75
** Thanks to Abdul Muttaqin for Pinterest Search Image API */

function search($url) {
	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_HTTPHEADER, [
	'Content-Type: application/json'
	]);
	$response = curl_exec($curl);
	curl_close($curl);
	return $response;
}
echo "Pinterest Image Grabber by Keyword\n";
echo "Keyword : ";
$input = trim(fgets(STDIN));
echo "Quantity (Max 45) : ";
$quantity = trim(fgets(STDIN));
$keyword = str_replace(" ", "%20", $input);
$jsondecode = search("https://api.fdci.se/sosmed/rep.php?gambar=$keyword");
$jsondecode = json_decode($jsondecode, TRUE);
for ($i = 0; $i <= $quantity-1; $i++) { 
	$extension = pathinfo($jsondecode[$i], PATHINFO_EXTENSION);
	echo exec("wget --no-check-certificate -O Xmall75-Rep-$i.$extension $jsondecode[$i]");
}

?>
