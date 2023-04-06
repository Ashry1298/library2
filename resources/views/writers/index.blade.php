@extends('layout')


@section('title')
    Authors
@endsection
@section('content')
    @include('inc.errors')
    @auth
        <a href="{{ route('writer.create') }}">
            <button type="button" class="btn btn-outline-primary active">Create</button>
        </a>
    @endauth
    <h1> Authors: </h1>

    @if (!empty($writers))
        <?php
        $x = 1;
        ?>
        @while ($x < count($writers))
            @foreach ($writers as $writer)
                <h3> {{ $x }} : </h3>
                <h1> {{ $writer->name }} </h1>
                <a href="{{ route('writer.show', $writer->id) }}">
                    <button type="button" class="btn btn-outline-primary active">Show</button>
                </a>
                @auth
                    <a href="{{ route('writer.edit', $writer->id) }}">
                        <button type="button" class="btn btn-outline-primary active">Edit</button>
                    </a>
                    <a href="{{ route('writer.delete', $writer->id) }}">
                        <button type="button" class="btn btn-outline-danger active">Delete</button>
                    </a>
                @endauth
                <hr>
                <?php
                $x++;
                ?>
            @endforeach
        @endwhile
    @else
        {{ 'Sorry There are no Authors here' }}
    @endif
@endsection
