@extends('layout.master')

@section('title')
    <title>Edit Data - RW 02 Tlogomas</title>
@endsection

@section('content')
<main>
    <div class="container-fluid px-4">
        <h2 class="mt-4 mb-4">Edit Data : {{  $data-> name}}</h2>

        <div class="card mb-4 col-lg-8">
            
            <div class="card-body">

                <form action="/dashboard/posts/{{ $data->id }}" method="POST">
                    @method('patch')
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" required autofocus value="{{ old('name', $data->name) }}" @error('name') 
                            is-invalid
                        @enderror id="name" name="name">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nik" class="form-label">NIK (Nomor Induk Kependudukan)</label>
                        <input type="number" class="form-control" required autofocus value="{{ old('nik', $data->nik) }}" @error('nik') 
                            is-invalid
                        @enderror id="nik" name="nik">
                        @error('nik')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>

                    <div class="mb-3">
                        <label for="number_of_kk" class="form-label">Nomor KK</label>
                        <input type="number" class="form-control" required autofocus value="{{ old('number_of_kk', $data->number_of_kk) }}" @error('number_of_kk') 
                            is-invalid
                        @enderror id="number_of_kk" name="number_of_kk">
                        @error('number_of_kk')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat</label>
                        <input type="text" class="form-control" required autofocus value="{{ old('address', $data->address) }}" @error('address') 
                            is-invalid
                        @enderror id="address" name="address">
                        @error('address')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="neighbourhood" class="form-label">Rukun Tetangga (RT){{ $data->neighbourhood_id }}</label>
                        <select class="form-control form-select" required autofocus @error('neighbourhood') 
                            is-invalid
                        @enderror id="neighbourhood" name="neighbourhood_id">
                            @error('neighbourhood')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                            @foreach ($neighbourhoods as $neighbourhood)
                            
                                @if (old('neighbourhood_id', $data->neighbourhood_id) == $neighbourhood->id)
                                    <option value="{{ $neighbourhood->id }}" selected >{{ $neighbourhood->neighbourhood_name }}</option> 
                                @else
                                <option value="{{ $neighbourhood->id }}" >{{ $neighbourhood->neighbourhood_name }}</option> 
                                @endif
                                
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="religion" class="form-label">Agama</label>
                        <select class="form-control form-select" required autofocus @error('religion') 
                            is-invalid
                        @enderror id="religion" name="religion_id">
                            @error('religion')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                            @foreach ($religions as $religion)
                            
                                @if (old('religion_id', $data->religion_id) == $religion->id)
                                    <option value="{{ $religion->id }}" selected >{{ $religion->religion_name }}</option> 
                                @else
                                <option value="{{ $religion->id }}" >{{ $religion->religion_name }}</option> 
                                @endif
                                
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Jenis Kelamin</label>
                        <select class="form-control form-select" required autofocus id="gender" @error('gender') 
                            is-invalid
                        @enderror name="gender_id">
                            @error('gender')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            @foreach ($genders as $gender)
                            
                                @if (old('gender_id', $data->gender_id) == $gender->id)
                                    <option value="{{ $gender->id }}" selected >{{ $gender->gender_name }}</option> 
                                @else
                                    <option value="{{ $gender->id }}" >{{ $gender->gender_name }}</option> 
                                @endif
                            
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="place-birth" class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control" required autofocus value="{{ old('place_of_birth', $data->place_of_birth) }}" @error('place_of_birth') 
                            is-invalid
                        @enderror id="place-birth" name="place_of_birth">
                        @error('place_of_birth')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                    <div class="mb-3">
                        <label for="date">Tanggal Lahir</label>
                        <div class="input-group date" id="datepicker">
                            <input type="text" class="form-control" required autofocus value="{{ old('date_of_birth', $data->date_of_birth) }}" @error('date_of_birth') 
                                is-invalid
                            @enderror name="date_of_birth">
                            @error('date_of_birth')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <span class="input-group-append ms-2">
                                <span class="input-group-text bg-light d-block">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status Perkawinan</label>
                        <select class="form-control form-select" required autofocus  @error('status') 
                            is-invalid
                        @enderror id="status" name="status_id">
                        @error('status')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        @foreach ($statuses as $status)
                                
                            @if (old('status_id', $data->status_id) == $status->id)
                                <option value="{{ $status->id }}" selected >{{ $status->status_name }}</option> 
                            @else
                                <option value="{{ $status->id }}" >{{ $status->status_name }}</option> 
                            @endif
                            
                        @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="proffesion" class="form-label">Pekerjaan</label>
                        <input type="text" class="form-control" required autofocus value="{{ old('proffesion', $data->proffesion) }}" @error('proffesion') 
                            is-invalid
                        @enderror id="proffesion" name="proffesion">
                    </div>
                    <div class="mb-3">
                        <label for="state" class="form-label">Kewarganegaraan</label>
                        <select class="form-control form-select" required autofocus @error('state') 
                            is-invalid
                        @enderror id="state" name="state_id">
                        @error('state')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        @foreach ($states as $state)
                                
                        @if (old('state_id', $data->state_id) == $state->id)
                            <option value="{{ $state->id }}" selected >{{ $state->state_name }}</option> 
                        @else
                            <option value="{{ $state->id }}" >{{ $state->state_name }}</option> 
                        @endif
                        
                    @endforeach 
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </form>

            </div>
        </div>
    </div>
</main>
    
@endsection