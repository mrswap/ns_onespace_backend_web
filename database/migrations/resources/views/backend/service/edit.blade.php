<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">{{ __('Edit  Service') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="ajaxEditForm" class="modal-form" action="{{ route('admin.service_management.update_service') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="in_id" name="id">

                    @foreach ($languages as $lan)
                    @php
                    //var_dump($careerjob);die;
                      
                    @endphp
                    <div class="form-group">
                            <label for="">{{ __('Service Type') . '*' }}</label>
                            <select name="{{ $lang->code }}_type" class="form-control" id="in_{{ $lan->code }}_type">
                                <option selected disabled>{{ __('Select a Service Type') }}</option>
                                
                                    <option value="Owner"  >{{ __('Owner') }}</option>
                                    <option value="Tanent" >{{ __('Tanent ') }}</option>
                                    <option value="Seller" >{{ __('Seller ') }}</option>
                                    <option value="Buyer" >{{ __('Buyer ') }}</option>
                                    <option value="propertymanagement" >{{ __('Property Management') }}</option>
                                
                            </select>
                            <p id="err_type" class="mt-2 mb-0 text-danger em"></p>
                        </div>
                        <div class="form-group {{ $lan->direction == 1 ? 'rtl text-right' : '' }}">
                            <label for="">{{ __('Title') . '*' }} ({{ $lan->name }})</label>
                            <input type="text" id="in_{{ $lan->code }}_title" class="form-control"
                                name="{{ $lan->code }}_title" placeholder="Enter country name">
                            <p id="editErr_{{ $lan->code }}_title" class="mt-2 mb-0 text-danger em"></p>
                        </div>
                        <div class="form-group {{ $lan->direction == 1 ? 'rtl text-right' : '' }}">
                                <label>{{ __('Description') }}</label>
                                <textarea class="form-control summernote" id="in_{{ $lan->code }}_description" name="{{ $lan->code }}_description" rows="5"
                                  placeholder="Enter Description" data-height="200"></textarea>
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
                <button id="updateBtn" type="button" class="btn btn-primary btn-sm">
                    {{ __('Update') }}
                </button>
            </div>
        </div>
    </div>
</div>
