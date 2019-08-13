<?php


	ini_set('default_charset', 'utf-8');

	 // $link = "http://www.portalfiscal.inf.br/nfe";

	// $xml = simplexml_load_file($link);

	$xml = simplexml_load_file('../xml/exemplo.xml');
	// ('../xml/NFe-261948.xml');

	foreach ($xml->item as $item) {
		
		echo "<strong>Nome:</strong>"
		.utf8_decode($item->nome)."<br>";
		echo "<strong>Sobrenome:</strong>"
		.utf8_decode($item->sobrenome);
	}

	// echo $xml->item->sobrenome;

	// var_dump($xml);