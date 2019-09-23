# Гостевая книга

Использовал ***htmlspecialchars()*** для защиты от XSS при выводе таблицы (output.php:49)<br>
Использовал ***prepared statements*** для защиты от SQL-инъекций (index.php:46)<br>
Добавил кнопку конвертации в ***JSON*** (output.php:65)<br>
Добавил функцию ***strip_tags()*** для текстового поля (index.php:51)<br>
