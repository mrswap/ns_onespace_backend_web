<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;

use App\Models\PropertyImpresion;
use App\Models\Language;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportToExcel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\Property\City;
use App\Models\Property\Content;
use App\Models\Property\Country;
use App\Models\Property\FeaturedProperty;
use App\Models\Property\Property;
use App\Models\Vendor;

class PropertyImpresionController extends Controller
{
    public function getImpresion(Request $request, $id)
    {
        $information['languages'] = Language::all();
      if ($request->has('language')) {
          $language = Language::where('code', $request->language)->firstOrFail();
      } else {

          $language = Language::where('is_default', 1)->first();
      }
      $data['language'] = $language;
        $data['Inspections'] =  PropertyImpresion::with(['propertyContents' => function ($q) use ($language) {
            $q->where('language_id', $language->id);
        }])->where('property_id', $id)
        ->orderByDesc('id')
        ->get();
        
        $data['property'] =  Property::where('id', $id)
        ->first();
        
        // with(['property_contents' => function ($q) use ($language) {
        //     $q->where('language_id', $language->id);
        // }])->orderByDesc('id')->get();;
        return view('backend.PropertyImpresion.index',$data );
    }
    public function index(Request $request)
    {
        $data['langs'] = Language::all();
        if ($request->has('language')) {
            $language = Language::where('code', $request->language)->firstOrFail();
        } else {
            $language = Language::where('is_default', 1)->first();
        }

        $data['language'] = $language;

        $language_id = $language->id;
        $vendor_id = $title = null;
        if (request()->filled('vendor_id')) {
            $vendor_id = $request->vendor_id;
        }



        if (request()->filled('title')) {
            $title = $request->title;
        }

        $data['properties'] = Property::join('property_impression', 'properties.id', 'property_impression.property_id')
        ->join('property_contents', 'properties.id', 'property_contents.property_id')->with([
            'propertyContents' => function ($q) use ($language_id) {
                $q->where('language_id', $language_id);
            }, 'vendor', 'cityContent' => function ($q) use ($language) {
                $q->where('language_id', $language->id);
            }
        ])
            ->when($vendor_id, function ($query) use ($vendor_id) {
                if ($vendor_id == 'admin') {
                    return $query->where('vendor_id', '0');
                } else {
                    return $query->where('vendor_id', $vendor_id);
                }
            })
            ->when($title, function ($query) use ($title, $language_id) {
                return $query->where('property_contents.title', 'LIKE', '%' . $title . '%');
            })
            ->where('property_contents.language_id', $language_id)
            ->select('properties.*')
            ->orderBy('id', 'desc')
            ->paginate(10);


        $data['vendors'] = Vendor::where('id', '!=', 0)->get();

        // dd($data);
        
        return view('backend.PropertyImpresion.property', $data);
    }
    public function changeStatus(Request $request, $id)
    {
        $Category = PropertyImpresion::query()->findOrFail($id);
        $Category->seen_status = $request->status;
        $Category->save();

        Session::flash('success', 'Property Impresion status update successfully!');
        return redirect()->back();
    }
    public function approveStatus(Request $request,$id)
    {
        $property = PropertyImpresion::findOrFail($id);

        if ($request->contact_status == 1) {
            $property->update(['contact_status' => 1]);

            Session::flash('success', 'Approved Successfully!');
        } 

        return redirect()->back();
    }
    public function destroy($id)
    {
        $Category = PropertyImpresion::findOrFail($id);

        $Category->delete();

        return redirect()->back()->with('success', 'Property Assets delete successfully!');
    }
    public function update(Request $request)
    {
        // dd($request);
       
        PropertyImpresion::query()->findOrFail($request->id)
                    ->update([
                        // 'user_id' => $request['user_id'],
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
                Session::flash('success', "Property Impresion Update Successfully");
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
         public function exportEnquiryQuery(Request $request)
    {


$query = \DB::table('property_impression')
    ->Join('users', 'property_impression.user_id', '=', 'users.id')
    ->Join('properties', 'property_impression.property_id', '=', 'properties.id')
    ->Join('property_contents', 'properties.id', '=', 'property_contents.property_id')
    ->Join('vendors', 'vendors.id', '=', 'properties.vendor_id')
    ->select(
'vendors.name as vendor_name',
'property_contents.title',
'property_contents.address AS ProperAddress',      
'properties.type AS Propertytype',
'properties.purpose AS purpose',
'users.name AS Username',


'users.email AS Useremail',

'users.phone',

'property_impression.seen_status',
'property_impression.contact_status',
'property_impression.remark',
'property_impression.feedback',

'property_impression.created_at',
'property_impression.updated_at',

    )
    ;

        // Pass the query to the export class
        $columns = ['Vendor Name', 'Title', 'ProperAddress','Propertytype','Purpose','Username','Useremail','phone','seen_status','contact_status','remark','feedback','created_at','updated_at'];

        return Excel::download(new ExportToExcel($query, $columns), 'propertyImpression.xlsx');

    }
}
