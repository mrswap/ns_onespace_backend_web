<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">{{ __('Edit Instagram Links') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="ajaxEditForm" class="modal-form" action="{{ route('admin.basic_settings.update_insta_post') }}" method="post">
                    @csrf
                    <input type="hidden" id="in_id" name="id">

                    <div class="form-group">
                        <label for="">{{ __('Instagram Links URL') . '*' }}</label>
                        <input type="url" id="in_url" class="form-control" name="url" placeholder="Enter URL of Instagram Links Account">
                        <p id="editErr_url" class="mt-1 mb-0 text-danger em"></p>
                    </div>
                    <div class="form-group">
                        <label for="type">{{ __('Select Type') . '*' }}</label>
                        <select name="type" id="in_type" class="form-control">
                            <option value="1" {{ isset($media->type) && $media->type == 1 ? 'selected' : '' }}>{{ __('Reel') }}</option>
                            <option value="2" {{ isset($media->type) && $media->type == 2 ? 'selected' : '' }}>{{ __('Image') }}</option>
                        </select>
                        <p id="editErr_type" class="mt-1 mb-0 text-danger em"></p>
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