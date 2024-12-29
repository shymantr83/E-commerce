<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Services\FatoorahServices;
use Illuminate\Support\Facades\Auth;
use App\Models\mycart;
// use Illuminate\Http\Client\Request;

class FatoorahController  {
    private $fatoorahServices;
    public function __construct(FatoorahServices $fatoorahServices){
        $this->fatoorahServices = $fatoorahServices;
     }
    public function confirm($id){
        return view('template/confirm',compact('id'));
    }
    public function checkout(Request $request)
    {

        /********
         *
         *  Here, write the code to save the order, add the products to it, and calculate the total price
         *
         *
         ********/
// dd($request);
       // $fatoorahServices = new FatoorahServices();
        // $payment = new OrderPayment();
        $user=Auth::guard('web')->user();
        $card=mycart::with('product')->find($request->cardId);
        $data = [
            "CustomerName" =>  $user->name,
             "Notificationoption"=> "LNK",
            "Invoicevalue" =>($card->mount*$card->product->price),// total_price
            "CustomerEmail" =>  $user->email,
            "CalLBackUrl"=>env('CalLBackUrl'),
            "Errorurl"=> env('Errorurl'),
            "Languagn"=> 'en',
            "DisplayCurrencyIna"=>'SAR'
        ];

        $response = $this->fatoorahServices ->sendPayment($data);

        if(isset($response['IsSuccess']))
        if($response['IsSuccess']==true){

            $InvoiceId  = $response['Data']['InvoiceId']  ; // save this id with your order table
            $InvoiceURL = $response['Data']['InvoiceURL'] ;

        }
            return redirect($response['Data']['InvoiceURL']);// redirect for this link to view payment page
     }




    public function callback(Request $request)
    {
        $apiKey = 'your_token';
        $postFields = [
            'Key'     => $request->paymentId,
            'KeyType' => 'paymentId'
            ];
            $response = $fatoorahServices->callAPI("https://apitest.myfatoorah.com/v2/getPaymentStatus", $apiKey, $postFields);
            $response = json_decode($response);
            if(!isset($response->Data->InvoiceId))
                return response()->json(["error" => 'error','status' =>false],404);
                $InvoiceId =  $response->Data->InvoiceId  ;// get your order by payment_id
                if($response->IsSuccess==true){
                    if($response->Data->InvoiceStatus=="Paid")//||$response->Data->InvoiceStatus=='Pending'
                    if( $your_order_total_price==$response->Data->InvoiceValue){

                    /**
                     *
                     * The payment has been completed successfully. You can change the status of the order
                     *
                     */

                    }
                }

                return response()->json(["error" => 'error','status' =>false],404);
    }




}
