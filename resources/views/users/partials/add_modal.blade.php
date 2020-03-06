<div class="modal modal-blur fade" id="modal-user" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="user-form" class="needs-validation" novalidate>
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Create New User') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg">
                            <div class="mb-3">
                                <label class="form-label">{{ __('First Name') }}</label>
                                <input type="text" class="form-control" name="first_name" placeholder="Enter first name" required>
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ __('The first name field is required.') }}</strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Last Name') }}</label>
                                <input type="text" class="form-control" name="last_name" placeholder="Enter last name" required>
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ __('The last name field is required.') }}</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Email address') }}</label>
                                <input type="email" class="form-control" name="email" placeholder="Enter email" required>
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ __('The email field is required.') }}</strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Password') }}</label>
                                <input type="password" class="form-control" name="password" required>
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ __('The password field is required.') }}</strong>
                                </div>
                                <small class="text-muted">{{ __('This will be used as a temporary password.') }}</small>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Confirm Password') }}</label>
                                <input type="password" class="form-control" name="password_confirmation" required>
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ __('The password confirmation field is required.') }}</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-dismiss="modal">{{ __('Cancel') }}</a>
                    <button type="submit" class="btn btn-primary ml-auto">
                        {{ __('Create New User') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>