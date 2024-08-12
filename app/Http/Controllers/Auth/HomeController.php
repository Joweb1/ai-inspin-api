<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Shop;
use Auth;
use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $wallet = auth()->user()->status;
        $updated = $wallet + 100;

        $updatedWallet = Auth::user()->update(['status' => $updated]);

        return response(compact('wallet', 'updated'));
    }
    public function test(Request $request)
    {
        //for getting in the user product
        //$test = auth()->user()->product->all();//All
        // $test = auth()->user()->product->where('type', 'vimtikey')->all(); //Vimtikey
        //$test = auth()->user()->product->where('type', 'vimtilena')->all(); //Vimtilena
        // $test = auth()->user()->product->where('type', 'vimtizera')->all(); //VimtiZera

        //for getting the user shop
        //$test = auth()->user()->shop->all(); //All
        //$tested = array_column($test, "amount"); // Output a particular column
        //$sum = array_sum($tested); // sum up the value in an array
        /* $createArray = array();
        foreach ($test as $key => $value) {
        $createArray[$key]['amount'] = $value->amount;
        }*///Looping to set a readable array for amount
        //array_multisort(array_column($test, "amount"), SORT_DESC, $test );// Sort from highest amount
        //$test = auth()->user()->shop->all(); //All
        //$test = auth()->user()->shop->where('type', 'vimtikey')->all(); //Vimtikey
        //$test = auth()->user()->shop->where('type', 'vimtilena')->all(); //Vimtilena
        //$test = auth()->user()->shop->where('type', 'vimtizera')->all(); //VimtiZera

        //for getting the user managers
        //$test = auth()->user()->shop->where('type', 'vimtizera')->first()->zeramanager; //zera
        //$test = auth()->user()->shop->where('type', 'vimtilena')->first()->lenamanager; //lena
        //$test = auth()->user()->shop->where('type', 'vimtikey')->first()->keymanager; //key

        //for getting the user Market owners
        //$test = auth()->user()->zerashop->where('type', 'vimtizera')->first()->user; //zera
        //$test = auth()->user()->lenashop->where('type', 'vimtilena')->first()->user; //lena
        //$test = auth()->user()->keyshop->user->keyshop->user; //key


         return response('test');
    }
    public function user(Request $request)
    {
        $user = $request->user();
        $status = 'true';
        $code = 'true';
        return response(compact('user', 'status', 'code'), 200);
    }
    public function product(Request $request)
    {
        $user = $request->user();
        $type = $request->type;
        $account =$request->account;
        $userAccount = $user->$account;
        if ($type == 'vimtizera') {
            $productPrice = 500;      
        }elseif($type == 'vimtilena'){
            $productPrice = 1000;
        }elseif($type == 'vimtikey'){
            $productPrice = 1500;
            $cashback = $productPrice * 3.34 / 100;
            $marketowner = $productPrice * 14 / 100;
            $marketowner1 = $productPrice * 12 / 100;
            $marketowner2 = $productPrice * 10 / 100;
            $marketowner3 = $productPrice * 9 / 100;
            $marketowner4 = $productPrice * 8 / 100;
            $marketowner5 = $productPrice * 7 / 100;
            $marketowner6 = $productPrice * 6 / 100;
            $marketowner7 = $productPrice * 5 / 100;
            $marketowner8 = $productPrice * 4 / 100;
            $marketowner9 = $productPrice * 3 / 100;
            $marketowner10 = $productPrice * 2 / 100;
            $marketowner11 = $productPrice * 1 / 100;
            $company = $productPrice * 10.32 / 100;
            $accumulations = $productPrice * 2 / 100;
            $reserved = $productPrice * 3.34 / 100;
            $transactionTotal = $cashback + $marketowner + $marketowner1 + $marketowner2 + $marketowner3 + $marketowner4 + $marketowner5 + $marketowner6 + $marketowner7 + $marketowner8 + $marketowner9 + $marketowner10 + $marketowner11 + $company + $accumulations + $reserved;
           $look = 'keymanager';
 
          //return response($userowner, 200);
        }
        if ($productPrice > $userAccount) {
            return response('Insufficiant Balance', 200);
        }
        $newbalance = $userAccount - $productPrice;
        $user->update([$account => $newbalance]);
        $currentWallet = $user->walletbalance;
        $user->update(['walletbalance' => $cashback + $currentWallet ]);
        if ($type == 'vimtikey') {
            $gene = 'keyshop';
            $shopowner = $user->keyshop->user;
            $shopownerbalance = $shopowner->walletbalance;
            $added = $marketowner + $shopownerbalance;
            $shopowner->update(['walletbalance' => $added]);

            $shopowner1 = $shopowner->$gene->user;
            $shopownerbalance1 = $shopowner1->walletbalance;
            $added1 = $marketowner1 + $shopownerbalance1;
            $shopowner1->update(['walletbalance' => $added1]);

            $shopowner2 = $shopowner1->$gene->user;
            $shopownerbalance2 = $shopowner2->walletbalance;
            $added2 = $marketowner2 + $shopownerbalance2;
            $shopowner2->update(['walletbalance' => $added2]);

            $shopowner3 = $shopowner2->$gene->user;
            $shopownerbalance = $shopowner3->walletbalance;
            $added3 = $marketowner3 + $shopownerbalance;
            $shopowner3->update(['walletbalance' => $added3]);

            $shopowner4 = $shopowner3->$gene->user;
            $shopownerbalance = $shopowner4->walletbalance;
            $added4 = $marketowner4 + $shopownerbalance;
            $shopowner4->update(['walletbalance' => $added4]);

            $shopowner5 = $shopowner4->$gene->user;
            $shopownerbalance = $shopowner5->walletbalance;
            $added5 = $marketowner5 + $shopownerbalance;
            $shopowner5->update(['walletbalance' => $added5]);

            $shopowner6 = $shopowner5->$gene->user;
            $shopownerbalance = $shopowner6->walletbalance;
            $added6 = $marketowner6 + $shopownerbalance;
            $shopowner6->update(['walletbalance' => $added6]);

            $shopowner7 = $shopowner6->$gene->user;
            $shopownerbalance = $shopowner7->walletbalance;
            $added7 = $marketowner7 + $shopownerbalance;
            $shopowner7->update(['walletbalance' => $added7]);

            $shopowner8 = $shopowner7->$gene->user;
            $shopownerbalance = $shopowner8->walletbalance;
            $added8 = $marketowner8 + $shopownerbalance;
            $shopowner8->update(['walletbalance' => $added8]);

            $shopowner9 = $shopowner8->$gene->user;
            $shopownerbalance = $shopowner9->walletbalance;
            $added9 = $marketowner9 + $shopownerbalance;
            $shopowner9->update(['walletbalance' => $added9]);

            $shopowner10 = $shopowner9->$gene->user;
            $shopownerbalance = $shopowner10->walletbalance;
            $added10 = $marketowner10 + $shopownerbalance;
            $shopowner10->update(['walletbalance' => $added10]);

            $shopowner11 = $shopowner10->$gene->user;
            $shopownerbalance = $shopowner11->walletbalance;
            $added11 = $marketowner11 + $shopownerbalance;
            $shopowner11->update(['walletbalance' => $added11]);
        }
        
        //set the chars
        $lenght = 4;
        $chars = '0123456789';
        //Count the total chars 
        $totalChars = strlen($chars);
        //Get the total repeat
        $totalRepeat = ceil($lenght / $totalChars);
        // Repeat the string
        $repeatString = str_repeat($chars, $totalRepeat);
        // Shuffle the string result
        $shuffleString = str_shuffle($repeatString);
        //get the result random string
        $rawKey1 = substr($shuffleString, 1, $lenght) . "-";
        $repeatString1 = str_repeat($chars, $totalRepeat);
        // Shuffle the string result
        $shuffleString1 = str_shuffle($repeatString1);
        $rawKey2 = substr($shuffleString1, 1, $lenght) . "-";
        $repeatString2 = str_repeat($chars, $totalRepeat);
        // Shuffle the string result
        $shuffleString2 = str_shuffle($repeatString2);
        $rawKey3 = substr($shuffleString2, 1, $lenght) . "-";
        $repeatString3 = str_repeat($chars, $totalRepeat);
        // Shuffle the string result
        $shuffleString3 = str_shuffle($repeatString3);
        $rawKey4 = substr($shuffleString3, 1, $lenght);
        $userid = $user->id;
        $pure = $type.':'. $rawKey1 . $rawKey2 . $rawKey3 . $rawKey4;
        //Pure()->validate(['required', 'unique:keys']);
       Product::create([
            'userId' => $userid,
            'product' => $pure,
            'type' => $type,
        ]);
        return response('created', 200);
    }

    public function createShop(Request $request)
    {
        $data = $request->validate([
            'product' => 'required|max:255|exists:products,product|unique:shops,marketkey',
        ]);
        $user = $request->user();
        $userId = $user->id;
        $product_id = Product::where('product', $data['product'])->get()->first()->id;
        $owner = Product::FindorFail($product_id);
        $owners_id = $owner->userId;
        $type = $owner->type;
        $shop = Shop::create([
            'managerId' => $userId,
            'userId' => $owners_id,
            'type' => $type,
            'marketkey' => $data['product'],
        ]);

        $shop_id = Shop::where('marketkey', $data['product'])->get()->first()->id;

        //credit user a bonus
        //credit owner a bonus
        //send email and message to both user and owner

        if ($type == 'vimtikey') {
            $updatedStatus = $user->update(['keyshopId' => $shop_id]);
        } elseif ($type == 'vimtilena') {
            $updatedStatus = $user->update(['lenashopId' => $shop_id]);
        } elseif ($type == 'vimtizera') {
            $updatedStatus = $user->update(['zerashopId' => $shop_id]);
        } else {
            $updatedStatus = 2;
        }

        return response($updatedStatus);

    }
  /*  public function open()
    {
        return view('open');
    }*/
    public function security(Request $request)
    {
        $Code = request()->validate([
            'code' => 'required|integer|min:1000|max:9999|confirmed',
        ],
        [
            'code.max'=> 'Security code should not be more or less than 4 digits ',
            'code.min'=> 'Security code should not be more or less than 4 digits ',
            'code.confirmed'=> "Did not match",
            'code.integer'=> "Your security code must be in numbers",
        ]);

        $user = $request->user();
        $status = $user->update(['code' => $request->code]);
        return response($status);

    }
}