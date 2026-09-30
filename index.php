<?php

    $csv = fopen('result.csv', 'w');
    fputcsv($csv,['nome',"preço"],';');

    for($index = 1; $index <=12; $index++){

    $page = "";
    if ($index > 1){ 
     $page = "page/$index/";
     }

    $url  = "https://www.scrapingcourse.com/ecommerce/$page";
    $html = file_get_contents($url);

    $dom = new DOMDocument();
    @$dom->loadHTML($html);
    $xpath = new DOMXPath($dom);

    foreach ($xpath->query('//li[@data-products="item"]') as $produto) {

         $nome = $xpath->query('.//h2[contains(@class,"product-name")]', $produto)->item(0);
         $nome = $nome ? trim($nome->nodeValue) : '';

         $preco = $xpath->query('.//span[contains(@class,"woocommerce-Price")]', $produto)->item(0);
         $preco = $preco? trim($preco->nodeValue) : '';

         fputcsv($csv, [$nome, $preco],';');
      }
          echo "pagina".$index." ok\n";
    }

     fclose($csv);
     echo "\n result.csv pronto \n";
?>

//'url','imagem'
