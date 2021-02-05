<?php

namespace App\Http\Controllers\Tenant;

use Illuminate\Http\Request;
use App\Repository\Tenant\BookingRepository;
use App\Http\Controllers\Controller;

class BookingController extends Controller{
    
    private $request;
    private $repository;

    function __contruct(Request $request, BookingRepository $repository){
        $this->repository = $repository;
        $this->request = $request;
    }
}