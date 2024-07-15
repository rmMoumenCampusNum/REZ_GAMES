<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CardsController extends Controller
{
       public function ShowOneOrder ($id) {
        return [
            'Le panier est le numéro'=>$id,
        ];
    }
}
