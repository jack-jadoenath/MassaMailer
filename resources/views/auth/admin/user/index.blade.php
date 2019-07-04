@extends('layouts.admin')

@section('content')
        {{ session('message') }}

        @if($users != null && count($users) > 0)
            <table>
                <tr>
                    <th>Naam</th>
                    <th>Email</th>
                    <th>Telefoon</th>
                    <th>Pakket</th>
                    <th>Acties</th>
                </tr>
            @foreach($users as $user)
           
                <tr>
                    <td>{{ $user->name }} </td>
                    <td>{{ $user->email }} </td>
                    <td>{{ $user->phone }} </td>
                    <td>{{ $user->packages_id }} </td>
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
