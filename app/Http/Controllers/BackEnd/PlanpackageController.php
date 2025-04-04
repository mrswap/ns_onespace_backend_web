<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;

use App\Models\BasicSettings\Basic;
use App\Models\Language;
use App\Models\Membership;
use App\Models\Planpackages;
use App\Models\Vendor;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;

class PlanpackageController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index(Request $request)
    {
        if (session()->has('lang')) {
            $currentLang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currentLang = Language::where('is_default', 1)->first();
        }
        $data['language'] =  $currentLang;
        $search = $request->search;
        $data['bex'] = $currentLang->basic_extended;
        $data['planpackages'] = Planpackages::query()->when($search, function ($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%');
        })->orderBy('created_at', 'DESC')->get();
        return view('backend.Planpackage.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     */
    public function store(Request $request)
    {
        try {

            return DB::transaction(function () use ($request) {
                Planpackages::create([
                    'title' => $request['title'],
                  'price' => $request['price'],
                  'description' => $request['description'],
                  'polices'=> json_encode($request['policies']),
                  'status'=> $request['status']
                ]);
                Session::flash('success', "Plan Package Created Successfully");
                return Response::json(['status' => 'success'], 200);
            });
        } catch (\Throwable $e) {
            return $e;
        }
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return
     */
    public function edit($id)
    {
        if (session()->has('lang')) {
            $currentLang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currentLang = Language::where('is_default', 1)->first();
        }
        $data['language'] =  $currentLang;
        $data['bex'] = $currentLang->basic_extended;
        $data['Planpackage'] = Planpackages::query()->findOrFail($id);
        return view("backend.Planpackage.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     */
    public function update(Request $request)
    {
        try {
            
           
            return DB::transaction(function () use ($request) {
                Planpackages::query()->findOrFail($request->Planpackage_id)
                    ->update([
                        'title' => $request['title'],
                      'price' => $request['price'],
                      'description' => $request['description'],
                      'polices'=> json_encode($request['policies']),
                      'status'=> $request['status']
                    ]);
                Session::flash('success', "Plan package Update Successfully");
                return Response::json(['status' => 'success'], 200);
            });
        } catch (\Throwable $e) {
            return $e;
        }
    }

    public function featured(Request $request)
    {
        Planpackages::query()->findOrFail($request->package_id)
            ->update([
                'is_featured' => $request->featured,
            ]);
        Session::flash('success', "Plan package Update Successfully");
        return redirect()->back();
    }


    public function delete(Request $request)
    {
        try {
            return DB::transaction(function () use ($request) {
                $Planpackage = Planpackages::query()->findOrFail($request->Planpackage_id);
                // if ($Planpackage->memberships()->count() > 0) {
                //     foreach ($Planpackage->memberships as $key => $membership) {
                //         @unlink(public_path('assets/front/img/membership/receipt/') . $membership->receipt);
                //         $membership->delete();
                //     }
                // }
                // $admin_membership = Membership::where('vendor_id', 0)->first();
                // if ($admin_membership) {
                //     if ($admin_membership->package_id == $package->id) {
                //         $lifetime_package = Package::where('term', 'lifetime')->first();
                //         if (!$lifetime_package) {
                //             $lifetime_package = Package::first();
                //         }
                //         $admin_membership->package_id = $lifetime_package->id;
                //         $admin_membership->save();
                //     }
                // }
                $Planpackage->delete();
                Session::flash('success', 'Plan package deleted successfully!');
                return back();
            });
        } catch (\Throwable $e) {
            return $e;
        }
    }

    public function bulkDelete(Request $request)
    {
        try {
            return DB::transaction(function () use ($request) {
                $ids = $request->ids;
                foreach ($ids as $id) {
                    $Planpackage = Planpackages::query()->findOrFail($id);
                    // if ($Planpackage->memberships()->count() > 0) {
                    //     foreach ($package->memberships as $key => $membership) {
                    //         @unlink(public_path('assets/front/img/membership/receipt/') . $membership->receipt);
                    //         $membership->delete();
                    //     }
                    // }

                    $package->delete();
                }
                Session::flash('success', 'Plan package bulk deletion is successful!');
                return response()->json(['status' => 'success'], 200);
            });
        } catch (\Throwable $e) {
            return $e;
        }
    }
}
