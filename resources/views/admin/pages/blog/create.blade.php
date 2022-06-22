<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" id="ajaxModelBlog" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="modelHeading" >Modal Heading</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation BlogForm"  novalidate id="BlogForm" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" name="blog_id" id="blog_id">
                            <input type="hidden" name="avatar_image_one" id="avatar_image_one_id" class="avatar_image_one">
                            <input type="hidden" name="avatar_image_two" id="avatar_image_two_id" class="avatar_image_two">
                            <input type="hidden" name="sub_cat" id="sub_cat_id">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="validationCustom01" class="form-label">Category</label>
                                        <select class="form-select category_id" aria-label="Default select example" name="category_name" id="category_id">
                                            <option selected="" >Open this select menu</option>
                                            @foreach(Category() as $item)
                                                <option value="{{$item->id}}">{{$item->category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="validationCustom02" class="form-label">Subcategory</label>
                                        <select class="form-select subcategory_id" aria-label="Default select example" name="subcategory_name" id="subcategory_id">
                                            <option  disabled="true"  selected="true">Open this select menu</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-12">
                                <label for="validationCustom01" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title_name" id="title_id"
                                       placeholder="Title"  required>
                            </div>

                            <div class="pt-3"></div>

                            <div class="mb-12">
                                <label>Textarea</label>
                                <div>
                                    <textarea id="Description" required="" class="form-control Description" name="description" rows="5" placeholder="Type here" style="height: 38px;"></textarea>
                                </div>
                            </div>

                            <div class="pt-3"></div>

                            <div class="mb-12">
                                <label>Meta Tag (SEO)</label>
                                <div>
                                    <textarea style="height: 200px" id="Metatag" required="" class="form-control" name="metatag" rows="5" placeholder="Type here" style="height: 38px;"></textarea>
                                </div>
                            </div>

                            <div class="pt-3"></div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="validationCustom01" class="form-label">Small Image</label>
                                        <input type="file" class="form-control putImage1" name="small_image_name" id="small_image_id" required>
                                        <div class="pt-3"></div>
                                        <img src="" id="target1"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="validationCustom02" class="form-label">Big Image</label>
                                        <input type="file" class="form-control putImage2" name="big_image_name" id="big_image_id" required>
                                        <div class="pt-3"></div>
                                        <img  src="" id="target2"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div>
                                                        <div class="form-check mb-3">
                                                            <h5 class="font-size-14 mb-3">Breadcrumbs</h5>
                                                            <div>
                                                                <input type="checkbox" id="breadcrumbs" name="breadcrumbs" switch="bool" checked="" value="1">
                                                                <label for="breadcrumbs" data-on-label="Yes" data-off-label="No"></label>
                                                            </div>
                                                        </div>
                                                        <div class="form-check">
                                                            <h5 class="font-size-14 mb-3">Popular Post</h5>
                                                            <div>
                                                                <input type="checkbox" id="popular_post" name="popular_post" switch="bool" checked="" value="1">
                                                                <label for="popular_post" data-on-label="Yes" data-off-label="No"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 ms-auto">
                                                    <div class="mt-4 mt-lg-0">
                                                        <div>
                                                            <div class="form-check form-check-right mb-3">
                                                                <h5 class="font-size-14 mb-3">Hot Post</h5>
                                                                <div>
                                                                    <input type="checkbox" id="hot_post" name="hot_post" switch="bool" checked="" value="1">
                                                                    <label for="hot_post" data-on-label="Yes" data-off-label="No"></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="form-check form-check-right">
                                                                <h5 class="font-size-14 mb-3">Dont Miss</h5>
                                                                <div>
                                                                    <input type="checkbox" id="dont_miss" name="dont_miss" switch="bool" checked="" value="1">
                                                                    <label for="dont_miss" data-on-label="Yes" data-off-label="No"></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pt-3"></div>
                    <div>
                        <button class="btn btn-primary saveBtn" type="submit" id="saveBtn" >Submit form</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
