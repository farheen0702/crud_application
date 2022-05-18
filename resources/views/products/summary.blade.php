@extends('layouts.app')

@section('content')

<div class="col-lg-12">
<div class="card">
    <div class="card-header">
        <strong class="card-title">Crud Application</strong>
        <button type="button" id="snmp-create" class="btn btn-primary btn-sm" onclick="window.location.href='{{ route('products.create') }}'" style="float: right"><i class="fa fa-plus-square"></i>&nbsp; Add</button>
    </div>
    <div class="card-body table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Price</th>
              <th scope="col">Currency</th>
              <th></th><th></th>
            </tr>
          </thead>
          <tbody>
          @foreach($products as $product)
            <tr>
              <th scope="row">{{ $product->id }}</th>
              <td>{{ $product->name }}</td>
              <td>{{ $product->price }}  {{'$'}}</td>
              <td>{{ $product->currency }}</td>
              <td>
              <a href="{{ URL::route('products.edit', $product->id) }}"
                               class="btn btn-sm btn-primary">Edit
                                <span class="fas fa-edit  fa-lg"></span>
                            </a>
              </td>
              <td>
              <form action="{{ route('products.destroy', $product->id) }}" method="POST">
         
                @csrf
                @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm btn-sm delete-btn"><i class="fa fa-trash"></i>&nbsp;Delete</button>
                </form>
          </tr>
            </tr>
          @endforeach
          </tbody>
        </table>
        {{ $products->links() }}
    </div>
</div>
</div>

@endsection

