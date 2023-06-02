<?php

    if(isseT($_POST['Registrar']))
    {
        
        include_once('include/conexao.php');
        
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sql = "INSERT INTO login ( email,senha) VALUES ( '".$_POST["email"]."', '".$_POST["senha"]."')";

        $grava = mysqli_query($con,utf8_decode($sql));
        $erro = mysqli_error($con);

        header("Location: login.php");

        // $result = mysqli_query($con, "INSERT INTO login (email,senha) VALUES ($email,$senha)");
        // $erro = mysqli_error($con);

        
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head> 
    <link rel="stylesheet" href="index.css">
    <title>Registrar</title>
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
                   <h2>Registrar</h2>
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
                    <button name="Registrar">Registrar</button>
                </form>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>