<?
// Java ������ ��� ��������� � 2007, ������ 1.02 �� 26 �����

function GetCounter($id) { // ������ ��������� ��������
	if (file_exists('counters/'.$id.'.count')) $count = join('', file('counters/'.$id.'.count'));
	else $count = 0;
	return $count;
}

?><p><span style="font-size:18px"><?echo $scripts['jbible']?></span></p>
<p><img width="100" height="130" src="/images/jbible/jbible.gif" border="0" alt="������ �� Java ��� ��������� ���������." hspace="10" align="left">� ������ 2007 ���� � ������ ���� ������� ������� ������������ ���������� Java-���������, ����������� �������� � ������� ������ � ��������� ��������. � ����������, � ����� ������� �� ���� ��������� <strong>jBible</strong>.

<p><strong>������������</strong>: ����������� ������ ������, ������� ������� � ��������� �����/�����/�����, ������ � ���������� (������� ��������, ������� � ��������), �����. ���������� �����, �� ������� ��������� ������ � ����� �� ���������.

<p><strong>��� � ��������� Sony Ericsson K300i</strong>:

<p align="center"><img width="130" height="131" src="/images/jbible/jbible_scr1.gif" alt="j������. �������� ����� ���������." hspace="10"><img width="130" height="131" src="/images/jbible/jbible_scr3.gif" alt="j������. ������� ���� ���������" hspace="10">

<p><strong>���������� � ��������</strong>: ��������� Java (MIDP-2.0, CLDC-1.0) + ������� ��������� ������ (<strong>2,30</strong> �� ��� ���� ������).

<p><strong>������������</strong>: ���� <a href="malto:gadfly.svy@gmail.com">�������� �������</a> ���������� ������������ ������������ � j������ (������ pdf). ��� ������ ����������� �� ����� ���������� ������ ���� ����������� ��������� Acrobat Reader ��� Foxit Reader.
<ul>
	<li><a href="/dl.php?jbible_1.0.2.pdf" target="_blank">����������� � j������</a> ������ �� 25.10.10� <span class="small">(<strong>723</strong> ��) <span style="color:gray">(<?echo GetCounter('jbible_1.0.2.pdf')?>)</span></span>
	<li><a href="/dl.php?mobiles.txt" target="_blank">������ �������������� �������</a> ���������, ������ �� 25.10.10� <span class="small">(<strong>2,2</strong> ��) <span style="color:gray">(<?echo GetCounter('mobiles.txt')?>)</span></span>
</ul>

<p><strong>��������� �� ���������</strong> (������ 1.3.15 �� 24.12.07�):
<ul>
	<p>������� ����:</p>
	<li><a href="/dl.php?bible.jar" target="_blank">������</a> (����������� �������) <span class="small">(<strong>2,236</strong> ��) <span style="color:gray">(<?echo GetCounter('bible.jar')?>)</span></span>
	<li><a href="/dl.php?nt.jar" target="_blank">����� �����</a> (����������� �������) <span class="small">(<strong>573</strong> ��) <span style="color:gray">(<?echo GetCounter('nt.jar')?>)</span></span>
	<p>����������� ����:</p>
	<li><a href="/dl.php?bible_by.jar" target="_blank">������</a> (������� ������� Ѹ����) <span class="small">(<strong>2,246</strong> ��) <span style="color:gray">(<?echo GetCounter('bible_by.jar')?>)</span></span>
	<li><a href="/dl.php?nt_by.jar" target="_blank">����� �����</a> (������� ������� Ѹ����) <span class="small">(<strong>581</strong> ��) <span style="color:gray">(<?echo GetCounter('nt_by.jar')?>)</span></span>
	<p>���������� ����:</p>
	<li><a href="/dl.php?bible_ua.jar" target="_blank">������</a> (������� �������) <span class="small">(<strong>2,276</strong> ��) <span style="color:gray">(<?echo GetCounter('bible_ua.jar')?>)</span></span>
	<li><a href="/dl.php?nt_ua.jar" target="_blank">����� �����</a> (������� �������) <span class="small">(<strong>586</strong> ��) <span style="color:gray">(<?echo GetCounter('nt_ua.jar')?>)</span></span>
</ul>

<p><strong>��������� � �������</strong> (��������� WAP):
<ul>
	<p>������� ����:</p>
	<li>������: <a href="bible.jad">http://rostovchurch.ru/bible.jad</a>
	<li>����� �����: <a href="nt.jad">http://rostovchurch.ru/nt.jad</a>
</ul>

<p><strong>�������� �����</strong> (���������� ������� � <a href="http://www.netbeans.org" target="_blank">NetBeans 5.0</a>):
<ul>
	<li><a href="/dl.php?jbible-1.3.15.zip" target="_blank">jBible ������ 1.3.15 �� 24.12.07�</a> <span class="small">(<strong>289</strong> ��) <span style="color:gray">(<?echo GetCounter('jbible-1.3.15.zip')?>)</span></span>
	<li><a href="/dl.php?jbible-1.3.14.zip" target="_blank">jBible ������ 1.3.14 �� 09.04.07�</a> <span class="small">(<strong>287</strong> ��) <span style="color:gray">(<?echo GetCounter('jbible-1.3.14.zip')?>)</span></span>
	<li><a href="/dl.php?jbible-1.3.13.7z" target="_blank">jBible ������ 1.3.13 �� 27.02.07�</a> <span class="small">(<strong>164</strong> ��) <span style="color:gray">(<?echo GetCounter('jbible-1.3.13.7z')?>)</span></span>
</ul>

<p><strong>���������-���������</strong>: ������� ������ j������ �� ������� ��������� ��������� �<a href="http://jesuschrist.ru/software/" target="_blank">������ �� ������</a>�. ����� ����, ����� ������ ����������� ������ ��� ���������, ������� ����������� �� ������ jar �����.
<ul>
	<li>���������: <a href="/dl.php?bq2jbible.zip" target="_blank">�������&gt;j������</a> <span class="small">(<strong>113</strong> ��) <span style="color:gray">(<?echo GetCounter('bq2jbible.zip')?>)</span></span>
	<li>�������� �����: <a href="/dl.php?bq2jbible-1.10.zip" target="_blank">������ 1.10 �� 24.12.07�</a> <span class="small">(<strong>65</strong> ��) <span style="color:gray">(<?echo GetCounter('bq2jbible-1.10.zip')?>)</span></span>
</ul>

<p><strong>���������������</strong>: �� �������� <a href="http://ru.wikipedia.org/wiki/GNU_General_Public_License" target="_blank">GNU GPL</a>. �� ����, �� ������ ���������� �������� ������������, ���������� � �������������� ��� ���������, � ����� ������� �� �������� ��� � ������� � ���� ���������.

<p><strong>��������� � �������������</strong>: �� ������ �������� �������, ����������� ���� ��������� � ��������� � ����� �<a href="gb">�������� �����</a>� ��� � <a href="http://biblelamp.ru/forum/viewtopic.php?id=596" target="_blank">����������� ���� ������</a>. �� ����� ������������, ���� �� �������� ��� �� ������ � ���������, �� � �� �������� ��������� <strong>jBible</strong>. ��� ���� ����������� ���������� ������ ������ ��������.