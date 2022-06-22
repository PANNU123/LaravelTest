<!-- sample modal content -->
<div class="modal fade exampleModalFullscreen" id="ajaxModelProduct" tabindex="-1" aria-labelledby="#exampleModalFullscreenLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="exampleModalFullscreenLabel">Fullscreen Modal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" id="ProductForm">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <input type="hidden" name="id" id="id">
                                <input type="hidden" name="hidden_image" id="hidden_image_id">
                                <div>
                                    <div class="mb-4">
                                        <input class="form-control" type="text" name="title" id="title" placeholder="Title">
                                    </div>
                                    <div class="mb-4">
                                        <input class="form-control" type="text"  name="sku" id="sku" placeholder="SKU">
                                    </div>
                                    <div class="mb-4">
                                        <textarea class="form-control" type="text"  name="description" id="description" placeholder="Description"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <div class="mb-3">
                                                <label for="validationCustom02" class="form-label">Variant</label>
                                            <select class="form-select" aria-label="Default select example" name="variant_one" id="variant_one">
                                                @foreach (VariantShow() as $item )
                                                     <option  value="{{ $item->id }}">{{$item->title}}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="validationCustom02" class="form-label">Variant Item</label>
                                            <select name="tag[]" id="select2-example-tags" class="form-control select2-example-tags" multiple="multiple" style="width: 100%"></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <div class="mb-3">
                                                <label for="validationCustom02" class="form-label">Variant</label>
                                            <select class="form-select" aria-label="Default select example" name="variant_two" id="variant_two">
                                                @foreach (VariantShow() as $item )
                                                <option  value="{{ $item->id }}">{{$item->title}}</option>
                                           @endforeach
                                            </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="validationCustom02" class="form-label">Variant Item</label>
                                            <select name="tags[]" id="select2-example-tags-two" class="form-control select2-example-tags-two" multiple="multiple" style="width: 100%"></select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div>
                                        <div class="mb-4">
                                            <input class="form-control putImage1" type="file" name="image" id="image" placeholder="image">
                                            <img src="" id="target1"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <div class="mb-3">
                                                <input class="form-control" type="number" name="price" id="price" placeholder="Price">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <input class="form-control" type="number" name="qty" id="qty" placeholder="Quantity">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </form>
            </div>

            <div class="modal-footer">
                <button type="button" id="saveBtn" class="btn btn-primary waves-effect waves-light">Save changes</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
