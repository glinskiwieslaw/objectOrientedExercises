<?php
/**
 * Created by PhpStorm.
 * User: X230 Tablet
 * Date: 2015-12-18
 * Time: 17:31
 */
/*Zadanie 4. Dziedziczenie – kształty 3D.
Stwórz kasę stożek i walec która mają spełniać następujące wymogi:
1. Dziedziczyć po kole
2. Mieć dodatkowy atrybut wysokość
3. Posiadać konstruktor przyjmujący zmienne, określające wartości x, y, kolor, promień i wysokość. Pamiętaj o sprawdzeniu czy podane zmienne są liczbami (jeżeli nie są to nastaw oba na 0), a kolor napisem. Konstruktor powinien wypisywać informacje o właśnie stworzonym okręgu.
4. Posiadać destruktor który wypisuje informacje o niszczonym okręgu.
5. Posiadać funkcję dostępu (get, set) do wysokości,
6. Nadpisywać funkcje kształtu (nadpisz tylko te które tego wymagają).
7. Posiadać funkcję zwracającą objętość.
8. Obie klasy powinny mieć statyczne zmienne które będą posiadały przykładowy obiekt danej klasy z wszystkimi wielkościami ustawionymi na 1, i kolorem białym.*/

?>

    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

<?php
define('NumberPi', 3.1415);

class Shape
{
    private $x;
    private $y;
    private $color;

    public function __construct($x, $y, $color)
    {
        $this->x = is_numeric($x) ? $x : 0;
        $this->y = is_numeric($y) ? $y : 0;
        $this->color = is_string($color) ? $color : 'black';
    }


    public function getX()
    {
        return $this->x;
    }

    public function setX($x)
    {
        $this->x = $x;
    }

    public function getY()
    {
        return $this->y;
    }

    public function setY($y)
    {
        $this->y = $y;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function setColor($color)
    {
        $this->color = $color;
    }

    public function __toString()
    {
        return 'X: ' . $this->x . ', Y: ' . $this->y . ', color: ' . $this->color;
    }

    public function calculateDistance(Shape $shape)
    {
        return sqrt(
            pow(($this->getX() - $shape->getX()), 2) +
            pow(($this->getY() - $shape->getY()), 2)
        );
    }
}


class Circle extends Shape
{


    var $circumference;

    /*    public  const NumberPi = 3.1415;*/
    private $radius;


    public function getRadius()
    {
        return $this->radius;
    }


    public function setRadius($radius)
    {
        $this->radius = $radius;
    }


    public function __construct($x, $y, $color, $radius)
    {
        parent::__construct($x, $y, $color);
        $this->radius = is_numeric($radius) ? $radius : 0;
        echo("<br>Tworzę obiekt koło <br>");
        echo 'położenie x = ' . $this->getX() . '<br>';
        echo 'położenie y = ' . $this->getY() . '<br>';
        echo 'kolor  ' . $this->getColor() . '<br>';
        echo 'promień r = ' . $this->getRadius() . '<br>';
        echo '<hr>';
    }

    public function ShowSurfaceArea()
    {
        $circleSurfaceArea = pow(NumberPi * $this->getRadius(), 2);
        echo 'Powierzchnia koła o promieniu ' . $this->getRadius() . ' i kolorze ' . $this->getColor() . ' wynosi ' . $circleSurfaceArea . '<br>';
    }

    public function ShowCircumference()
    {
        $circumference = (NumberPi * 2 * ($this->getRadius()));
        echo 'Obwód koła o promieniu ' . $this->getRadius() . ' wynosi ' . ' i kolorze ' . $this->getColor() . ' wynosi ' . $circumference . '<br>';
    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
        echo("<br>niszczę obiekt shape <br>");
    }

}

class Shape3D extends Circle
{


    var $circumference;
    var $Volume3D;
    /*    public  const NumberPi = 3.1415;*/
    private $height;

    public function getHeight()
    {
        return $this->height;
    }


    public function setHeight($height)
    {
        $this->height = $height;
    }



    public function __construct($x, $y, $color, $radius,$height)
    {
        parent::__construct($x, $y, $color, $radius);
        $this->height = is_numeric($height) ? $height : 0;

        echo("<br>Tworzę obiekt 3D <br>");
        echo 'położenie x = ' . $this->getX() . '<br>';
        echo 'położenie y = ' . $this->getY() . '<br>';
        echo 'kolor  ' . $this->getColor() . '<br>';
        echo 'promień r = ' . $this->getRadius() . '<br>';
        echo 'wysokość  = ' . $this->getHeight() . '<br>';
        echo '<hr>';
    }

    public function Show3DVolume()
    {
        $circleSurfaceArea = pow(NumberPi * $this->getRadius(), 2);
/*        echo 'Powierzchnia koła o promieniu ' . $this->getRadius() . ' i kolorze ' . $this->getColor() . ' wynosi ' . $circleSurfaceArea . '<br>';*/
        $Volume3D = $circleSurfaceArea*$this->getHeight();
        echo 'Objętość stożka koła o wysokośći' . $this->getHeight() . 'oraz powierzchni podstawy'. $circleSurfaceArea .' i kolorze ' . $this->getColor() . ' wynosi ' . $Volume3D . '<br>';
    }

/*    public function ShowCircumference()
    {
        $circumference = (NumberPi * 2 * ($this->getRadius()));
        echo 'Obwód koła o promieniu ' . $this->getRadius() . ' wynosi ' . ' i kolorze ' . $this->getColor() . ' wynosi ' . $circumference . '<br>';
    }*/

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
        echo("<br>niszczę obiekt 3D (stożek) <br>");
    }

}

$shape3D1 = new Shape3D (3, 4, 'white', 3,4);

var_dump($shape3D1);
echo $shape3D1->Show3DVolume($shape3D1);



?>