<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Address') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Update your account address details.') }}
        </p>
    </header>
    
    <form method="post" action="{{ route('user.address.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="update_street" :value="__('Street')" />
            <x-text-input id="update_street" name="street" class="mt-1 block w-full" value="{{ old('street', auth()->user()->street) }}" />
            <x-input-error :messages="$errors->get('street')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_city" :value="__('City')" />
            <x-text-input id="update_city" name="city" class="mt-1 block w-full" value="{{ old('city', auth()->user()->city) }}" />
            <x-input-error :messages="$errors->get('city')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_province" :value="__('Province')" />
            <x-text-input id="update_province" name="province" class="mt-1 block w-full" value="{{ old('province', auth()->user()->province) }}" />
            <x-input-error :messages="$errors->get('province')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_postal_code" :value="__('Postal Code')" />
            <x-text-input id="update_postal_code" name="postal_code" class="mt-1 block w-full" value="{{ old('postal_code', auth()->user()->postal_code) }}" />
            <x-input-error :messages="$errors->get('postal_code')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('success'))
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
