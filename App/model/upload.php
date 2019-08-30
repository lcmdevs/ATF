
<?php
include("../Conexao/Conetion.php");
$conn = new Conexao();
global $pdo;

if (isset($_FILES['ufile'])) {

   $extensao = strtolower(substr($_FILES['ufile']['name'], -4));

   $novo_nome = md5(time()) . $extensao;

   $diretorio = 'uploadXml/' . $novo_nome . '/';

   mkdir($diretorio, 0777);

   move_uploaded_file($_FILES['ufile']['tmp_name'], $diretorio . $novo_nome);

   $conteudo = file_get_contents("C:/xampp/htdocs/ATF/App/model/uploadXml/" . $novo_nome . "/" . $novo_nome);

   // Preparar objeto DOM
   $dom = new DOMDocument();
   $dom->formatOutput = true;
   $dom->preserveWhiteSpace = false;

   // Carregar o XML ou HTML
   $dom->loadXML($conteudo);

   // Gerar novo conteudo
   $novo_conteudo = $dom->saveXML();

   $novo_conteudo = $dom->getElementsByTagName( 'cProd' );
   $cprod = $novo_conteudo->item(0)->nodeValue;

      var_dump($cprod);

      $xml = new DOMDocument();
      $xml->load($conteudo);

      $ver = simplexml_import_dom($xml);

      var_dump($ver);
  
   //echo $novo_conteudo->ide;
   $novo_conteudo = $dom->getElementsByTagName( "nNF" );
   $nfe = $novo_conteudo->item(0)->nodeValue;

   $novo_conteudo = $dom->getElementsByTagName( "xNome" );
   $remetente = $novo_conteudo->item(0)->nodeValue;

   $status = "Pendente de conferencia";

   $qtd_itens = 4;

  // echo $nfe;
   //echo $remetente;
   //echo $status;

   $conn->conectar();

   $sql = $pdo->prepare("INSERT INTO arq_arquivo(CODIGO, ARQUIVO, NFE, REMETENTE,QTD_ITENS, STATUS, DATA) VALUES (null, :nome_arquivo, :nfe, :remetente, :qtd_intens, :status, NOW())");
   $sql->bindValue(":nome_arquivo", $novo_nome);
   $sql->bindValue(":nfe", $nfe);
   $sql->bindValue(":remetente", $remetente);
   $sql->bindValue(":status", $status);
   $sql->bindValue(":qtd_intens", $qtd_itens);
   $sql->execute();
  
   
}
