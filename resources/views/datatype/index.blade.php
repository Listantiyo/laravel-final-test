@extends('layouts.master')

@section('content')

<div class="content-wrapper">
    <div class="p-5">
        <div class="row mb-3">
            <div class="col-12">
                <button type="button" class="btn btn-primary float-right form-group col-2 mr-2" data-toggle="modal" data-target="#modal-default">
                    Add New Type
                  </button>
            </div>
          </div>

        <table id="table_id" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th>Type</th>
                    <th width="30%">Another</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($data as $item)
                <tr>
                    <td class="align-middle">{{$loop->iteration}}</td>
                    <td class="align-middle">{{$item->Type}}</td>
                    <td class="align-middle">
                        <form role="form" action="{{ route('cardtype.edit',$item->id) }}" class="btn btn-flat" method="get">
                            {{-- <button type="submit" class="btn btn-warning btn-sm ">Warning</button> --}}
                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-default">
                                Edit
                              </button>
                        </form>
                        {{-- <a href="{{route('cardlist.edit',$item->id)}}" type="button" class="btn btn-warning btn-flat">Warning</a> --}}
                        <form role="form" action="{{ route('cardtype.destroy',$item->id) }}" class="btn" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button>
                        </form>

                        {{-- <a href="{{route('cardlist.destroy',$item->id)}}" type="button" role="button" class="btn btn-danger btn-flat">Danger</a> --}}
                      </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('datatype.modal')
{{-- @include('datatype.modaledit') --}}
@endsection




