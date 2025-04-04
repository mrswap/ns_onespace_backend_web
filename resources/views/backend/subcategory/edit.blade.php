<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">{{ __('Edit SubCategory') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="ajaxEditForm" class="modal-form" action="{{ route('admin.subcategory_management.update_subcategory') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="in_id" name="id">

                   


                    <div class="row no-gutters">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">{{ __('Name') . '*' }}</label>
                                <input type="text" id="in_name" class="form-control" name="name"
                                    placeholder="Enter name">
                                <p id="editErr_name" class="mt-2 mb-0 text-danger em"></p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">{{ __('Category') . '*' }}</label>
                            <select name="category_id" class="form-control">
                                <option selected disabled>{{ __('Select a Country') }}</option>
                                @foreach ($Categories as $country)
                                    <option value="{{ $country->id }}" {{ isset($categor) && $categor->category_id == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                                @endforeach
                            </select>
                            <p id="err_category" class="mt-2 mb-0 text-danger em"></p>
                        </div>
                        </div>
                        
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
