<?php
    
include 'include/conexao.php';

if(isset($_POST['email']) || isset($_POST['senha'])) {

    if(strlen($_POST['email']) == 0) {
        echo "Preencha seu e-mail";
    } else if(strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else {

        $email = ($_POST['email']);
        $senha = ($_POST['senha']);

        $sql_code = "SELECT * FROM login WHERE email = '$email' AND senha = '$senha'";
        $sql_query =  mysqli_query($con,utf8_decode($sql_code));

        $quantidade = mysqli_num_rows($sql_query);

            // echo"<pre>";
            // var_dump($sql_code);
            // exit();


        if($quantidade == 1) {
            
            $login = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['nome'] = $login['nome'];
            $_SESSION['senha'] = $login['senha'];

            header("Location: index.html");

        } else {
            echo "Falha ao logar! E-mail ou senha incorretos";
        }

    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head> 
    <link rel="stylesheet" href="index.css">
    <title>Login</title>
    <style>
        section{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    width: 100%;
    
    background: url('img/background6.jpg')no-repeat;
    background-position: center;
    background-size: cover;
}
.form-box{
    position: relative;
    width: 400px;
    height: 450px;
    background: transparent;
    border: 2px solid rgba(12, 12, 12, 0.5);
    border-radius: 20px;
    backdrop-filter: blur(5px);
    display: flex;
    justify-content: center;
    align-items: center;

}
h2{
    font-size: 2em;
    color: #000000;
    text-align: center;
}
.inputbox{
    position: relative;
    margin: 30px 0;
    width: 310px;
    border-bottom: 2px solid #000000;
}
.inputbox label{
    position: absolute;
    top: 50%;
    left: 5px;
    transform: translateY(-50%);
    color: #4e4242;
    font-size: 1em;
    pointer-events: none;
    transition: .5s;
}
input:focus ~ label,
input:valid ~ label {
top: -5px;
}
.inputbox input {
    width: 100%;
    height: 50px;
    background: transparent;
    border: none;
    outline: none;
    font-size: 1em;
    padding:0 35px 0 5px;
    color: #6d6d5f;
}
.inputbox ion-icon{
    position: absolute;
    right: 8px;
    color: #353335;
    font-size: 1.2em;
    top: 20px;
}
.forget{
    margin: -15px 0 15px ;
    font-size: .9em;
    color: #474343;
    display: flex;
    justify-content: space-between;  
}

.forget label input{
    margin-right: 3px;
    
}
.forget label a{
    color: #fff;
    text-decoration: none;
}
.forget label a:hover{
    text-decoration: underline;
}
button{
    width: 100%;
    height: 40px;
    border-radius: 40px;
    background: #fff;
    border: none;
    outline: none;
    cursor: pointer;
    font-size: 1em;
    font-weight: 600;
}
.register{
    font-size: .9em;
    color: #fff;
    text-align: center;
    margin: 25px 0 10px;
}
.register p a{
    text-decoration: none;
    color: #c79999;
    font-weight: 600;
}
.register p a:hover{
    text-decoration: underline;
}

a{
    text-decoration: none;
    color: #000000;
}

    </style>
</head>
<body>
    <section>
         <div class="form-box">
           <div class="form-value">
                <form action="" method="Post">
                   <h2>Login</h2>
                   <div class="inputbox">
                      <ion-icon name="mail-outline"></ion-icon>
                      <input type="email" name="email" required id="login">
                      <label for="">Email</label>
                   </div>
                   <div class="inputbox">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input type="password" name="senha" required id="senha">
                    <label for="">Senha</label>
                    </div>
                    <button onclick="logar(); return false " name="Login">Login</button>
                    <div class="Register">
                         <p> Não possuo uma conta <a href="registrar.php">Resgistrar-se</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
   
</body>
</html>