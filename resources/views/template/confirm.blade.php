<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('checkout') }}">
        @csrf
        <input type="hidden" name="cardId" value="{{$id}}">
        <!-- Email Address -->
        <div>
            <x-input-label for="card" :value="__('Payment confirmation')" />

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
