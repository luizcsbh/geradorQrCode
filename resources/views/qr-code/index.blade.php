@extends('layouts.app')

@section('content')
    <form action="{{ route('qr-code.generate') }}" method="POST">
        @csrf

        <div>
            <label for="url">URL:</label>
            <input type="url" name="url" id="url" required>
        </div>

        <div>
            <label for="size">Tamanho:</label>
            <input type="number" name="size" id="size" min="50" max="500" step="50" value="200" required>
        </div>

        <button type="submit">Generate QR Code</button>
    </form>
@endsection
