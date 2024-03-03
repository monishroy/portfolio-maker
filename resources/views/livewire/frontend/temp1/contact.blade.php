<div>
    <div class="row gx-5 justify-content-center">
        <div class="col-lg-8 col-xl-6">
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
            <form wire:submit="store">
                <!-- Name input-->
                <div class="form-floating mb-3">
                    <input class="form-control" wire:model.live="name" id="name" type="text" placeholder="Enter your name..." />
                    <label for="name">Full name</label>
                    <div class="invalid-feedback">A name is required.</div>
                </div>
                <!-- Email address input-->
                <div class="form-floating mb-3">
                    <input class="form-control" wire:model.live="email" id="email" type="email" placeholder="name@example.com"/>
                    <label for="email">Email address</label>
                    <div class="invalid-feedback">Email is not valid.</div>
                </div>
                <!-- Message input-->
                <div class="form-floating mb-3">
                    <textarea class="form-control" wire:model.live="message" id="message" type="text" placeholder="Enter your message here..." style="height: 10rem"></textarea>
                    <label for="message">Message</label>
                    <div class="invalid-feedback">A message is required.</div>
                </div>
                <!-- Submit Button-->
                <div class="d-grid">
                    <button class="btn btn-primary btn-lg" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
