<?php

namespace App\Http\Controllers;

use App\Models\worker;
use Illuminate\Http\Request;
class workerController extends Controller
{
     public function index(){
        $workers = worker::get();
        return view('worker.index',compact('workers'));
    } 
    public function create(){
        return view('worker.create');
    }
    public function store(Request $request){
        // Validation for required fields and image upload
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phn_number' => 'required',
            'category_id'=>'required',
            'service_id'=>'required',
            'status'=>'required',
           // 'image' => 'required|image|mimes:jpeg,png,jpg,gif', // Adjust the allowed file types and size as needed
        ]);
    
        // Image upload
        $image = time() . '.' . $request->image->extension();
        $request->image->move(public_path('worker'), $image);
    
        // Create a new worker instance
        $worker = new Worker();
    
        // Populate worker object with data
        $worker->name = $request->name;
        $worker->image = $image;
        $worker->email = $request->email;
        $worker->password = $request->password;
        $worker->phn_number = $request->phn_number;
        $worker->category_id = $request->category_id;
        $worker->service_id = $request->service_id;
        $worker->status = $request->status;
    
        // Save the worker instance
        $worker->save();
    
        // Redirect back with success message
        return back()->withSuccess('Worker added successfully');
    }
    public function edit($id){
        $worker = worker::where('id',$id)->first();
        return view('worker.edit',['worker'=> $worker]); 
    }
    
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phn_number' => 'required',
            'category_id'=>'required',
            'service_id'=>'required',
            'status'=>'required',
           // 'image' => 'image|mimes:jpeg,png,jpg,gif', // Adjust the allowed file types and size as needed
        ]);
    
        $worker = worker::find($id);
    
        // Check if a new image is uploaded
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if (file_exists(public_path('worker/' . $worker->image))) {
                unlink(public_path('worker/' . $worker->image));
            }
    
             // Upload the new image
             $image = time() . '.' . $request->image->extension();
             $request->image->move(public_path('worker'), $image);
    
            // Update the image field in the database
            $worker->image = $image;
        }
    
        // Update other fields
        $worker->name = $request->name;
        $worker->email = $request->email;
        $worker->password = $request->password;
        $worker->phn_number = $request->phn_number;
        $worker->category_id = $request->category_id;
        $worker->service_id = $request->service_id;
        $worker->status = $request->status;
    
        // Save the changes
        $worker->save();
    
        return back()->withSuccess('Worker updated successfully!!');
    }
    
    
    public function destroy($id){
        $worker = worker::where('id',$id)->first();
        $worker->delete();
        return back()->withSuccess('Worker deleted successfully!!');

}
    public function view($id){
    $worker = worker::where('id',$id)->first();
    return view('worker.view',['worker'=> $worker]);
    }
}