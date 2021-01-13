<?php

// This file is your starting point (= since it's the index)
// It will contain most of the logic, to prevent making a messy mix in the html

// This line makes PHP behave in a more strict way
declare(strict_types=1);

// We are going to use session variables so we need to enable sessions
//session_start();

// Use this function when you need to need an overview of these variables
function whatIsHappening()
{
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}

// TODO: provide some products (you may overwrite the example)
$products = [
    ['name' => 'Iphone 7', 'price' => 750],
    ['name' => 'Iphone 8', 'price' => 800],
    ['name' => 'Iphone 9', 'price' => 900],
    ['name' => 'Iphone 10', 'price' => 1100],
    ['name' => 'Iphone 11', 'price' => 1200],
    ['name' => 'Iphone 11 plus', 'price' => 1400],
];

$totalValue = 0;
$productsArray = [];
$productPrices = [];

$emailErr = $streetErr = $streetNumErr = $cityErr = $zipcodeErr = '';

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}




if (isset($_POST['order'])) {

    if (!empty($_POST['products'])) {
        $productsSelected = array_keys($_POST['products']);
        // $quantitySelected = array_keys($_POST['quantity']);

        foreach ($productsSelected as $item) {
            array_push($productsArray, $products[$item]['name']);
            array_push($productPrices, $products[$item]['price']);
        }
        // foreach($quantitySelected as $item){
        //     array_push($quantity, $products[$item]['name']);
        // }
    }
    $totalValue = array_sum($productPrices);


    // Email Validation
    if (empty($_POST["email"])) {
        $emailErr = '<div class="alert alert-danger" role="alert">Email is required</div>';
    } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = '<div class="alert alert-danger" role="alert"> Invalid email format field</div>';
        }
    }


    // street Number Validation
    if (empty($_POST["streetnumber"])) {
        $streetnumberErr = '<div class="alert alert-danger" role="alert">Street number is required</div>';
    } else {
        $streetnumber = test_input($_POST["streetnumber"]);
        // check if e-mail address is well-formed
        if (!filter_var($streetnumber, FILTER_VALIDATE_INT)) {
            $streetnumberErr = '<div class="alert alert-danger" role="alert">Please type a number</div>';
        }
    }

    // zip code validation
    if (empty($_POST["zipcode"])) {
        $zipcodeErr = '<div class="alert alert-danger" role="alert">Zip Code is required</div>';
    } else {
        $zipcode = test_input($_POST["zipcode"]);
        // check if e-mail address is well-formed
        if (!filter_var($zipcode, FILTER_VALIDATE_INT)) {
            $zipcodeErr = '<div class="alert alert-danger" role="alert">You zip code is invalid</div>';
        }
    }

    if (empty($_POST["street"]) || empty($_POST["city"])) {
        $streetErr = '<div class="alert alert-danger" role="alert">A street name is required</div>';
        $cityErr = '<div class="alert alert-danger" role="alert">A city name is required</div>';
    }
}

require 'form-view.php';
