<!-- cara penulisan kode php -->

<?php
//tulis kode disini
?>


<?
// kode disini 
?>
<!-- <% %> -->

<script language="PHP">
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

class Animal
{
    public $color;
    public $name;
    public $age;

    public function __construct($color, $name, $age)
    {
        $this->color = $color;
        $this->name = $name;
        $this->age = $age;
    }

    public function printInfo()
    {
        echo "color: " . $this->color . "<br>";
        echo "name: " . $this->name . "<br>";
        echo "age: " . $this->age . "<br>";
    }
}

$cat = new Animal('black', 'cat', 2);
$cat->printInfo();

$tiger = new Animal('orange', 'tiger', 5);
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

<!-- looping dan if else  -->

<?php
// IF

// if (condition) {
//     code to be executed if condition is true
// }

$t = date('H');

if ($t < "20") {
    echo "Have a good day";
}

//if
if ($condition) {
    echo 'code to be executed if condition is true';
} else {
    echo 'code to be executed if condition failed';
}


//else
$d = date("D");

if ($id == "fri")
    echo "Have a nice weekend";

else
    echo "Have anice day";


//else if
if ($condition) {
    echo "code to be executed if this condition is true";
} else if ($condition) {
    echo "code tobe executed id false an this condition true";
} else {
    echo "code tobe executed if all conditiom are false";
}

$d = date("D");

if ($d == "fri")
    echo "have a nice Weekend";

else if ($d == "sun")
    echo "have a nice sunday";

else
    echo "have a nice day";


//Switch

$d = date("D");

switch ($d) {
    case "Mon":
        echo "Today is Monday";
    case "Tue":
        echo "Today is Tesday";
    case "Wed":
        echo "Today is Wenesday";
    case "Thu":
        echo "Today is Thurtday";
    case "Fri":
        echo "Today is Friday";
    case "Sat":
        echo "Today is Saturday";
    case "Sun":
        echo "Today is Sunday";
    default:
        echo "Wonder which day is this";
}

// Looping
//while
$i = 0;
$num = 50;

while( $i < 10) {
    $num--;
    $i++;
}

$i = 0;
$num = 0;

do {
    $i++;

} while ($i < 10);
echo ("lopp stooped at i = $i");

//for

$a = 0;
$b = 0;

for ($i = 0; $i < 5; $i++) {
    $a += 10;
    $b += 5;


echo ("At teh end of the loop a = $a and b = $b");

}


//foreach

$array = array( 1,2,3,4,5);

foreach($array as $value){
    echo "value is $value <br>";
}

//break

for ($x = 0; $x < 10; $x++){
    if ($x == 4) {
        break;
    }
    echo "the number is : $x <br>";

}

//continue

for ($x = 0; $x < 10; $x++){
    if ($x == 4) {
        continue;
    }
    echo "the number is : $x <br>";

}

//function
//void
function writeMsg() {
    echo "Gello world";

}

writeMsg(); //panggil function


//void function

function createMsg()
{
 return "Selamat datang.";

}
echo createMsg();

//function argumen

function sum($nilaiA, $nilaiB){
    echo $nilaiA + $nilaiB;
}
sum(10, 10);


//array
$fruits = array();
$vegetables = [];

$fruits = array("Apple", "Banana", "Orange");
$vegetables = array("Caroot", "pea", "tomato");


$fruits[] = "manggo";
$fruits[] = "Pineaple";

// hasilnya 
// array
// (
//     [0] => Apple
//     [1] => Banana
//     [2] => Orange
//     [3] => Manggo
//     [4] => Pinaple
// )

$fruits = array("apple", "Banana", "orange");

echo $fruits[0]; //aple
echo $fruits[1]; //Banana
echo $fruits[2]; //orange

//array asosiatif

$pegawai = [
    "nama" => "Rizki firmasnya",
    "umur" => 20,
    "alamat" => "Jl segobang",

];

$pegawai2 = [];
$pegawai2  ["Nama"] = "azizi";
$pegawai2 ["Umur"] = 20; 
$pegawai2 ["Alamat"] = "jl kluncing";

echo $pegawai["nama"]; //Rizki firmasnya
echo $pegawai["umur"]; //20

//array multi dimensi

$employee = [
    'name' => 'jon',
    'email' => 'jontor@gmailcom',
    'phone' => '1234567',
    'hobbies' => [
        'football',
        'tennis'
    ],
    'profiles'=>  [
   'facebbok' => 'jonfb',
    'twitter' => 'jontw'
    ]
];

echo $employee['name']; //jon
echo $employee['hobbies'][0]; //football
echo $employee['profiles'];['facebook']; //jonfb




?>