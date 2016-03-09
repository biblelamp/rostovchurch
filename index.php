<?
// ���������� ������������ ������� � 2005-2007, ������ 1.08 �� 01 �����

$sections = array('about'=>'��� ��', 'ourlife'=>'��� ������', 'official'=>'����������', 'contact'=>'�������');
$pages = array('gospel'=>'���������', 'filmTGJ'=>'����� ���������� �� ������', 'iphone'=>'������ ��� iPhone / iPod Touch');
$scripts = array('photo'=>'�����������', 'gb'=>'�������� �����', 'catalog'=>'������������ ������ �������-��-����', 'jbible'=>'������ �� Java ��� ��������� ���������');

$month = array('���', '���', '����', '���', '���', '����', '����', '���', '����', '���', '����', '���');
$dow = array('�����������', '�����������', '�������', '�����', '�������', '�������', '�������');
$dowshort = array('�c', '��', '��', '��', '��', '��', '��');

$maxhead = 6; // ������������ ����� ���������� �� 1� ��������
$maxlength = 115; // ������������ ����� �������� � ������ �������

$baseurl = 'http://'.$_SERVER['SERVER_NAME'].'/'; // ������� ����� �����
#$baseurl = 'http://rostovchurch.ru/';

function IncCounter($id) { // ������� � ����� ��������� ��������
	if (file_exists('counters/'.$id.'.count')) $count = join('', file('counters/'.$id.'.count'));
	else $count = 0;
	$count++;
	$fd = fopen('counters/'.$id.'.count', 'w'); // ��������� ��� ������
	flock($fd, LOCK_EX);
	fputs($fd, $count);
	fflush($fd);
	flock($fd, LOCK_UN);
	fclose($fd);
	return $count;
}

// ��������� ������ �������
$REQUEST = explode("/", $_SERVER['REQUEST_URI']); // $REQUEST_URI);
if (empty($REQUEST[2])) $REQUEST[2] = '';
if (empty($REQUEST[3])) $REQUEST[3] = '';

// ��������� ���� � title
$upmenu = '';
$title = '������ ��������';
foreach ($sections as $key=>$value) {
	if ($key == $REQUEST[1]) {
		$p = '<span style="color:red">'.$value.'</span>';
		$title = $value;
	}
	else $p = '<a href="'.$key.'/">'.$value.'</a>';
	if (!empty($upmenu)) $upmenu .= ' | '.$p; else $upmenu = $p;
}

// ��������� �������������� ��������
if (isset($pages))
	foreach ($pages as $key=>$value)
		if ($key == $REQUEST[1]) $title = $value;

// ��������� ����� �������
if (file_exists('pages/'.$REQUEST[1].'.html'))
	$text = join('', file('pages/'.$REQUEST[1].'.html')); else $text = '';

// ��������� �������
if (isset($scripts))
	foreach ($scripts as $key=>$value)
		if ($key == $REQUEST[1]) $title = $text = $value;

// �������� � ���������
if (is_numeric($REQUEST[1])) { // �������� ����� - ��������, ��� ���
	$date = $REQUEST[1].$REQUEST[2]; // ��� ����� ������
	$day = $REQUEST[3];
	if (file_exists('news/'.$date.'.txt')) {
		$hotnews = file('news/'.$date.'.txt');
		for ($i=0; $i<count($hotnews); $i++) {
			$str = trim($hotnews[$i]);
			if ((substr($str, 0, 2) == $day) || ($day == '')) {
				$day = substr($str, 0, 2);
				$title = substr($str, 3);
				$text = '<span class="date">'.$dow[date('w', mktime(0, 0, 0, substr($date, 4, 2), $day, substr($date, 0, 4)))].', '.$day.' '.$month[substr($date, 4, 2)-1].' '.substr($date, 0, 4).'</span><br>'.$hotnews[$i+1];
				if (file_exists('photo.log')) { // �������� ����������
					$date_str = $day.'.'.$REQUEST[2].'.'.substr($REQUEST[1], 2);
					$photo = array();
					$photo_tab = file('photo.log');
					for ($i=0; $i<count($photo_tab); $i++) if (substr($photo_tab[$i], 0, 8) == $date_str) $photo[] = $photo_tab[$i];
					if (count($photo) > 0) { // ���������� ����������
						$text .= '</p><table width="100%" cellspacing="6" cellpadding="0" border="0"><tr>';
						$colcount = 0;
						for ($j=0; $j<count($photo); $j++) {
							$colcount++;
							if ($colcount > $photo_coltopage) {
								$colcount = 1;
								$text .= '</tr><tr>';
							}
							list($dt, $filename, $orientation, $description) = split("\|", trim($photo[$j])); // ��������� ������
							$text .= '<td class="small" valign="top"><span align="center"><a href="javascript:openPhoto(\''.$baseurl.'images/photo/'.$filename.'.jpg\', \''.$description.'\', '.$width[$orientation].', '.$height[$orientation].')"><img '.$size_preview[$orientation].' src="images/photo/'.$filename.'_preview.jpg" alt="'.$description.'" border="0"></a></span><br><span class="date">'.substr($dt, 0, 2).' '.$month[substr($dt, 3, 2)-1].' 20'.substr($dt, 6, 2).' �</span><br>'.$description.'</td>';
						}
						for ($j=$colcount; $j<$photo_coltopage; $j++) $text .= '<td width="100%">&nbsp;</td>';
						$text .= "</tr></table>";
					}
				}
			}
		}
	}
}

// ���������� �������� � ������ ��������
if ((!empty($REQUEST[1])) AND (empty($text))) {
	$title = '������ 404';
	$text = '����������� ���� �������� <strong>'.substr($REQUEST_URI, strpos($REQUEST_URI, '/', 2)).'</strong> ����������� �� ����� �����. ��������, �� �������� ��������� ��� ���������� ������.<p>����������� ������� �� <a href=".">������ ��������</a> � ������ ���������� ����� �����.';
}

?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>������������ ������� � �������-��-���� | <? echo $title ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<meta name="Description" content="�������� ����� � ������������ ������� ������������ ��������� ���������� ������ � �������-��-����. ��� ��, ��� ����������, ���������, ����������� ����������, ���������� ������." />
<meta name="Keywords" content="�������, ������������, �������, ������, ������-��-����, ����� �������, ���, ������, ���������, ������, �����, ����, ���������, ������" />
<meta name='yandex-verification' content='79bac46857f6c251' />
<link rel="icon" href="/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<base href="<? echo $baseurl ?>">
<style type="text/css"><!--
	body {margin: 10,0,0,0; background-color: white}
	td {font-family: Tahoma,Arial,Helvetica,sans-serif; font-size: 13px}
	a:hover {color: red}
	.fw a {text-decoration: none}
	.small {font-size: 11px}
	.date {font-size: 11px; color: gray}
	.input {font-size: 11px; border:solid 1px gray}
//-->
</style>
<script language="Javascript"><!--
var pics;
var objCount = 0;
pics = new Array();
function preload(name, picname1, picname2)
{
	pics[objCount] = new Array(2);
	pics[objCount][0] = name;
	pics[objCount][1] = new Image(); pics[objCount][1].src = picname1;
	pics[objCount][2] = new Image(); pics[objCount][2].src = picname2;
	objCount++;
}
function on(name)
{
	for (i=0; i<objCount; i++)
		if(name==pics[i][0])
			document.images[pics[i][0]].src = pics[i][2].src;
}
function off(name)
{
	for (i=0; i<objCount; i++)
		if(name==pics[i][0])
			document.images[pics[i][0]].src = pics[i][1].src;
}
function openPhoto(url, description, width, height)
{
	w = window.open("", "w", "width="+width+",height="+height+',left=20,top=20');
	d = w.document;
	d.open();
	d.write('<html><title>'+description+'</title><body leftmargin="0" topmargin="0" marginheight="0" marginwidth="0" onBlur="self.close()" onClick="self.close()"><table width="100%" height="100%" cellspacing="0" cellpadding="0" border="0"><tr><td><img src="'+url+'" width="'+width+'" height="'+height+'" alt="'+description+'"></td></tr></table></body></html>');
	d.close();
	w.focus();
}
//-->
</script>
</head>
<body OnLoad="preload('photo', 'images/photo.gif', 'images/photo_on.gif');preload('gb', 'images/gb.gif', 'images/gb_on.gif');preload('home', 'images/home.gif', 'images/home_on.gif');">

<table width="620" align="center" cellspacing="4" cellpadding="0" border="0">
<tr>
	<td></td>
	<td><img width="100" height="100" src="images/1.jpg"></td>
	<td valign="bottom" align="right">
	����� ������: <span style="color:red">� ���� ���� � ������ � �����;<br>����� �� �������� � ����, ��� ������ ����� ����</span><br><span class="date">(��������� �� ������, 14 �����)</span><br>
	<? echo $upmenu ?>&nbsp;&nbsp;<a href="photo/" onMouseOver="on('photo')" onMouseOut="off('photo')" title="�����������"><img width="25" height="25" name="photo" src="images/photo.gif" align="absmiddle" vspace="8" border="0" alt="�����������."></a><a href="gb/" onMouseOver="on('gb')" onMouseOut="off('gb')" title="�������� �����"><img width="25" height="25" name="gb" src="images/gb.gif" align="absmiddle" hspace="5" vspace="8" border="0" alt="�������� �����."></a><a href="." onMouseOver="on('home')" onMouseOut="off('home')" title="�� ������ ��������"><img width="25" height="25" name="home" src="images/home.gif" align="absmiddle" vspace="8" border="0" alt="�� ������ ��������."></a>
	</td>
</tr>
<tr>
	<td><img width="100" height="100" src="images/2.jpg"></td>
	<td><img width="100" height="100" src="images/3.jpg"></td>
	<td><img width="100" height="100" src="images/4.jpg"><a href="."><img width="300" height="100" src="images/name.gif" alt="���������� ������������ �������." border="0"></a></td>
</tr>
<tr>
	<td></td>
	<td valign="top"><img width="100" height="100" src="images/5.jpg"><br><img width="100" height="100" src="images/6.jpg" style="margin-top:4"></td>
	<td valign="top"><div style="padding-left:10px"><?

	// ������� ������ (������ ��� �����������)
	if (!empty($text))
		if ($title == $text) require($REQUEST[1].".php"); // ������
		else echo '<p><span style="font-size:18px">'.$title.'</span><p>'.$text; // ����������� ������

	else {
		// ������� ������ �� ������ ������� � jBible
		echo '<table border="0"><tr><td><a href="/catalog/"><img src="/images/catalog_icon.gif" align="left" alt="������������ ������ �������-��-����." border="0">������������ ������ �������-��-����</a></td><td><a href="/jbible/"><img src="/images/jbible_icon.gif" align="left" alt="������ �� Java ��� ��������� ���������." border="0">������ �� Java ��� ��������� ���������</a></td></tr></table>';
		// ������� ��������� �������� �� 1� ��������
		unset($news);
		$d = opendir('news');
		while (($e = readdir($d)) != false) {
			if (@is_dir($e)) continue; // ���������� ��������
			if (substr($e, strpos($e, '.'), strlen($e)) != '.txt') continue; // ���������� �� txt
			$news[] = substr($e, 0, strpos($e, '.')); // �������� ����������
		}
		closedir($d);
		rsort($news); // ���������
		$count = 0; // ������� ���������� ����������
		$j = -1; // �������� � ������ ������� �����
		do { // ������� ��������� ��������
			$j++;
			$date = $news[$j];
			$hotnews = file("news/".$date.'.txt');
			for ($i=0; $i<count($hotnews) && $count<$maxhead; $i++) {
				$str = trim($hotnews[$i]);
				if ($str != '')
					if (strpos('0123456789', substr($str, 0, 1))>-1) {
						$count++;
						$day = substr($str, 0, 2);
						$URL = substr($date, 0, 4).'/'.substr($date, 4, 2).'/'.$day;
						$title = substr($str, 3);
						$msg = $hotnews[$i+1];
						if ((strlen($msg) > $maxlength) && (strpos($msg, ' ', $maxlength) == True))
							$msg = substr($msg, 0, strpos($msg, ' ', $maxlength)).'�&nbsp;<a href="'.$URL.'/" style="text-decoration: none">���</a></span>';
						else $msg .= '</span>';
						echo "\n\t\t".'<p><span class="date">'.$day.' '.$month[substr($date, 4, 2)-1].' '.substr($date, 0, 4).'</span> | <a href="'.$URL.'/">'.$title.'</a><br><span class="small">'.$msg;
					}
			}
		} while ($count<$maxhead && $j<count($news)-1);
	}

	?></div></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td align="right" class="date"><hr size="1" noshadow>&copy; 2005-2011 ���������� ������������ ������� (���������: <? echo IncCounter("index") ?>)</span></td>
</tr>
</table>

</body>
<!-- Google Analytics 10/12/2007 09:32 -->
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-3174398-2";
urchinTracker();
</script>
<!-- End Google Analytics -->
</html>