<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">{{ __('Add Instagram Links') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form id="ajaxForm" class="modal-form" action="{{ route('admin.basic_settings.store_insta_post') }}" method="post">
          @csrf

          <div class="form-group">
            <label for="">{{ __('Instagram Links URL') . '*' }}</label>
            <input type="url" class="form-control" name="url" placeholder="Enter URL of Instagram Links Account">
            <p id="err_url" class="mt-1 mb-0 text-danger em"></p>
          </div>
          <div class="form-group">
            <label for="type">{{ __('Select Type') . '*' }}</label>
            <select name="type" class="form-control">
              <option value="1">{{ __('Reel') }}</option>
              <option value="2">{{ __('Image') }}</option>
            </select>
            <p id="err_type" class="mt-1 mb-0 text-danger em"></p>
          </div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
          {{ __('Close') }}
        </button>
        <button id="submitBtn" type="button" class="btn btn-primary btn-sm">
          {{ __('Save') }}
        </button>
      </div>
    </div>
  </div>
</div>