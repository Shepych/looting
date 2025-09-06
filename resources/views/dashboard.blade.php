<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 style="font-size: 30px;font-weight: bold;margin-bottom: 10px">Инвентарь</h2>
                    <section style="margin-bottom: 10px;display: flex;gap: 10px;flex-direction: column">
                        @foreach($inventory as $record)
                            <div style="display: flex;justify-content: start;align-items: center;gap:10px">
                                <img src="{{ $record->item->icon }}" width="70px" style="border:1px solid black" alt="">
                                <span>
                                    {{ $record->item->name }} ({{ $record->quantity }} шт)
                                </span>
                            </div>
                        @endforeach
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
