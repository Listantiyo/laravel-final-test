@extends('layouts.master')

@section('content')

<div class="content-wrapper">
    <div class="p-5">
        <div class="row mb-3">
            <div class="col-12">
                <a href="{{route('cardlist.create')}}" class="btn btn-primary float-right">New Card</a>
            </div>
          </div>

        <table id="table_id" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Card</th>
                    <th>Card Name</th>
                    <th>Card Type</th>
                    <th>Detail</th>
                    <th>Another</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($data as $item)
                <tr>
                    <td class="align-middle">{{$loop->iteration}}</td>
                    <td><img src="{{ asset(Storage::url($item->path)) }}" width="150" alt="img" class="img-thumbnail mb-2"></td>
                    <td class="align-middle">{{$item->Name}}</td>
                    <td class="align-middle">{{$item->typecard->Type}}</td>
                    <td class="align-middle">{{$item->desc}}</td>
                    <td class="align-middle">
                        <form role="form" action="{{ route('cardlist.edit',$item->id) }}" class="btn" method="get">
                            <button type="submit" class="btn btn-warning btn-sm"><i class=""></i>Update</button>
                        </form>
                        {{-- <a href="{{route('cardlist.edit',$item->id)}}" type="button" class="btn btn-warning btn-flat">Warning</a> --}}
                        <form role="form" action="{{ route('cardlist.destroy',$item->id) }}" class="btn" method="post">
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
@endsection




