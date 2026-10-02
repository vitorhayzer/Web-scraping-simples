# Web-scraping-simples
Minha primeira experiência em web scraping. Métodos simples para uma página simples.

Esse pequeno projeto utiliza como alvo fictício sites feitos especificamente para treinar web scraping (para iniciantes), eles não contém login de usuário, carregamento client-side ou proteção contra esse tipo de processo.

Utilizei file_get_contents() para obter o HTML da página, por não haver necessidade de um agente (site sem login). Em seguida, usei DOMDocument::loadHTML() para representar o HTML como uma árvore DOM em memória. Por fim, utilizei DOMXPath::query() para percorrer essa árvore e selecionar os nós-alvo por meio de expressões XPath, extraindo os dados de cada subárvore correspondente.