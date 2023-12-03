<?php

namespace App\Http\Controllers;
use App\Models\order;
use Illuminate\Http\Request;

class orderController extends Controller

   
    {
        public function index(){
            $orders = order::get();
            return view('order.index',compact('orders'));
        } 
        public function create(){
            return view('order.create');
        }
        public function store(Request $request){
            //validation data
          $request->validate([
               'address'=>'required',
               'phn_number'=>'required',
               'service_id'=>'required',
               'worker_id'=>'required',
               'admin_id'=>'required',
               
             
                
             ]);
    
            
           
     
            $order = new order;
            $order->address = $request->address;
            $order->phn_number = $request->phn_number;
            $order->service_name = $request->service_name;
            $order->description = $request->description;
            $order->our_plan = $request->our_plan;
    
           
            $order->save();
            return back()->withSuccess('Order addedd successfully');
    
        }
      
      
        
          
        
        public function destroy($id){
            $order = order::where('id',$id)->first();
            $order->delete();
            return back()->withSuccess('Order deleted successfully!!');
    
    }
    public function view($id){
        $order = order::where('id',$id)->first();
        return view('order.view',['Order'=> $order]);
        }
    }
    

