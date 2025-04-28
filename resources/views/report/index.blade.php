<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Your Submitted Reports
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                @forelse ($reports as $report)
                    <div class="border-b border-gray-200 mb-4">
                        <p><strong>Location:</strong> {{ $report->location }}</p>
                        <p><strong>Description:</strong> {{ $report->description }}</p>
                        <p><strong>Submitted At:</strong> {{ $report->created_at }}</p>
                    </div>
                @empty
                    <p>You have not submitted any reports yet.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
<h2 class="text-2xl font-semibold mb-4">All Reports</h2>

@foreach ($reports as $report)
    <div class="p-4 border rounded mb-4 bg-white">
        <p><strong>Location:</strong> {{ $report->location }}</p>
        <p><strong>Description:</strong> {{ $report->description }}</p>
        <p><strong>Submitted At:</strong> {{ $report->created_at->format('d M Y H:i') }}</p>
    </div>
@endforeach
