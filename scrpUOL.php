<?php

    $csv = fopen('result.csv', 'w');
    fputcsv($csv,['paragrafo'],';');


    $url  = "https://economia.uol.com.br/noticias/redacao/2020/07/24/a-cultura-do-google-e-quase-como-um-reator-nuclear.htm";
    $html = file_get_contents($url);

    $dom = new DOMDocument();
    @$dom->loadHTML($html);
    $xpath = new DOMXPath($dom);

    foreach ($xpath->query('//div[@class="text  "]') as $div) {

         $par = $xpath->query('.//p[@dir="ltr"]', $div);
        
     foreach ($par as $p) {
        $texto = trim($p->nodeValue);
      if ($texto !== '') {
            fputcsv($csv, [$texto], ';');
        }
     }

    }
     fclose($csv);
     echo "\n result.csv pronto \n";
?>
