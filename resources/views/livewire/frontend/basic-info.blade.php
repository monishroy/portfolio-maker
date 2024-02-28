<div>
    <form wire:submit="update">
        <div class="row">
            <div class="col-12">
                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong> {{Session::get('success')}} </strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (Session::has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong> {{Session::get('error')}} </strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="firstnameInput" class="form-label">First Name</label>
                    <input type="text" wire:model.live="first_name" class="form-control @error('first_name') is-invalid @enderror" id="firstnameInput" placeholder="Enter your firstname">
                    @error('first_name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>
            <!--end col-->
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="lastnameInput" class="form-label">Last Name</label>
                    <input type="text" wire:model.live="last_name" class="form-control @error('last_name') is-invalid @enderror" id="lastnameInput" placeholder="Enter your lastname">
                    @error('last_name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>
            <!--end col-->
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="phonenumberInput" class="form-label">Phone Number</label>
                    <input type="number" wire:model.live="phone" class="form-control @error('phone') is-invalid @enderror" id="phonenumberInput" placeholder="Enter your phone number">
                    @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>
            <!--end col-->
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="emailInput" class="form-label">Email Address</label>
                    <input type="email" wire:model.live="email" class="form-control @error('email') is-invalid @enderror" id="emailInput" placeholder="Enter your email">
                    @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>
            <!--end col-->
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="designationInput" class="form-label">Username</label>
                    <input type="text" wire:model.live="username" class="form-control @error('username') is-invalid @enderror" id="designationInput" placeholder="Username">
                    @error('username') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="designationInput" class="form-label">Designation</label>
                    <input type="text" wire:model.live="designation" class="form-control @error('designation') is-invalid @enderror" id="designationInput" placeholder="Web Designer / Developer">
                    @error('designation') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>
            <div class="col-lg-12">
                <div class="mb-3 pb-2">
                    <label for="exampleFormControlTextarea" class="form-label">Bio</label>
                    <textarea wire:model.live="bio" class="form-control @error('bio') is-invalid @enderror" id="exampleFormControlTextarea" placeholder="Enter your bio" rows="3"></textarea>
                    @error('bio') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>
            <!--end col-->
            <div class="col-lg-12">
                <div class="hstack gap-2 justify-content-end">
                    <button type="submit" class="btn btn-primary">
                        <i wire:loading wire:target="update" class="mdi mdi-loading mdi-spin align-middle me-2"></i>
                        Updates
                    </button>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </form>
</div>
