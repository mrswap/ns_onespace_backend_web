<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
       // var_dump($categories);die;
        return view('backend.category.index', compact('categories'));
    }
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            
          ];
          $message = [
            'language_id.required' => 'The language field is required.'
          ];
      
          $validator = Validator::make($request->all(), $rules, $message);
      
          if ($validator->fails()) {
            return Response::json([
              'errors' => $validator->getMessageBag()->toArray()
            ], 400);
          }
      
          Category::query()->create($request->all());
      
          $request->session()->flash('success', 'New Category added successfully!');
      
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
      
          $Category = Category::query()->find($request->id);
      
          $Category->update($request->all());
      
          $request->session()->flash('success', 'Category updated successfully!');
      
          return Response::json(['status' => 'success'], 200);
    }
   

    public function changeStatus(Request $request, $id)
    {
        $Category = Category::query()->findOrFail($id);
        $Category->status = $request->status;
        $Category->save();

        Session::flash('success', 'Category status update successfully!');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $Category = Category::findOrFail($id);

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

        return redirect()->back()->with('success', 'Category delete successfully!');
    }
}
