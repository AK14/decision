
<div class="modal fade" id="linkModal" tabindex="-1" aria-labelledby="linkModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5"> New link </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form name="newLinkForm" id="newLinkForm" method="POST" action="/link">
                    <div class="row mb-3">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10 input-block">
                            <input type="text" class="form-control" name="name" id="inputName" autocomplete="off" maxlength="30">
                            <div class="invalid-feedback"> </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputLink" class="col-sm-2 col-form-label">Destination</label>
                        <div class="col-sm-10 input-block">
                            <input name="link" id="inputLink" placeholder="https://example.com/my-long-url" class="form-control" autocomplete="off" maxlength="500" value="">
                            <div class="invalid-feedback"> </div>
                        </div>

                    </div>

                    <div class="row mb-3">
                        <label for="inputShortLink" class="col-sm-2 col-form-label">Short-link</label>
                        <div class="col-sm-10 input-block">
                            <input type="text" class="form-control" name="short_link" id="inputShortLink" autocomplete="off" maxlength="30">
                            <div class="invalid-feedback"> </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="newLinkForm">Create</button>
            </div>
        </div>
    </div>
</div>