<div class="modal" id="removing-employee-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Remove employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to remove employee <span id="remove-employee-name"></span>?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <form action="" method="post" id="remove-employee-form">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Remove</button>
                </form>
            </div>
        </div>
    </div>
</div>
