<?php

    $csv = fopen('resultF.csv', 'w');
    fputcsv($csv,['paragrafo'],';');


    $url  = "https://forbes.com.br/carreira/2023/03/google-reduz-promocoes-para-lideranca-e-cria-competicao-entre-funcionarios/";
    $html = file_get_contents($url);

    $dom = new DOMDocument();
    @$dom->loadHTML($html);
    $xpath = new DOMXPath($dom);

    foreach ($xpath->query('//div[@class="content"]') as $div) {

         $par = $xpath->query('.//span[contains(@style,"font")]', $div);
        
     foreach ($par as $p) {
        $texto = trim($p->nodeValue);
      if ($texto !== '') {
            fputcsv($csv, [$texto], ';');
        }
     }

    }
     fclose($csv);
     echo "\n resultF.csv pronto \n";
?>
