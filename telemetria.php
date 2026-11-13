<?php

$ping_grezzi = [45, 120, -1, 32, 210, 85, -1, 18, 95, 310, 45, 60, -1, 150, 28, 240,
18, 72];

array_push($ping_grezzi, 55, 190, 12);  
$ping_validi = [];

$pacchetti_persi = 0;

    foreach($ping_grezzi as $valori){
        if ($valori == -1){
            $pacchetti_persi++;
        }

        else{
            $ping_validi[] = $valori;
        }
    }

$ping_max = $ping_validi[0];
$ping_min = $ping_validi[0];
$ping_critici = [];

$somma = 0;
$media = 0;
$cont = 0;

    foreach($ping_validi as $valori){
        
        $somma += $valori;
        $cont++;


        if($ping_max < $valori){
            $ping_max = $valori;
        }

        if($ping_min > $valori){
            $ping_min = $valori;
        }   

    }

    foreach($ping_validi as $valori){
        if($valori>=150){
            $ping_critici[] = $valori;
        }
    }

$media = $somma/$cont;


$ping_unici = array_unique($ping_validi); 

$ping_ordinati = $ping_validi;

sort($ping_validi);

$top_3_veloci = array_slice($ping_ordinati, 0, 3);


    if (in_array(100, $ping_ordinati)) {
        $controllo_100ms = "Sì";
    } else {
        $controllo_100ms = "No";
    }






?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <ul>

        <li>Totale rilevazioni: <?= (count($ping_grezzi)); ?> </li>
        <li>Pacchetti Validi: <?= count($ping_validi); ?></li>
        <li>Pacchetti versi: <?= $pacchetti_persi; ?></li>
        <li>Media: <?= round($media,2); ?></li>
        <li>Minimo: <?= $ping_min; ?></li>
        <li>Massimo: <?= $ping_max; ?></li>

    </ul>

    <table>
        <thead>
            <tr>
                <th> # </th>
                <th> Ping (ms) </th>
                <th> Stato </th>
            </tr>

        </thead>

        <tbody>
            <?php for( $i = 0; $i < count($ping_validi); $i++ ): ?>
                <tr>
                    <td> <?= $i+1; ?></td>
                    <td> <?= $ping_validi[$i]; ?></td>
                    <td> <?= $ping_validi[$i] >= 150 ? "CRITICO" : "NORMALE"; ?></td>
                </tr>

            <?php endfor; ?>
        </tbody>
    </table>





   <!--<h1>numero pacchetti persi : <?php echo($pacchetti_persi) ?> </h1>
    

    <ul>
        <?php foreach($ping_validi as $valori): ?>
            <li><?php echo($valori)?> </li>
        <?php endforeach ?>
    </ul>

 
    <h2>La media è: <?php echo(round($media,2))?></h2>

    <h2>Il massimo è: <?php echo($ping_max)?></h2>

    <h2>Il minimo è: <?php echo($ping_min)?></h2>
     
    
    <h3>Pacchetti critici maggiori di 150: </h3>
    <ul>
        <?php foreach($ping_critici as $valori): ?>
            <li><?php echo($valori)?> </li>
        <?php endforeach ?>
    </ul>

    <h3>Pacchetti unici </h3>
    <ul>
        <?php foreach($ping_unici as $valori): ?>
            <li><?php echo($valori)?> </li>
        <?php endforeach ?>
    </ul>

    <h3>Pacchetti ordinati</h3>
    <ul>
        <?php foreach($ping_ordinati as $valori): ?>
            <li><?php echo($valori)?> </li>
        <?php endforeach ?>
    </ul>

    <h3>i tre pacchetti più veloci</h3>
    <ul>
        <?php foreach($top_3_veloci as $valori): ?>
            <li><?php echo($valori)?> </li>
        <?php endforeach ?>
    </ul>

     <h3>Pacchetti criti : <?php echo($controllo_100ms) ?></h3> -->
    

</body>
</html>