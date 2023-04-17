<?php
	include('config.php');
?>

	<style>
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap");
* {
  padding: 0;
  margin: 0;
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
  border: none;
  outline: none;
  text-decoration: none;
  -webkit-transition: .2s linear;
  transition: .2s linear;
}

body {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  min-height: 100vh;
  width: 100%;
  background: #0f0f0f;
}

.container {
  max-width: 350px;
  min-height: 40vh;
  padding: 2rem;
  border: 1px solid #cccccc;
  border-radius: 8px;
}

.container .imgBox img {
  width: 16rem;
  margin-bottom: 2rem;
}

.container h2 {
  color: #fe8040;
}

.container .subtitle {
  font-size: 0.8rem;
  color: #cccccc;
  margin-bottom: 2rem;
}

.container form {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: default;
      -ms-flex-pack: default;
          justify-content: default;
  -webkit-box-align: default;
      -ms-flex-align: default;
          align-items: default;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
      -ms-flex-direction: column;
          flex-direction: column;
}

.container form input[type="email"] {
  margin-top: 3rem;
}

.container form input[type="submit"] {
  padding: 0.4rem;
  margin-top: 2rem;
  cursor: pointer;
  font-size: 0.9rem;
  font-weight: 500;
  border-radius: 4px;
  -webkit-transition: all 0.3s ease;
  transition: all 0.3s ease;
  background: #fe8040;
}

.container form input[type="submit"]:hover {
  letter-spacing: 0.5px;
}

.container form .inputBox {
  position: relative;
}

.container form .inputBox input {
  font-size: 0.9rem;
  color: #cccccc;
  width: 100%;
  background: none;
}

.container form .inputBox:first-child {
  margin-bottom: 1.5rem;
}

.container form .inputBox input::-webkit-input-placeholder {
  color: #cccccc;
}

.container form .inputBox input:-ms-input-placeholder {
  color: #cccccc;
}

.container form .inputBox input::-ms-input-placeholder {
  color: #cccccc;
}

.container form .inputBox input::placeholder {
  color: #cccccc;
}

.container form .inputBox .underline::before {
  content: '';
  position: absolute;
  height: 1px;
  width: 100%;
  bottom: -5px;
  left: 0;
  color: rgba(0, 0, 0, 0.2);
}

.container form .inputBox .underline::after {
  content: '';
  position: absolute;
  height: 1px;
  width: 100%;
  bottom: -5px;
  left: 0;
  background: #fe8040;
  -webkit-transform: scaleX(0);
          transform: scaleX(0);
  -webkit-transform-origin: left;
          transform-origin: left;
  -webkit-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
}

.container form .inputBox input:focus ~ .underline::after {
  -webkit-transform: scaleX(1);
          transform: scaleX(1);
}

.container form .passwordF {
  padding: 0.7rem 0;
  text-align: end;
}

.container form .passwordF a {
  color: #111727;
  font-size: 0.7rem;
  text-decoration: underline;
}

.container .spanBox {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: default;
      -ms-flex-pack: default;
          justify-content: default;
  -webkit-box-align: default;
      -ms-flex-align: default;
          align-items: default;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
      -ms-flex-direction: column;
          flex-direction: column;
  text-align: center;
  margin-top: 1.5rem;
}

.container .spanBox span {
  font-size: 0.8rem;
  color: #cccccc;
}  
    </style>

    <div class="container">
        <h2>Login</h2>
        <span class="subtitle">Bem Vindo!! Por favor, insira seus dados.</span>
        
        <form method="POST">
            <div class="inputBox">
                <input type="email" name="login" id="login" placeholder="Email">
                <div class="underline"></div>
            </div>
            <div class="inputBox">
                <input type="password" name="senha" id="senha" placeholder="Senha">
                <div class="underline"></div>
            </div>

            <input type="submit" value="Entrar">
        </form>

        <div class="spanBox">
            <span>Não possuí uma conta? <a href="#"><span style="color: #fff;"> Criar agora</span></a></span>
        </div>   
    </div>
		

     <?php
            if($_POST){
                $resultado = Login($_POST['login'], $_POST['senha'], "");
                if($resultado['erro']){
                    echo 'deu ruim mn, ta tudo errado';
                }else{
                    $user = $resultado['dados'];
                    if($user->stts_user == 'bloqueado'){
                        echo 'deu ruim';
                    }else{
                        if($user->adm_user == 0){
                            $user = $resultado['dados'];
                            $_SESSION['cd_user'] = $user->cd_user;
                            $_SESSION['nm_user'] = $user->nm_user;
                            $_SESSION['mail_user'] = $user->mail_user;
                            $_SESSION['pass_user'] = $user->pass_user;
                            $_SESSION['stts_user'] = $user->stts_user;
                            $_SESSION['adm_user'] = $user->adm_user;
                            echo '<script>location.href="home.php";</script>';
                        }else{
                            echo '<script>location.href="adm.php";</script>';
                        }
                    }
                }
            }
        ?>