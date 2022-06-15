<?php
class Utente {

    public $name;
    public $user_is_registered = true;
    public $credit_card_expiration;
    public $cart = [];

    function __construct($_name, $_user_is_registered, $credit_card_expiration) {
        $this->name = $_name;
        $this->user_is_registered = $_user_is_registered;
        $this->credit_card_expiration = $credit_card_expiration;
    }

    function add_to_cart($_product) {
        $this->cart[] = $_product;    
    }

    function getfinalPrice() {
        if ($this->checkCreditCardExpiration() === "Carta di credito valida") {
            
            $total_price = 0;
            foreach($this->cart as $item) {
                $total_price += $item->price;
            
                if ($this->user_is_registered === true) {
                    $discount = $total_price * 20 / 100;
                    $discounted_price = $total_price - $discount;
                    return $discounted_price;
            
                } else return $total_price;
            } 
        }  
    }

    function checkCreditCardExpiration() {
        $today_is = intval(date("Y"));

        if ($this->credit_card_expiration > $today_is) {
            return "Carta di credito valida";
        } else return "Carta di credito scaduta";
    }
}