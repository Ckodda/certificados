@extends('layouts.app');
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <h4>Datos del alumno</h4>
                        </div>
                        <div class="col text-end">
                            <a href="{{ route('alumno.edit', ['alumno' => $alumno->id]) }}" class="btn btn-primary">Editar</a>
                        </div>
                    </div>
                    <form action="">
                        <div class="form-row">
                            <label for="inputNombre">Código</label>
                            <input disabled type="text" class="form-control" value="{{ $alumno->id }}">
                        </div>
                        <div class="form-row">
                            <label for="inputNombre">Nombre Completo</label>
                            <input disabled type="text" class="form-control" value="{{ $alumno->nombre }}">
                        </div>
                        <div class="form-row">
                            <label for="inputNombre">Documento de identidad y/o Carnet de extranjería</label>
                            <input disabled type="text" class="form-control" value="{{ $alumno->dni }}">
                        </div>
                    </form>
                </div>
                <div class="col">
                    @if (session('status'))
                        <div class="alert alert-{{ session('status') }}" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif

                    <div class="text-end">
                        <a class="btn btn-secondary" href="{{ route('certificado.create', ['alumno' => $alumno->id]) }}">Añadir
                            nuevo certificado</a>
                    </div>
                    <div class="table-responsive">
                            
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Id</th>
                                    <th scope="col">Alumno</th>
                                    <th scope="col">Curso o Diplomado</th>
                                    <th scope="col">Documento PDF</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($alumno->certificados as $key=> $certificado)
                                    <tr>
                                        <td> {{ $key + 1 }} </td>
                                        <td>{{ $certificado->id }}</td>
                                        <td>{{ $alumno->nombre }}</td>
                                        <td>{{ $certificado->nombre }}</td>
                                        <td>{{ $certificado->file }} </td>
                                        <td></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">El alumno no tiene ningun documento registrado</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    
                    </div>
                </div>
            </div>




        </div>
    </section>
@endsection
