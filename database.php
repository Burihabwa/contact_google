<?php

$connect = mysqli_connect("localhost", "root", "");

if ($connect) {
   // echo "<br/> Connected to server";
    try {
        //code... 
        $selectdb = mysqli_select_db($connect,'contacts');
        /*if(!$selectdb){

        }*/
    } catch (\Throwable $th) {
        //throw $th;
       
            $sqlcreatedb = "CREATE DATABASE IF NOT EXISTS `contacts`";
    
            if (mysqli_query($connect, $sqlcreatedb)) {
                echo "<br />Un nouveau base de donnee";
                $selectdb2 = mysqli_select_db($connect, "contacts");
    
                if ($selectdb2) {
                     echo "<br />Created database selected";
                    $sqlcreatetable = "
                    CREATE TABLE `contact` (
                        `id_cont` int NOT NULL AUTO_INCREMENT,
                        `nom` varchar(100) DEFAULT NULL,
                        `prenom` varchar(100) DEFAULT NULL,
                        `entreprise` varchar(100) DEFAULT NULL,
                        `email` varchar(100) DEFAULT NULL,
                        `tel` varchar(100) DEFAULT NULL,
                        `description` varchar(300) DEFAULT NULL,
                        `profil` varchar(100) DEFAULT NULL,
                        PRIMARY KEY (`id_cont`)
                      ) ENGINE=InnoDB ;";
                    if (mysqli_query($connect,$sqlcreatetable)) {
                        echo "<br />Nouveau table creer";
                        } else {
                        echo "<br /> Pas de table creer";
                        }
                }
    
            } else {
                echo "<br />pas de base de données creer";
            }	
        
    
    }  
   
}

?>

