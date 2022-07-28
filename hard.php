<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>
<body>
    <?php 
    
    $items = [
        [
        'id' => 1,    
        'name' => 'Playstation 5',
        'price' => 849.99
        ],
        [
        'id' => 2,   
        'name' => 'Iphone 13',
        'price' => 999.99
        ],
        [
            'id' => 3,      
        'name' => 'Bulviu tarkavimo masina migris',
        'price' => 89.99
        ],
        [
            'id' => 4,   
        'name' => 'Mikrobangų krosnelė DOMO DO2342CG',
        'price' => 253
        ]
    ];

    //masyvo papildymas
    // for($i=0; $i<100; $i++) {
    //     $items[] = array(
    //         'name' => 'Samsung TV',
    //         'price' => 600
    //     );
    // }


    // var_dump($items);

        //php - funkcija 
        //
    // unset($items[2]);
    
    // var_dump($items);


    ?>


            <ul>

                <?php   if(isset($_COOKIE["prekes"])) {
                    $items = json_decode($_COOKIE["prekes"], true);
                }
                ?>
                <?php foreach($items as $item) { ?>
                    <li>
                        <?php echo $item['name'] ?> (<?php echo $item['price'] ?>)
                        <form method="GET" action="hard.php">
                            <input name="id" type="hidden" value="<?php echo $item['id'] ?>">
                            <button type="submit" class='btn btn-danger'> Ištrinti </button>
                    </form>   
                    </li>
                <?php } ?>
            </ul>

         <?php 
            if(isset($_GET["id"])) {

                if(isset($_COOKIE["prekes"])) {
                    $items = json_decode($_COOKIE["prekes"], true);
                }
                unset($items[$_GET["id"] - 1]);
                setcookie("prekes", json_encode($items, true), time() + 86400, "/");
                header("Location: hard.php");
            }
         ?>   
</body>
</html>