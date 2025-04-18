<?php

namespace App\Http\Helpers;

use App\Models\BasicSettings\Basic;
use App\Models\Membership;
use App\Models\Package;
use App\Models\Project\Project;
use App\Models\Property\Property;
use App\Models\Vendor;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class VendorPermissionHelper
{

  public static function packagePermission(int $vendor_id)
  {
    $bs = Basic::first();
    Config::set('app.timezone', $bs->timezone);

    $currentPackage = Membership::query()->where([
      ['vendor_id', '=', $vendor_id],
      ['status', '=', 1],
      ['start_date', '<=', Carbon::now()->format('Y-m-d')],
      ['expire_date', '>=', Carbon::now()->format('Y-m-d')]
    ])->first();
    $package = isset($currentPackage) ? Package::query()->find($currentPackage->package_id) : null;
    return $package ? $package : collect([]);
  }

  public static function uniqidReal($lenght = 13)
  {
    $bs = Basic::first();
    // uniqid gives 13 chars, but you could adjust it to your needs.
    if (function_exists("random_bytes")) {
      $bytes = random_bytes(ceil($lenght / 2));
    } elseif (function_exists("openssl_random_pseudo_bytes")) {
      $bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
    } else {
      throw new Exception("no cryptographically secure random function available");
    }
    return substr(bin2hex($bytes), 0, $lenght);
  }

  public static function currentPackagePermission(int $userId)
  {
    $bs = Basic::first();
    Config::set('app.timezone', $bs->timezone);
    $currentPackage = Membership::query()->where([
      ['vendor_id', '=', $userId],
      ['status', '=', 1],
      ['start_date', '<=', Carbon::now()->format('Y-m-d')],
      ['expire_date', '>=', Carbon::now()->format('Y-m-d')]
    ])->first();
    return isset($currentPackage) ? Package::query()->findOrFail($currentPackage->package_id) : null;
  }
  public static function userPackage(int $userId)
  {
    $bs = Basic::first();
    Config::set('app.timezone', $bs->timezone);

    return Membership::query()->where([
      ['vendor_id', '=', $userId],
      ['status', '=', 1],
      ['start_date', '<=', Carbon::now()->format('Y-m-d')],
      ['expire_date', '>=', Carbon::now()->format('Y-m-d')]
    ])->first();
  }

  public static function currPackageOrPending($userId)
  {

    $currentPackage = Self::currentPackagePermission($userId);
    if (!$currentPackage) {
      $currentPackage = Membership::query()->where([
        ['vendor_id', '=', $userId],
        ['status', 0]
      ])->whereYear('start_date', '<>', '9999')->orderBy('id', 'DESC')->first();
      $currentPackage = isset($currentPackage) ? Package::query()->findOrFail($currentPackage->package_id) : null;
    }
    return isset($currentPackage) ? $currentPackage : null;
  }

  public static function currMembOrPending($userId)
  {
    $currMemb = Self::userPackage($userId);
    if (!$currMemb) {
      $currMemb = Membership::query()->where([
        ['vendor_id', '=', $userId],
        ['status', 0],
      ])->whereYear('start_date', '<>', '9999')->orderBy('id', 'DESC')->first();
    }
    return isset($currMemb) ? $currMemb : null;
  }

  public static function hasPendingMembership($userId)
  {
    $count = Membership::query()->where([
      ['vendor_id', '=', $userId],
      ['status', 0]
    ])->whereYear('start_date', '<>', '9999')->count();
    return $count > 0 ? true : false;
  }

  public static function nextPackage(int $userId)
  {
    $bs = Basic::first();
    Config::set('app.timezone', $bs->timezone);
    $currMemb = Membership::query()->where([
      ['vendor_id', $userId],
      ['start_date', '<=', Carbon::now()->toDateString()],
      ['expire_date', '>=', Carbon::now()->toDateString()]
    ])->where('status', '<>', 2)->whereYear('start_date', '<>', '9999');
    $nextPackage = null;
    if ($currMemb->first()) {
      $countCurrMem = $currMemb->count();
      if ($countCurrMem > 1) {
        $nextMemb = $currMemb->orderBy('id', 'DESC')->first();
      } else {
        $nextMemb = Membership::query()->where([
          ['vendor_id', $userId],
          ['start_date', '>', $currMemb->first()->expire_date]
        ])->whereYear('start_date', '<>', '9999')->where('status', '<>', 2)->first();
      }
      $nextPackage = $nextMemb ? Package::query()->where('id', $nextMemb->package_id)->first() : null;
    }
    return $nextPackage;
  }

  public static function nextMembership(int $userId)
  {
    $bs = Basic::first();
    Config::set('app.timezone', $bs->timezone);
    $currMemb = Membership::query()->where([
      ['vendor_id', $userId],
      ['start_date', '<=', Carbon::now()->toDateString()],
      ['expire_date', '>=', Carbon::now()->toDateString()]
    ])->where('status', '<>', 2)->whereYear('start_date', '<>', '9999');
    $nextMemb = null;
    if ($currMemb->first()) {
      $countCurrMem = $currMemb->count();
      if ($countCurrMem > 1) {
        $nextMemb = $currMemb->orderBy('id', 'DESC')->first();
      } else {
        $nextMemb = Membership::query()->where([
          ['vendor_id', $userId],
          ['start_date', '>', $currMemb->first()->expire_date]
        ])->whereYear('start_date', '<>', '9999')->where('status', '<>', 2)->first();
      }
    }
    return $nextMemb;
  }


  public static function userFeaturesCount($vendorId)
  {
    $vendor = Vendor::find($vendorId);
    $vendorFeaturesCount = [];
    $vendorFeaturesCount['agents'] = $vendor->agents()->count();
    $vendorFeaturesCount['properties'] = $vendor->properties()->count();
    $vendorFeaturesCount['projects'] =  $vendor->projects()->count();
    // $vendorFeaturesCount['projectFeatured'] =  $vendor->skills()->count();

    return $vendorFeaturesCount;
  }

  public static function packagesDowngraded($vendorId)
  {
    $userCurrentPackage =  VendorPermissionHelper::currentPackagePermission($vendorId);

    $userFeaturesCount = VendorPermissionHelper::userFeaturesCount($vendorId);
    $properties = Property::with(['propertyContents', 'specifications', 'galleryImages'])->where('vendor_id', $vendorId)->select('id')->get();

    $projects = Project::with(['proejctContents', 'specifications', 'galleryImages', 'projectTypes'])->where('vendor_id', $vendorId)->select('id')->get();


    $proGalImgDown = $proAmenDown = $proSpeciDown = false;
    $proImgCount = $proAmenCount = $proSpeciCount = 0;


    if ($userCurrentPackage) {

      // check property gallery images are down graded
      foreach ($properties as $property) {
        $images = $property->galleryImages;
        $proImgCount =  count($images);

        if ($userCurrentPackage->number_of_property_gallery_images < count($images)) {
          $proGalImgDown = true;
          break;
        }
      }



      // check property additional spacifications are down graded
      foreach ($properties as $property) {

        $proSpeciCount =  $property->specifications->count();

        if ($userCurrentPackage->number_of_property_adittionl_specifications < count($property->specifications)) {
          $proSpeciDown = true;
          break;
        }
      }

      $projectGalImgDown = $projectTypeDown = $projectSpeciDown = false;
      $projectImgCount = $projectTypeCount = $projectSpeciCount = 0;


      // check project gallery images are down graded
      foreach ($projects as $project) {
        $pimages = $project->galleryImages;
        $projectImgCount =  count($pimages);

        if ($userCurrentPackage->number_of_project_gallery_images < count($pimages)) {
          $projectGalImgDown = true;
          break;
        }
      }

      // check project type are down graded
      foreach ($projects as $project) {
        $projectTypes = $project->projectTypes()->get();
        $projectTypeCount =  count($projectTypes);
        if ($userCurrentPackage->number_of_project_types < count($projectTypes)) {
          $projectTypeDown = true;
          break;
        }
      }
      // check project additional spacifications are down graded
      foreach ($projects as $project) {

        $projectSpeciCount =  $project->specifications->count();

        if ($userCurrentPackage->number_of_project_additionl_specifications < count($project->specifications)) {
          $projectSpeciDown = true;
          break;
        }
      }

      return [
        'projectGalImgDown' => $projectGalImgDown,
        'projectTypeDown' => $projectTypeDown,
        'projectSpeciDown' => $projectSpeciDown,
        'projectImgCount' => $projectImgCount,
        'projectTypeCount' => $projectTypeCount,
        'projectSpeciCount' => $projectSpeciCount,
        'proGalImgDown' => $proGalImgDown,
        // 'proAmenDown' => $proAmenDown,
        'proSpeciDown' => $proSpeciDown,
        'proImgCount' => $proImgCount,
        // 'proAmenCount' => $proAmenCount,
        'proSpeciCount' => $proSpeciCount,
        'userFeaturesCount' => $userFeaturesCount,
        'userCurrentPackage' => $userCurrentPackage
      ];
    } else {
      return [
        'projectGalImgDown' => true,
        'projectTypeDown' => true,
        'projectSpeciDown' => true,
        'projectImgCount' => true,
        'projectTypeCount' => true,
        'projectSpeciCount' => true,
        'proGalImgDown' => true,
        'proSpeciDown' => true,
        'proImgCount' => true,
        'proSpeciCount' => true,
        'userFeaturesCount' => true,
        'userCurrentPackage' => null
      ];
    }
  }
}
