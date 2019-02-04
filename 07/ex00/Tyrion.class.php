<?php
class Tyrion extends Lannister {//extends говорит о том, что Tyrion является лишь "расширением" класа Lanister
    public function __construct()//Классы, в которых объявлен метод-конструктор, будут вызывать этот метод при каждом создании нового объекта
    {
        parent::__construct();//parent - вызываем родительский метод
        print ("My name is Tyrion".PHP_EOL);
    }
    public function getSize() {
        return "Short";
    }

}
?>