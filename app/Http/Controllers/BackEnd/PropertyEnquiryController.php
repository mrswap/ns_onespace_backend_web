<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;

use App\Models\PropertyEnquiry;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportToExcel;
use App\Models\Language;
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

class PropertyEnquiryController extends Controller
{
    public function getEnquiry(Request $request, $id)
    {
        $information['languages'] = Language::all();
      if ($request->has('language')) {
          $language = Language::where('code', $request->language)->firstOrFail();
      } else {

          $language = Language::where('is_default', 1)->first();
      }
      $data['language'] = $language;
        $data['Inspections'] =  PropertyEnquiry::with(['propertyContents' => function ($q) use ($language) {
            $q->where('language_id', $language->id);
        }])->where('property_id', $id)
        ->orderByDesc('id')
        ->get();
        
        $data['property'] =  Property::where('id', $id)
        ->first();
        
        // with(['property_contents' => function ($q) use ($language) {
        //     $q->where('language_id', $language->id);
        // }])->orderByDesc('id')->get();;
     //var_dump($Inspections);die;
        return view('backend.PropertyEnquiry.index',$data );
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

        $data['properties'] = Property::
        join('property_enquiry', 'properties.id', 'property_enquiry.property_id')
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
            ->distinct()
            ->orderBy('id', 'desc')
            ->paginate(10);


        $data['vendors'] = Vendor::where('id', '!=', 0)->get();

        
        
        return view('backend.PropertyEnquiry.property', $data);
    }
    public function changeStatus(Request $request, $id)
    {
        $Category = PropertyEnquiry::query()->findOrFail($id);
        $Category->seen_status = $request->status;
        $Category->save();

        Session::flash('success', 'Property Enquiry status update successfully!');
        return redirect()->back();
    }
    public function approveStatus(Request $request,$id)
    {
        $property = PropertyEnquiry::findOrFail($id);

        if ($request->contact_status == 1) {
            $property->update(['contact_status' => 1]);

            Session::flash('success', 'Approved Successfully!');
        } 

        return redirect()->back();
    }
    public function destroy($id)
    {
        $Category = PropertyEnquiry::findOrFail($id);

        // //agent infos 
        // $agent_infos = $agent->agent_infos()->get();
        // foreach ($agent_infos as $info) {
        //     $info->delete();
        // }
        // // all properties delete 
        // $properties = $agent->properties()->get();
        // foreach ($properties as $property) {

        //     if (!is_null($property->featured_image)) {
        //         @unlink(public_path('assets/img/property/featureds/' . $property->featured_image));
        //     }

        //     if (!is_null($property->floor_planning_image)) {
        //         @unlink(public_path('assets/img/property/plannings/' . $property->floor_planning_image));
        //     }
        //     if (!is_null($property->video_image)) {
        //         @unlink(public_path('assets/img/property/video/' . $property->video_image));
        //     }
        //     $property->propertyContents()->delete();

        //     $galleryImages = $property->galleryImages()->get();
        //     foreach ($galleryImages as $image) {
        //         @unlink(public_path('assets/img/property/slider-images/' . $image->image));
        //         $image->delete();
        //     }

        //     $property->proertyAmenities()->delete();

        //     $specifications = $property->specifications()->get();
        //     foreach ($specifications as  $specification) {
        //         $specification->specificationContents()->delete();
        //     }

        //     $featuredProperties = $property->featuredProperties()->get();

        //     foreach ($featuredProperties as $featured) {
        //         if ($featured->attachment != null) {
        //             @unlink(public_path('assets/front/img/feature/attachment/' . $featured->attachment));
        //         }
        //         $featured->delete();
        //     }
        //     // delete wishlists
        //     $property->wishlists()->delete();

        //     $property->delete();
        // }
        // // all property message delete 
        // $agent->property_messages()->delete();

        // // all project delete 
        // $projects = $agent->projects()->get();
        // foreach ($projects as $project) {
        //     @unlink(public_path('assets/img/project/featured/' . $project->featured_image));
        //     $project->proejctContents()->delete();

        //     $projectGalleryImages = $project->galleryImages()->get();
        //     foreach ($projectGalleryImages as $image) {
        //         @unlink(public_path('assets/img/project/gallery-images/' . $image->image));
        //         $image->delete();
        //     }

        //     $projectFloorplanImages = $project->floorplanImages()->get();
        //     foreach ($projectFloorplanImages as $image) {
        //         @unlink(public_path('assets/img/project/floor-paln-images/' . $image->image));
        //         $image->delete();
        //     }

        //     $specifications = $project->specifications()->get();
        //     foreach ($specifications as  $specification) {
        //         $specification->specificationContents()->delete();
        //     }

        //     $projectTypes = $project->projectTypes()->get();
        //     foreach ($projectTypes as $type) {
        //         $type->projectTypeContnents()->delete();
        //         $type->delete();
        //     }

        //     $project->delete();
        // }

        $Category->delete();

        return redirect()->back()->with('success', 'Property Assets delete successfully!');
    }
    public function update(Request $request)
    {
        //dd($request);
       
        PropertyEnquiry::query()->findOrFail($request->id)
                    ->update([
                        'user_id' => $request['user_id'],
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
                Session::flash('success', "Property Enquiry Update Successfully");
                return Response::json(['status' => 'success'], 200);
         
    }


     public function exportEnquiryQuery(Request $request)
    {


$query = \DB::table('property_enquiry')
    ->Join('users', 'property_enquiry.user_id', '=', 'users.id')
    ->Join('properties', 'property_enquiry.property_id', '=', 'properties.id')
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
'property_enquiry.user_type',
'property_enquiry.phone',
'property_enquiry.message',
'property_enquiry.enquiry_mode',
'property_enquiry.seen_status',
'property_enquiry.contact_status',
'property_enquiry.remark',
'property_enquiry.feedback',

'property_enquiry.created_at',
'property_enquiry.updated_at',

    )
    ;

        // Pass the query to the export class
        $columns = ['Vendor Name', 'Title', 'ProperAddress','Propertytype','Purpose','Username','Useremail','user_type','phone','message','enquiry_mode','seen_status','contact_status','remark','feedback','created_at','updated_at'];

        return Excel::download(new ExportToExcel($query, $columns), 'PropertyEnquiry.xlsx');

    }
}
