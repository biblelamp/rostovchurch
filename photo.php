<?
// Фотогалерея для сайта © 2005, версия 1.03 от 09 ноября

$photo_file = 'photo.log'; // файл с записями фотогалереи
$photo_rowtopage = 4; // число строк на страницу фотогалереи
$photo_coltopage = 4; // число колонок фотогалереи
$size_preview = array('L'=>'width="90" height="67"', 'P'=>'width="67" height="90"');
$width = array('L'=>'640', 'P'=>'480');
$height = array('L'=>'480', 'P'=>'640');

echo '<p><span style="font-size:18px">'.$title.'</span></p>';

// читаем файл с инфо о фотографиях
if (file_exists($photo_file)) {

	echo '<table width="100%" cellspacing="6" cellpadding="0" border="0"><tr>';

	$page = $REQUEST[2];
	if ($page == '') $page = 1;
	$photo_tab = file($photo_file);
	$pages = ceil(count($photo_tab)/($photo_coltopage*$photo_rowtopage));
	$navigate = '';

	if ($pages > 1) {
		$next = $page + 1;
		$back = $page - 1;
		$navigate = '<p style="text-align:center">Страницы: ';
		if ($back != 0) $navigate .= '<a href="photo/'.$back.'/" style="text-decoration:none"> « </a>|';
		for ($i=1; $i<=$pages; $i++)
			if ($i == $page) $navigate .= ' <span style="color:red">'.$i.'</span> |';
			else $navigate .= ' <a href="photo/'.$i.'/">'.$i.'</a> |';
		if ($next <= $pages) $navigate .= '<a href="photo/'.$next.'/" style="text-decoration:none"> » </a>';
	}

	echo $navigate;
	$n = $page*$photo_coltopage*$photo_rowtopage - $photo_coltopage*$photo_rowtopage;
	$k = min(count($photo_tab), $page*$photo_coltopage*$photo_rowtopage);

	$colcount = 0;
	for ($i=$n; $i<$k; $i++) {
		$colcount++;
		if ($colcount > $photo_coltopage) {
			$colcount = 1;
			echo '</tr><tr>';
		}
		list($dt, $filename, $orientation, $description) = explode("|", trim($photo_tab[$i])); // очередная запись
		echo '<td class="small" valign="top"><span align="center"><a href="javascript:openPhoto(\''.$baseurl.'images/photo/'.$filename.'.jpg\', \''.$description.'\', '.$width[$orientation].', '.$height[$orientation].')"><img '.$size_preview[$orientation].' src="images/photo/'.$filename.'_preview.jpg" alt="'.$description.'" border="0"></a></span><br><span class="date">'.substr($dt, 0, 2).' '.$month[substr($dt, 3, 2)-1].' 20'.substr($dt, 6, 2).' г</span><br>'.$description.'</td>';
	}
	for ($i=$colcount; $i<$photo_coltopage; $i++) echo '<td width="100%">&nbsp;</td>';
	echo "</tr></table>";
	echo $navigate;

}

?>