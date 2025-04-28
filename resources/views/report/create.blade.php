@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white shadow-md rounded p-6">
    <h2 class="text-2xl font-semibold mb-4">Submit a Safety Report</h2>
    <form action="{{ route('report.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="location" class="block font-medium">Location</label>
            <input type="text" name="location" id="location" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block font-medium">Description</label>
            <textarea name="description" id="description" rows="4" class="w-full border rounded px-3 py-2" required></textarea>
        </div>

        <div class="mb-4">
            <label class="inline-flex items-center">
                <input type="checkbox" name="is_anonymous" class="mr-2">
                Submit as anonymous
            </label>
        </div>

        <div class="flex justify-center mt-4">
    <button type="submit" class="bg-green-600 text-black font-bold px-6 py-2 rounded-lg shadow-md hover:bg-green-700 transition duration-300">
        Submit Report
    </button>
</div>




    </form>
</div>
@endsection
