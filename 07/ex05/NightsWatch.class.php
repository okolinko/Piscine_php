<?php
class NightsWatch implements IFighter {//implements(интерфейс) - инструмент, который указывает какие методы должен включать клас, без необходимости описания их функционала
    private $arr = array();
    public function recruit($name) {
        $this->arr[] = $name;
    }
    function fight() {
        foreach ($this->arr as $fighter) {
            if (method_exists($fighter, 'fight')) {//method_exists — Проверяет, существует ли метод в данном классе
                $fighter->fight();
            }
        }
    }
}
?>