<?php
    
    $parcheggio = $_GET['parcheggio'] ?? '';
    $voto = $_GET['voto'] ?? '';

    $hotels = [
        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],
        

    ];

?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>

<form action="index.php">
    <label >parcheggio</label>
    <input type="checkbox" name="parcheggio">

    <select name="voto" id="">
        <option value="0">scegli voto</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>

    <!-- <input type="text" name="parcheggio" placeholder="parcheggio"> -->
    <!-- <input type="text" name="voto" placeholder="voto"> -->
    <button type="submit">filtra</button>
</form>

<table class="table">
  <thead>
    <tr>
    <?php 
    foreach($hotels[0] as $key => $info) {
    ?>
        <th scope="col"> <?php echo $key ?> </th>
    <?php
    }
    ?>
    </tr>
  </thead>
  <tbody>

    <?php 
    foreach($hotels as $hotel) {
    ?>
    <tr class=" <?php echo $hotel['parking']==false && $parcheggio == 'on' ? 'd-none' : '' ?>  <?php echo $hotel['vote'] < $voto && $voto != 0 ? 'd-none' : '' ?>">
        <?php 
        foreach($hotel as $key => $info) {
        ?>

            <td> <?php 
            if ($key == 'parking') {
                if ($info == true) {
                    echo 'si';
                } else {
                    echo 'no' ;
                }
            } else {
                echo  $info ;
            } ?> </td>

        <?php
        }
        ?>
    </tr>

    <?php
    }
    
    ?>
  </tbody>
</table>


<br>
<br>
<hr>
<hr>

    <?php 
    foreach($hotels as $hotel){
        echo '<br>';
        foreach($hotel as $key => $info) {
            echo $key . ':' . $info . '<br>';
        }
    }

    ?>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>