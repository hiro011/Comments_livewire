
@if(isset($user))
    <div class="profile">
        <style>
            .profile-pic-img{
                width: 45px;
                height: 45px;
                object-fit: cover;
                border-radius: 50%;
            }
        </style>
        @if(!isset($user->image))
            <img src="img/defualt_profile.png" alt="profile-pic" class="profile-pic-img">
        @else
            <img src="{{ $user->imagePath }}" alt="profile-pic" title="{{ $user->name }}" class="profile-pic-img">
        @endif
        <h2 title="{{ $user->name }}">{{ $user->name }}</h2>
        <a class="text-red-500 cursor-pointer" wire:click="logout">Logout</a>
    </div>
@endif
