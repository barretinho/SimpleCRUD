<?php
	session_start();
	define('HOST', 'localhost');
	define('USER', 'root');
	define('PASS', '');
	define('DB', 'db_updown');

	$conn = mysqli_connect(HOST, USER, PASS, DB) or die ('Erro ao conectar-se com o Banco de Dados');

    function Login($mail_user, $pass_user, $tipo){
        $sql = 'SELECT * FROM tb_user WHERE mail_user = "'.$mail_user.'" AND pass_user = "'.$pass_user.'"';
        $res = $GLOBALS['conn']->query($sql);

        if($res->num_rows > 0){
            $retorno['erro'] = false;
            $user = $res->fetch_object();
            $retorno['dados'] = $user;
        }else{
            $retorno['erro'] = true;
        }

        if($tipo == "json"){
            return json_encode($retorno);
        }else{
            return $retorno;
        }
    }

    function UploadArquivo($arquivo, $tt_arquivo, $dc_arquivo){
        $dir = 'arquivos/';
        if(move_uploaded_file($arquivo['tmp_name'], $dir.'/'.$arquivo['name'])){
            $query = 'INSERT INTO arquivo (nm_arquivo, tt_arquivo, dc_arquivo) VALUES ("'.$arquivo['name'].'","'.$tt_arquivo.'","'.$dc_arquivo.'")';
            $res = $GLOBALS['conn']->query($query);
            if($res){
               echo '<script>alert("Arquivo upado com sucesso")</script>';
            }
        }else{
            echo '<script>alert("Falha ao upar arquivo!!")</script>';
        }
    }

?>