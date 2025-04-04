<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">{{ __('Add Category') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="ajaxForm2" class="modal-form" action="{{ route('admin.job_management.store') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    @foreach ($langs as $lang)
                        <div class="form-group {{ $lang->direction == 1 ? 'rtl text-right' : '' }}">
                            <label for="">{{ __('Title') . ' *' }} ({{ $lang->name }})</label>
                            <input type="text" class="form-control" name="{{ $lang->code }}_title"
                                placeholder="Enter job title">
                            <p id="err_{{ $lang->code }}name" class="mt-2 mb-0 text-danger em"></p>
                        </div>
                        
                              <div class="form-group {{ $lang->direction == 1 ? 'rtl text-right' : '' }}">
                                <label>{{ __('Description') }}</label>
                                <textarea class="form-control summernote" name="{{ $lang->code }}_description" data-height="200"
                                  placeholder="Enter Description"></textarea>
                              </div>
                          
                    @endforeach 

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


