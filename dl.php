<?

$LOG = 'dl.log'; // файл журнала закачек
$file_path = "/home/u53132/rostovchurch.ru/"; // путь к каталогу файлов
$file_name = getenv("QUERY_STRING"); // имя файла

if (file_exists($file_path.$file_name)) {

	// определяем размер файла
	$file_size = filesize($file_path.$file_name);

	// увеличиваем значение счетчика на 1
	if (file_exists('counters/'.$file_name.'.count')) $count = join('', file('counters/'.$file_name.'.count'));
	else $count = 0;
	$count++;
	$fd = fopen('counters/'.$file_name.'.count', 'w+');
	flock($fd, LOCK_EX);
	fputs($fd, $count);
	fflush($fd);
	flock($fd, LOCK_UN);
	fclose($fd);

	// пишем данные в лог
	$fd = fopen($LOG, "a+");
	fputs($fd, date('H:i:s d.m.Y').' '.$file_name.' '.$HTTP_REFERER.' '.$_SERVER['REMOTE_ADDR']."\n");
	fflush($fd);
	fclose($fd);

	// передаем файл для загрузки
	header("Content-disposition: attachment; filename=$file_name");
	header("Accept-Ranges: bytes");
	header("Content-Length: $file_size");
	header("Content-Type: application/force-download");
	readfile($file_path.$file_name);


} else {

	echo "File <strong>".$file_name."</strong> not found.";

}

?>