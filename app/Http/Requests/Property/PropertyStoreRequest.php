<?php

namespace App\Http\Requests\Property;

use App\Http\Helpers\VendorPermissionHelper;
use App\Models\BasicSettings\Basic;
use App\Models\Language;
use App\Models\Vendor;
use App\Rules\ImageMimeTypeRule;
use Auth;
use Illuminate\Foundation\Http\FormRequest;

class PropertyStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {

        if ($this->vendor_id != 0) {
            $vendor = Vendor::findOrFail($this->vendor_id);
            $vendorId = $vendor->id;
            $vendorCurrentPackage =  VendorPermissionHelper::currentPackagePermission($vendorId);
        }

        $rules = [
            'featured_image' => [
                'required',
                new ImageMimeTypeRule()
            ],
            'price' => 'nullable|numeric',
            'beds' => 'required_if:type,residential',
            'bath' => 'required_if:type,residential',
            'purpose' => 'required',
            'area' => 'required',
            'status' => 'required',
            'amenities' => 'required',
            'category_id' => 'required',
            'city_id' => 'required',
            'latitude' => ['required', 'numeric', 'regex:/^[-]?((([0-8]?[0-9])\.(\d+))|(90(\.0+)?))$/'],
            'longitude' => ['required', 'numeric', 'regex:/^[-]?((([1]?[0-7]?[0-9])\.(\d+))|([0-9]?[0-9])\.(\d+)|(180(\.0+)?))$/']

        ];
 $number_of_property_gallery_images=($vendorCurrentPackage)?$vendorCurrentPackage->number_of_property_gallery_images:0;
        if ($this->vendor_id != 0) {
            //$rules['slider_images'] = 'required|array|max:' . $number_of_property_gallery_images;
        }


        $basicSettings = Basic::select('property_state_status', 'property_country_status')->first();
        if ($basicSettings->property_country_status == 1) {
            $rules['country_id'] =  'required';
        }
        $languages = Language::all();
 $number_of_property_adittionl_specifications=($vendorCurrentPackage)?$vendorCurrentPackage->number_of_property_adittionl_specifications:0;
        foreach ($languages as $language) {
            $rules[$language->code . '_title'] = 'required|max:255';
            $rules[$language->code . '_address'] = 'required';
            $rules[$language->code . '_description'] = 'required|min:15';
            if ($this->vendor_id != 0) {
                //$rules[$language->code . '_label'] = 'array|max:' . $number_of_property_adittionl_specifications;
            }
        }
        return $rules;
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        $message = [];
        $languages = Language::all();

        foreach ($languages as $language) {

            $message[$language->code . '_title.required'] = 'The title field is required for ' . $language->name . ' language.';
            $message[$language->code . '_address.required'] = 'The address field is required for ' . $language->name . ' language.';
            $message[$language->code . '_description.required'] = 'The description field is required for ' . $language->name . ' language.';
            $message[$language->code . '_description.min'] = 'The description  must be at least :min characters for ' . $language->name . ' language.';
            $message[$language->code . '_label.max'] = 'Additional Features for ' . $language->name . ' language shall not exceed :max for this vendor.';
        }
        $message['beds.required_if'] = 'The beds field is required.';
        $message['bath.required_if'] = 'The bath field is required.';
        $message['slider_images.required'] = 'The gallery image field is required.';
        $message['slider_images.max'] = 'The gallery image shall not exceed :max for this vendor.';
        $message['category_id.required'] = 'The category field is required.';
        $message['featured_image.required'] = 'The thumbnail image field is required.';
        $message['city_id.required'] = 'The city field is required.';
        $message['country_id.required'] = 'The country field is required.';
        return $message;
    }
}
