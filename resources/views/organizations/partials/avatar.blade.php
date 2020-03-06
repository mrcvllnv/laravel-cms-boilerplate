<div class="d-flex">
    <span class="avatar mt-1">{{ mb_substr($organization->name, 0, 1) }}</span>
    <div class="text-truncate ml-2">
        <a href="#" class="text-body d-block">{{ $organization->name }}</a>
        <small class="d-block text-muted text-truncate mt-n1">{{ $organization->city . ', ' . $organization->region . ' ' . $organization->country }}</small>
    </div>
</div>