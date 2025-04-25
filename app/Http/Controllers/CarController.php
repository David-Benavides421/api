<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(){
        $cars = Car::all(); //los datos pedidos al modelo Car se alojan en la variable $cars
        return view('index' , compact('cars')); //se retorna a la vista cars.index 

    }
}
