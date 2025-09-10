<?php

namespace App\Http\Controllers;

use App\Models\AmountModel;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Razorpay\Api\Api;

class PaymentController extends Controller
{
    // public function handleCallback(Request $request)
    // {
    //     // Razorpay returns payment info
    //     $paymentId = $request->input('razorpay_payment_id');
    //     $orderId   = $request->input('razorpay_order_id');
    //     $signature = $request->input('razorpay_signature');

    //     try {
    //         // Verify signature
    //         $api = new \Razorpay\Api\Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
    //         $api->utility->verifyPaymentSignature([
    //             'razorpay_order_id'   => $orderId,
    //             'razorpay_payment_id' => $paymentId,
    //             'razorpay_signature'  => $signature
    //         ]);

    //         // Update DB
    //         AmountModel::where('payment_id', $orderId)->update([
    //             'status' => 'paid',
    //             'razorpay_payment_id' => $paymentId
    //         ]);

    //         return view('payment.success', compact('paymentId', 'orderId'));
    //     } catch (\Exception $e) {
    //         return redirect('/payment/failure');
    //     }
    // }

    // public function paymentFailure()
    // {
    //     return view('payment.failure');
    // }
    // public function createOrder(Request $request)
    // {
    //     $api = new \Razorpay\Api\Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

    //     $order = $api->order->create([
    //         'receipt'  => 'rcptid_' . time(),
    //         'amount'   => $request->amount * 100, // paise
    //         'currency' => 'INR',
    //         'payment_capture' => 1
    //     ]);

    //     return view('pay', [
    //         'order_id' => $order['id'],
    //         'amount'   => $request->amount,
    //         'email'    => $request->email
    //     ]);
    // }
    public function paymentCallback(Request $request)
    {
        try {
            $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

            $attributes = [
                'razorpay_order_id'   => $request->razorpay_order_id,
                'razorpay_payment_id' => $request->razorpay_payment_id,
                'razorpay_signature'  => $request->razorpay_signature,
            ];

            
            $api->utility->verifyPaymentSignature($attributes);

            
            AmountModel::where('payment_id', $request->razorpay_order_id)
                ->update([
                    'status' => 'success',
                    'payment_id' => $request->razorpay_payment_id,
                ]);

            
            return response()->json([
                'status' => 'success',
                'message' => 'Payment Successful',
                'payment_id' => $request->razorpay_payment_id,
                'order_id' => $request->razorpay_order_id
            ]);
        } catch (\Exception $e) {
            
            return response()->json([
                'status' => 'failed',
                'message' => 'Payment Failed: ' . $e->getMessage(),
            ]);
        }
    }


    public function showPaymentPage($order_id)
{
    // Fetch the Amount record
    $amountRecord = AmountModel::where('payment_id', $order_id)->first();

    if (!$amountRecord) {
        abort(404, "Order not found");
    }

    // Fetch student using student_id (foreign key)
    $student = null;
    if ($amountRecord->student_id) {
        $student = Student::find($amountRecord->student_id);
    }

    return view('payment.pay', [
        'order_id' => $order_id,
        'amount'   => $amountRecord->amount,
        'email'    => $amountRecord->email,
        'student'  => $student
    ]);
}

}
