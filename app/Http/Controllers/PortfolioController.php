<?php

namespace App\Http\Controllers;

use App\Models\MultiImg;
use App\Models\Portfolio;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function Index(){
        $portfolios = Portfolio::latest()->get();
        return view('admin.portfolio.index',compact('portfolios'));
    }

    public function Add(){
        return view('admin.portfolio.add');
    }

    public function Store(Request $request){
        $request->validate([
             'name' => 'required',
             'designation' => 'required',
             'profile' => 'required',
             'github' => 'required',
             'linkedin' => 'required',
             'facebook' => 'required',
             'get_in_touch' => 'required',
             'location' => 'required',
             'email' => 'required',
             'number' => 'required',
             'Freelance' => 'required',
             'multi_image' => 'required'
        ],[
            'name.required' => 'Please Input Your Full Name',
            'designation.required' => 'Please Input Your Designation',
            'profile.required' => 'Please Input Your profile',
            'github.required' => 'Please Input Your github',
            'linkedin.required' => 'Please Input Your linkedin',
            'facebook.required' => 'Please Input Your facebook',
            'get_in_touch.required' => 'Please Input Your get_in_touch',
            'location.required' => 'Please Input Your location',
            'email.required' => 'Please Input Your email',
            'number.required' => 'Please Input Your number',
            'Freelance.required' => 'Please Input Your Freelance',
            'multi_image.required' => 'Please Input Your multi_image'
        ]);

             $image = $request->file('profile');
             $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            //  Image::make($image)->resize(166,110)->save('media/profile/'.$name_gen);
             Image::make($image)->save('media/profile/'.$name_gen);
             $save_url = 'media/profile/'.$name_gen;


             $images = $request->file('multi_img');
             foreach ($images as $img) {
                 $make_name=hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
                 Image::make($img)->resize(917,1000)->save('media/multi-image/'.$make_name);
                 $multi_url = 'media/multi-image/'.$make_name;

                 MultiImg::insert([
                     'product_id' => $product_id,
                     'multi_image' => $multi_url,
                     'created_at' => Carbon::now(),
                 ]);
             }

        // $files = [];
        // if($request->hasfile('filenames'))
        //  {
        //     foreach($request->file('filenames') as $file)
        //     {
        //         $name = time().rand(1,50).'.'.$file->extension();
        //         $file->move(public_path('files'), $name);
        //         $files[] = $name;
        //     }
        //  }

         $file= new File();
         $file->filenames = $files;
         $file->save();


            $product_id = Portfolio::insertGetId([
                 'name' => $request->name,
                 'designation' => $request->designation,
                 'profile' => $request->profile,
                 'github' => $request->github,
                 'linkedin' => $request->linkedin,
                 'facebook' => $request->facebook,
                 'get_in_touch' => $request->get_in_touch,
                 'location' => $request->location,
                 'email' => $request->email,
                 'number' => $request->number,
                 'Freelance' => $request->Freelance,
                 'profile' => $save_url,
                 'created_at' => Carbon::now(),
             ]);



             $notification=array(
                 'message'=>'Profile  Upload Success',
                 'alert'=>'success'
             );
             return Redirect()->back()->with($notification);

    }

    //edit category-----------------------------------------------------
    public function Edit($id){
        $profile = Portfolio::findOrFail($id);
        return view('admin.portfolio.edit',compact('profile'));
    }

    //update Brand --------------------------------------
      public function Update(Request $request){ // zedi image update kora hoy tahoole ie ta
        $id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('profile')) {
            unlink($old_img);
            $image = $request->file('profile');
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            // Image::make($image)->resize(166,110)->save('media/profile/'.$name_gen);
            Image::make($image)->save('media/profile/'.$name_gen);
            $save_url = 'media/profile/'.$name_gen;

            Portfolio::findOrFail($id)->update([
                'name' => $request->name,
                'designation' => $request->designation,
                'profile' => $request->profile,
                'github' => $request->github,
                'linkedin' => $request->linkedin,
                'facebook' => $request->facebook,
                'get_in_touch' => $request->get_in_touch,
                'location' => $request->location,
                'email' => $request->email,
                'number' => $request->number,
                'Freelance' => $request->Freelance,
                'profile' => $save_url,
                'created_at' => Carbon::now(),
            ]);

            $notification=array(
                'message'=>'Profile Update Success',
                'alert'=>'success'
            );
            return Redirect()->route('profile')->with($notification);
        }else {
        Portfolio::findOrFail($id)->update([   // zodi image update na korea hoy tahole eitai thekbe
            'name' => $request->name,
            'designation' => $request->designation,
            'profile' => $request->profile,
            'github' => $request->github,
            'linkedin' => $request->linkedin,
            'facebook' => $request->facebook,
            'get_in_touch' => $request->get_in_touch,
            'location' => $request->location,
            'email' => $request->email,
            'number' => $request->number,
            'Freelance' => $request->Freelance,
            'created_at' => Carbon::now(),
        ]);

        $notification=array(
            'message'=>'Profile  Update Success',
            'alert'=>'success'
        );
        return Redirect()->route('profile')->with($notification);
        }

    }


       //delete brand
    public function delete($id){
        $profile = Portfolio::findOrFail($id);
        $img = $profile->profile;
        unlink($img);
        Portfolio::findOrFail($id)->delete();
        $notification=array(
            'message'=>'Profile  Delete Success',
            'alert'=>'success'
        );
    return Redirect()->back()->with($notification);
    }
}
