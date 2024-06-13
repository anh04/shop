<!-- Modal center Large -->
<div class="modal fade" id="library-modal"  tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><strong>Library</strong></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body bg-white">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Sorry!</strong> There were more problems with your HTML input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                <fieldset class="border p-4">
                    <legend class="float-none w-auto f-16 bold">Images to upload to libray</legend>
                    <div class="list-images"></div>
                    <div class="row justify-content-center remove-center">
                        <div class="file_upload col-md-6 col-xs-1 col-sm-1">
                            <label for="filenames">
                                <a class="btn btn-success text-light" role="button" aria-disabled="false">Select files</a>
                            </label>
                            <input type="file" name="file[]" accept=".pdf,image/*" id="filenames" style="visibility: hidden; position: absolute;" multiple/>
                        </div>
                        <div class="button-submit hidden col-md-6 col-xs-1 col-sm-1 text-left">
                            <button id="submit-id" class="btn btn-danger" style="margin-top:10px">Upload to library </button>
                        </div>
                    </div>
                </fieldset>

                <fieldset class="border p-4">
                    <legend class="float-none w-auto f-16 bold">Images in libray</legend>
                    <div id="media"> </div>
                </fieldset>
            </div>

        </div>
    </div>
</div>


