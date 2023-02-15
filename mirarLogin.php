<?php
    require("db.php");
    session_start();

    // Este es el objeto de tipo conexion para la BD $conn->
    if(isset($_POST['passw'])){
        $pcheck = $salt.$_POST['passw'];
        $pcifrado = hash("sha256",$pcheck);
        $stmt = $conn->prepare("SELECT id FROM user WHERE username=:us AND password=:pw");
        $stmt->bindParam(':us', $_POST['user']);
        $stmt->bindParam(':pw', $pcifrado);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        
        if(count($stmt->fetchAll())==1){
            $_SESSION['autorizado']=true;
            if($_POST["idioma"]!=""){
                setcookie("idioma",$_POST["idioma"],time()+900);
            }
                
            $conn = null;
            header("Location:home.php");
        }  else{
            header("Location:login.php");
        }
            
    }
?>