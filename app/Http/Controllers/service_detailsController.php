<?php

namespace App\Http\Controllers;
use App\Models\service_details;

use Illuminate\Http\Request;

class service_detailsController extends Controller
{
    public function index(){
        $service_details = service_details::get();
        return view('service_details.index',compact('service_details'));
    } 
    public function create(){
        return view('service_details.create');
    }
    public function store(Request $request){
        //validation data
      $request->validate([
           'service_id'=>'required',
           'service_name'=>'required',
           //'image'=>'required|mimes:jpeg,jpg,png,gif|max:10000',
           'description'=>'required',
           'our_plan'=>'required',
            
         ]);

        //image upload

        $image = time() . '.' . $request->image->extension();
        $request->image->move(public_path('service_derails'), $image);
       
 
        $service_details = new service_details;
        $service_details->service_id = $request->service_id;
        $service_details->service_name = $request->service_name;
        $service_details->image = $image;
        $service_details->description = $request->description;
        $service_details->our_plan = $request->our_plan;

       
        $service_details->save();
        return back()->withSuccess('Service_details addedd successfully');

    }
    public function edit($id){
        $service_details = service_details::where('id',$id)->first();
        //dd($service_details->id);
        return view('service_details.edit',compact('service_details')); 
    }
    public function update(Request $request, $id){

        $request->validate([
            'service_id' => 'required',
            'service_name' => 'required',
            //'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
            'description' => 'required',
            'our_plan' => 'required',
        ]);
    
        $service_details = service_details::find($id);
    
        // Check if a new image is uploaded
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if (file_exists(public_path('service_details/' . $service_details->image))) {
                unlink(public_path('service_details/' . $service_details->image));
            }
    
            // Upload the new image
            $image = time() . '.' . $request->image->extension();
            $request->image->move(public_path('service_derails'), $image);
    
            // Update the image field in the database
            $service_details->image = $image;
        }
    
        // Update other fields
        $service_details->service_id = $request->service_id;
        $service_details->service_name = $request->service_name;
        $service_details->description = $request->description;
        $service_details->our_plan = $request->our_plan;
    
        // Save the changes
        $service_details->update();
    
        return back()->withSuccess('Service_details updated successfully!!');
    }
    
    public function destroy($id){
        $service_details = service_details::where('id',$id)->first();
        $service_details->delete();
        return back()->withSuccess('Service_details deleted successfully!!');

}
    
}
