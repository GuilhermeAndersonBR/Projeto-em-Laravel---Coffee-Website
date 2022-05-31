<?php
    
namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use Session;
use Stripe;
use App\Http\Controllers\EventController;
    
class StripeController extends Controller
{

    public function leaveProduct($id) {

        $user = auth()->user();

        $events = $user->events;
        
        $productsAsParticipant = $user->productsAsParticipant;

        $productsAsParticipant->detach('id');

    }


    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('stripe');
    }
   
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {

        $user = auth()->user();

        $events = $user->events;
        
        $productsAsParticipant = $user->productsAsParticipant;

        $total = $productsAsParticipant->sum('price');

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $total * 100,
                "currency" => "brl",
                "source" => $request->stripeToken,
                "description" => "Pagamento realizado."
        ]);
   
        Session::flash('success', 'Payment successful!');

        return back();
    }
}