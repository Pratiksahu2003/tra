<div class="bg-white rounded-lg p-2 {{ $attributes->get('bg-class', '') }}">
    <img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name', 'Trading Floor') }}" {{ $attributes->merge(['class' => 'h-auto']) }}>
</div>
