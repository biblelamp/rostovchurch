<?
// ������������ ������ � 2007, ������ 1.01 �� 01 �����

$file_name = 'catalog.txt'; // ���� � ������� �������

echo '<p><span style="font-size:18px">'.$scripts['catalog'].'</span></p>';

$catalog_lst = file($file_name);
$j = 0;
for ($i=0; $i<count($catalog_lst); $i++) {
	list($name, $daytime, $phone) = split("\|", trim($catalog_lst[$i]));
	if ($daytime != '') {
		$j++;
		if ($name == '����� ��������')
			$name = '����������� �������� <strong>'.$name.'</strong>';
		else
			$name = '������� <strong>'.$name.'</strong>';
		echo '<p>'.$j.'. '.$name.'<br><em>������������</em>: '.$daytime;
		if ($phone != '') echo '<br>���. '.$phone;
	}
}

?><p>���� �� ����������, ��� � ������ �� ������� ��� ��� ���� ������, � ����� ���� �������� ��� ����� � ����� ������������ ��� ���������� ������� ������� �������, ����������, �������� �� ���� ����� ���� �<a href="gb">�������� �����</a>�.