<?php

namespace App\Http\Controllers\BackEnd\BasicSettings;

use App\Http\Controllers\Controller;
use App\Models\BasicSettings\SocialMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class SocialMediaController extends Controller
{
  public function index()
  {
    $information['medias'] = SocialMedia::orderByDesc('id')->get();

    return view('backend.basic-settings.social-media.index', $information);
  }

  public function store(Request $request)
  {
    $rules = [
      'icon' => 'required',
      'url' => 'required|url',
      'serial_number' => 'required|numeric'
    ];

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
      return Response::json([
        'errors' => $validator->getMessageBag()
      ], 400);
    }

    SocialMedia::create($request->all());

    $request->session()->flash('success', 'New social media added successfully!');

    return Response::json(['status' => 'success'], 200);
  }

  public function update(Request $request)
  {
    $rules = [
      'url' => 'required|url',
      'serial_number' => 'required|numeric'
    ];

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
      return Response::json([
        'errors' => $validator->getMessageBag()
      ], 400);
    }

    SocialMedia::find($request->id)->update($request->all());

    $request->session()->flash('success', 'Social media updated successfully!');

    return Response::json(['status' => 'success'], 200);
  }

  public function destroy($id)
  {
    SocialMedia::find($id)->delete();

    return redirect()->back()->with('success', 'Social media deleted successfully!');
  }

  public function instagramLinkIndex()
  {
    $information['medias'] = DB::table('insta_post_links')->orderByDesc('id')->get();


    return view('backend.basic-settings.social-media.instagramLinkIndex', $information);
  }
  public function storeInstaPost(Request $request)
  {
    $rules = [
      'url' => 'required|url',
    ];

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
      return Response::json([
        'errors' => $validator->getMessageBag()
      ], 400);
    }

    // Insert data into the database using DB facade
    DB::table('insta_post_links')->insert([
      'url' => $request->input('url'),
      'type' => $request->input('type')

    ]);

    $request->session()->flash('success', 'New Link added successfully!');

    return Response::json(['status' => 'success'], 200);
  }

  public function destroyInstaPost($id)
  {
    DB::table('insta_post_links')->where('id', $id)->delete();

    return redirect()->back()->with('success', 'Link deleted successfully!');
  }

  public function updateInstaPost(Request $request)
  {
    $id = $request->id;
    $rules = [
      'url' => 'required|url',

    ];

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
      return Response::json([
        'errors' => $validator->getMessageBag()
      ], 400);
    }

    // Update the data in the database using DB facade
    $updated = DB::table('insta_post_links')
      ->where('id', $id)
      ->update([
        'url' => $request->input('url'),
        'type' => $request->input('type')
      ]);

    if ($updated) {
      $request->session()->flash('success', 'Link updated successfully!');
      return Response::json(['status' => 'success'], 200);
    } else {
      return Response::json(['status' => 'error', 'message' => 'Failed to update the link.'], 500);
    }
  }
}
