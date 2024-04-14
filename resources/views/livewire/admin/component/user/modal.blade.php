<div>
    <div wire:ignore class="modal fade" id="ModalUpdateRole" tabindex="-1" role="dialog"
         aria-labelledby="formModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModal">عنوان مودال</h5>
                    <button id="ModalUpdateRoleClose" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit="save">
                        <label for="email_address1">نام نقش</label>

                        <div class="form-group">
                            <div class="form-line">
                                <input wire:model.lazy="title" type="text"  class="form-control"
                                       placeholder="نقش کاربر را وارد کنید">
                            </div>
                        </div>
                        <div class="alert alert-danger d-none rounded" id="errorMessages"></div>

                        <div class="modal-footer ">
                            <button type="submit" class="btn btn-info waves-effect">ذخیره</button>
                            <button type="button" class="btn btn-danger waves-effect"
                                    data-dismiss="modal">لغو</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
