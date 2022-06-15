<!-- L'e-commerce vende prodotti per gli animali.
I prodotti saranno oltre al cibo, anche giochi, cucce, etc.
L'utente potrà sia comprare i prodotti senza registrarsi, oppure iscriversi e ricevere il 20% di sconto su tutti i prodotti. 
Il pagamento avviene con la carta di credito, che non deve essere scaduta.
BONUS:
Alcuni prodotti (es. antipulci) avranno la caratteristica che saranno disponibili solo in un periodo particolare (es. da maggio ad agosto). -->

<?php 
require_once __DIR__ . "./Guinzaglio.php";
require_once __DIR__ . "./Cibo_per_cani.php";
require_once __DIR__ . "./Giochino.php";
require_once __DIR__ . "./Utente.php";

$guinzaglio_impugnatura_antiscivolo = new Guinzaglio(10, "CD1234RM");

$bocconcini_sapore_di_pollo = new Cibo_per_cani(8, "CR4321DS");

$peluche = new Giochino(21, "GR7676OP");

$buyer = new Utente("Simone", "simone@gmail.com", "2027");
$buyer->add_to_cart($peluche);
$buyer->add_to_cart($bocconcini_sapore_di_pollo);
$buyer->checkCreditCardExpiration();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Ciao <?php echo $buyer->name; ?>!</h1>
    <h1>Prodotti che vuoi acquistare:</h1>
    <ul>
        <?php foreach($buyer->cart as $products) { ?>
            <li><?php echo $products->name?> <?php echo $products->price?>$</li>
        <?php } ?>
    </ul>
    <p>Totale carrello: <?php echo $buyer->getfinalPrice() ?>$</p>
</body>
</html>