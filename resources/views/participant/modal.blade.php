<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-default">Import Participants</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body  mt--4">
                <form action="{{ route('import-participants') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label class="form-control-label">{{ __('File') }}</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="file" id="customFileLang"
                                lang="en">
                            <label class="custom-file-label" for="customFileLang">Select file</label>
                        </div>
                        @error('file')
                            <small class="text-danger" role="alert">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <a href="{{ asset('file/participants.xlsx') }}" class="btn btn-sm btn-success"><i
                                class="fa fa-file-excel"></i> Download
                            Template
                            File</a>
                    </div>
                    <button class="btn btn-primary" type="submit">{{ __('Import') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
