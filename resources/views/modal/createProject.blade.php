<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-header">{{__('Create New Project')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div>
                    <div class="alert alert-danger validate" style="display:none"></div>
                    <form method="post" action="{{ url('store') }}" id="form" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 my-2">
                                <input type="text" class="form-group col-md-12" id="project_name" name="project_name"
                                       placeholder="{{ __('Project Name') }} *" required/>
                            </div>
                            <div class="col-md-12 my-2">
                                <textarea name="project_description" class="form-group col-md-12"
                                          id="project_description" cols="30"
                                          rows="4"
                                          placeholder="{{ __('Project Description') }}"></textarea>
                            </div>
                            <div class="col-md-12 my-2">
                                <input type="checkbox" name="is_active" id="is_active" value="1"> {{ __('Is Active Project') }}
                            </div>

                            <div class="col-md-12 my-2">
                                <input type="hidden" name="project_id" id="project_id">
                            </div>

                            <div class="col-12 mt-3">
                                <a type="button" class="btn-lg btn-secondary" data-dismiss="modal">{{ __('Close') }}</a>
                                <a type="button" class="btn-lg btn-success" id="ajaxSubmit">{{ __('Submit') }}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-header">{{__('Delete Project')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div>
                    <div class="alert alert-danger validate">{{__('Project Deleted')}}</div>

                </div>
            </div>
        </div>
    </div>
</div>
