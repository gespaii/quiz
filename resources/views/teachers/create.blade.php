@extends('app')
@section('content')
<div class="row">
    <div class="col-md-6">
        @if($errors->any())
        @foreach($errors->all() as $err)
        <p class="alert alert-danger">{{ $err }}</p>
        @endforeach
        @endif
        <form action="{{ route('teachers.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Name Teachers <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="name_user" value="{{ old('name_teachers') }}" />
            </div>
            <div class="form-group">
                <label>City <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="city" value="{{ old('city') }}" />
            </div>
            <div class="form-group">
                <label>Place Of Birth <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="pob" />
            </div>
            <div class="form-group">
                <label>Level <span class="text-danger">*</span></label>
                <select class="form-control" name="level" />
                @foreach($levels as $key => $val)
                @if($key==old('level'))
                <option value="{{ $key }}" selected>{{ $val }}</option>
                @else
                <option value="{{ $key }}">{{ $val }}</option>
                @endif
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Simpan</button>
                <a class="btn btn-danger" href="{{ route('teachers.index') }}">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection