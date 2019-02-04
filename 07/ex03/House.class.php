<?php
abstract class House {// abstract класс, который не предполагает создания экземпляров
    public function introduce() {
        print('House '.$this->getHouseName().' of '.$this->getHouseSeat().' : "'.$this->getHouseMotto().'"'.PHP_EOL);
    }
    public abstract function getHouseName();//должны быть быть определёны в дочернем классе
    public abstract function getHouseSeat();
    public abstract function getHouseMotto();
}
?>