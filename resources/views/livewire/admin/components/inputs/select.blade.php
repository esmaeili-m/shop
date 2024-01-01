<div>
    <div class="form-group">
        <label for="email_address_2">دسته بندی محصول</label>
        <div class="form-line">
            <div wire:ignore class="input-field col s12">
                <select wire:model.lazy="category_id">
                    <option value="" disabled selected>گزینه خود را انتخاب کنید</option>
                    @foreach($data as $key => $item)
                        <option  value="{{$key}}">{{$item}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>
