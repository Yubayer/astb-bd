<div class="modal fade" id="AdminAvatarUpdateModal" tabindex="-1" role="dialog" aria-labelledby="adminAvatarModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="adminAvatarModal">Update Profile Image</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="" action="{{ route('admin.profile.update-image') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    
                    <input type="hidden" name="id" value="{{ Auth::user()->id }}">

                    <div class="mb-3">
                        <label for="collectionImage" class="form-label">Select Image</label><br>
                        <input type="file" name="image" class="" id="collectionImage">
                    </div>

                    <br>

                    <div class="">
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </div>
                </form>                  
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
