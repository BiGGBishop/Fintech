<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use App\Models\Chart;
use App\Models\Buyer;
use App\Models\Seller;
use App\Models\Exchange;
use App\Models\Settings;
use Carbon\Carbon;


class AssetController extends Controller
{

    public function Plans()
    {
        $data['title']='Assets';
        $data['plan']=Chart::all();
        return view('admin.asset.plans', $data);
    } 
    
    public function Create()
    {
        $data['title']='Create asset';
        return view('admin.asset.create', $data);
    } 

    public function Store(Request $request)
    {
        $set=Settings::first();
        $data['name']=$request->name;
        $data['symbol']=$request->symbol;
        if($set->auto==0){ 
        $data['price']=$request->price;
        }
        $data['balance']=$request->balance;
        $data['exchange_charge']=$request->exchange_charge;
        $data['buying_charge']=$request->buying_charge;
        $data['selling_charge']=$request->selling_charge;
        $data['ref_percent']=$request->ref_percent;
        $data['coin'] = $request->coin;
        $data['status'] = $request->status;
        $res = Chart::create($data);
        if ($res) {
            return back()->with('success', 'Saved Successfully!');
        } else {
            return back()->with('alert', 'Problem With Creating New Plan');
        }
    } 
    
    public function Buy()
    {
        $data['title']='Buying log';
        $data['logs']=Buyer::latest()->get();
        return view('admin.asset.buyer', $data);
    }     
    
    public function Sell()
    {
        $data['title']='Selling log';
        $data['logs']=Seller::latest()->get();
        return view('admin.asset.seller', $data);
    } 

    public function Exchange()
    {
        $data['title']='Exchange log';
        $data['logs']=Exchange::latest()->get();
        return view('admin.asset.exchange', $data);
    } 

    public function Destroy($id)
    {
        $data = Profits::findOrFail($id);
            $res =  $data->delete();
            if ($res) {
                return back()->with('success', 'Request was Successfully deleted!');
            } else {
                return back()->with('alert', 'Problem With Deleting Request');
            }
    } 
    
    public function PlanDestroy($id)
    {
        $data = Plans::findOrFail($id);
            $res =  $data->delete();
            if ($res) {
                return back()->with('success', 'Request was Successfully deleted!');
            } else {
                return back()->with('alert', 'Problem With Deleting Request');
            }
    } 
    
    public function Edit($id)
    {
        $plan=$data['plan']=Chart::findOrFail($id);
        $data['title']=$plan->name;
        return view('admin.asset.edit', $data);
    } 

    public function Update(Request $request)
    {
        $set=Settings::first();
        $data = Chart::findOrFail($request->id);
        if($set->auto==0){ 
            $data->price=$request->price;
        }
        $data->name=$request->name;
        $data->symbol=$request->symbol;
        $data->price=$request->price;
        $data->balance=$request->balance;
        $data->exchange_charge=$request->exchange_charge;
        $data->buying_charge=$request->buying_charge;
        $data->selling_charge=$request->selling_charge;
        $data->ref_percent=$request->ref_percent;
        if(empty($request->status)){
            $data->status=0;	
        }else{
            $data->status=$request->status;
        }        
        if(empty($request->coin)){
            $data->coin=0;	
        }else{
            $data->coin=$request->coin;
        }
        $res=$data->save();
        if ($res) {
            return back()->with('success', 'Update was Successful!');
        } else {
            return back()->with('alert', 'An error occured');
        }
    }  
}
