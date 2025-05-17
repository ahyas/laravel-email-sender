@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">            
                    <div class="card-header">Kirim email</div>
                        <div class="card-body"> 
                            @if(Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{Session::get('success')}}
                            </div>
                            @endif
                            
                            <form action="{{route('email.send')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="tujuan" class="font-weight-bold">Tujuan</label>
                                    <input type="email" class="form form-control" placeholder="Masukan alamat email yang valid" name="tujuan">
                                    @if($errors->has('tujuan'))
                                        <span class="text-danger">{{ $errors->first('tujuan') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="message" class="font-weight-bold">Pesan</label>
                                    <textarea class="form-control" placeholder="Masukan pesan singkat" name="message" rows="3"></textarea>
                                    @if($errors->has('message'))
                                        <span class="text-danger">{{ $errors->first('message') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Send</button>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script type="text/JavaScript">
    $(document).ready(function(){

    });
</script>
@endpush
