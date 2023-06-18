<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    public function Index(){
        $resumes = Resume::latest()->get();
        return view('admin.resume.index',compact('resumes'));
    }

    public function Add(){
        return view('admin.resume.add');
    }

    public function Store(Request $request){

             $cv = $request->file('resume');
             $name_gen=hexdec(uniqid()).'.'.$cv->getClientOriginalExtension();
            //  Image::make($image)->resize(166,110)->save('media/profile/'.$name_gen);
             $save_url = 'media/resume/'.$name_gen;

             Resume::insert([
                 'title' => $request->title,
                 'name' => $request->name,
                 'year' => $request->year,
                 'qualification' => $request->qualification,
                 'university' => $request->university,
                 'description' => $request->description,
                 'resume' => $request->resume,
                 'resume' => $save_url,
                 'created_at' => Carbon::now(),
             ]);

             $notification=array(
                 'message'=>'Resume  Upload Success',
                 'alert'=>'success'
             );
             return Redirect()->back()->with($notification);

    }

    //edit category-----------------------------------------------------
    public function Edit($id){
        $resume = Resume::findOrFail($id);
        return view('admin.resume.edit',compact('resume'));
    }

    //update Brand --------------------------------------
      public function Update(Request $request){ // zedi image update kora hoy tahoole ie ta
        $id = $request->id;
        $old_cv = $request->old_cv;

        if ($request->file('resume')) {
            $cv = $request->file('resume');
            $name_gen=hexdec(uniqid()).'.'.$cv->getClientOriginalExtension();
            // Image::make($image)->resize(166,110)->save('media/profile/'.$name_gen);
            
            $save_url = 'media/resume/'.$name_gen;

            Resume::findOrFail($id)->update([
                'title' => $request->title,
                'name' => $request->name,
                'year' => $request->year,
                'qualification' => $request->qualification,
                'university' => $request->university,
                'description' => $request->description,
                'resume' => $request->resume,
                'resume' => $save_url,
                'created_at' => Carbon::now(),
            ]);

            $notification=array(
                'message'=>'Resume Update Success',
                'alert'=>'success'
            );
            return Redirect()->route('resume')->with($notification);
        }else {
        Resume::findOrFail($id)->update([   // zodi image update na korea hoy tahole eitai thekbe

            'title' => $request->title,
            'name' => $request->name,
            'year' => $request->year,
            'qualification' => $request->qualification,
            'university' => $request->university,
            'description' => $request->description,
            'description' => $request->description,
            'created_at' => Carbon::now(),
        ]);

        $notification=array(
            'message'=>'Resume  Update Success',
            'alert'=>'success'
        );
        return Redirect()->route('resume')->with($notification);
        }

    }


       //delete brand
    public function delete($id){
        
        Resume::findOrFail($id)->delete();
        $notification=array(
            'message'=>'Resume  Delete Success',
            'alert'=>'success'
        );
    return Redirect()->back()->with($notification);
    }
}
