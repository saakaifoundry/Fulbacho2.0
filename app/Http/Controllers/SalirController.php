<?php namespace App\Http\Controllers;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SalirController
 *
 * @author federico
 */
class SalirController extends Controller {
    //put your code here
    
    public function getIndex(){
        return "dsdsdsdsa";
    }
    
    public function store(){
        Auth::user()->logout();
        return Redirect::to('/');
    }
}
