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

foreach ($nature as $animals) {
	foreach ($animals as $key => $animal) {
		$count = substr_count($animal, ' ');
		if($count === 1) {
			array_push($twoWords, $animal);
		}
	}	
}

$fictionalAnimals = [];
while (count($twoWords) !== 0) {
    if (count($twoWords) === 1) {
        array_push($fictionalAnimals, $twoWords[0]);
        break;
    } else {
        $first = 0;
        $rand = rand(1, count($twoWords) - 1);
        $firstElem = $twoWords[$first];
        $randElem = $twoWords[$rand];
        
        $fictionalFirst = substr($firstElem, 0, strpos($firstElem, ' ')) . ' '
            . substr($randElem, strpos($randElem, ' '));
        $fictionalSecond = substr($randElem, 0, strpos($randElem, ' ')) . ' '
            . substr($firstElem, strpos($firstElem, ' '));
        
        array_push($fictionalAnimals, $fictionalFirst, $fictionalSecond);
        unset($twoWords[$first], $twoWords[$rand]);
        $twoWords = array_values($twoWords);
    }
}
$fictionalAnimalsWithHome = [];
foreach ($fictionalAnimals as $elem) {
    $words1 = explode(' ', $elem);
    foreach ($nature as $key => $animal) {
        foreach ($animal as $value) {
            $words2 = explode(' ', $value);
            if ($words1[0] === $words2[0]) {
                $fictionalAnimalsWithHome[$key][] = $elem;
            }
        }
    }
}

foreach ($nature as $key => $item) $continents[] = $key;
foreach ($fictionalAnimalsWithHome as $key => $animals) $arraysOfAnimals[$key] = $animals;
$continents = array_flip($continents);
$fictionalAnimalsWithHome = array_merge($continents, $arraysOfAnimals);
// Функция для выведения в html-документе животных (вместе с запятыми)
function printAnimals($array) {
    foreach ($array as $key => $animals) {
        echo "<div class=\"container\">";
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
        <h1>Выдуманные животные</h1>
		<div class="align">
            <?php printAnimals($fictionalAnimalsWithHome); ?>
		</div>
	</div>
</body>
</html>
