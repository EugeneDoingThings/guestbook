# guestbook

Использовал ***htmlspecialchars()*** для защиты от XSS при выводе таблицы (output.php:49)
Использовал ***prepared statements*** для защиты от SQL-инъекций (index.php:46)
Добавил кнопку конвертации в JSON (output.php:65)
Добавил функцию ***strip_tags()*** для текстового поля (index.php:51)
