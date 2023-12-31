<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;

class PackageController extends Controller
{
    public function index()
    {
      $packages= Package::all();
      return view('admin.pages.package.manage',compact('packages'));
    }
    public function StorePackage(Request $request)
    {
     // dd($request->all());
        $request->validate([
            'package_name' => 'required|unique:packages|max:255',
            'price' => 'required|numeric',
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Image validation with allowed file types and maximum size of 2MB (adjust as needed)
            'product_pv' => 'required|numeric',
            'product_mrp' => 'required|numeric',
            'status' => 'required|string|in:Active,Inactive',
        ]);
      $package_name = $request->package_name;
      $price = $request->price;
      //$no_of_pairs=$request->no_of_pairs;
      //$return_percentage=$request->return_percentage;
      //$duration=$request->duration;
      //$except_day = $request->except_day;
      $imagePath = '';
      if ($request->hasFile('product_image')) {
            $imagePath = $request->file('product_image')->store('product_images', 'public');
            //$validatedData['product_image'] = $imagePath;
        }
        $product_pv = $request->product_pv;
        $product_mrp = $request->product_mrp;

      $status=$request->status;
      $package = new Package();
      $package->package_name = $package_name;
      $package->price =$price;
      $package->product_image =$imagePath;
      $package->product_pv = $product_pv;
      $package->product_mrp = $product_mrp;

    //   $package->no_of_pairs=$no_of_pairs;
    //   $package->return_percentage=$return_percentage;
    //   $package->duration=$duration;
    //   $package->except_day=$except_day;
      $package->status= $status;
      //dd($package);
      $package->save();
      return back()->with('Package_added','Package has been added successfully!');

    }
    public function UpdatePackage(Request $request)
    {
      //dd($request);
       $request->validate([
            'package_name' => 'required|unique:packages|max:255',
            'price' => 'required|numeric',
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Image validation with allowed file types and maximum size of 2MB (adjust as needed)
            'product_pv' => 'required|numeric',
            'product_mrp' => 'required|numeric',
            'status' => 'required|string|in:Active,Inactive',
        ]);

    //   $package_name = $request->package_name;
    //   $price = $request->price;
    //   $no_of_pairs=$request->no_of_pairs;
    //   $return_percentage=$request->return_percentage;
    //   $duration=$request->duration;
    //   $except_day = $request->except_day;
    //   $status=$request->status;

        $package_name = $request->package_name;
      $price = $request->price;
      //$no_of_pairs=$request->no_of_pairs;
      //$return_percentage=$request->return_percentage;
      //$duration=$request->duration;
      //$except_day = $request->except_day;
      $imagePath = '';
      if ($request->hasFile('product_image')) {
            $imagePath = $request->file('product_image')->store('product_images', 'public');
            //$validatedData['product_image'] = $imagePath;
        }
        $product_pv = $request->product_pv;
        $product_mrp = $request->product_mrp;

      $status=$request->status;
      
      $package = Package::find($request->id);
      $package->package_name = $package_name;
      $package->price =$price;
      $package->product_image =$imagePath;
      $package->product_pv = $product_pv;
      $package->product_mrp = $product_mrp;
      $package->save();

        return back()->with('package_updated','Package has been updated successfully!');
    }
    public function Delete($id)
    {
      $package = Package::find($id);

      $package->delete();

    return back()->with('pacakge_deleted','Blog has been deleted successfully!');
    }
}
