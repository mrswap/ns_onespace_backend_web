<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">{{ __('Add  Service') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="ajaxForm2" class="modal-form" action="{{ route('admin.service_management.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @foreach ($langs as $lang)
                    <div class="form-group">
                        <label for="">{{ __('Service Type') . '*' }}</label>
                        <select name="{{ $lang->code }}_type" class="form-control" id="in_{{ $lang->code }}_type">
                            <option selected disabled>{{ __('Select a Service Type') }}</option>

                            <option value="Owner">{{ __('Owner') }}</option>
                            <option value="Tanent">{{ __('Tanent ') }}</option>
                            <option value="Seller">{{ __('Seller ') }}</option>
                            <option value="Buyer">{{ __('Buyer ') }}</option>
                            <option value="propertymanagement">{{ __('Property Management') }}</option>

                        </select>
                        <p id="err_type" class="mt-2 mb-0 text-danger em"></p>
                    </div>
                    <div class="form-group {{ $lang->direction == 1 ? 'rtl text-right' : '' }}">
                        <label for="">{{ __('Title') . '*' }} ({{ $lang->name }})</label>
                        <input type="text" id="in_{{ $lang->code }}_title" class="form-control" name="{{ $lang->code }}_title" placeholder="Enter country name">
                        <p id="editErr_{{ $lang->code }}_title" class="mt-2 mb-0 text-danger em"></p>
                    </div>
                    <div class="form-group {{ $lang->direction == 1 ? 'rtl text-right' : '' }}">
                        <label>{{ __('Description') }}</label>
                        <textarea class="form-control summernote" id="in_{{ $lang->code }}_description" name="{{ $lang->code }}_description" rows="5" placeholder="Enter Description" data-height="200"></textarea>
                    </div>


                    @endforeach
                    <div class="form-group " id="edit-image-input">
                        <label for="">{{ __('Image') . '*' }}</label>
                        <br>
                        <div class="thumb-preview">
                            <img src="" alt="icon image" class="in_image uploaded-img">
                        </div>

                        <div class="mt-3">
                            <div role="button" class="btn btn-primary btn-sm upload-btn">
                                {{ __('Choose Image') }}
                                <input type="file" class="img-input" name="image">
                            </div>
                        </div>
                        <p class="mt-2 mb-0 text-danger em" id="editErr_image"></p>
                    </div>

                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
                    {{ __('Close') }}
                </button>
                <button id="submitBtn2" type="button" class="btn btn-primary btn-sm">
                    {{ __('Save') }}
                </button>
            </div>
        </div>
    </div>
</div>
