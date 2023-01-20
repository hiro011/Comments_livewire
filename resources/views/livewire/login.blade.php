
<div class="my-10 flex justify-center w-full">
    <section class="border rounded shadow-lg p-4 w-6/12 bg-gray-200">
        <h1 class="text-center text-3xl my-5">Login</h1>
        <hr>
        <form class="my-4" wire:submit.prevent="login">
          
            <div class="flex justify-around my-8">
                <div class="flex flex-wrap w-10/12">
                    <input type="email" class="p-2 rounded border shadow-sm w-full" placeholder="Email"
                        wire:model="email" />
                    @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="flex justify-around my-8">
                <div class="flex flex-wrap w-10/12">
                    <input type="password" class="p-2 rounded border shadow-sm w-full" placeholder="Password"
                        wire:model="password" />
                    @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>
            
            <div class="flex justify-around my-8">
                <div class="flex flex-wrap w-10/12">
                    <input type="submit" value="Login" class="p-2 bg-green-800 text-white w-full rounded tracking-wider cursor-pointer" />
                </div>
            </div>
        </form>
        <div class="flex justify-around my-4">
          <div class="flex flex-wrap w-10/12">
              <a href="/register" class="w-full text-red-400 underline text-center cursor-pointer">Create new account</a>
          </div>
        </div>
    </section>
</div>
