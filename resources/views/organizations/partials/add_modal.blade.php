<div class="modal modal-blur fade" id="modal-organization" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="organization-form" class="needs-validation" novalidate>
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Create Organization') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Name') }}</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter organization name" required>
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ __('The name field is required.') }}</strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Email') }}</label>
                                <input type="text" class="form-control" name="email" placeholder="Enter email">
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ __('The email field is required.') }}</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Phone') }}</label>
                                <input type="text" class="form-control" name="phone" placeholder="Enter phone number">
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ __('The phone field is required.') }}</strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Address') }}</label>
                                <input type="text" class="form-control" name="address" placeholder="Enter address">
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ __('The address field is required.') }}</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">{{ __('City') }}</label>
                                <input type="text" class="form-control" name="city" placeholder="Enter city">
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ __('The city field is required.') }}</strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Province/State') }}</label>
                                <input type="text" class="form-control" name="state" placeholder="Enter province/state">
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ __('The state field is required.') }}</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Country') }}</label>
                                <select name="country" class="form-select">
                                    <option value="">Select Country</option>
                                    <option value="CA">Canada</option>
                                    <option value="US">United States</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Postal Code') }}</label>
                                <input type="text" class="form-control" name="postal_code" placeholder="Enter postal code">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-dismiss="modal">{{ __('Cancel') }}</a>
                    <button type="submit" class="btn btn-primary ml-auto">
                        {{ __('Create Organization') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>