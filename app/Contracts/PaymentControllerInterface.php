<?php

namespace App\Contracts;

use Illuminate\Http\Request;

interface PaymentControllerInterface
{
    public function index(Request $req);
    public function delete(Request $req);

}
