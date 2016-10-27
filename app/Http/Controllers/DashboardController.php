<?php

namespace App\Http\Controllers;

use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use App\Message;
use Illuminate\Database\Query;

/**
 * Class DashboardController
 * @package App\Http\Controllers
 */
class DashboardController extends Controller
{
    /**
     * Display the Dashboard.
     *
     * @return Response
     */
    public function index()
    {
        $user = Auth::user();

        if($user->seller)
            return view("dashboard.seller")->with("user",$user);

        return view("dashboard.customer")->with("user",$user);
    }

    /**
     * Display Item form.
     *
     * @return Response
     */
    public function create()
    {
        $categories = ['Games','Graphic Cards','Accessories','Gaming Chairs'];
        return view("dashboard.create")->with("categories", $categories);
    }

    /**
     * Inserts Item into Database
     *
     * @param Request $request
     *
     * @return Response
     */
    public function insert(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|max:5120',
            'name' => 'required|max:255',
            'category' => 'required|in:Games,Graphic Cards,Accessories,Gaming Chairs',
            'from' => 'required|date_format:j F Y|after:today',
            'to' => 'required|date_format:j F Y|after:from',
            'price' => 'required|numeric|min:0|max:10000',
            'quantity' => 'required|integer|min:0|max:10000',
            'description' => 'required|max:1000'
        ]);


        $ds = DIRECTORY_SEPARATOR;
        //Hack for getting absolute path to public folder
        $publicdir = dirname(dirname( __FILE__ ) . "..".$ds."..".$ds."..".$ds."..".$ds."public".$ds."index.html");
        $storagedir = "products";

        $destinationPath = $publicdir.$ds.$storagedir;

        $user = Auth::user();

        $fileName = explode(".",$request->file('image')->getClientOriginalName())[0]; //file name
        $fileName .= "_" . date('Y-m-d-H-i-s') . "_" . $user->id;                   //collision avoidance
        $fileName .= "." . $request->file('image')->getClientOriginalExtension(); //file extension

        $request->file('image')->move($destinationPath, $fileName);

        $id = Product::create([
            'user_id' => $user->id,
            'image' => '/'.$storagedir.'/'.$fileName,
            'name' => $request->input('name'),
            'category' => $request->input('category'),
            'from' => date_create_from_format('j F Y',$request->input('from')),
            'to' => date_create_from_format('j F Y',$request->input('to')),
            'price' => $request->input('price'),
            'quantity' => $request->input('quantity'),
            'description' => $request->input('description')
        ])->getKey();

        return redirect("/product/".$id);
    }

    /**
     * Displays CRM View
     *
     * @return \Illuminate\View\View
     */
    public function crm()
    {
        $uid =  Auth::user()->id;
        $threads = DB::table('messages')
            ->join('users','messages.sender_id','=','users.id')
            ->join('products','messages.product_id','=','products.id')
            ->where('messages.receiver_id','=',$uid)
            ->orderBy('messages.created_at', 'desc')
            ->groupBy('messages.sender_id','messages.product_id')
            ->get([
                'messages.sender_id',
                'users.fname',
                'users.lname',
                'messages.product_id',
                'products.name',
                'messages.created_at']);

        return view('dashboard.crm')->with('threads',$threads);
    }

    /**
     * Displays Specific thread
     * @param Request $request
     * @param $uid
     * @param $pid
     * @return \Illuminate\View\View
     */
    public function thread($uid, $pid)
    {
        $rid =  Auth::user()->id;
        $threads = DB::table('messages')
            ->join('users','messages.sender_id','=','users.id')
            ->join('products','messages.product_id','=','products.id')
            ->where('messages.receiver_id','=',$rid)
            ->orderBy('messages.created_at', 'desc')
            ->groupBy('messages.sender_id','messages.product_id')
            ->get([
                'messages.sender_id',
                'users.fname',
                'users.lname',
                'messages.product_id',
                'products.name',
                'messages.created_at']);

        $chats = DB::table('messages')
            ->join('users','messages.sender_id','=','users.id')
            ->where(function($query) use($uid, $rid, $pid){
                $query->where('messages.receiver_id','=',$rid)
                    ->where('messages.sender_id','=',$uid)
                    ->where('messages.product_id','=',$pid);
            })
            ->orWhere(function($query) use($uid, $rid, $pid){
                $query->where('messages.receiver_id','=',$uid)
                    ->where('messages.sender_id','=',$rid)
                    ->where('messages.product_id','=',$pid);
            })
            ->orderBy('messages.created_at', 'asc')
            ->get([
                'messages.sender_id',
                'messages.message',
                'messages.created_at'
            ]);

        return view('dashboard.crm')->with([
            'uid'=>$uid,
            'pid'=>$pid,
            'threads'=>$threads,
            'chats'=>$chats
        ]);
    }

    /**
     * Send Message to Client
     * @param Request $request
     * @param $rid
     * @param $pid
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function addMessage(Request $request, $rid, $pid)
    {
        $sid = Auth::user()->id;

        Message::create([
            'sender_id' => $sid,
            'receiver_id' => $rid,
            'product_id' => $pid,
            'message' => $request->input('message')
        ]);

        return redirect('/dashboard/crm/'.$rid.'/'.$pid);
    }


}
