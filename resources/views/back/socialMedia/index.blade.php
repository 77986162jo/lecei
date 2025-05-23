@extends('back.app')

@section('title','Dashboard - Reseaux sociaux')
    
@section('dashboard-header')
<div class="row align-items-center">
    <div class="col">
        <div class="mt-5">
            <h4 class="card-title float-left mt-2">Reseaux sociaux</h4>
            <a
                href="{{ route('socialMedia.create') }}"
                class="btn btn-primary float-right veiwbutton"
                >Ajouter un reseaux sociale</a
            >
        </div>
    </div>
</div>

@endsection

@section('dashboard-content')

<div class="row">
    <div class="col-sm-12">
        <div class="card card-table">
            <div class="card-body booking_card">
                <div class="table-responsive">
                    <table class="datatable table table-stripped table table-hover table-center mb-0">
                        <thead>
                            <tr>
                                <th>ID Media</th>
                                <th>Icon</th>
                                <th>Nom</th>
                                <th>Lien</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($socialMedias as $social)
                                 <tr>
                                <td>LIEN-000{{ $social->id }}</td>
                                <td><i class="{{ $social->icon }}"></i></td>
                                <td>{{ $social->name }}</td>
                                <td><a href="{{ $social->lien }}" target="_blank">{{ $social->lien }}</a></td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action"> <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v ellipse_color"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right"> 
                                            <a class="dropdown-item" href="{{ route('socialMedia.edit', $social) }}"><i class="fas fa-pencil-alt m-r-5"></i> Modifier</a> 
                                                
                                                <form action="{{ route('socialMedia.destroy', $social) }}" method="POST" onsubmit="return confirm('Etes-vous sûr de vouloir supprimer cet élément ?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item text-danger">
                                                        <i class="fas fa-trash-alt m-r-5"></i> Supprimer
                                                    </button>
                                                </form>
                                          </div>
                                    </div>
                                </td>
                             </tr>
                            @endforeach
                           
     
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

