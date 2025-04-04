<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;

use App\Models\ContactUs;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\Property\City;
use App\Models\Property\Content;
use App\Models\Property\Country;



class ContactUsController extends Controller
{
    
    public function index(Request $request)
    {
        $data['langs'] = Language::all();
        if ($request->has('language')) {
            $language = Language::where('code', $request->language)->firstOrFail();
        } else {
            $language = Language::where('is_default', 1)->first();
        }

        $data['language'] = $language;

        $information['languages'] = Language::all();
      if ($request->has('language')) {
          $language = Language::where('code', $request->language)->firstOrFail();
      } else {

          $language = Language::where('is_default', 1)->first();
      }
      $data['language'] = $language;
        $data['Inspections'] =  ContactUs::orderByDesc('id')
        ->get();
       
        
        return view('backend.ContactUs.index',$data );
    }
    public function changeStatus(Request $request, $id)
    {
        $Category = ContactUs::query()->findOrFail($id);
        $Category->seen_status = $request->status;
        $Category->save();

        Session::flash('success', 'Contact status update successfully!');
        return redirect()->back();
    }
    public function approveStatus(Request $request,$id)
    {
        $property = ContactUs::findOrFail($id);

        if ($request->contact_status == 1) {
            $property->update(['contact_status' => 1]);

            Session::flash('success', 'Approved Successfully!');
        } 

        return redirect()->back();
    }
    public function destroy($id)
    {
        $Category = ContactUs::findOrFail($id);

       
        $Category->delete();

        return redirect()->back()->with('success', 'Contact delete successfully!');
    }
    public function update(Request $request)
    {
        //dd($request);
       
        ContactUs::query()->findOrFail($request->id)
                    ->update([
                        
                      'remark' => $request['remark'],
                      'feedback' => $request['feedback'],
                    //   'updateDate'=> $request['updateDate'],
                      
                    ]);

                    // \DB::table('inspection_history')->insert(
                    //     ['name' => $request['name'], 
                    //     'inspection_id' => $request->id,
                    //     'remark' => $request['remark'],
                    //     'verificationDate' => $request['verificationDate'],
                    //     'nextverificationDate' => $request['nextverificationDate'],                        
                    //     ]
                    // );
                Session::flash('success', "Contact Update Successfully");
                return Response::json(['status' => 'success'], 200);
         
    }


    // public function history(Request $request, $id)
    // {
    //     //dd($request);
    //     $data['langs'] = Language::all();
    //     if ($request->has('language')) {
    //         $language = Language::where('code', $request->language)->firstOrFail();
    //     } else {
    //         $language = Language::where('is_default', 1)->first();
    //     }

    //     $data['language'] = $language;

    //     $language_id = $language->id;

    //     $data['Inspectionshistory'] =   \DB::table('inspection_history')->where('inspection_id', $id)->get();

    //     $data['Inspections'] =  PropertyAssets::with(['propertyContents' => function ($q) use ($language) {
    //         $q->where('language_id', $language->id);
    //      }])->where('id', $id)
    //      ->first();
        
        
        
    //     // with(['property_contents' => function ($q) use ($language) {
    //     //     $q->where('language_id', $language->id);
    //     // }])->orderByDesc('id')->get();;
    //  //var_dump($data);die;
    //     return view('backend.Inspection.History',$data );
       
    // }
}
