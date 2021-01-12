<?php

$name = $row['name'];

$eng = $row['engca1'] + $row['engca2'] + $row['engca3']+ $row['engexam'];

$math = $row['mathca1'] + $row['mathca2'] + $row['mathca3']+ $row['mathexam'];

$hel = $row['helca1'] + $row['helca2'] + $row['helca3']+ $row['helexam'];

$social = $row['socialca1'] + $row['socialca2'] + $row['socialca3']+ $row['socialexam'];

$agric = $row['agricca1'] + $row['agricca2'] + $row['agricca3']+ $row['agricexam'];

$civic = $row['civicca1'] + $row['civicca2'] + $row['civicca3']+ $row['civicexam'];

$hau = $row['hauca1'] + $row['hauca2'] + $row['hauca3']+ $row['hauexam'];

$basic = $row['basicca1'] + $row['basicca2'] + $row['basicca3']+ $row['basicexam'];

$art = $row['artca1'] + $row['artca2'] + $row['artca3']+ $row['artexam'];

$rel = $row['relca1'] + $row['relca2'] + $row['relca3']+ $row['relexam'];

$comp = $row['compca1'] + $row['compca2'] + $row['compca3']+ $row['compexam'];

$home = $row['homeca1'] + $row['homeca2'] + $row['homeca3']+ $row['homeexam'];


$total = $eng + $math + $hel + $social + $agric + $civic + $hau + $basic + $art + $rel + $comp + $home;

$average = ($eng + $math + $hel + $social + $agric + $civic + $hau + $basic + $art + $rel + $comp + $home)/12;

$avg = round($average,2);

$column ='engca1 + engca2+ engca3+ engexam +
mathca1 + mathca2+ mathca3+ mathexam +
helca1 + helca2+ helca3+ helexam +
socialca1 + socialca2+ socialca3+ socialexam +
agricca1 + agricca2+ agricca3+ agricexam + 
civicca1 + civicca2+ civicca3+ civicexam +
hauca1 + hauca2+ hauca3+ hauexam +
basicca1 + basicca2+ basicca3+ basicexam +
artca1 + artca2+ artca3+ artexam +
relca1 + relca2+ relca3+ relexam +
compca1 + compca2+ compca3+ compexam +
homeca1 + homeca2+ homeca3+ homeexam';
$sql_for_position = "SELECT * FROM {$_SESSION['class']} WHERE  $column > $total ";
$sql_query_positon = mysqli_query($conn, $sql_for_position);
$position = mysqli_num_rows($sql_query_positon) + 1;

$sql_for_schoolfee = "SELECT * FROM schoolfee WHERE  name='$name' ";
$sql_query_schoolfee = mysqli_query($conn, $sql_for_schoolfee);

$schoolfee = mysqli_num_rows($sql_query_schoolfee);

?>
<?php #if($schoolfee < 1):?>
        <!-- <?php #continue;?> -->
    <?php #else:?>

        <?php #endif;?>
<!--       -->