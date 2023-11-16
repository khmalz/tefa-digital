@extends('layouts.main')


@push('styles')
    <style>
        /* Base styles */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        /* Sidebar styles */
        #sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: -250px;
            /* Hide the sidebar by default */
            background-color: #333;
            transition: left 0.3s;
        }

        #sidebar.open {
            left: 0;
        }

        #sidebar ul {
            list-style: none;
            padding: 0;
        }

        #sidebar li {
            padding: 10px;
            text-align: center;
        }

        #sidebar a {
            text-decoration: none;
            color: white;
            display: block;
        }

        /* Top bar styles */
        #topbar {
            background-color: #333;
            color: white;
            padding: 10px;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1;
        }

        /* Content styles */
        #content {
            margin-left: 0;
            padding: 15px;
            transition: margin-left 0.3s;
        }

        /* Button to open/close sidebar */
        #toggle-button {
            background-color: #333;
            border: none;
            color: white;
            cursor: pointer;
            font-size: 20px;
            position: fixed;
            top: 15px;
            left: 10px;
            z-index: 2;
        }

        /* Media query for responsiveness */
        @media (max-width: 768px) {
            #sidebar {
                width: 100%;
            }

            #sidebar.open {
                left: 0;
            }

            #content {
                margin-left: 0;
            }
        }
    </style>
@endpush

@section('header')
    <!-- Sidebar -->
    <div id="sidebar">
        <ul>
            <li><a href="{{ url('#') }}">Home</a></li>
            <li><a href="{{ url('#') }}">About</a></li>
            <li><a href="{{ url('#') }}">Services</a></li>
            <li><a href="{{ url('#') }}">Contact</a></li>
        </ul>
    </div>

    <!-- Top bar with toggle button -->
    <div id="topbar">
        <button id="toggle-button">&#9776;</button>
    </div>
@endsection

@push('scripts')
    <script>
        document.getElementById("toggle-button").addEventListener("click", function() {
            document.getElementById("sidebar").classList.toggle("open");
            document.getElementById("content").classList.toggle("open");
        });
    </script>
@endpush
