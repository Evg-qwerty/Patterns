# Patterns

## Singleton
 
<a href="https://github.com/Evg-qwerty/Patterns/tree/master/Singleton">Singleton</a> - при первом обращении записывает сам себя в свое приватное свойство. В последующих обращениях проверяет что это не первый вызов и возвращает свою копию из приватное свойство.

<a href="https://github.com/Evg-qwerty/Patterns/blob/master/Singleton/singleton_1.php">Singleton</a> - пример

##Factory

<a href="https://github.com/Evg-qwerty/Patterns/tree/master/Factory">Factory</a>  - занимается распределением входящих объектов в соответствии с заданными условиями по классам выполняющим определенные операции с этими объектами. 

<a href="https://github.com/Evg-qwerty/Patterns/blob/master/Factory/SimpleFactory_1.php">SimpleFactory_1</a> - Моя реализация с подробными комментариями в ветке мастер. Фвбрика превращает массивы в объекты сортируя их по значению ’title’ и “присваивает” им соответствующее имя 'Good site' или 'Bad site'. 

<a href="https://github.com/Evg-qwerty/Patterns/blob/master/Factory/SimpleFactory_2.php">SimpleFactory_2</a> - пример с интернетов, возможно там понятнее.

## Registry

<a href="https://github.com/Evg-qwerty/Patterns/tree/master/Registry">Registry</a> - Класс хранит в закрытой переменной массив из заданных пользователем ключей и значейний. Взаимодействовать с этим массивом можно только через методы предусмотренные в данном классе. Принцип напоминает Singleton но манипуляции происходят не с одиночной переменной а с массивом и множества ключей и значений.

<a href="https://github.com/Evg-qwerty/Patterns/blob/master/Registry/Registry.php">Registry.php</a>

