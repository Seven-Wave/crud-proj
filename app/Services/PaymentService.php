<?php


namespace App\Services;

use App\Contracts\PaymentControllerInterface;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class PaymentService implements PaymentControllerInterface {
    public function index($id)
    {
        $user = User::with(['payments' => function($q) {
            $q->where('is_deleted', 0);
        }])->find($id);

        return view('user_payments', compact('user'));
    }

    public function delete(Request $req)
    {
        $payment = Payment::find($req->id);
        $payment->is_deleted = 1;
        $payment->save();

        return response()->json(['status' => 'ok', 'message' => 'Платёж удалён!']);
    }
}
