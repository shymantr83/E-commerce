<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('AddCart') }}">
        @csrf
        <input type="hidden" name="productId" value="{{$productId}}">
         <x-input-label for="mount" :value="__('Quantity Required')" />
        <input type="text" name="mount" >
        
        <div>
            <x-input-label for="card" :value="__('You are about to order the product.')" />

        </div>

            <x-primary-button class="ms-3">
                {{ __('Ok') }}
            </x-primary-button>
            <x-primary-button class="ms-3">
                {{ __('Cancel Order') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
