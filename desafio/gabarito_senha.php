<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adivinhando a senha</title>
</head>
<body>
<?php
print_r($_POST);
$filename = "log.txt";//criado o txt com nome log.
if(!file_exists("log.txt")){//verifica se o txt já existe
    $handle = fopen("log.txt", "w"); //senão existir cria o arquivo e abre no modo de gravação w "WRITE"
} else {
    $handle = fopen("log.txt", "a");//SE existir ele abre o arquivo no modulo a append ele vai acrecentando dados no arquivo txt
}
fwrite($handle, $_POST['senha']);//FWRITE ESCREVE AS INFORMAÇÕES PARA O TXT DOS LOGS DIGITADOS NA VARIAVEL SENHA "dO ADIVINHE SENHA'
fwrite($handle, "\n");//FWRITE ESCREVE OS DADOS NO TXT
fflush($handle);//GRAVA OS DADOS NO TXT
fclose($handle);//FECHA O ARQUIVO TXT
$handle = fopen("log.txt", "r"); // MODO DE LEITURA DO TXT
echo '<br><br>';
while (!feof($handle)) {//LAÇO DE REPETIÇÃO FEOF VAI ATÉ O FINAL DO ARQUIVO
        $line = fgets($handle);// FGETS TRAZ OS DADOS DA LINHA DO ARQUIVO TXT
        echo $line ."<br>";// MOSTROU O VALOR DA LINHA QUE FOI ATRIBUIDO A VARIAVEL LINE
    }
fclose($handle);//FECHA O ARQUIVO ATRIBUIDO A VARIAVEL
if($_POST['senha'] == '123mudar'){//SE VARIAVEL DO ADIVINHE SENHA "VARIAVEL SENHA" FOR IGUAL A VALOR 
    echo '<br><br>';
    echo 'Você acertou';
}
else{
    echo '<br><br>';
    echo 'Você errou!! ';
}

?>
</body>
</html>