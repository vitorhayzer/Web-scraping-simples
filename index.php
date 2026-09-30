<?php

    $csv = fopen('result.csv', 'w');
    fputcsv($csv,['nome',"test"],';');

    $url  = "https://www.scrapingcourse.com/ecommerce/";
    $html = file_get_contents($url);

    $dom = new DOMDocument();
    @$dom->loadHTML($html);
    $xpath = new DOMXPath($dom);

    foreach ($xpath->query('//li[@data-products="item"]') as $produto) {

         $nome = $xpath->query('.//h2[contains(@class,"product-name")]', $produto)->item(0);
         $nome = $nome ? trim($nome->nodeValue) : '';

            $test="test";
         fputcsv($csv, [$nome, $test],';');

    }

     fclose($csv);
     echo "Pronto: produtos.csv\n";
?>

//,'preço','url','imagem'