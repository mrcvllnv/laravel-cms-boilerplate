<div class="d-flex">
    <span class="avatar mt-1">{{ $user->initials }}</span>
    <div class="text-truncate ml-2">
        <a href="{{ route('users.edit', $user) }}" class="text-body d-block">{{ $user->full_name }}</a>
        <small class="d-block text-muted text-truncate mt-n1">{{ $user->email }}</small>
    </div>
</div>