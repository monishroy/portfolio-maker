<div>
    <form>
        <div id="newlink">
            <div id="1">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="jobTitle" class="form-label">Job
                                Title</label>
                            <input type="text" class="form-control" id="jobTitle" placeholder="Job title" value="Lead Designer / Developer">
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="companyName" class="form-label">Company
                                Name</label>
                            <input type="text" class="form-control" id="companyName" placeholder="Company name" value="Themesbrand">
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="experienceYear" class="form-label">Experience Years</label>
                            <div class="row">
                                <div class="col-lg-5">
                                    <input class="form-control" name="experienceYear" id="experienceYear" placeholder="Start Years">
                                </div>
                                <!--end col-->
                                <div class="col-auto align-self-center">
                                    to
                                </div>
                                <!--end col-->
                                <div class="col-lg-5">
                                    <input class="form-control" name="experienceYear" placeholder="End Years">
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="jobDescription" class="form-label">Job
                                Description</label>
                            <textarea class="form-control" id="jobDescription" rows="3" placeholder="Enter description">You always want to make sure that your fonts work well together and try to limit the number of fonts you use to three or less. Experiment and play around with the fonts that you already have in the software you're working with reputable font websites. </textarea>
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
