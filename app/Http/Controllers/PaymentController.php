<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Omnipay\Omnipay;
class PaymentController extends Controller
{

    public function index($id,$price)
    {
        return view("backend.pages.plan.payment",["package_id"=>$id,'price'=>$price]);
    }

}
