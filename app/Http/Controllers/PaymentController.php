<?php

namespace App\Http\Controllers;

use App\Contracts\PaymentControllerInterface;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    private $paymentService;

    public function __construct(PaymentControllerInterface $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function index($id) {

        return $this->paymentService->index($id);
    }

    public function delete(Request $req) {


        return $this->paymentService->delete($req);
    }
}
