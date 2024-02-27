<div>
    <form>
        <div id="newlink">
            <div id="1">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="jobTitle" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" id="jobTitle" placeholder="SSC / HSC" value="">
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="companyName" class="form-label">Institute</label>
                            <input type="text" name="institute_name" class="form-control" id="companyName" placeholder="Institute name">
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="experienceYear" class="form-label">Years</label>
                            <div class="row">
                                <div class="col-lg-5">
                                    <input type="text" name="year" class="form-control" placeholder="Year">
                                </div>
                                <!--end col-->
                                <div class="col-auto align-self-center">
                                    to
                                </div>
                                <!--end col-->
                                <div class="col-lg-5">
                                    <input type="text" name="year" class="form-control" placeholder="Year">
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="description" rows="3" placeholder="Enter description"></textarea>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="hstack gap-2 justify-content-end">
                        <a class="btn btn-success" href="javascript:deleteEl(1)">Delete</a>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
        <div id="newForm" style="display: none;">

        </div>
        <div class="col-lg-12">
            <div class="hstack gap-2">
                <button type="submit" class="btn btn-success">Update</button>
                <a href="javascript:new_link()" class="btn btn-primary">Add
                    New</a>
            </div>
        </div>
        <!--end col-->
    </form>
</div>
