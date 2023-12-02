<?php

namespace App\Http\Controllers;
use App\Models\customer;

use Illuminate\Http\Request;

class customerController extends Controller
{
    public function index(){
        $customers = customer::get();
        return view('customer.index',compact('customers'));
    } 
    public function create(){
        return view('customer.create');
    }
    public function store(Request $request){
        // Validation for required fields 
        $request->validate([
            'user_id'=>'required',
            'name' => 'required',
            'address' => 'required',
            'email' => 'required|email|unique:customers',
            'phn_number' => 'required',
            
           
        ]);
    
        
        $customer = new customer();
    
        // Populate customer object with data
        $customer->user_id = $request->user_id;
        $customer->name = $request->name;
        $customer->address = $request->address;
        $customer->email = $request->email;
        $customer->phn_number = $request->phn_number;
        
    
        // Save the customer instance
        $customer->save();
    
        // Redirect back with success message
        return back()->withSuccess('customer added successfully');
    }
//     public function edit($id){
//         $customer = customer::where('id',$id)->first();
//         return view('customer.edit',['customer'=> $customer]); 
//     }
    
//     public function update(Request $request, $id){
//         $request->validate([
//             'user_id'=>'required',
//             'name' => 'required',
//             'address' => 'required',
//             'email' => 'required|email|unique:customers',
//             'phn_number' => 'required',
            
//            // 'image' => 'image|mimes:jpeg,png,jpg,gif', // Adjust the allowed file types and size as needed
//         ]);
    
//         $customer = customer::find($id);
    
        
//         // Update other fields
//         $customer->user_id = $request->user_id;
//         $customer->name = $request->name;
//         $customer->address = $request->address;
//         $customer->email = $request->email;
//         $customer->phn_number = $request->phn_number;
    
//         // Save the changes
//         $customer->save();
    
//         return back()->withSuccess('Customer updated successfully!!');
//     }
    
    
//     public function destroy($id){
//         $customer = customer::where('id',$id)->first();
//         $customer->delete();
//         return back()->withSuccess('Customer deleted successfully!!');

// }
    public function view($id){
    $customer = customer::where('id',$id)->first();
    return view('customer.view',['customer'=> $customer]);
    } 
}
