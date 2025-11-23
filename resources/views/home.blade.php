@extends('layouts.admin.app')

@section('content')
    <!-- Dashboard Widgets -->
    <x-widgets />

    <!-- notifications and messages -->
    <x-notifications />
    {{-- sales chart --}}
    <x-charts />

    <!-- customers table -->
    <x-customers-table />

    <!-- NEW CONTENT STARTS HERE -->

    <!-- Recent Activity Section -->
    <x-recent-activity />

    <!-- Project Progress Section -->
    <x-project-progress />

    <!-- System Status Section -->
    <x-system-status />

    <!-- Support Tickets Section -->
    <x-support-tickets />
@endsection
