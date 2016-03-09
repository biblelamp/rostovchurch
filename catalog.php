<?
// Евангельские церкви © 2007, версия 1.01 от 01 марта

$file_name = 'catalog.txt'; // файл с списком церквей

echo '<p><span style="font-size:18px">'.$scripts['catalog'].'</span></p>';

$catalog_lst = file($file_name);
$j = 0;
for ($i=0; $i<count($catalog_lst); $i++) {
	list($name, $daytime, $phone) = split("\|", trim($catalog_lst[$i]));
	if ($daytime != '') {
		$j++;
		if ($name == 'Шомер Йисраэль')
			$name = 'Мессианская синагога <strong>'.$name.'</strong>';
		else
			$name = 'Церковь <strong>'.$name.'</strong>';
		echo '<p>'.$j.'. '.$name.'<br><em>Богослужения</em>: '.$daytime;
		if ($phone != '') echo '<br>Тел. '.$phone;
	}
}

?><p>Если Вы обнаружили, что в списке не хватает той или иной церкви, а также если название или время и место Богослужений или контактный телефон указаны неверно, пожалуйста, сообщите об этом через нашу «<a href="gb">Гостевую книгу</a>».