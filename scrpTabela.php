<?php  

 $csv = fopen('resultT.csv', 'w');
 fputcsv($csv,['nome','ano','ganhou','perdeu','porcentagem vitória','gols','gols tomados','diferença gols'],';');

 $count = 0;

for($index = 1; $index <=6; $index++){

 $url  = "https://www.scrapethissite.com/pages/forms/?page_num=$index&per_page=100";
 $html = file_get_contents($url);

  $dom = new DOMDocument();
  @$dom->loadHTML($html);
  $xpath = new DOMXPath($dom);

    foreach ($xpath->query('//tr[@class="team"]') as $team) {

     $nome = $xpath->query('.//td[@class="name"]', $team)->item(0);
     $nome = $nome? trim($nome->nodeValue) : '';

     $ano = $xpath->query('.//td[@class="year"]', $team)->item(0);
     $ano = $ano? trim($ano->nodeValue) : '';

     $wins = $xpath->query('.//td[@class="wins"]', $team)->item(0);
     $wins = $wins? trim($wins->nodeValue) : '';

     $losses = $xpath->query('.//td[@class="losses"]', $team)->item(0);
     $losses = $losses? trim($losses->nodeValue) : '';

     $perc = $xpath->query('.//td[contains(@class, "pct text-")]', $team)->item(0);
     $perc = $perc? trim($perc->nodeValue) : '';

     $golsAFavor = $xpath->query('.//td[@class="gf"]', $team)->item(0);
     $golsAFavor = $golsAFavor? trim($golsAFavor->nodeValue) : '';

     $golsContra = $xpath->query('.//td[@class="ga"]', $team)->item(0);
     $golsContra = $golsContra? trim($golsContra->nodeValue) : '';

     $dif = $xpath->query('.//td[contains(@class, "diff text-")]', $team)->item(0);
     $dif = $dif? trim($dif->nodeValue) : '';
     
     

     fputcsv($csv, [$nome, $ano, $wins, $losses, $perc, $golsAFavor, $golsContra, $dif],';');
     $count++;
    }

    echo "pagina ".$index." ok\n";
          sleep(1); 
}

echo "\n tabela com [".$count."] elementos registrada\n";
?>
