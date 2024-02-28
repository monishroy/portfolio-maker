<div>
    <div class="mb-4 pb-2">
        <h5 class="card-title text-decoration-underline mb-3">Change Password:</h5>
        <livewire:frontend.change-password>
    </div>
    <div class="mb-3">
        <h5 class="card-title text-decoration-underline mb-3">Application
            Notifications:</h5>
        <ul class="list-unstyled mb-0">
            <li class="d-flex">
                <div class="flex-grow-1">
                    <label for="directMessage" class="form-check-label fs-14">Direct messages</label>
                    <p class="text-muted">Messages from people you follow</p>
                </div>
                <div class="flex-shrink-0">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="directMessage" checked />
                    </div>
                </div>
            </li>
            <li class="d-flex mt-2">
                <div class="flex-grow-1">
                    <label class="form-check-label fs-14" for="desktopNotification">
                        Show desktop notifications
                    </label>
                    <p class="text-muted">Choose the option you want as your
                        default setting. Block a site: Next to "Not allowed to
                        send notifications," click Add.</p>
                </div>
                <div class="flex-shrink-0">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="desktopNotification" checked />
                    </div>
                </div>
            </li>
            <li class="d-flex mt-2">
                <div class="flex-grow-1">
                    <label class="form-check-label fs-14" for="emailNotification">
                        Show email notifications
                    </label>
                    <p class="text-muted"> Under Settings, choose Notifications.
                        Under Select an account, choose the account to enable
                        notifications for. </p>
                </div>
                <div class="flex-shrink-0">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="emailNotification" />
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <div>
        <h5 class="card-title text-decoration-underline mb-3">Delete This
            Account:</h5>
        <p class="text-muted">Go to the Data & Privacy section of your profile
            Account. Scroll to "Your data & privacy options." Delete your
            Profile Account. Follow the instructions to delete your account :
        </p>
        <div>
            <input type="password" class="form-control" id="passwordInput" placeholder="Enter your password" value="make@321654987" style="max-width: 265px;">
        </div>
        <div class="hstack gap-2 mt-3">
            <a href="javascript:void(0);" class="btn btn-soft-primary">Close &
                Delete This Account</a>
            <a href="javascript:void(0);" class="btn btn-light">Cancel</a>
        </div>
    </div>
</div>
