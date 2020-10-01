<?php

// socket_read()

$address = 'localhost'; //Адрес работы сервера
$port = 1985; //Порт работы сервера (лучше какой-нибудь редкоиспользуемый)
if (($socket = socket_create(AF_UNIX, SOCK_STREAM, 0)) < 0) {
    //AF_INET - семейство протоколов
    //SOCK_STREAM - тип сокета
    //SOL_TCP - протокол
    echo "Ошибка создания сокета";
}
else {
    echo "Сокет создан\n";
}
// $result = socket_connect($socket, $address, $port);
$result = socket_connect($socket, 'rr.sock', null);
if ($result === false) {
    echo "Ошибка при подключении к сокету";
} else {
    echo "Подключение к сокету прошло успешно\n";
}
$out = socket_read($socket, 1024); //Читаем сообщение от сервера
echo "Сообщение от сервера: $out.\n";
$msg = "15";
echo "Сообщение серверу: $msg\n";
socket_write($socket, $msg, strlen($msg)); //Отправляем серверу сообщение
$out = socket_read($socket, 1024); //Читаем сообщение от сервера
echo "Сообщение от сервера: $out.\n"; //Выводим сообщение от сервера
$msg = 'exit'; //Команда отключения
echo "Сообщение серверу: $msg\n";
socket_write($socket, $msg, strlen($msg));
echo "Соединение завершено\n";
//Останавливаем работу с сокетом
if (isset($socket)) {
    socket_close($socket);
    echo "Сокет успешно закрыт";
}
