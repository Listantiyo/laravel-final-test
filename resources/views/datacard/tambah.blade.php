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
          {{-- <form action={{route('cardlist.store')}} method="POST" class="container">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="namacard">Card Name</label>
                <input type="text" name="Name" class="form-control" id="namacard" placeholder="Enter Card Name" required>
              </div>
              <label for="type">Type</label>
              <div class="form-row ">
                <div class="form-group col-10">
                    <select id="inputStatus" name="id_type" class="form-control custom-select">
                      <option selected disabled><b class="text-success">Select Type</b></option>
                      @foreach ($data as $item)
                      <option value="{{$item->id}}">{{$item->Type}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group col-2">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                        Add New Type
                      </button>
                  </div>
            </div>

              <div class="form-group">
                <label for="desc">Desc</label>
                <textarea name="desc" class="form-control" id="desc"  rows="5"></textarea>
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit"  class="btn btn-primary">Submit</button>
            </div>
          </form> --}}

          <form action={{route ('cardlist.store')}}  method="POST" enctype="multipart/form-data">

            @csrf
            <div class="container-fluid">
                <div class="card-body">
                    <div class="row">
                      <div class="col-2">
                          <div class="mb-3 form-group container">
                            <label class="form-label pl-3" for="inputImage">Image</label>
                              <img id="blah" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT1WIZ61gHn5uKtyKRqBGiLf8_khmJSSSHsTl0rNKQu7HLii0cr7WpQ46vD8B4WsFWSa9A&usqp=CAU"
                              alt="" class="row border rounded" width="100" height="120" />

                                <div class="btn p-0 mt-1 text-primary" onclick="$('.imgbt').click()">Add Image</div>

                              <input name="image"
                              id="inputImage" type="file" style="display:none" class="imgbt row btn btn-success @error('image') is-invalid @enderror"
                              onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                        </div>
                      </div>
                      <div class="col-10">
                        <label for="namacard">Card Name</label>
                        <div class="form-row">
                          <div class="form-group col-12">
                            <input type="text" name="Name" class="form-control" id="namacard" placeholder="Enter Card Name" required>
                          </div>
                        </div>

                          <label for="type">Type</label>
                          <div class="form-row">
                                <div class="form-group col">
                                  <select id="inputStatus" name="id_type" class="form-control custom-select">
                                    <option selected disabled><b>Select Type</b></option>
                                    @foreach ($data as $item)
                                    <option value="{{$item->id}}">{{$item->Type}}</option>
                                    @endforeach
                                  </select>
                                </div>

                                <button type="button" class="btn btn-primary form-group col-2 mr-2" data-toggle="modal" data-target="#modal-default">
                                    Add New Type
                                  </button>
                          </div>
                      </div>
                    </div>

                      <div class="form-group">
                        <label for="desc">Desc</label>
                        {{-- <input type="text" name="deskripsi" class="form-control" id="exampleInputPassword1" placeholder="Password"> --}}
                        <textarea name="desc" class="form-control" id="desc"  rows="5"></textarea>
                      </div>
                  </div>
                  <!-- /.card-body -->
            </div>

            <div class="card-footer">
              <button type="submit"  class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
        <!-- /.card -->

        @include('datacard.modal')


</div>
</div>
@endsection
