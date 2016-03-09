<?
// Гостевая книга для сайта © 2008-9, версия 1.05 от 14 марта

$gb_file = 'gb.log'; // файл с записями
$length_name = 25; // максимальная длина имени
$length_body = 256; // максимальный объем текста
$gb_msgtopage = 10; // число сообщений на страницу
$valid_email_pattern = "/^([a-z0-9\._-])+@([a-z0-9_-])+(\.[a-z0-9_-]+)+$/i";
$error_msg_begin = '<span style="color:red;font-size:11px">Ошибка: ';
$error_msg_end = ':</span><br>';
$admin_email = 'webmaster@biblelamp.ru'; // e-mail администратора

// инициализируем данные (если нужно)
$page = $REQUEST[2];
if (empty($page)) $page = 1;
$name = $_POST['name'];
$email = $_POST['email'];
$city = $_POST['city'];
$body = $_POST['body'];

// зануляем сообщения об ошибках
$error_name=$error_email=$error_city=$error_body = '';

// читаем файл сообщений
if (file_exists($gb_file)) $gb_text = str_replace("\r", "", join("", file($gb_file))); else $gb_text = '';

?>

<script language="JavaScript"><!--
	function ChooseLen() {
	length_body = <? echo $length_body ?>;
	M = window.document.selfMail.body.value.length;
	window.document.selfMail.msgCL.value = length_body-M;
	if (M>length_body) {
		window.document.selfMail.body.value = window.document.selfMail.body.value.substring(0,length_body);
		window.document.selfMail.msgCL.value = 0;
	}
}
//-->
</script>

<?

if (isset($_POST['action'])) { // добавление записи

	// проверяем данные
	if (trim($name) == "") $error_name = $error_msg_begin.'укажите своё имя'.$error_msg_end;
	if (preg_match('/[0-9a-z]+/i', $name)) $error_name = $error_msg_begin.'латинские буквы и цифры запрещены'.$error_msg_end;
	if (strlen($name) > $length_name) $error_name = $error_msg_begin.'слишком длинное имя'.$error_msg_end;
	if (trim($city) == "") $error_city = $error_msg_begin.'укажите свой город и страну'.$error_msg_end;
	if (preg_match('/[0-9a-z]+/i', $city)) $error_city = $error_msg_begin.'латинские буквы и цифры запрещены'.$error_msg_end;
	if ($email == "") $error_email = $error_msg_begin.'укажите свой контактный e-mail'.$error_msg_end;
		else if (!preg_match($valid_email_pattern, $email))
			$error_email = $error_msg_begin.'укажите правильный e-mail'.$error_msg_end;
	if (trim($body) == "") $error_body = $error_msg_begin.'заполните текст сообщения'.$error_msg_end;
	if (strlen($body) > $length_body) $error_body = $error_msg_begin.'слишком объемное сообщение'.$error_msg_end;
	if ((strpos($body, 'www')) || (strpos($body, 'http'))) $error_body = $error_msg_begin.'сообщение содержит запрещенные слова'.$error_msg_end;

	// если нет ошибок - добавляем запись
	if ($error_name.$error_email.$error_city.$error_body == '') {

		// подправляем некоторые поля
		$body = strip_tags($body); // убираем теги
		$body = str_replace("\r\n", " ", $body); // заменяем переводы строк пробелами
		while (strpos($body, "  ")) $body = str_replace("  ", " ", $body); // удаляем двойные пробелы

		// добавляем запись
		$gb_text = date("d.m.y H:i")."|".$name."|".$email."|".$city."|".$body."||\n".$gb_text;

		// открываем с блокировкой и добавляем
		$fd = fopen($gb_file, "a+") or die("Не могу открыть файл на запись…");
		flock($fd, LOCK_EX);
		ftruncate($fd, 0);
		fputs($fd, $gb_text);
		fflush($fd);
		flock($fd, LOCK_UN);
		fclose($fd);

		// отправляем по почте копию реплики
		mail($admin_email, "From rostovchurch.ru/gb", $name."\n".$email."\n".$city."\n".$body, "From: ".$name." <".$email.">\nContent-Type: text/plain; charset=windows-1251");

		// очищаем поля ввода
		$name=$email=$city=$body = '';

	}

}

if ((!empty($gb_text)) && ($error_name.$error_email.$error_city.$error_body == '')) { // есть что выводить и нет ошибок

	echo '<p><span style="font-size:18px">'.$title.'</span></p>';

	if (!isset($page)) $page = 1; // выводимая страница
	$gb_array = explode("\n", $gb_text);
	$pages = ceil(count($gb_array)/$gb_msgtopage);
	$navigate = '';

	if ($pages > 1) {
		$next = $page + 1;
		$back = $page - 1;
		$navigate = '<p style="text-align:center"><span class="small">Страницы:</span> ';
		if ($back != 0) $navigate .= '<a href="gb/'.$back.'/" style="text-decoration:none"> « </a>|';
		for ($i=1; $i<=$pages; $i++)
			if ($i == $page) $navigate .= ' <span style="color:red">'.$i.'</span> |';
			else $navigate .= ' <a href="gb/'.$i.'/">'.$i.'</a> |';
		if ($next <= $pages) $navigate .= '<a href="gb/'.$next.'/" style="text-decoration:none"> » </a>';
	}

	echo $navigate;
	$n = $page*$gb_msgtopage - $gb_msgtopage;
	$k = min(count($gb_array), $page*$gb_msgtopage);

	for ($i=$n; $i<$k; $i++) {
		list($date, $name, $email, $city, $body, $reply) = explode("|", $gb_array[$i]);
		$date = $dowshort[date("w", mktime(0, 0, 0, substr($date, 3, 2), substr($date, 0, 2), substr($date, 6, 2)))].", ".substr($date, 0, 2)." ".$month[substr($date, 3, 2)-1]." 20".substr($date, 6, 8);
		if (!empty($email)) $name = "<script language='JavaScript'>document.write('<a href=\"mailto:'+'".substr($email, 0, strpos($email, "@"))."'+'&#64;'+'".substr($email, strpos($email, "@")+1)."'+'\">')</script>".$name."</a>";
		if (!empty($city)) $city = ", ".$city;
		echo '<p><span class="date">'.$date.'</span> | '.$name.$city.'<br><span class="small">'.$body;
		if ($reply != '') echo '<ul><strong>Ответ</strong>: '.$reply.'</ul>';
		echo "</span>";
	}
	echo $navigate;
	$name=$email=$city=$body = '';

}

?>

<p><form method="POST" action="gb" name="selfMail">
<input type="hidden" name="action" value="send">
<table width="100%" cellpadding="2" cellspacing="0" border="0">
<tr>
	<td width="30%" align="right">Имя<span style="color:red">*</span></td>
	<td width="70%"><?echo $error_name?><input type="text" name="name" value="<?echo $name?>" size="<?echo $length_name?>" class="input"></td>
</tr>
<tr>
	<td width="30%" align="right">Е-mail<span style="color:red">*</span></td>
	<td width="70%"><?echo $error_email?><input type="text" name="email"  value="<?echo $email?>"size="50" class="input"></td>
</tr>
<tr>
	<td width="30%" align="right">Город, страна<span style="color:red">*</span></td>
	<td width="70%"><?echo $error_city?><input type="text" name="city" size="50"  value="<?echo $city?>"class="input"></td></tr>
<tr>
	<td width="30%" align="right">Текст сообщения<span style="color:red">*</span></td>
	<td width="70%" class="small"><?echo $error_body?><textarea name="body" rows="5" cols="38" wrap="virtual" onfocus="ChooseLen()" onchange="ChooseLen()" onkeyup="ChooseLen()" onkeydown="ChooseLen()" onkeypress="ChooseLen()" class="input"><?echo $body?></textarea><br><input name="msgCL" size="4" style="font-size:8pt" class="input" disabled> знаков ещё можно ввести</td></tr>
<tr>
	<td width="30%"></td>
	<td width="70%"><input type="submit" value="Отправить >>>"> <input type="reset" value="Очистить"></td>
</tr>
</table>
</form>