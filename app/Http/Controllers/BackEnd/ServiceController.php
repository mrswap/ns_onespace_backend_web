<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Http\Helpers\UploadFile;
use App\Models\Service;
use App\Models\Service_content;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use DB;


class ServiceController extends Controller
{
    public function index(Request $request)
    {
      $information['languages'] = Language::all();
      if ($request->has('language')) {
          $language = Language::where('code', $request->language)->firstOrFail();
      } else {

          $language = Language::where('is_default', 1)->first();
      }
      $information['language'] = $language;
      $information['Services'] = Service::with(['Service_content' => function ($q) use ($language) {
          $q->where('language_id', $language->id);
      }])->orderByDesc('id')->get();
      // also, get all the languages from db
      $information['langs'] = Language::all();
     // var_dump($information['careerjobs']);
      return view('backend.service.index', $information);
       
    }
    public function store(Request $request)
    {
      $languages = Language::all();
      $rules = [];
      $message = [];
      foreach ($languages as $lan) {
          $rules[$lan->code . '_title'] = 'required';
          $message[$lan->code . '_title.required'] = 'The title field is required for ' . $lan->name . ' language.';
      }
      if ($request->hasFile('image')) {
        $imageName = UploadFile::store(public_path('assets/img/'), $request->file('image'));
      }
      
      $validator = Validator::make($request->all(), $rules, $message);


      if ($validator->fails()) {
          return Response::json([
              'errors' => $validator->getMessageBag()->toArray()
          ], 400);
      }
      DB::beginTransaction();
      try {
            
          $Service =  Service::create();
          //var_dump($Service);
          foreach ($languages as $lan) {
          //  
         // var_dump($imageName);
            $Servicecont =Service_content::create([
                  'title' => $request[$lan->code . '_title'],
                  'service_id' => $Service->id,
                  'language_id' => $lan->id,
                  'type'=> $request[$lan->code . '_type'],
                  'description'=> $request[$lan->code . '_description']
              ]);
              $Servicecont->update([
                'iconimage' => $request->hasFile('image') ? $imageName : ''
              ]);
           // var_dump($Servicecont);
          }
          DB::commit();
      } catch (\Exception $e) {
          DB::rollback();
          //var_dump($e);
          Session::flash('warning', 'Something went wrong!');
          
          return Response::json(['status' => 'success'], 200);
      }
      Session::flash('success', ' Service added successfully!');
      return Response::json(['status' => 'success'], 200);
    }

    public function edit($id)
  {
    $information['Service'] = Service::query()->findOrFail($id);

    // get all the languages from db
    $information['languages'] = Language::all();

    return view('backend.service.edit', $information);
  }

    public function update(Request $request)
    {
        $languages = Language::all();
        $rules = [];
        $message = [];
        foreach ($languages as $lan) {
            $rules[$lan->code . '_title'] = 'required';
            $message[$lan->code . '_title.required'] = 'The title field is required for ' . $lan->name . ' language.';
        }
        
        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            return Response::json([
                'errors' => $validator->getMessageBag()->toArray()
            ], 400);
        }
        
        
        foreach ($languages as $lan) {
            //var_dump($request);
            $name = $request[$lan->code . '_title'] ?? null;
            $description = $request[$lan->code . '_description'] ?? null;
            $type1 = $request[$lan->code . '_type'] ?? null;
           

            if (!empty($name)) {
                $Servicecontent = Service_content::where([['service_id', $request->id], ['language_id', $lan->id]])->first();
                if ($request->hasFile('image')) {
                    $imageName = UploadFile::update(public_path('assets/img/'), $request->file('image'), $Servicecontent->image);
                  }
                if (empty($Servicecontent)) {
                    $Servicecontent  = new  Service_content();
                    $Servicecontent->service_id = $request->id;
                    $Servicecontent->language_id = $lan->id;
                    $Servicecontent->type = $type1;
                    $Servicecontent->save();
                }

                $Servicecontent->update([
                    'title' => $name,
                    'description'=> $description,
                    'iconimage' => $request->hasFile('image') ? $imageName : $Servicecontent->iconimage,
                    
                ]);
                
            }
        }

        Session::flash('success', ' Service update successfully!');
        
          return Response::json(['status' => 'success'], 200);
    }
   

    public function changeStatus(Request $request, $id)
    {
        $Service = Service::query()->findOrFail($id);
        $Service->status = $request->status;
        $Service->save();

        Session::flash('success', ' Service status update successfully!');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $Service = Service::findOrFail($id);

        $Service->delete();
        $Service->Service_content()->delete(); 

        return redirect()->back()->with('success', 'Category delete successfully!');
    }
}
