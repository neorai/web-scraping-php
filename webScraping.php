<?php 
    // Definimos la funci�n cURL
    /*function curl($url) {
        $ch = curl_init($url); // Inicia sesi�n cURL
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); // Configura cURL para devolver el resultado como cadena
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Configura cURL para que no verifique el peer del certificado dado que nuestra URL utiliza el protocolo HTTPS
        $info = curl_exec($ch); // Establece una sesi�n cURL y asigna la informaci�n a la variable $info
        curl_close($ch); // Cierra sesi�n cURL
        return $info; // Devuelve la informaci�n de la funci�n
    }

    $sitioweb = curl("https://devcode.la");  // Ejecuta la funci�n curl escrapeando el sitio web https://devcode.la and regresa el valor a la variable $sitioweb
    echo $sitioweb;*/
	
	$result = file_get_contents("http://bo.cope.webtv.flumotion.com/api/active?format=json&podId=78");
	$array_full=(json_decode($result, true));
	
	$symbols = array('"','}','{','image','author','title',',');
	$array_full['value'] = str_replace($symbols, "", $array_full['value']);
	
	
	
	$array_author_title= explode(": ", $array_full['value']);
	$array_author_title[2] = str_replace($symbols, "", $array_author_title['2']);
	$array_author_title[3] = str_replace($symbols, "", $array_author_title['3']);
	
	
	echo "Author: ".$array_author_title[2];
	echo "</br>Title: ".$array_author_title[3];
	
?>
