<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atspėk skaičių</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</head>
<body>
    <div class="container">

    <?php if(isset($_COOKIE["laimejot"]) && $_COOKIE["laimejot"] == 1 ) { ?>
        <div class="alert alert-success" role="alert">
            Laimėjote. Laimingas skaicius - <?php echo $_COOKIE["laimingasSk"];?>. Spėjimas - <?php echo $_COOKIE["spejimas"];?>
        </div>
    <?php } else if(isset($_COOKIE["laimejot"])  && $_COOKIE["laimejot"] == 0 ) { ?>
        <div class="alert alert-danger" role="alert">
            Pralaimėjote. Laimingas skaicius - <?php echo $_COOKIE["laimingasSk"];?>. Spėjimas - <?php echo $_COOKIE["spejimas"];?>
        </div>
    <?php } ?>
        <form method="POST" action="easy.php">
            <label for="sudetingumas">Sudėtingumas</label>
            <select class="form-select" name="sudetingumas">
                <option value="3">Lengvas - 3 skaičiai</option>
                <option value="5">Vidutinis - 5 skaičiai</option>
                <option value="7">Sunkus - 7 skaičiai</option>
            </select>

            <label for="spejimas">Spėjimas</label>
            <input class="form-control" name="spejimas" />


            <button class="btn btn-primary" type="submit" name="patvirtinti">Žaisti</button>
        </form>
    </div>

    <?php 
        if(isset($_POST["patvirtinti"])) {

            $spejimas = $_POST["spejimas"];
            $sudetingumas = $_POST["sudetingumas"];


            if(isset($_COOKIE["tarpinislaimejimas"])) {
                if($_COOKIE["atsitiktiniai1"] == $spejimas) {
                    setcookie("tarpinislaimejimas", 1, time() + 86400, "/");
                } else {
                    setcookie("laimejot", 0, time() + 86400, "/");
                }
            } else {

            //sugeneruojamas atsitiktinis skaicius nepriklausomai nuo sudetingumo ir mes bandome ji atspeti
            // 3 skaiciai - atsitiktinai yra sugeneruojami 3 skaiciai. Ir visus juos reikia atspeti
            // 5 skaiciai - sugeneruojami 5 skaiciai ir visus juos reikia atspet
            //7 skaiciai - sugeneruojami 7 skaiciai ir visus juos reikia atspet
            $atsitiktiniai = [];
            for($i=0; $i<$sudetingumas; $i++) {
                $cikloRand = rand(1,8);
                $atsitiktiniai[] = $cikloRand;
                setcookie("atsitiktiniai".$i, $cikloRand, time() + 86400, "/"  );
            }
            // paprastas - 3

            if($atistiktiniai[0] == $spejimas) {
                setcookie("tarpinislaimejimas", 1, time() + 86400, "/");
            } else {
                setcookie("laimejot", 0, time() + 86400, "/");
            }
            
                setcookie("laimingasSk", $atsitiktinis, time() + 86400, "/"  );
                setcookie("spejimas", $spejimas, time() + 86400, "/"  );
            }

        }
    ?>
</body>
</html>