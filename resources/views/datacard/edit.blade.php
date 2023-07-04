@extends('layouts.master')

@section('content')
<div class="content-wrapper">

<div class="container-fluid px-4 pb-1 pt-4">

        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->

          <form action={{route('cardlist.update',$edit)}} method="POST">
            @csrf
            @method('put')
            <div class="card-body">
              <div class="form-group">
                <label for="namacard">Card Name</label>
                {{-- @php
                    echo dd($edit);
                @endphp --}}
                <input type="text" name="Name" class="form-control" id="namacard" placeholder="" value="{{$edit->Name}}" required>
              </div>
              <div class="form-group">
                <label for="type">Type</label>
                <select id="inputStatus" name="id_type" class="form-control custom-select">
                  <option disabled><b class="text-success">Select Type</b></option>
                  @foreach ($data as $key=>$item)
                  <option value="{{$item->id}}" {{ ($item->id == $edit->id_type ? "selected":"") }}>{{$item->Type}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="desc">Desc</label>
                <textarea name="desc" class="form-control" id="desc"  rows="5">{{$edit->desc}}</textarea>
              </div>
            </div>

            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit"  class="btn btn-primary">Submit</button>
            </div>

          </form>

        </div>
        <!-- /.card -->



</div>
</div>
@endsection
