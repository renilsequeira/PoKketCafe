<?php
 
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Event;
use PaytmWallet;
use App\Address;
use Redirect;
use App\Product;
use App\Order;
use App\OrderProduct;
use Auth;

class PaymentController extends Controller
{
 
 
    /**
     * Redirect the user to the Payment Gateway.
     *
     * @return Response
     */
    /**
     * Redirect the user to the Payment Gateway.
     *
     * @return Response
     */
    public function eventOrderGen(Request $request)
    {
        $id = $request->address;
        $request->validate([ 
            'address' => ['required'],   
        ]);
        $adr = Address::find($id); 
        $cart = session()->get('cart');
        $products = Product::get();
        $total = 0;
        if($cart) {
            foreach($products as $product) { 
                foreach($cart as $prd) {
                    if($prd['id'] == $product['id']) {
                        $product['cart'] = 1;
                        $product['cartQuantity'] = $prd['quantity'];                   
                        $total = $total + $prd['quantity'] * $product['price'];
                    }
                }
            } 
        }   
        $orderId = uniqid();
        $order = Order::create([
            'id' => $orderId,
            'userId' => Auth::user()->id,
            'adrId' => $id,
            'total' => $total,
            'transaction_id' => 0,
            'status' => 'pending'
        ]);
        foreach($products as $prd) {
            if($prd['cart'] == 1) {
                OrderProduct::create([
                    'orderId' => $orderId, 
                    'productId' => $prd['id'],
                    'quantity' => $prd['cartQuantity']
                ]);
            }
        }  
 
        $payment = PaytmWallet::with('receive');
        $payment->prepare([
          'order' => $orderId,
          'user' => Auth::user()->id,
          'mobile_number' => $adr->phoneNumber, 
          'email' => Auth::user()->email, 
          'amount' => $total,
          'callback_url' => url('payment/status')
        ]);
        return $payment->receive();
    }
 
    /**
     * Obtain the payment information.
     *
     * @return Object
     */
    public function paymentCallback(Request $request)
    {
        $transaction = PaytmWallet::with('receive');
 
        $response = $transaction->response();
 
        if($transaction->isSuccessful()){
          Order::where('id',$response['ORDERID'])->update(['orderPlaced'=> true, 'transaction_id'=>$response['TXNID']]);
          $request->session()->forget('cart');
          return Redirect::route('orders')->with('message', 'Order Placed Succesfully'); 

        } else if($transaction->isFailed()){ 
          $order = Order::find($response['ORDERID']);
          $order->delete();

          return Redirect::action('CartController@index')->with('error', 'Payment Failed');
        }
    }    
}