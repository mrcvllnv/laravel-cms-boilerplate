<div class="d-flex">
    <div class="text-muted">
        {{ __('Show') }}
        <div class="mx-1 d-inline-block">
            <select class="form-control form-control-sm datatable-length">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
                <option value="-1">All</option>
            </select>
        </div>
        {{ __('entries') }}
    </div>
    <div class="pagination-wrapper m-0 ml-auto"></div>
</div>