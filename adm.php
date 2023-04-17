<?php
	include('config.php');
?>

<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">

<style>
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap");

* {
	padding: 0;
	margin: 0;
	box-sizing: border-box;
	font-family: 'Roboto', sans-serif;
	border: none;
	outline: none;
	text-decoration: none;
	transition: .2s linear;
}

body {
	min-height: 100vh;
	width: 100%;
	background: #0f0f0f;
}

.header {
	display: flex;
	align-items: center;
	justify-content: space-between;
	flex-direction: row;
	padding: 2rem 10%;
	width: 100%;
    z-index: 1000;
}

.header .logo {
	color: #fe8040;
}

.header #btn_logout {
	background: #fe8040;
	padding: 8px 18px;
	border-radius: 0.4rem;
	font-weight: 600;
	font-size: 0.8rem;
}

.main {
	display: flex;
	align-items: center;
	justify-content: flex-start;
	flex-direction: column;
	min-height: 100vh;
}

.main .main_section {
	display: flex;
	flex-direction: row;
	column-gap: 4rem;
	padding: 2rem 10%;
	width: 100%;
}

.main .main_section .left_section {
	display: flex;
	flex-direction: column;
	width: 30%;
}

.main .main_section .left_section .inputbox {
	margin: 1rem 0rem;
	width: 100%;
}

.title_box .title {
	color: #fe8040;
	font-size: 4rem;
	font-weight: 600;
}

#file {
	display: none;
}

.main .main_section .left_section .inputbox label {
	display: flex;
	align-items: center;
	justify-content: center;
	color: #cccccc;
	border: 1px dashed #cccccc;
	cursor: pointer;
	width: 100%;
	height: 4rem;
	font-size: 0.8rem;
	background: none;
}

.main .main_section .left_section .text_box {
	padding: 0.6rem 0rem;
	color: #cccccc;
	font-weight: 300;
	text-align: justify;
	font-size: 0.8rem;
}

.main .main_section .left_section .input_box {
	width: 100%;
	margin: 1rem 0rem;
	border: 1px solid #ccc;
}

.main .main_section .left_section .input_box input {
	width: 100%;
	padding: 1rem 0.7rem;
	background: none;
	color: #cccccc;
}

.main .main_section .left_section .input_box input::placeholder, .main .main_section .left_section .input_box textarea::placeholder {
	color: #ccc;
}

.main .main_section .left_section .input_box textarea {
	width: 100%;
	height: 10rem;
	padding: 1rem 0.7rem;
	background: none;
	color: #cccccc;
}

.main .main_section .right_section {
	display: flex;
	flex-direction: column;
	width: 70%;
}

.main .main_section .left_section .btn {
	width: 100%;
	padding: 1rem;
	background: #fe8040;
	font-weight: 600;
	cursor: pointer;
}

.main .main_section .right_section .card_box {
	display: flex;
	flex-direction: column;
	width: 100%;
	margin-top: 1.2rem;
}

.main .main_section .right_section .card {
	display: flex;
	flex-direction: row;
	justify-content: space-between;
	align-items: center;
	padding: 1rem;
	border-top: 1px solid rgba(0, 0, 0, 0.1);
	border-bottom: 1px solid rgba(0, 0, 0, 0.1);
}

.main .main_section .right_section .card h2 {
	color: #ccc;
}

.main .main_section .right_section .card p {
	color: #a9a9a9;
	margin-top: 4px;
	font-size: 0.8rem;
}

.main .main_section .right_section .card a i {
	color: #ccc;
	font-size: 1.4rem;
}

</style>

	<header class="header">
		<nav class="navbar">
			<h2 class="logo">PW III</h2>
		</nav>
		<form action="logout.php" method="post">
	    	<input type="hidden" name="logout" value="true">
			<button id="btn_logout">Sair</button>
		</form>
	</header>

    <main class="main">
    	<section class="main_section">
    		<div class="left_section">
        		<form method="POST" enctype="multipart/form-data">
        			<div class="title_box">
        				<h2 class="title">Upload</h2>
        			</div>
        			<div class="text_box">
        				<p class="text">Envie seus arquivos para a plataforma de uma forma simles e ágil.</p>
        			</div>
        			<div class="input_box">
        				<input type="text" name="tt_arquivo" id="tt_arquivo" placeholder="Titulo">
        			</div>
        			    <div class="input_box">
        				<textarea name="dc_arquivo" id="dc_arquivo" placeholder="Descrição"></textarea>
        			</div>
        			<div class="inputbox">
						<label for="file">
							<span>Escolher Arquivo</span>
							<input type="file" name="file" id="file">
						</label>
        			 </div>
		            <button name="upload" class="btn">Enviar</button>
        		</form>
    		</div>

    		<?php
				if($_POST){
				    if(isset($_POST['upload'], $_POST['tt_arquivo'], $_POST['dc_arquivo'])){
				        UploadArquivo($_FILES['file'], $_POST['tt_arquivo'], $_POST['dc_arquivo']);
				    }
				}
    		?>

    		<div class="right_section">
    			<div class="title_box">
        			<h2 class="title">Arquivos Disponíveis</h2>
        		</div>

				<div class="card_box"></div>

		            <?php
		                $query = 'SELECT * FROM arquivo';
		                $res = $GLOBALS['conn']->query($query);
		                foreach($res as $row){
		                    echo '
						        <div class="card">
									<div class="left_card">
										<h2 class="title">'.$row['tt_arquivo'].'</h2>
										<p class="desc">'.$row['dc_arquivo'].'</p>
									</div>
									<div class="right_card">
										<a href="/arquivos/'.$row['nm_arquivo'].'" download><i class="uil uil-import"></i></a>
										<a href="#"><i class="uil uil-trash-alt"></i></a>										
									</div>
								</div>	
		                    ';
		                }
		            ?>
    		</div>
    	</section>
    </main>
