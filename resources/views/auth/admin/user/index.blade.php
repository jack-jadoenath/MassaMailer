@extends('layouts.admin')

@section('title')
    MM - Admin - Users
@endsection

@section('content')
        {{ session('message') }}

        @if($users != null && count($users) > 0)
            <table class="table">
                <tr>
                    <th scope="col" class="text_center">Naam</th>
                    <th scope="col" class="text_center">Email</th>
                    <th scope="col" class="text_center">Telefoon</th>
                    <th scope="col" class="text_center">Pakket</th>
                    <th scope="col" class="text_center">Acties</th>
                </tr>
            @foreach($users as $user)
           
                <tr>
                    <td class="text_center">{{ $user->name }} </td>
                    <td class="text_center">{{ $user->email }} </td>
                    <td class="text_center">{{ $user->phone }} </td>
                    <td class="text_center">{{ $user->packages_id }} </td>
                    <td>

                        <a class="btn btn-primary right"  title="Bewerk" href="{{ route('user.edit', $user) }}"><i class="fa fa-pencil"></i></a>
                        <form method="POST" action="{{ route('user.destroy', $user) }}" class="right">
                            {{ method_field('DELETE') }}
                            @csrf
                            <button type="submit"  title="Verwijder" class="btn btn-danger"><i class="fa fa-trash" ></i></button>
                        </form>
                    
                    </td>
                </tr>
            
            @endforeach
            </table>
        @else
            <br>
            <div class="card">
                <div class="card-header">
                    Geen gebruikers gevonden
                </div> 
            </div>
        @endif
@endsection
