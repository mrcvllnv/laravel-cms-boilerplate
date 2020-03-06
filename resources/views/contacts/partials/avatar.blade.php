<div class="d-flex">
    <span class="avatar mt-1">{{ $contact->initials }}</span>
    <div class="text-truncate ml-2">
        <a href="#" class="text-body d-block">{{ $contact->full_name }}</a>
        <small class="d-block text-muted text-truncate mt-n1">{{ $contact->organization->name }}</small>
    </div>
</div>