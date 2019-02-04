<?php
class Jaime extends Lannister{
    function sleepWith($name){
        if ($name instanceof Tyrion){//Оператор instanceof используется для определения того, является ли текущий объект экземпляром указанного класса
            print("Not even if I'm drunk !".PHP_EOL);
        }
        if ($name instanceof Sansa){
            print ("Let's do this.".PHP_EOL);
        }
        if ($name instanceof Cersei){
            print("With pleasure, but only in a tower in Winterfell, then.".PHP_EOL);
        }
    }
}