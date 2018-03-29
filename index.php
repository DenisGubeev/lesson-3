<?php
$nature = [
	'Africa' => [ 
		'Elephantidae',
		'Gorilla',
		'Panthera leo'
	],
	'Eurasia'	=> [
		'Panthera tigris altaica',
		'Ursus arctos',
		'Ovis orientalis'
	],
	'North America' => [
		'Ursus arctos horribilis',
		'Sylvilagus',
		'Cathartidae'	
	],
	'Sourth America' => [
		'Eunectes murinus',
		'Psittacidae',
		'Spheniscidae'
	],
	'Australia' => [ 
		'Macropus',
		'Phascolarctos cinereus',
		'Canis lupus dingo'
		
	],
	'Antarctica' => [
		'Pagodroma nivea',
		'Mirounga leonina',
		'Balaenoptera musculus'
	]
];

$twoWords = [];
$continent = [];
$firstWord = [];
$secondWord = [];

foreach ($nature as $continentsKey => $animals) {
    $continent[] = $continentsKey;
    foreach ($animals as $animal) {
        $count = explode(" ", $animal);
        if (count($count) == 2) {
            $twoWords[] = $animal;
            $firstWord[] = $count[0];
            $secondWord[] = $count[1];
        }
    }
}

function printAnimals($array) {
    foreach ($array as $key => $animals) {
        echo "<div>";
        echo "<h2>{$key}</h2>";
	$animalsWithCommas = implode(",<br>", $animals);
        echo "<p>{$animalsWithCommas}</p>";
        echo "</div>";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>1.3-homework</title>
	<style>
	.align {
		
	}
	</style>
</head>
<body>
	<div>
		<div class="align">
		<h1>Животные</h1>
			<?php printAnimals($nature); ?>
		</div>
		<div class="align">
		<h1>Двойнные названия</h1>
		<?php
			foreach ($twoWords as $item) {
			 echo "$item<br>";
		}
		?>
		</div>
        	<h1>Выдуманные животные</h1>
		<div class="align">
        		<?php shuffle($secondWord);
			foreach ($secondWord as $last) {
				$title = array_shift($continent);
				$first = array_shift($firstWord);
				echo $first . ' ' . $last . '<br>';
				}
			?>
		</div>
	</div>
</body>
</html>
