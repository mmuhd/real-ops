@extends('main')

@section('title', 'Create an event')

@section('main-content')
    <div class="container mx-auto">
        @include('partials._page-heading', ['title' => $event->title . ' - Event Details'])
        <div class="p-4 bg-gray-100">
            <img class="mx-auto max-w-full h-auto" src="https://picsum.photos/800/300" alt="Event Banner">
        </div>
        <div class="mt-4 px-4">
            <h2 class="text-lg">Event actions</h2>
            <hr class="mt-2">
        </div>

        <div x-data="{ editOpen: false }"
            @event-saved.window="editOpen = false"
            class="px-4">
            <div x-data="{ showSavedMessage: false }" @event-saved.window="showSavedMessage = true; setTimeout(() => showSavedMessage = false, 5000);"
                 x-show.transition.out.duration.1000ms="showSavedMessage"
                 class="mt-2 p-2 text-blue-300 bg-blue-50 border-2 border-blue-500">
                Changes were saved.
            </div>
            <div x-show="!editOpen" class="md:flex md:-mx-2">
                <div class="mt-4 md:px-2 md:w-1/2">
                    <button class="btn btn-blue w-full" @click="editOpen = true">Edit event details</button>
                </div>
                <div class="mt-4 md:px-2 md:w-1/2">
                    <a class="btn btn-red-secondary block w-full" href="#">Delete event (this action is permanent)</a>
                </div>
            </div>
            <div class="mt-4 w-full">
                <div x-show="editOpen">
                    <button @click="editOpen = false" class="w-full block btn btn-blue-secondary lg:w-1/3 lg:mx-auto">Cancel</button>
                    @livewire('edit-event', ['event' => $event])
                </div>
            </div>
        </div>
        <div class="mt-4 px-4">
            <h2 class="text-lg">Bookables actions</h2>
            <hr class="mt-2">
        </div>
        <div x-data="{ bookable: 'none'}">
            <div x-show="bookable === 'none'" class="mt-4 px-4 md:px-4 w-1/2">
                <button class="btn btn-blue w-full " @click="bookable = 'flight'">Add flight</button>
            </div>
            <div x-show="bookable !== 'none'" class="mt-4 px-4 md:px-4 w-full">
                <button class="btn btn-blue-secondary w-full " @click="bookable = 'none'">Cancel</button>
            </div>
            <div class="mt-4 px-4">
                <div x-show.transition.duration.300ms="bookable === 'flight'">
                    @livewire('add-bookable-flight', ['event' => $event])
                </div>
            </div>
        </div>
        <div class="mt-4 px-4">
            @livewire('display-bookables', ['event' => $event])
        </div>
    </div>
@endsection
