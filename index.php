<?php 


// $items = [
//     [
//     'id' => 1,    
//     'name' => 'Playstation 5',
//     'price' => 849.99
//     ],
//     [
//     'id' => 2,   
//     'name' => 'Iphone 13',
//     'price' => 999.99
//     ],
//     [
//         'id' => 3,      
//     'name' => 'Bulviu tarkavimo masina migris',
//     'price' => 89.99
//     ],
//     [
//         'id' => 4,   
//     'name' => 'Mikrobangų krosnelė DOMO DO2342CG',
//     'price' => 253
//     ]
// ];
//Klase
//prekes

class Preke {
    //klases parametrus - klases kintamieji
    //prieinamumo atributai

    //public
    //private
    //protected

    public $kaina;
    public $pavadinimas;
    public $barKodas;

    //klases metoda - objekto/klases funkcija

    public function prisistatyk() {

        return $this->pavadinimas;
    }

    public function test() {
        echo "Labas";
    }

}

//objekto sukurimas

$preke1 = new Preke;
$preke1->test();// ismes klaida


$preke2 = new Preke;
$preke2->prisistatyk();





class Animal {
    public $spalva;
    public $svori;
    public $arTuriUodega;
    public $kasToks;

    //t.y funkcija kuri automatiskai pasileidzia pagal klase sukurus objekta
    public function __construct($spalva, $svori, $arTuriUodega, $kasToks) {
        $this->spalva = $spalva;
        $this->svori = $svori;
        $this->arTuriUodega = $arTuriUodega;
        $this->kasToks = $kasToks;
    }

    private function prisistatyk() {
        return $this->kasToks;
    }
}

class Dog extends Animal {
    public function manoRusis() {
        return $this->prisistatyk();
    }
}

class Cat extends Animal  {
    public function manoRusis() {
        return $this->prisistatyk();
    }
}

$kate = new Cat("raina", "7kg", "turi", "kate");
$suo = new Dog("rudas", "21kg", "neturi", "suo");

// echo $kate->prisistatyk();
// echo $suo->prisistatyk();

echo $kate->manoRusis();
echo $suo->manoRusis();



?>