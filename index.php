


<?php 
include 'header.php';
$font="verdana";
$errname=$erremail=$errwebsite=$errcomment= "";
$name=$email=$website= "";

      

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST["name"])){
        $errname = " <span style='color:red'>Name is Required.</span>";
    }else{
        $name= validation( $_POST["name"]);
    }
    if(empty($_POST["email"])){
        $erremail=" <span style='color:red'>Name is Required.</span>";
    }elseif(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
        $erremail=" <span style='color:red'>Invalid Email.</span>";
    }
    
    else{
        $email= validation($_POST["email"]);
    }
    if(empty($_POST["website"])){
        $errwebsite= " <span style='color:red'>Name is Required.</span>";
    }elseif(!filter_var($_POST["website"], FILTER_VALIDATE_URL)){
        $errwebsite=" <span style='color:red'>Invalid Website adress.</span>";
    }
    
    else{
        $website= validation($_POST["website"]);  
    }
   
 
 
if(isset($_FILES['image'])){
    $filename = $_FILES['image']['name'];
    $filetmp = $_FILES ['image']['tmp_name'];
    move_uploaded_file($filetmp,"images/".$filename);
    echo "Images uploaded successfully";
}



 echo "Name : ".$name."<br/>";
 echo "Email : ".$email."<br/>";
 echo "Website : ".$website;
 
 
 
}      

function validation($data){
      $data= trim($data);
      $data= stripcslashes($data);
      $data= htmlspecialchars($data);  
      return $data; 
      
}



?>



    <section class="maincontent"> 
    <hr/>
    PHP Date and Time
    <span style="float:right">
    <?php 
    
     date_default_timezone_set('Asia/Dhaka');
     echo "Time :".date("h:i:sa");
    
    ?>
    </span>
    <hr/>
    <form action="" method="post">
    <input type="file" name= "image"/>
    <input type="submit" value="Submit" enctype = "multipart/form-data">
    
    </form>
    <a href= "text.php? msg=Dude&txt=bye">Send Message</a>
    <for   m action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    <table>
    <tr>
    <td>Name</td>
    <td><input type="text" name="name">*<?php echo $errname ?></td>
    
    </tr>
    <tr>
    <td>Email</td>
    <td><input type="text" name="email">*<?php echo $erremail ?></td>
    
    </tr>
    <tr>
    <td>Website</td>
    <td><input type="text" name="website">*<?php echo $errwebsite ?></td>
    </tr>
    <tr>
    <td>Comment</td>
    <td><textarea name="comment"  cols="40" rows="5"></textarea></td>
    
    </tr>
    <tr>
    <td></td>
    <td><input type="submit" name="submit" value="submit"></td>
    </tr>
    
    
    </table>
    </form>
  
    <?php
      /* $ourfile = fopen("text.txt","r") or die("File not found");
       echo fread($ourfile, filesize("text.txt"));
        fclose($ourfile);
       echo readfile("text.txt");
       */
      $newfile = fopen("new.txt" , "w") or die("File not found");
      $one = "Moinul Hasan raju";
      fwrite($newfile,$one);
      fclose($newfile);
    ?>
    </section>
   
    <?php 
    
    include 'footer.php';
    ?>

    </div>
</body>

</html>