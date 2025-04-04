<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;

use App\Models\CareersJob;
use App\Models\CareersJob_content;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use DB;


class JobController extends Controller
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
        $information['careerjobs'] = CareersJob::with([
            'careersjob_Content' => function ($q) use ($language) {
                $q->where('language_id', $language->id);
            }
        ])->orderByDesc('id')->get();
        // also, get all the languages from db
        $information['langs'] = Language::all();
        // var_dump($information['careerjobs']);
        
        return view('backend.careerjobs.index', $information);

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

        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            return Response::json([
                'errors' => $validator->getMessageBag()->toArray()
            ], 400);
        }
        DB::beginTransaction();
        try {

            $CareersJob = CareersJob::create();

            foreach ($languages as $lan) {
                //  var_dump($lan->code);
                $CareersJobcont = CareersJob_content::create([
                    'title' => $request[$lan->code . '_title'],
                    'jobs_id' => $CareersJob->id,
                    'language_id' => $lan->id,
                    'description' => $request[$lan->code . '_description']
                ]);

                //  var_dump($CareersJobcont);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            //var_dump($e);
            Session::flash('warning', 'Something went wrong!');
            die;
            return Response::json(['status' => 'success'], 200);
        }
        Session::flash('success', 'Careers Job added successfully!');
        return Response::json(['status' => 'success'], 200);
    }

    public function edit($id)
    {
        $information['careerjob'] = CareersJob::query()->findOrFail($id);

        // get all the languages from db
        $information['languages'] = Language::all();
        

        return view('backend.careerjobs.edit', $information);
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

            $name = $request[$lan->code . '_title'] ?? null;
            $description = $request[$lan->code . '_description'] ?? null;


            if (!empty($name)) {
                $careerContent = CareersJob_content::where([['jobs_id', $request->id], ['language_id', $lan->id]])->first();
                if (empty($careerContent)) {
                    $careerContent = new CareersJob_content();
                    $careerContent->jobs_id = $request->id;
                    $careerContent->language_id = $lan->id;
                    // $careerContent->language_id = $lan->id;
                    $careerContent->save();
                }

                $careerContent->update([
                    'title' => $name,
                    'description' => $description,
                ]);
            }
        }

        Session::flash('success', 'Careers Job update successfully!');

        return Response::json(['status' => 'success'], 200);
    }


    public function changeStatus(Request $request, $id)
    {
        $Category = CareersJob::query()->findOrFail($id);
        $Category->status = $request->status;
        $Category->save();

        Session::flash('success', 'Careers Job status update successfully!');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $CareersJob = CareersJob::findOrFail($id);

        $CareersJob->delete();
        $CareersJob->CareersJob_content()->delete();

        return redirect()->back()->with('success', 'Category delete successfully!');
    }
}