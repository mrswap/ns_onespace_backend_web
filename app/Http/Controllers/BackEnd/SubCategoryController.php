<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\SubCategory;

use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;


class SubCategoryController extends Controller
{
    public function index(Request $request)
    {
      $information['Categories'] = Category::query()->where('status',1)->orderByDesc('id')->get();
    $information['SubCategories'] = SubCategory::all();
    // also, get all the languages from db
    

    return view('backend.subcategory.index', $information);

    }

    public function getsubcategory(Request $request)
    {
        $language = Language::where('is_default', 1)->first();
        $SubCategories = SubCategory::where(['category_id'=> $request->id,'status'=> 1])->get();
        return Response::json($SubCategories, 200);
    }
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            
          ];
        //   $Category = Category::findOrFail($request->Category);
        //     $CategoryId = $Category->id;
        //     $rules['Category'] = 'required|integer';
          $message = [
            'language_id.required' => 'The language field is required.'
          ];
      
          $validator = Validator::make($request->all(), $rules, $message);
      
          if ($validator->fails()) {
            return Response::json([
              'errors' => $validator->getMessageBag()->toArray()
            ], 400);
          }
      
          SubCategory::query()->create($request->all());
      
          $request->session()->flash('success', 'New SubCategory added successfully!');
      
          return Response::json(['status' => 'success'], 200);
    }
    public function update(Request $request)
    {
        $rules = [
            'name' => 'required',
            
          ];
      
          $validator = Validator::make($request->all(), $rules);
      
          if ($validator->fails()) {
            return Response::json([
              'errors' => $validator->getMessageBag()->toArray()
            ], 400);
          }
      
          $SubCategory = SubCategory::query()->find($request->id);
      
          $SubCategory->update($request->all());
      
          $request->session()->flash('success', 'SubCategory updated successfully!');
      
          return Response::json(['status' => 'success'], 200);
    }
   

    public function changeStatus(Request $request, $id)
    {
        $SubCategory = SubCategory::query()->findOrFail($id);
        $SubCategory->status = $request->status;
        $SubCategory->save();

        Session::flash('success', 'SubCategory status update successfully!');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $SubCategory = SubCategory::findOrFail($id);

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

        $SubCategory->delete();

        return redirect()->back()->with('success', 'SubCategory delete successfully!');
    }
}
