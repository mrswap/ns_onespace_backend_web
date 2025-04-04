<?php

namespace App\Http\Controllers\BackEnd;
use App\Exports\ExportToExcel;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\PropertyAssets;
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

class InspectionController extends Controller
{
    public function getAssets(Request $request, $id)
    {
        $information['languages'] = Language::all();
      if ($request->has('language')) {
          $language = Language::where('code', $request->language)->firstOrFail();
      } else {

          $language = Language::where('is_default', 1)->first();
      }
      $data['language'] = $language;
        $data['Inspections'] =  PropertyAssets::with(['propertyContents' => function ($q) use ($language) {
            $q->where('language_id', $language->id);
        }])->where('property_id', $id)
        ->orderByDesc('id')
        ->get();
        
        
        
        // with(['property_contents' => function ($q) use ($language) {
        //     $q->where('language_id', $language->id);
        // }])->orderByDesc('id')->get();;
     //var_dump($Inspections);die;
        return view('backend.Inspection.index',$data );
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

        $data['properties'] = Property::join('property_contents', 'properties.id', 'property_contents.property_id')->with([
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

        
        
        return view('backend.Inspection.property', $data);
    }
    public function changeStatus(Request $request, $id)
    {
        $Category = PropertyAssets::query()->findOrFail($id);
        $Category->status = $request->status;
        $Category->save();

        Session::flash('success', 'Inspection status update successfully!');
        return redirect()->back();
    }
    public function approveStatus(Request $request,$id)
    {
        $property = PropertyAssets::findOrFail($id);

        if ($request->approved == 1) {
            $property->update(['approved' => 1]);

            Session::flash('success', 'Approved Successfully!');
        } elseif($request->approved == 2) {
            $property->update(['approved' => 2]);

            Session::flash('success', 'Reject Successfully!');
        }
        else if($request->approved == 3){
            $property->update(['approved' => 3]);

            Session::flash('success', 'Correction Successfully!');
        }

        return redirect()->back();
    }
    public function destroy($id)
    {
        $Category = PropertyAssets::findOrFail($id);

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
       
                PropertyAssets::query()->findOrFail($request->id)
                    ->update([
                        'name' => $request['name'],
                      'remark' => $request['remark'],
                      'verificationDate' => $request['verificationDate'],
                      'nextverificationDate'=> $request['nextverificationDate'],
                      
                    ]);

                    \DB::table('inspection_history')->insert(
                        ['name' => $request['name'], 
                        'inspection_id' => $request->id,
                        'remark' => $request['remark'],
                        'verificationDate' => $request['verificationDate'],
                        'nextverificationDate' => $request['nextverificationDate'],                        
                        ]
                    );
                Session::flash('success', "Inspection Update Successfully");
                return Response::json(['status' => 'success'], 200);
         
    }


    public function history(Request $request, $id)
    {
        //dd($request);
        $data['langs'] = Language::all();
        if ($request->has('language')) {
            $language = Language::where('code', $request->language)->firstOrFail();
        } else {
            $language = Language::where('is_default', 1)->first();
        }

        $data['language'] = $language;

        $language_id = $language->id;

        $data['Inspectionshistory'] =   \DB::table('inspection_history')->where('inspection_id', $id)->get();

        $data['Inspections'] =  PropertyAssets::with(['propertyContents' => function ($q) use ($language) {
            $q->where('language_id', $language->id);
         }])->where('id', $id)
         ->first();
        
        
        
        // with(['property_contents' => function ($q) use ($language) {
        //     $q->where('language_id', $language->id);
        // }])->orderByDesc('id')->get();;
     //var_dump($data);die;
        return view('backend.Inspection.History',$data );
       
    }

    public function exportCustomQuery(Request $request)
    {


$query = \DB::table('property_assets')
    ->Join('category', 'property_assets.category', '=', 'category.id')
    ->Join('sub_categories', 'property_assets.subcategory', '=', 'sub_categories.id')
    ->Join('properties', 'property_assets.property_id', '=', 'properties.id')
    ->Join('property_contents', 'properties.id', '=', 'property_contents.property_id')
    ->Join('vendors', 'vendors.id', '=', 'properties.vendor_id')
    ->select(
'vendors.name as vendor_name',
'property_contents.title',
'property_contents.address',      
'properties.type AS type',
'properties.purpose AS purpose',
'property_assets.name AS name',
'category.name AS category_name',
'sub_categories.name AS sub_categories_name',
'property_assets.quantity AS quantity',
'property_assets.approved',
'property_assets.remark',
'property_assets.verificationDate',
'property_assets.nextverificationDate',

    )
    ;

        // Pass the query to the export class
        $columns = ['Vendor Name', 'Title', 'Address','Type','Purpose','Name','Category','Sub Category','Quantity','Approved','Remark','Verification Date','Next Verification Date'];

        return Excel::download(new ExportToExcel($query, $columns), 'inspection.xlsx');

    }
}