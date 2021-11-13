<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Generator</title>

    <!-- Para iniciar la parte de CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body style="background-color: #212121;">

    <!-- Barra de navegación de Bootstrap -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
          <a class="navbar-brand ms-auto" href=password_generator.php>Password Generator</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
              <a class="nav-link" aria-current="page" href=password_generator.php>Home</a>
              <a class="nav-link" aria-current="page" href=about.html>About</a>
            </div>
          </div>
        </div>
    </nav> <!-- Fin barra de navegación -->

    <!-- Form principal, con estilo de Bootstrap -->
    <div class="container p-5 text-light">
        <div class="col-md-4 offset-md-4">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="card card body p-5" style="background-color:#121212">

            <h4>Password Generator</h4>
            
            <label for="length">Select the lenght of your password:</label>
            <select name="length" id="lenght" class="form-control">
                <option value="6">6 Characters</option>
                <option value="7">7 Characters</option>
                <option value="8">8 Characters</option>
                <option value="9">9 Characters</option>
                <option value="10">10 Characters</option>
                <option value="11">11 Characters</option>
                <option value="12">12 Characters</option>
                <option value="13">13 Characters</option>
                <option value="14">14 Characters</option>
            </select>
            
            <div class="form-check form-switch my-2">
                <label for="uppercase" class="form-check-label">Uppercase</label>
                <input type="checkbox" name="uppercase" id="uppercase" class="form-check-input">
            </div>

            <div class="form-check form-switch my-2">
                <label for="numbers" class="form-check-label">Numbers</label>
                <input type="checkbox" name="numbers" id="numbers" class="form-check-input">
            </div>
    
            <div class="form-check form-switch my-2">
                <label for="special_chars" class="form-check-label">Special Characters</label>
                <input type="checkbox" name="special_chars" id="special_chars" class="form-check-input">
            </div>
   
            <input type="submit" value="Generate Psssword">

        </form> 
        </div>
    </div> <!-- Fin del form principal -->
    
    <!-- Scripts de PHP -->
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
        $characters = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
        $password_generated = "";
        $pass_lenght = $_POST["length"];
        $pass_lenght += 0;
        if ($_POST["uppercase"]) {
            array_push($characters,"A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z" );
        }
        if ($_POST["numbers"]) {
            array_push($characters,"1","2","3","4","5","6","7","8","9","0");
        }
        if ($_POST["special_chars"]) {
            array_push($characters,"'","-","_","!","#","$","%","&","/","(",")");
        }
        $password_generated = array_rand($characters,$pass_lenght);
        for($x=0;$x<$pass_lenght;$x+=1) { 
            $password_final.=$characters[$password_generated[$x]];
        }
    }
    ?>  <!-- Fin lógica principal de la app -->
    
    <div class="container p-2 text-light text-center">
        <div class="col-md-4 offset-md-4">
        <?php
        echo "<h4>Pasword Generated: <br> $password_final</h4>";
        ?>
        </div>
    </div>  <!-- Fin visualización del resultado -->
    
    <!-- Para inicializar la parte de JS de Bootstrap (sin uso por ahora)-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>