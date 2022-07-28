<!-- Medium: duotas masyvas su prekėmis. Atvaizduojant visas prekes masyve ir 
jų kainas, bei pridėti įvertinimą ar galime jas įpirkti ar ne. Pinigų suma saugoma sausainėlyje.

Masyvas: https://pastebin.com/sGUwgWdc

Resursai:
https://getbootstrap.com/docs/5.0/components/badge/
https://www.php.net/manual/en/control-structures.foreach.php
https://davidwalsh.name/php-ternary-examples
 -->


 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Prekės</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
 </head>
 <body>
     



<?php 
    $items = [
        [
        'name' => 'Playstation 5',
        'price' => 849.99
        ],
        [
        'name' => 'Iphone 13',
        'price' => 999.99
        ],
        [
        'name' => 'Bulviu tarkavimo masina migris',
        'price' => 89.99
        ],
        [
        'name' => 'Mikrobangų krosnelė DOMO DO2342CG',
        'price' => 253
        ]
    ];

?>


<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <form method="POST" action="medium.php">
                <label for="suma">Kiek norite ideti</label>
                <input class="form-control" name="suma"/>
                <button type="submit" name="patvirtinti" class="btn btn-primary"> Idet pinigu i taupykle </button>
            </form>
            <span> Taupyklėje yra <?php
                if(!isset($_COOKIE["suma"])) {
                    echo 0;
                } else {
                    echo $_COOKIE["suma"];
                }
            ?> 
            €
        </span>
        </div>
        <div class="col-lg-6">
            <ul>
                <?php foreach($items as $item) { ?>
                    <li>
                        <?php echo $item['name'] ?> (<?php echo $item['price'] ?>)
                        
                        <?php if(!isset($_COOKIE["suma"]) || $_COOKIE["suma"] < $item['price'] ) { ?>
                            <span class="badge bg-danger">Neįperkama</span>
                        <?php } else { ?>
                            <span class="badge bg-success">Įperkama</span>
                        <?php } ?>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>
<?php 
    if(isset($_POST["patvirtinti"])) {
        $suma = $_POST["suma"];
        if(!isset($_COOKIE["suma"])) {
            setcookie("suma", $suma , time() + 86400, "/");
        } else {
            setcookie("suma", $_COOKIE["suma"] + $suma  , time() + 86400, "/");
        }
        header("Location: medium.php");
    }

?>
 
 </body>
 </html>