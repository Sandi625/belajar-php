<!-- cara penulisan kode php -->

<?php
//tulis kode disini
?>


<? 
// kode disini 
?>
<!-- <% %> -->

<script language = "PHP">
    // kode disini
</script>

<?php 

echo  "Hello world"; 
$message = "Hello world";

$nama;
$nama = "joko";

echo "Helloo world! <br>";
echo "saya sedang mecoba perintah ech <br>";
echo ('saya sedang mencoba perintah echo <br>');
print "saya sedang mecoba perintah print <br>";
print('saya sedang mecoba perintah print <br>');

$nama = 'joko susilo';
$alamat = 'Jakarta';
$int_var = 12345;
$another_int = -12345 + 12345;

$many = 2.2888800;
$many_2 = 2.2111200;
$few = $many + $many_2;

$isAdmin = TRUE;
$isAuthenticated = FALSE;

$mobil = array("zulka" => "volvo", 'ali' => "bmw", "Ajuab" => "Toyota");
var_dump($mobil);

///

class Animal{
    public $color;
    public $name;
    public $age;

    public function __construct($color, $name , $age)
    {
        $this->color = $color;
        $this->name = $name;
        $this->age = $age;
    }

    public function printInfo(){
        echo "color: " . $this->color . "<br>";
        echo "name: " . $this->name . "<br>";
        echo "age: " . $this->age . "<br>";
    }
}

$cat = new Animal('black', 'cat', 2);
$cat->printInfo();

$tiger= new Animal('orange', 'tiger', 5);
$tiger->printInfo();

//

$dataMahasiswa = NULL;

//

echo strlen('Hello world');

//
echo str_word_count('Hello world');

//

echo strrev("hello world");

//
echo strpos("hello world", "world");

//

echo "Hello world";
echo str_replace("world", "dolly", "hello world");
//


$number = 10;

var_dump(is_int($number));
var_dump(is_integer($number));
var_dump(is_long($number));

$number = 10.12000;

var_dump(is_float($number));
var_dump(is_double($number));

echo is_infinite(2);
echo is_infinite(log(0));
echo is_infinite(log(0) - log(0));

$x = acos(8);

echo is_nan($x);

define("MINSIZE", 50);

echo MINSIZE;
echo constant("MINSIZE");

?>