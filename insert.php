<?php
include 'database.php';

try { 
    //code...
     if(isset($_POST['envoye'])) {

      echo "hello";
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $entreprise = $_POST['entreprise'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $description = $_POST['message'];
        //$profil = $_POST['profil'];
     
        echo "$nom \n";
        echo "$prenom \n";
        echo "$entreprise \n";
        echo "$tel \n";
        echo "$email \n";
        echo "$description \n";
      
       
        $image = $_FILES["profil"];
            $imagefilename = $image['name'];
         print_r($imagefilename);
         $imagefileerror = $image['error'];
         print_r($imagefileerror);
         echo "<br>";
         $imagefiletemp = $image['tmp_name'];
        print_r($imagefiletemp);
         echo "<br>";

         $filename_separate = explode('.', $imagefilename);
          print_r($filename_separate);
         echo "<br>";
         $file_extension = strtolower(end($filename_separate));
         print_r($file_extension);
         echo "<br>";
         $extension = array('jpeg', 'jpg', 'png');

         if (in_array($file_extension, $extension)) {
            $upload_image = 'imag/' . $imagefilename;
            move_uploaded_file($imagefiletemp, $upload_image);
      

            $sql = "INSERT INTO `contact` ( `nom`,`prenom`, `entreprise`, `tel`,email, `description`, `profil`) 
                                                         VALUES ('$nom','$prenom','$entreprise','$tel','$email','$description','$upload_image')";
                  $qry = mysqli_query($connect, $sql);
                  if($qry) {         
                     header("location: index.php");
                  }else{
                     echo "erreur requete";
                  }

      }else{
         $sql = "INSERT INTO `contact` ( `nom`,`prenom`, `entreprise`, `tel`,email, `description`, `profil`) 
                                                         VALUES ('$nom','$prenom','$entreprise','$tel','$email','$description','imag/esp.jpeg')";
                  $qry = mysqli_query($connect, $sql);
                  if($qry) {         
                     header("location: index.php");
                  }else{
                     echo "erreur requete";
                  }
      }
   }

   } catch (\Throwable $th) {
    //throw $th;
    echo "ereur catch";
    echo $th;
   }
?>