<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use App\Models\Settings;
use App\Models\Int_transfer;
use App\Models\Transfer;
use App\Models\Alerts;
use Carbon\Carbon;


class TransferController extends Controller
{

    public function Ownbank()
    {
        $data['title']='Own bank transfer';
        $data['transfer']=Transfer::latest()->get();
        return view('admin.transfer.own-bank', $data);
    }     
    
    public function Otherbank()
    {
        $data['title']='Other bank transfer';
        $data['transfer']=Int_transfer::latest()->get();
        return view('admin.transfer.other-bank', $data);
    } 
    
    
    public function Destroyownbank($id)
    {
        $data = Transfer::findOrFail($id);
        $res =  $data->delete();
        if ($res) {
            return back()->with('success', 'Request was Successfully deleted!');
        } else {
            return back()->with('alert', 'Problem With Deleting Request');
        }
    }     
    
    public function Destroyotherbank($id)
    {
        $data = Int_transfer::findOrFail($id);
        $res =  $data->delete();
        if ($res) {
            return back()->with('success', 'Request was Successfully deleted!');
        } else {
            return back()->with('alert', 'Problem With Deleting Request');
        }
    } 

    public function Approve($id)
    {
        $data = Int_transfer::findOrFail($id);
        $ss = Alerts::whereReference($data->ref_id)->first();
        $data->status=1;
        $ss->status=1;
        $ss->save();
        $res=$data->save();
        $set=Settings::first();
        $user=User::find($data->user_id);
        $currency=Currency::whereStatus(1)->first();
        if($set->email_notify==1){
            send_email(
                $user->email, 
                $user->username, 
                'Transfer Request has been approved', 
                'Transfer of '.$data->amount.$currency->name.'. has been approved<br>Thanks for working with us.'
            );
        }
        if ($res) {
            return back()->with('success', 'Request was Successfully approved!');
        } else {
            return back()->with('alert', 'Problem With Approving Request');
        }
    }
    
    
}
