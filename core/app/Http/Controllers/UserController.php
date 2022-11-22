<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use App\Models\Settings;
use App\Models\Logo;
use App\Models\Save;
use App\Models\Branch;
use App\Models\Loan;
use App\Models\Bank;
use App\Models\Currency;
use App\Models\Alerts;
use App\Models\Transfer;
use App\Models\Int_transfer;
use App\Models\Plans;
use App\Models\Adminbank;
use App\Models\Gateway;
use App\Models\Deposits;
use App\Models\Banktransfer;
use App\Models\Withdraw;
use App\Models\Withdrawm;
use App\Models\Merchant;
use App\Models\Profits;
use App\Models\Ticket;
use App\Models\Reply;
use App\Models\Buyer;
use App\Models\Seller;
use App\Models\Exchange;
use App\Models\Asset;
use App\Models\Chart;
use App\Models\Assettransfer;
use App\Models\Exttransfer;
use Carbon\Carbon;
use Session;
use Image;
use Redirect;




class UserController extends Controller
{

        
    public function __construct()
    {		
        $this->middleware('auth');
    }

        
    public function dashboard()
    {
        $data['title']='Dashboard';
        $data['alertx']=Alerts::whereUser_id(Auth::user()->id)->orderBy('id', 'DESC')->limit(1)->get();
        $data['asset']=Asset::whereUser_id(Auth::user()->id)->get();
        $data['plan']=Chart::whereStatus(1)->get();
        return view('user.index', $data);
    }
        
    public function save()
    {
		$data['title']='Save 4 Me';
        $data['save']=Save::whereUser_id(Auth::user()->id)->get();
        return view('user.save', $data);
    } 
        
    public function branch()
    {
        $data['title']='Bank branches';
        $data['branch']=Branch::all();
        return view('user.branch', $data);
    } 
    
    public function merchant()
    {
        $data['title']='Merchant';
        $data['merchant']=Merchant::whereUser_id(Auth::user()->id)->get();
        return view('user.merchant', $data);
    }    
    
    public function ticket()
    {
        $data['title']='Tickets';
        $data['ticket']=Ticket::whereUser_id(Auth::user()->id)->get();
        return view('user.ticket', $data);
    }     
    
    public function senderlog()
    {
        $data['title']='Sender log';
        $data['sent']=Exttransfer::whereUser_id(Auth::user()->id)->get();
        return view('user.sender-log', $data);
    } 
        
    public function loan()
    {
        $data['title']='Loan management';
        $data['loan']=Loan::whereUser_id(Auth::user()->id)->get();
        $data['bank']=Bank::whereUser_id(Auth::user()->id)->first();
        return view('user.loan', $data);
    } 
        
    public function statement()
    {
        $data['title']='Transaction history';
        return view('user.statement', $data);
    } 
    
    public function addmerchant()
    {
        $data['title']='Add merchant';
        return view('user.add-merchant', $data);
    }     
    
    public function merchant_documentation()
    {
        $data['title']='Documentation';
        return view('user.merchant-documentation', $data);
    } 
        
    public function plans()
    {
        $data['title']='PY scheme';
        $data['plan']=Plans::whereStatus(1)->orderBy('min_deposit', 'DESC')->get();
        $data['profit']=Profits::whereUser_id(Auth::user()->id)->orderBy('id', 'DESC')->get();
        $data['datetime']=Carbon::now();
        return view('user.plans', $data);
    } 
        
    public function fund()
    {
        $data['title']='Fund account';
        $data['adminbank']=Adminbank::whereId(1)->first();
        $data['gateways']=Gateway::whereStatus(1)->orderBy('id', 'DESC')->get();
        $data['deposits']=Deposits::whereUser_id(Auth::user()->id)->latest()->get();
        $data['bank_transfer']=Banktransfer::whereUser_id(Auth::user()->id)->orderBy('id', 'DESC')->get();
        return view('user.fund', $data);
    }
        
    public function withdraw()
    {
        $data['title']='Withdraw';
        $data['method']=Withdrawm::whereStatus(1)->get();
        $data['withdraw']=Withdraw::whereUser_id(Auth::user()->id)->orderBy('id', 'DESC')->get();
        return view('user.withdraw', $data);
    }
        
    public function bank_transfer()
    {
        $data['title']='Bank transfer';
        $data['bank']=Adminbank::whereId(1)->first();
        return view('user.bank_transfer', $data);
    }
        
    public function changePassword()
    {
        $data['title'] = "Security";
        $g=new \Sonata\GoogleAuthenticator\GoogleAuthenticator();
        $secret=$g->generateSecret();
        $set=Settings::first();
        $user = User::find(Auth::user()->id);
        $site=$set->site_name;
        $data['secret']=$secret;
        $data['image']=\Sonata\GoogleAuthenticator\GoogleQrUrl::generate($user->email, $secret, $site);
        return view('user.password', $data);
    } 

    public function changePin()
    {
        $data['title'] = "Change Pin";
        return view('user.pin', $data);
    } 
        
    public function profile()
    {
        $data['title'] = "Profile";
        return view('user.profile', $data);
    }    
    
    public function ownbank()
    {
        $data['title'] = "Own bank";
        return view('user.own_bank', $data);
    }
    
    public function Replyticket($id)
    {
        $data['ticket']=$ticket=Ticket::find($id);
        $data['title']='#'.$ticket->ticket_id;
        $data['reply']=Reply::whereTicket_id($ticket->ticket_id)->get();
        return view('user.reply-ticket', $data);
    }      
    
    public function Editmerchant($id)
    {
        $data['merchant']=$merchant=Merchant::find($id);
        $data['title']=$merchant->name;
        return view('user.edit-merchant', $data);
    }      
    
    public function Logmerchant($id)
    {
        $data['log']=Exttransfer::whereMerchant_key($id)->get();
        $data['title']='Merchant log';
        return view('user.log-merchant', $data);
    }    

    public function otherbank()
    {
        $data['title'] = "Other bank";
        return view('user.other_bank', $data);
    }
    public function authCheck()
    {
        if (Auth()->user()->status == '0' && Auth()->user()->email_verify == '1' && Auth()->user()->sms_verify == '1') {
            return redirect()->route('user.dashboard');
        } else {
            $data['title'] = "Authorization";
            return view('user.authorization', $data);
        }
    }

    public function localpreview()
    {
        $data['amount'] = Session::get('Amount');
        $data['acct_no'] = Session::get('Acctno');
        $data['acct_name'] = Session::get('Acctname');
        $data['title']='Transfer Preview';
        return view('user.local_preview', $data);
    }

    public function buyasset()
    {
        $data['title']='Buy currency';
        $data['plan']=Chart::whereStatus(1)->get();
        $data['logs']=Buyer::whereUser_id(Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        return view('user.buy_asset', $data);
    }    
    
    public function sellasset()
    {
        $data['title']='Sell currency';
        $data['plan']=Chart::whereStatus(1)->get();
        $data['asset']=Asset::whereUser_id(Auth::user()->id)->get();
        $data['logs']=Seller::whereUser_id(Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        return view('user.sell_asset', $data);
    }     
    
    public function exchangeasset()
    {
        $data['title']='Exchange currency';
        $data['plan']=Chart::whereStatus(1)->get();
        $data['asset']=Asset::whereUser_id(Auth::user()->id)->get();
        $data['logs']=Exchange::whereUser_id(Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        return view('user.exchange_asset', $data);
    }     
    
    public function checkasset()
    {
        $data['title']='Confirm currency';
        $data['amount']=$amount=Session::get('Amount');
        $data['from']=$from=Session::get('From');
        $data['to']=$to=Session::get('To');
        $data['fprice']=$fprice=Chart::whereId($from)->first();
        $data['tprice']=$tprice=Chart::whereId($to)->first();
        $data['frate']=$frate=(($amount/$fprice->price)*(100-$fprice->exchange_charge)/100);
        $data['trate']=$trate=$tprice->price*$frate;
        $stock=Asset::where('user_id', Auth::user()->id)->where('plan_id', $from)->first();
        $data['logs']=Exchange::whereUser_id(Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        $data['plan']=Chart::whereStatus(1)->get();
        return view('user.confirm_asset', $data);
    } 

    public function transferasset()
    {
        $data['title']='Transfer asset';
        $data['asset']=Asset::whereUser_id(Auth::user()->id)->get();
        $data['transfer']=Assettransfer::where('sender_id',Auth::user()->id)->orWhere('receiver_id',Auth::user()->id)->orderBy('id', 'DESC')->get();
        return view('user.transfer_asset', $data);
    }

    public function sendVcode(Request $request)
    {
        $user = User::find(Auth::user()->id);

        if (Carbon::parse($user->phone_time)->addMinutes(1) > Carbon::now()) {
            $time = Carbon::parse($user->phone_time)->addMinutes(1);
            $delay = $time->diffInSeconds(Carbon::now());
            $delay = gmdate('i:s', $delay);
            session()->flash('alert', 'You can resend Verification Code after ' . $delay . ' minutes');
        } else {
            $code = strtoupper(Str::random(6));
            $user->phone_time = Carbon::now();
            $user->sms_code = $code;
            $user->save();
            send_sms($user->phone, 'Your Verification Code is ' . $code);

            session()->flash('success', 'Verification Code Send successfully');
        }
        return back();
    }

    public function smsVerify(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if ($user->sms_code == $request->sms_code) {
            $user->phone_verify = 1;
            $user->save();
            session()->flash('success', 'Your Profile has been verfied successfully');
            return redirect()->route('user.dashboard');
        } else {
            session()->flash('alert', 'Verification Code Did not matched');
        }
        return back();
    }    
    

    public function sendEmailVcode(Request $request)
    {
        $user = User::find(Auth::user()->id);

        if (Carbon::parse($user->email_time)->addMinutes(1) > Carbon::now()) {
            $time = Carbon::parse($user->email_time)->addMinutes(1);
            $delay = $time->diffInSeconds(Carbon::now());
            $delay = gmdate('i:s', $delay);
            session()->flash('alert', 'You can resend Verification Code after ' . $delay . ' minutes');
        } else {
            $code = strtoupper(Str::random(6));
            $user->email_time = Carbon::now();
            $user->verification_code = $code;
            $user->save();
            send_email($user->email, $user->username, 'Verificatin Code', 'Your Verification Code is ' . $code);
            session()->flash('success', 'Verification Code Send successfully');
        }
        return back();
    }

    public function postEmailVerify(Request $request)
    {

        $user = User::find(Auth::user()->id);
        if ($user->verification_code == $request->email_code) {
            $user->email_verify = 1;
            $user->save();
            session()->flash('success', 'Your Profile has been verfied successfully');
            return redirect()->route('user.dashboard');
        } else {
            session()->flash('alert', 'Verification Code Did not matched');
        }
        return back();
    }
    
    public function bank_transfersubmit(Request $request)
    {
        $user=$data['user']=User::find(Auth::user()->id);
        $currency=Currency::whereStatus(1)->first();
        $set=Settings::first();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $user->username . '.jpg';
            $location = 'asset/screenshot/' . $filename;
            Image::make($image)->resize(800, 800)->save($location);
            $sav['user_id']=Auth::user()->id;
            $sav['amount']=$request->amount;
            $sav['details']=$request->details;
            $sav['image']=$filename;
            $sav['status'] = 0;
            $sav['trx']=$trx=str_random(16);
            Banktransfer::create($sav);
        	if($set['email_notify']==1){
    			send_email($user->email,$user->username,'Deposit request under review','We are currently reviewing your deposit of '.$request->amount.$currency->name.', once confirmed your balance will be credited automatically.<br>Thanks for working with us.');    			
                send_email($set->email,$set->site_name,'New bank deposit request','Hello admin, you have a new bank deposit request for '.$trx);
            }
            return redirect()->route('user.fund')->with('success', 'Deposit request under review');
        }else{
            return back()->with('warning', 'An error occured, please try again later');
        }
    }  
    
    public function submitmerchant(Request $request)
    {
        $user=$data['user']=User::find(Auth::user()->id);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $user->username . '_business.jpg';
            $location = 'asset/profile/' . $filename;
            Image::make($image)->save($location);
            $sav['user_id']=Auth::user()->id;
            $sav['merchant_key']=str_random(16);
            $sav['site_url']=$request->site_link;
            $sav['image']=$filename;
            $sav['name']=$request->merchant_name;
            $sav['description']=$request->merchant_description;
            $sav['status'] = 0;
            Merchant::create($sav);
            return redirect()->route('user.merchant')->with('alert', 'Successfully created, please wait for admin approval');
        }else{
            return back()->with('warning', 'An error occured, please try again later');
        }
    }
    
    public function submitownbank(Request $request)
    {
        $set=Settings::first();
        $currency=Currency::whereStatus(1)->first();
        $amountx=$request->amount+($request->amount*$set->transfer_charge/100);
        $token = round(microtime(true));
        $user=$data['user']=User::find(Auth::user()->id);
        $loan=$data['loan']=Loan::where('user_id', Auth::user()->id)->where('status', 1)->count();
        if($loan<1){
            if($user->pin==$request->pin){
                if($user->acct_no!=$request->acct_no){
                    $count=User::whereAcct_no($request->acct_no)->get();
                    if(count($count)>0){
                        $trans=User::whereAcct_no($request->acct_no)->first();
                        if($user->balance>$amountx || $user->balance==$amountx){
                            Session::put('Amount', $request->amount);
                            Session::put('Acctno', $request->acct_no);
                            Session::put('Acctname', $trans->name);
                            Session::put('Acctemail', $trans->email);
                            return redirect()->route('user.localpreview'); 
                        }else{
                            return back()->with('alert', 'Account balance is insufficient');
                        }
                    }else{
                        return back()->with('alert', 'Invalid account number.');
                    }
                }else{
                    return back()->with('alert', 'You cant transfer money to thesame account.');
                }
            }else{
                return back()->with('alert', 'Invalid pin.');
            }
        }else{
            return back()->with('alert', 'Request failed, you have an unpaid loan.');       
        }
    } 
    
    public function submitlocalpreview(Request $request)
    {
        $set=Settings::first();
        $currency=Currency::whereStatus(1)->first();
        $amountx=$request->amount+($request->amount*$set->transfer_charge/100);
        $token=str_random(10);
        $user=$data['user']=User::find(Auth::user()->id);
        $trans=User::whereAcct_no($request->acct_no)->first();
        $a=$trans->balance+$request->amount;
        $b=$user->balance-$amountx;
        $trans->balance=$a;
        $trans->save(); 
        $user->balance=$b;
        $user->save();
        $sav['ref_id']=$token;
        $sav['amount']=$request->amount;
        $sav['sender_id']=Auth::user()->id;
        $sav['receiver_id']=$trans->id;
        $sav['status']=1;
        $sav['type']=1;
        Transfer::create($sav);
        $contentx='Acct:'.$trans->acct_no.', Date:'.Carbon::now().', CR Amt:'.$request->amount.',
        Bal:'.$trans->balance.', Ref:'.$token.', Desc: Bank transfer';
        $credit['user_id']=$trans->id;
        $credit['amount']=$request->amount;
        $credit['details']=$contentx;
        $credit['type']=2;
        $credit['seen']=0;
        $credit['status']=1;
        $credit['reference']=$token;
        Alerts::create($credit);
        if($set->sms_notify==1){
            send_sms($trans->phone, $contentx);
        }    
        if($set['email_notify']==1){
            send_email($user->email, $user->username, 'Credit alert', $contentx);
        }
        $content='Acct:'.$user->acct_no.', Date:'.Carbon::now().', DR Amt:'.$request->amount.',
        Bal:'.$user->balance.', Ref:'.$token.', Desc: Bank transfer';
        $debit['user_id']=Auth::user()->id;
        $debit['amount']=$amountx;
        $debit['details']=$content;
        $debit['type']=1;
        $debit['seen']=0;
        $debit['status']=1;
        $debit['reference']=$token;
        Alerts::create($debit);
        if($set->sms_notify==1){
            send_sms($user->phone, $content);
        }
        if($set['email_notify']==1){
            send_email($user->email, $user->username, 'Debit alert', $content);
        }

        return redirect()->route('user.statement')->with('success', 'Transfer was successful');

    } 

    public function submitotherbank(Request $request)
    {
        $set=Settings::first();
        $amountx=$request->amount+($request->amount*$set->transfer_chargex/100);
        $token = round(microtime(true));
        $user=$data['user']=User::find(Auth::user()->id);
        $loan=$data['loan']=Loan::where('user_id', Auth::user()->id)->where('status', 1)->count();
        if($loan<1){
            if($user->pin==$request->pin){
                if($user->acct_no!=$request->acct_no){
                    if($user->balance>$amountx || $user->balance==$amountx){
                        $b=$user->balance-$amountx;
                        $user->balance=$b;
                        $user->save();
                        $sav['details']='Acct name:'.$request->name .', Bank name:'.$request->bank .', Address:'.$request->address .', Swift:'.$request->swift .', Iban:'.$request->iban;
                        $sav['ref_id']=$token;
                        $sav['amount']=$request->amount;
                        $sav['user_id']=Auth::user()->id;
                        $sav['status']=0;
                        $sav['type']=1;
                        Int_transfer::create($sav);

                        $content='Acct:'.$user->acct_no.', Date:'.Carbon::now().', DR Amt:'.$request->amount.',
                            Bal:'.$user->balance.', Ref:'.$token.', Desc: Bank transfer';
                        $debit['user_id']=Auth::user()->id;
                        $debit['amount']=$amountx;
                        $debit['details']=$content;
                        $debit['type']=1;
                        $debit['seen']=0;
                        $debit['status']=0;
                        $debit['reference']=$token;
                        Alerts::create($debit);
                        if($set->sms_notify==1){
                        send_sms($user->phone, $content);
                        }
                        if($set['email_notify']==1){
                            send_email($user->email, $user->username, 'Debit alert', $content);
                        }

                        return redirect()->route('user.statement')->with('success', 'Transfer request has been submitted');
                    }else{
                        return back()->with('alert', 'Account balance is insufficient');
                    }
                }else{
                    return back()->with('alert', 'You cant transfer money to thesame account.');
                }
            }else{
                return back()->with('alert', 'Invalid pin.');
            }
        }else{
            return back()->with('alert', 'Request failed, you have an unpaid loan.');       
        }
    } 
    
    public function bankupdate(Request $request)
    {
        $user=$data['user']=User::find(Auth::user()->id);
        $count=Bank::whereUser_id(Auth::user()->id)->count();
        if($count>0){
            $bank=Bank::whereUser_id(Auth::user()->id)->first();
            $bank->name=$request->name;
            $bank->address=$request->address;
            $bank->iban=$request->iban;
            $bank->swift=$request->swift;
            $bank->acct_no=$request->acct_no;
            $bank->acct_name=$request->acct_name;
            $bank->save();
            return back()->with('success', 'Bank details was successfully updated');
        }else{
            $sav['user_id']=Auth::user()->id;
            $sav['name']=$request->name;
            $sav['address']=$request->address;
            $sav['iban']=$request->iban;
            $sav['swift'] = $request->swift;
            $sav['acct_no'] = $request->acct_no;
            $sav['acct_name'] = $request->acct_name;
            Bank::create($sav);
            return back()->with('success', 'Bank details was successfully created');
        }
    }
        
    public function submitsave(Request $request)
    {
        $user=$data['user']=User::find(Auth::user()->id);
        $date1=strtotime($request->end_date);
        $date2=strtotime(Carbon::now());
        $amount=($request->amount)+($request->amount*$set->saving_charge/100);
        $loan=$data['loan']=Loan::where('user_id', Auth::user()->id)->where('status', 1)->count();
        if($loan<1){
            if($date1>$date2){
                if($user->balance>$amount || $user->balance==$amount){
                    $a=$user->balance-$amount;
                    $token=str_random(10);
                    $user->balance=$a;
                    $user->save();
                    $sav['user_id']=Auth::user()->id;
                    $sav['amount']=$request->amount;
                    $sav['target']=$request->target;
                    $sav['end_date']=$request->end_date;
                    $sav['reference']=$token;
                    $sav['status'] = 0;
                    Save::create($sav);
                    return back()->with('success', 'Operation was succesfully, you wont have access to this funds till '.date("Y/m/d", strtotime($request->end_date)));             
                }else{
                    return back()->with('warning', 'Insufficient Funds, please fund your account');
                }
            }else{
                return back()->with('alert', 'Wrong date entered, end date must be greater than todays date');
            }
        }else{
            return back()->with('alert', 'Request failed, you have an unpaid loan.');
        }
    } 
        
    public function loansubmit(Request $request)
    {
        $set=$data['set']=Settings::first();
        $amountx=($request->amount*$set->collateral_percent)/100;
        $amountp=($request->amount*$set->loan_interest)/100;
        $amountp=$request->amount+$amountp;
        $user=$data['user']=User::find(Auth::user()->id);
        $loan=$data['loan']=Loan::where('user_id', Auth::user()->id)->where('status', 1)->count();
        if($loan<1){
            if($user->balance>$amountx || $user->balance==$amountx){
                $sav['user_id']=Auth::user()->id;
                $sav['amount']=$amountp;
                $sav['status']=0;
                $sav['reference']=round(microtime(true));
                $sav['details']=$request->details;
                Loan::create($sav);
                return back()->with('success', 'Loan proposal has been submitted, you will be updated shortly.');
            }else{
                return back()->with('alert', 'Account balance must exceed or equal to 50% of loaned amount as collateral.');
            }
        }else{
            return back()->with('alert', 'Proposal failed, you currently have an unpaid loan.');
        }
    }       
    
    public function Destroyticket($id)
    {
        $data = Ticket::findOrFail($id);
        $res =  $data->delete();
        if ($res) {
            return back()->with('success', 'Request was Successfully deleted!');
        } else {
            return back()->with('alert', 'Problem With Deleting Request');
        }
    } 

    public function submitticket(Request $request)
    {
        $user=$data['user']=User::find(Auth::user()->id);
        $sav['user_id']=Auth::user()->id;
        $sav['subject']=$request->subject;
        $sav['priority']=$request->category;
        $sav['message']=$request->details;
        $sav['ticket_id']=round(microtime(true));
        $sav['status']=0;
        Ticket::create($sav);
        return back()->with('success', 'Ticket Submitted Successfully.');
    }     
    
    public function submitreply(Request $request)
    {
        $sav['reply']=$request->details;
        $sav['ticket_id']=$request->id;
        $sav['status']=1;
        Reply::create($sav);
        $data=Ticket::whereTicket_id($request->id)->first();
        $data->status=0;
        $data->save();
        return back()->with('success', 'Message sent!.');
    }  
        
    public function withdrawsubmit(Request $request)
    {
        $set=$data['set']=Settings::first();
        $currency=Currency::whereStatus(1)->first();
        $user=$data['user']=User::find(Auth::user()->id);
        $amount=$request->amount+($request->amount*$set->withdraw_charge/100);
        $loan=$data['loan']=Loan::where('user_id', Auth::user()->id)->where('status', 1)->count();
        if($loan<1){
            if($user->balance>$amount || $user->balance==$amount){
                $sav['user_id']=Auth::user()->id;
                $sav['reference']=str_random(16);
                $sav['amount']=$request->amount;
                $sav['status']=0;
                $sav['coin_id']=$request->coin;
                $sav['details']=$request->details;
                Withdraw::create($sav);
                $a=$user->balance-($amount);
                $user->balance=$a;
                $user->save();
                if($set->email_notify==1){
                    send_email(
                        $user->email, 
                        $user->username, 
                        'Withdraw Request currently being Processed', 
                        'We are currently reviewing your withdrawal request of '.$request->amount.$currency->name.'.<br>Thanks for working with us.'
                    );
                }
                return back()->with('success', 'Withdrawal request has been submitted, you will be updated shortly.');
            }else{
                return back()->with('alert', 'Insufficent balance.');
            }
        }else{
            return back()->with('alert', 'Request failed, you have an unpaid loan.');
        }
    }  
        
    public function fundsubmit(Request $request)
    {
        $gate=Gateway::where('id', $request->gateway)->first();
        $user=User::find(Auth::user()->id);
        if ($gate->minamo <= $request->amount && $gate->maxamo >= $request->amount) {
            $charge = $gate->fixed_charge + ($request->amount * $gate->percent_charge / 100);
            $usdamo = ($request->amount + $charge) / $gate->rate;
            $usdamo = round($usdamo, 2);
            $trx = round(microtime(true));
            $depo['user_id'] = Auth::id();
            $depo['gateway_id'] = $gate->id;
            $depo['amount'] = $request->amount;
            $depo['charge'] = $charge;
            $depo['usd'] = round($usdamo, 2);
            $depo['btc_amo'] = 0;
            $depo['btc_wallet'] = "";
            $depo['trx'] = str_random(16);
            $depo['try'] = 0;
            $depo['status'] = 0;
            Deposits::create($depo);
            Session::put('Track', $depo['trx']);
            return redirect()->route('user.preview');        
        } else {
            return back()->with('alert', 'Please Follow Deposit Limit');
        }
    }

    public function depositpreview()
    {
        $track = Session::get('Track');
        $data['title']='Deposit Preview';
        $data['gate'] = Deposits::where('status', 0)->where('trx', $track)->first();
        return view('user.preview', $data);
    }

    public function payloan($id)
    {
        $loan=Loan::find($id);
        $user=User::where('id', $loan->user_id)->first();
        if($user->balance>$loan->amount || $user->balance==$loan->amount){
            $a=$user->balance-$loan->amount;
            $loan->status=2;
            $loan->save();
            $user->balance=$a;
            $user->save();
            return back()->with('success', 'Loan was successfully paid.');
        }else{
            return back()->with('alert', 'Account balance must exceed loaned amount.');
        }
    }  
    
    public function withdrawupdate(Request $request)
    {
        $withdraw=Withdraw::whereId($request->withdraw_id)->first();
        $withdraw->coin_id=$request->coin;
        $withdraw->details=$request->details;
        $withdraw->save();
        return back()->with('success', 'Successfully updated');
    }    
    
    public function calculate(Request $request)
    {
        $currency=Currency::whereStatus(1)->first();
        $plan=Plans::find($request->plan_id);
        $profit=$request->amount*($plan->percent/100)*12;
        if($request->amount>$plan->min_deposit || $request->amount==$plan->min_deposit){
            if($request->amount<$plan->amount  || $request->amount==$plan->amount){
                return back()->with('success', number_format($profit).$currency->name);  
            }else{
                return back()->with('alert', 'value is greater than maximum deposit');  
            }
        }else{
            return back()->with('alert', 'value is less than minimum deposit');  
        }
    }
    
    public function buy(Request $request)
    {
        $plan=$data['plan']=Plans::Where('id',$request->plan)->first();
        $user=User::find(Auth::user()->id);
        $loan=$data['loan']=Loan::where('user_id', Auth::user()->id)->where('status', 1)->count();
        if($loan<1){
            if($user->upgrade!=0){
                if($user->balance>$request->amount || $user->balance==$request->amount){
                    if($request->amount>$plan->min_deposit || $request->amount==$plan->min_deposit){
                        if($request->amount<$plan->amount  || $request->amount==$plan->amount){
                            $sav['user_id']=Auth::user()->id;
                            $sav['plan_id']=$request->plan;
                            $sav['amount']=$request->amount;
                            $sav['profit']=0;
                            $sav['status']=1;
                            $sav['end_date']=0;
                            $sav['date']=Carbon::now();
                            $sav['trx']=str_random(16);
                            Profits::create($sav);
                            $a=$user->balance-$request->amount;
                            $user->balance=$a;
                            $user->save();
                            return back()->with('success', 'Plan was successfully purchased, click track earnings to watch your monthly earnings');  
                        }else{
                            return back()->with('alert', 'value is greater than maximum deposit');  
                        }
                    }else{
                        return back()->with('alert', 'value is less than minimum deposit');  
                    }
                }else{
                    return back()->with('alert', 'Insufficient Funds, please fund your account');
                }
            }else{
                return back()->with('alert', 'Upgrade your account to have exclusive access to PY scheme');  
            }
        }else{
                return back()->with('alert', 'Request failed, you have an unpaid loan.');
        }

    } 

        public function read()
    {
        $alert=Alerts::where('user_id', Auth::user()->id)->get();
        foreach ($alert as $alerts){
            $alerts->seen=1;
            $alerts->save();
        }   
        return back()->with('success', 'Notifications have been cleared.');
    }
        public function upgrade()
    {
        $user=User::where('id', Auth::user()->id)->first();
        $set=Settings::first();
        if($user->balance>$set->upgrade_fee || $user->balance==$set->upgrade_fee){
            $a=$user->balance-$set->upgrade_fee;
            $user->upgrade=1;
            $user->balance=$a;
            $user->save();  
            return back()->with('success', 'You now have access to exclusive services.');
        }else{
            return back()->with('alert', 'Insufficient balance, add more funds..');
        }

    }

        public function logout()
    {
        Auth::guard()->logout();
        session()->forget('fakey');
        session()->flash('message', 'Just Logged Out!');
        return redirect('/login');
    }
    
        public function submitPin(Request $request)
    {
        $this->validate($request, [
            'current_pin' => 'required',
            'pin' => 'required|max:4|confirmed'
        ]);
        try {

            $c_pin = Auth::user()->pin;
            $c_id = Auth::user()->id;
            $user = User::findOrFail($c_id);
            if ($request->current_pin==$c_pin) {
                if($request->pin==$request->pin_confirmation){
                    $user->pin = $request->pin;
                    $user->save();
                    return back()->with('success', 'Pin Changed Successfully.');
                }else{
                    return back()->with('alert', 'New Pin Does Not Match.');
                }
            } else {
                return back()->with('alert', 'Current Pin Not Match.');
            }

        } catch (\PDOException $e) {
            return back()->with('alert', $e->getMessage());
        }
    }
    
    public function submitPassword(Request $request)
    {
        $this->validate($request, [
            'current_password' => 'required',
            'password' => 'required|min:5|confirmed'
        ]);
        try {

            $c_password = Auth::user()->password;
            $c_id = Auth::user()->id;
            $user = User::findOrFail($c_id);
            if (Hash::check($request->current_password, $c_password)) {
                if($request->password==$request->password_confirmation){
                    $password = Hash::make($request->password);
                    $user->password = $password;
                    $user->save();
                    return back()->with('success', 'Password Changed Successfully.');
                }else{
                    return back()->with('alert', 'New Password Does Not Match.');
                }
            } else {
                return back()->with('alert', 'Current Password Not Match.');
            }

        } catch (\PDOException $e) {
            return back()->with('alert', $e->getMessage());
        }
    }
    
        public function avatar(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $user->username . '.jpg';
            $location = 'asset/profile/' . $filename;
            if ($user->image != 'user-default.png') {
                $path = './asset/profile/';
                File::delete($path.$user->image);
            }
            Image::make($image)->resize(800, 800)->save($location);
            $user->image=$filename;
            $user->save();
            return back()->with('success', 'Avatar Updated Successfully.');
        }else{
            return back()->with('success', 'An error occured, try again.');
        }
    }       
    
        public function kyc(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $user->username . '.jpg';
            $location = 'asset/profile/' . $filename;
            if ($user->image != 'user-default.png') {
                $path = './asset/profile/';
                $link = $path . $user->kyc_link;
                if (file_exists($link)) {
                    @unlink($link);
                }
            }
            Image::make($image)->resize(800, 800)->save($location);
            $user->kyc_link=$filename;
            $user->save();
            return back()->with('success', 'Kyc document Upload was successful.');
        }else{
            return back()->with('success', 'An error occured, try again.');
        }
    }
        public function account(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        $user->name=$request->name;
        $user->phone=$request->phone;
        $user->country=$request->country;
        $user->city=$request->city;
        $user->zip_code=$request->zip_code;
        $user->address=$request->address;
        $user->save();
        return back()->with('success', 'Profile Updated Successfully.');
    }

    public function submitbuyasset(Request $request)
    {
        $user=$data['user']=User::find(Auth::user()->id);
        $currency=Currency::whereStatus(1)->first();
        $plan=Chart::whereId($request->asset)->first();
        $set=Settings::first();
        $rate=(($request->amount*$plan->price)*(100-$plan->buying_charge)/100);
        $token = str_random(16);
        $loan=$data['loan']=Loan::where('user_id', Auth::user()->id)->where('status', 1)->count();
        if($loan<1){
            if($request->amount<$user->balance || $request->amount==$user->balance){
                if($rate<$plan->balance || $rate==$plan->balance){
                    $num_asset=Asset::where('user_id', Auth::user()->id)->where('plan_id', $request->asset)->count();
                    if($num_asset<1){
                        $sav['user_id']=Auth::user()->id;
                        $sav['plan_id']=$request->asset;
                        $sav['amount']=$rate;
                        Asset::create($sav);
                    }else{
                        $up_asset=Asset::where('user_id', Auth::user()->id)->where('plan_id', $request->asset)->first();
                        $up_asset->amount=$up_asset->amount+$rate;
                        $up_asset->save();
                    }
                    $user->balance=$user->balance-$request->amount;
                    $user->save();
                    $plan->balance=$plan->balance-$rate;
                    $plan->save();
                    $buyer['reference']=$token;
                    $buyer['user_id']=Auth::user()->id;
                    $buyer['plan_id']=$request->asset;
                    $buyer['amount']=$rate;
                    $buyer['charge']=$request->amount*$plan->price*$plan->buying_charge/100;
                    Buyer::create($buyer);
                    return back()->with('success', $plan->name.' was successfully purchased');
                }else{
                    return back()->with('alert', 'Reserved currency is below amount entered');
                }
            }else{
                return back()->with('alert', 'Account balance is insufficient');
            }
        }else{
            return back()->with('alert', 'Request failed, you have an unpaid loan.');
        }

    }      
    
    public function submitsellasset(Request $request)
    {
        $user=$data['user']=User::find(Auth::user()->id);
        $currency=Currency::whereStatus(1)->first();
        $plan=Chart::whereId($request->asset)->first();
        $set=Settings::first();
        $token = str_random(16);
        $rate=(($request->amount/$plan->price)*(100+$plan->selling_charge)/100);
        $stock=Asset::where('user_id', Auth::user()->id)->where('plan_id', $request->asset)->first();
        $sell=($request->amount*$plan->selling_charge/100)+$request->amount;
        if($request->amount<$stock->amount || $request->amount==$stock->amount){
            $stock->amount=$stock->amount-$sell;
            $stock->save();
            $user->balance=$user->balance+$rate;
            $user->save();            
            $plan->balance=$plan->balance+$request->amount;
            $plan->save();
            $seller['reference']=$token;
            $seller['user_id']=Auth::user()->id;
            $seller['plan_id']=$request->asset;
            $seller['amount']=$sell;
            $seller['charge']=$request->amount*$plan->selling_charge/100;
            Seller::create($seller);
            return back()->with('success', $plan->name.' was successfully sold');
        }else{
            return back()->with('alert', 'Account balance is insufficient');
        }        
    }      
    
    public function submitexchangeasset(Request $request)
    {
        $user=$data['user']=User::find(Auth::user()->id);
        $currency=Currency::whereStatus(1)->first();
        $set=Settings::first();
        if($request->from==$request->to){
            return back()->with('alert', 'You cannot exchange thesame asset.');
        }else{
            $stock=Asset::where('user_id', Auth::user()->id)->where('plan_id', $request->from)->first();
            if($request->amount<$stock->amount || $request->amount==$stock->amount){
                Session::put('Amount', $request->amount);
                Session::put('From', $request->from);
                Session::put('To', $request->to);
                return redirect()->route('user.checkasset');  
            }else{
                return back()->with('alert', 'Account balance is insufficient');
            }
        }       
    } 

    public function submitcheckasset(Request $request)
    {
        $user=$data['user']=User::find(Auth::user()->id);
        $currency=Currency::whereStatus(1)->first();
        $plan=Chart::whereId($request->from)->first();
        $set=Settings::first();
        $token = str_random(16);
        $num_asset=Asset::where('user_id', Auth::user()->id)->where('plan_id', $request->to)->count();
        if($num_asset<1){
            $sav['user_id']=Auth::user()->id;
            $sav['plan_id']=$request->to;
            $sav['amount']=$request->tamount;
            Asset::create($sav);
        }else{
            $to_asset=Asset::where('user_id', Auth::user()->id)->where('plan_id', $request->to)->first();
            $to_asset->amount=$to_asset->amount+$request->tamount;
            $to_asset->save();            
            $from_asset=Asset::where('user_id', Auth::user()->id)->where('plan_id', $request->from)->first();
            $from_asset->amount=$from_asset->amount-$request->famount;
            $from_asset->save();
        }
        $exchange['reference']=$token;
        $exchange['user_id']=Auth::user()->id;
        $exchange['famount']=$request->famount;
        $exchange['tamount']=$request->tamount;
        $exchange['frome']=$request->from;
        $exchange['toe']=$request->to;
        $exchange['charge']=$request->from*$plan->exchange_charge/100;
        Exchange::create($exchange);
        return redirect()->route('user.exchangeasset')->with('success', 'Exchange was successful');      
    } 
        
    public function submittransferasset(Request $request)
    {
        $set=$data['set']=Settings::first();
        $user=$data['user']=User::find(Auth::user()->id);
        $kex=User::whereAcct_no($request->acct_no)->get();
        $amount=$request->amount+$request->amount*$set->transfer_charge/100;
        if(count($kex)>0){
            $stock=Asset::where('user_id', Auth::user()->id)->where('plan_id', $request->asset)->first();
            if($amount<$stock->amount || $amount==$stock->amount){
                $receiver=User::whereAcct_no($request->acct_no)->first();
                if($user->pin==$request->pin){
                    if($user->id!=$receiver->id){
                        $sav['sender_id']=Auth::user()->id;
                        $sav['receiver_id']=$receiver->id;
                        $sav['amount']=$request->amount;
                        $sav['asset']=$request->asset;
                        $sav['ref_id']=str_random(16);
                        Assettransfer::create($sav);
                        $stock->amount=$stock->amount-($request->amount+$request->amount*$set->transfer_charge/100);
                        $stock->save();     
                        $num_asset=Asset::where('user_id', $receiver->id)->where('plan_id', $request->asset)->count();
                        if($num_asset<1){
                            $savx['user_id']=$receiver->id;
                            $savx['plan_id']=$request->asset;
                            $savx['amount']=$request->amount;
                            Asset::create($savx);
                        }else{
                            $to_asset=Asset::where('user_id', $receiver->id)->where('plan_id', $request->asset)->first();
                            $to_asset->amount=$to_asset->amount+$request->amount;
                            $to_asset->save();            
                        }          
                        return back()->with('success', 'Transaction successful.');
                    }else{
                        return back()->with('alert', 'Invalid account number.');
                    }
                }else{
                    return back()->with('alert', 'Invalid pin.');
                }
            }else{
                return back()->with('alert', 'Insufficent balance.');
            }
        }else{
            return back()->with('alert', 'Invalid account number.');
        }
    } 

    public function updatemerchant(Request $request)
    {
        $data = Merchant::find($request->id);
        $in = Input::except('_token');
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = 'merchant_'.time().'.png';
            $location = 'asset/profile/' . $filename;
            Image::make($image)->save($location);
            $path = './asset/profile/';
            File::delete($path.$data->image);
            $in['image'] = $filename;
        }
        $res = $data->fill($in)->save();
        if ($res) {
            return back()->with('success', 'Saved Successfully!');
        } else {
            return back()->with('alert', 'Problem With updating merchant');
        }
    } 

    public function transferprocess()
    {
        $data['title'] = "Make payment";
        $data['id']= $id = request('id');
        $data['token']= $token = request('token');
        $data['ext']=Exttransfer::whereReference($token)->first();
        $data['merchant']=Merchant::whereMerchant_key($id)->first();
        return view('user.transfer_process', $data);
    }    
    
    public function Cancelmerchant()
    {
        $data['id']= $id = request('id');
        $ext=Exttransfer::whereReference($id)->first();
        $ext->status=2;
        $ext->save();
        return Redirect::away($ext->fail_url);
    }    
    
    public function Paymerchant()
    {
        $data['id']= $id = request('id');
        $set=Settings::first();
        $ext=Exttransfer::whereReference($id)->first();
        $debit=User::whereId($ext->user_id)->first();
        $amount=$ext->amount+($ext->amount*$set->merchant_charge/100);
        if($amount<$debit->balance || $amount==$debit->balance){
            $ext->status=1;
            $ext->save();
            $merchant=Merchant::whereMerchant_key($ext->merchant_key)->first();
            $up_mer=User::whereId($merchant->user_id)->first();
            $up_mer->balance=$ext->amount+$up_mer->balance;
            $up_mer->save();
            $debit->balance=$debit->balance-($ext->amount+($ext->amount*$set->merchant_charge/100));
            $debit->save();
            return Redirect::away($ext->notify_url);
        }else{
            return back()->with('alert', 'Account balance is insufficient');
        }     
    }

    public function submitpay(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $count=Merchant::whereMerchant_key($request->merchant_key)->whereStatus(1)->get();
        $token = str_random(16);
        if(count($count)>0){
            $data['merchant']=$merchant=Merchant::whereMerchant_key($request->merchant_key)->whereStatus(1)->first();
            if($merchant->user_id!=Auth::user()->id){
                $mer['reference']=$token;
                $mer['user_id']=Auth::user()->id;
                $mer['amount']=$request->amount;
                $mer['merchant_key']=$request->merchant_key;
                $mer['success_url']=$request->success_url;
                $mer['fail_url']=$request->fail_url;
                $mer['notify_url']=$request->notify_url;
                $mer['status']=0;
                Exttransfer::create($mer);
                return redirect()->route('transfer.process', ['id'=>$request->merchant_key, 'token'=>$token]);
            }else{
                return redirect()->route('user.dashboard')->with('alert', 'Access denied');
            }
        }else{
            return redirect()->route('user.dashboard')->with('alert', 'Invalid merchant key');
        }

    }

    public function submit2fa(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        $g=new \Sonata\GoogleAuthenticator\GoogleAuthenticator();
        $secret=$request->vv;
        if ($request->type==0) {
            $check=$g->checkcode($secret, $request->code, 3);
            if($check){
                $user->fa_status = 0;
                $user->googlefa_secret = null;
                $user->save();
                return back()->with('success', '2fa disabled.');
            }else{
                return back()->with('alert', 'Invalid code.');
            }
        }else{
            $check=$g->checkcode($secret, $request->code, 3);
            if($check){
                $user->fa_status = 1;
                $user->googlefa_secret = $request->vv;
                $user->save();
                return back()->with('success', '2fa enabled.');
            }else{
                return back()->with('alert', 'Invalid code.');
            }
        }
    }
}
