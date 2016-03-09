<?
// Java Библия для мобильных © 2007, версия 1.02 от 26 марта

function GetCounter($id) { // чтение показаний счётчика
	if (file_exists('counters/'.$id.'.count')) $count = join('', file('counters/'.$id.'.count'));
	else $count = 0;
	return $count;
}

?><p><span style="font-size:18px"><?echo $scripts['jbible']?></span></p>
<p><img width="100" height="130" src="/images/jbible/jbible.gif" border="0" alt="Библия на Java для мобильных телефонов." hspace="10" align="left">В январе 2007 года в церкви было принято решение организовать разработку Java-программы, позволяющей работать с текстом Библии в мобильном телефоне. В результате, в конце февраля на свет появилась <strong>jBible</strong>.

<p><strong>Обеспечивает</strong>: отображение текста Библии, быстрый переход к выбранной главе/книге/стиху, работу с закладками (сделать закладку, перейти к закладке), поиск. Запоминает место, на котором закончили читать и вышли из программы.

<p><strong>Вид в эмуляторе Sony Ericsson K300i</strong>:

<p align="center"><img width="130" height="131" src="/images/jbible/jbible_scr1.gif" alt="jБиблия. Основной экран программы." hspace="10"><img width="130" height="131" src="/images/jbible/jbible_scr3.gif" alt="jБиблия. Главное меню программы" hspace="10">

<p><strong>Требования к телефону</strong>: поддержка Java (MIDP-2.0, CLDC-1.0) + наличие свободной памяти (<strong>2,30</strong> Мб для всей Библии).

<p><strong>Документация</strong>: брат <a href="malto:gadfly.svy@gmail.com">Владимир Соколов</a> разработал «Руководство пользователя к jБиблии» (формат pdf). Для чтения руководства на Вашем компьютере должна быть установлена программа Acrobat Reader или Foxit Reader.
<ul>
	<li><a href="/dl.php?jbible_1.0.2.pdf" target="_blank">Руководство к jБиблии</a> версия от 25.10.10г <span class="small">(<strong>723</strong> Кб) <span style="color:gray">(<?echo GetCounter('jbible_1.0.2.pdf')?>)</span></span>
	<li><a href="/dl.php?mobiles.txt" target="_blank">Список поддерживаемых моделей</a> телефонов, версия от 25.10.10г <span class="small">(<strong>2,2</strong> Кб) <span style="color:gray">(<?echo GetCounter('mobiles.txt')?>)</span></span>
</ul>

<p><strong>Загрузить на компьютер</strong> (версия 1.3.15 от 24.12.07г):
<ul>
	<p>Русский язык:</p>
	<li><a href="/dl.php?bible.jar" target="_blank">Библия</a> (Синодальный перевод) <span class="small">(<strong>2,236</strong> Мб) <span style="color:gray">(<?echo GetCounter('bible.jar')?>)</span></span>
	<li><a href="/dl.php?nt.jar" target="_blank">Новый Завет</a> (Синодальный перевод) <span class="small">(<strong>573</strong> Кб) <span style="color:gray">(<?echo GetCounter('nt.jar')?>)</span></span>
	<p>Белорусский язык:</p>
	<li><a href="/dl.php?bible_by.jar" target="_blank">Библия</a> (Перевод Василия Сёмухи) <span class="small">(<strong>2,246</strong> Мб) <span style="color:gray">(<?echo GetCounter('bible_by.jar')?>)</span></span>
	<li><a href="/dl.php?nt_by.jar" target="_blank">Новый Завет</a> (Перевод Василия Сёмухи) <span class="small">(<strong>581</strong> Кб) <span style="color:gray">(<?echo GetCounter('nt_by.jar')?>)</span></span>
	<p>Украинский язык:</p>
	<li><a href="/dl.php?bible_ua.jar" target="_blank">Библия</a> (Перевод Огиенко) <span class="small">(<strong>2,276</strong> Мб) <span style="color:gray">(<?echo GetCounter('bible_ua.jar')?>)</span></span>
	<li><a href="/dl.php?nt_ua.jar" target="_blank">Новый Завет</a> (Перевод Огиенко) <span class="small">(<strong>586</strong> Кб) <span style="color:gray">(<?echo GetCounter('nt_ua.jar')?>)</span></span>
</ul>

<p><strong>Загрузить в телефон</strong> (используя WAP):
<ul>
	<p>Русский язык:</p>
	<li>Библия: <a href="bible.jad">http://rostovchurch.ru/bible.jad</a>
	<li>Новый Завет: <a href="nt.jad">http://rostovchurch.ru/nt.jad</a>
</ul>

<p><strong>Исходный текст</strong> (разработка ведется в <a href="http://www.netbeans.org" target="_blank">NetBeans 5.0</a>):
<ul>
	<li><a href="/dl.php?jbible-1.3.15.zip" target="_blank">jBible версия 1.3.15 от 24.12.07г</a> <span class="small">(<strong>289</strong> Кб) <span style="color:gray">(<?echo GetCounter('jbible-1.3.15.zip')?>)</span></span>
	<li><a href="/dl.php?jbible-1.3.14.zip" target="_blank">jBible версия 1.3.14 от 09.04.07г</a> <span class="small">(<strong>287</strong> Кб) <span style="color:gray">(<?echo GetCounter('jbible-1.3.14.zip')?>)</span></span>
	<li><a href="/dl.php?jbible-1.3.13.7z" target="_blank">jBible версия 1.3.13 от 27.02.07г</a> <span class="small">(<strong>164</strong> Кб) <span style="color:gray">(<?echo GetCounter('jbible-1.3.13.7z')?>)</span></span>
</ul>

<p><strong>Программа-конвертер</strong>: создает модули jБиблии из модулей известной программы «<a href="http://jesuschrist.ru/software/" target="_blank">Цитата из Библии</a>». Кроме того, можно делать специальные сборки для телефонов, имеющих ограничение на размер jar файла.
<ul>
	<li>Конвертер: <a href="/dl.php?bq2jbible.zip" target="_blank">Цитата–&gt;jБиблия</a> <span class="small">(<strong>113</strong> Кб) <span style="color:gray">(<?echo GetCounter('bq2jbible.zip')?>)</span></span>
	<li>Исходный текст: <a href="/dl.php?bq2jbible-1.10.zip" target="_blank">версия 1.10 от 24.12.07г</a> <span class="small">(<strong>65</strong> Кб) <span style="color:gray">(<?echo GetCounter('bq2jbible-1.10.zip')?>)</span></span>
</ul>

<p><strong>Распространение</strong>: по лицензии <a href="http://ru.wikipedia.org/wiki/GNU_General_Public_License" target="_blank">GNU GPL</a>. То есть, вы можете совершенно свободно использовать, копировать и распространять эти программы, а также изучать их исходный код и вносить в него изменения.

<p><strong>Поддержка и сопровождение</strong>: вы можете задавать вопросы, высказывать свои пожелания и замечания в нашей «<a href="gb">Гостевой книге</a>» или в <a href="http://biblelamp.ru/forum/viewtopic.php?id=596" target="_blank">специальной теме форума</a>. Мы будем признательны, если Вы сообщите нам не только о проблемах, но и об успешной установке <strong>jBible</strong>. При этом обязательно указывайте модель своего телефона.