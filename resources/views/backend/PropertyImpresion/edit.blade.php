<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">{{ __('Add Remark /Feedback') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="ajaxEditForm" class="modal-form" action="{{ route('admin.PropertyImpresion_management.update') }}"
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
                                <label for="">{{ __('Remark') . '*' }}</label>
                                <input type="text" id="in_remark" class="form-control" name="remark"
                                    placeholder="Enter remark">
                                <p id="editErr_remark" class="mt-2 mb-0 text-danger em"></p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">{{ __('feedback') . '*' }}</label>
                                <input type="text" id="in_feedback" class="form-control" name="feedback"
                                    placeholder="Enter feedback">
                                <p id="editErr_feedback" class="mt-2 mb-0 text-danger em"></p>
                            </div>
                        </div>
                        <!-- <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">{{ __('VerificationDate') . '*' }}</label>
                                <input type="date" id="in_nextverificationDate" class="form-control" name="nextverificationDate"
                                    placeholder="Enter nextverificationDate">
                                <p id="editErr_nextverificationDate" class="mt-2 mb-0 text-danger em"></p>
                            </div>
                        </div> -->

                        
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
