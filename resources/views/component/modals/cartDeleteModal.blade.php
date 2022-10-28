<div class="modal fade" id="cartDeleteModal" tabindex="-1" role="dialog" aria-labelledby="adminAvatarModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="adminAvatarModal">Delete Cart Item</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('cart.delete') }}" class="">
                    @csrf
                    <input type="hidden" name="id" value="{{ $item->id }}">
                    <button type="submit" class="mt-1 btn btn-danger rounded-0">Delete Item</button>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary rounded-0" type="button" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>


<!-- <button class="btn " data-toggle="modal" data-target="#AdminAvatarUpdateModal">Update Avatar</button> -->