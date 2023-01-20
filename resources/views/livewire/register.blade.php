
<div class="my-10 flex justify-center w-full">
    <style>
        .profile-img-label:hover{
            opacity: .75;
            color: blue;
            text-decoration: underline;
        }
        .file-img{
            width: 180px;
            height: 180px;
            object-fit: cover;
            border-radius: 50%;
        }
    </style>
    <section class="border rounded shadow-lg p-4 w-6/12 bg-gray-200">
        <h1 class="text-center text-3xl my-5">SignUp to Get Started</h1>
        <hr>
        <section class="flex justify-center mx-5 w-10/12 my-8">
            <div>
                <label for="image" class="flex flex-col justify-center cursor-pointer profile-img-label">
                    @if($image)
                        <img src="{{$image}}" class="file-img"> </br>
                    @else
                        <img src="img/defualt_profile.png" width="200" class="file-img"> </br>
                    @endif
                    <span class="mx-5 strong">Choose profile</span>
                </label>

                <input type="file" id="image" accept="image/jpeg,image/png,image/gif" class="cursor-pointer" wire:change="$emit('fileChoosen')" style="display: none">
            </div>
        </section>
   
        <form class="my-4" wire:submit.prevent="submit">
               
            <div class="flex justify-around my-8">
                <div class="flex flex-wrap w-10/12">
                    <input type="name" class="p-2 rounded border shadow-sm w-full" wire:model.lazy="name"
                        placeholder="Name" />
                    @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="flex justify-around my-8">
                <div class="flex flex-wrap w-10/12">
                    <input type="email" class="p-2 rounded border shadow-sm w-full" placeholder="Email"
                        wire:model.lazy="email" />
                    @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="flex justify-around my-8">
                <div class="flex flex-wrap w-10/12">
                    <input type="password" class="p-2 rounded border shadow-sm w-full" placeholder="Password"
                        wire:model.lazy="password" />
                    @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="flex justify-around my-8">
                <div class="flex flex-wrap w-10/12">
                    <input type="password" class="p-2 rounded border shadow-sm w-full" 
                        placeholder="Confirm Password" wire:model.lazy="password_confirmation" />
                </div>
            </div>
            
            <div class="flex justify-around my-8">
                <div class="flex flex-wrap w-10/12">
                    <input type="submit" value="Register" class="p-2 bg-gray-800 text-white w-full rounded tracking-wider cursor-pointer" />
                </div>
            </div>
        </form>
        <div class="text-center">
          Already have an account?
          <a href="/login" class="text-red-400 underline">login</a>
        </div>
    </section>

    <script>
        window.livewire.on('fileChoosen', () => {
            let inputField = document.getElementById('image')
            let file = inputField.files[0]
            let reader = new FileReader();
            reader.onloadend = () => {
                window.livewire.emit('fileUpload', reader.result)
            }
            reader.readAsDataURL(file);
        })
    </script>

</div>
