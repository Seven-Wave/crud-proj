<?php

namespace App\Contracts;

use Illuminate\Http\Request;

interface UserControllerInterface
{
    public function index(Request $req);
    public function create(Request $req);
    public function update(Request $req);
    public function delete(Request $req);

}
