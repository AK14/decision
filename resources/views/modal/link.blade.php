<div class="modal fade" id="linkModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"> New link </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form name="newLinkForm" id="newLinkForm">
                    <div class="row mb-3">
                        <label for="inputLink" class="col-sm-2 col-form-label">Destination</label>
                        <div class="col-sm-10">
                            <input name="link" id="inputLink" placeholder="https://example.com/my-long-url" class="form-control" autocomplete="off" maxlength="500" value="">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" id="inputName" autocomplete="off" maxlength="30">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" form="newLinkForm">Create</button>
            </div>
        </div>
    </div>
</div>