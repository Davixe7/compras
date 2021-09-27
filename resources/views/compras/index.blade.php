@extends('templates.app')
@section('content')
<div class="row">
  <div class="col-lg-6 mx-auto">
    <div class="card">
      <div class="card-header">
        Compras
      </div>
      <div class="card-body">
        <table class="table">
          <thead>
            <th>
              ID
            </th>
            <th>
              Vendedor
            </th>
          </thead>
          <tbody>
            @foreach( $compras as $compra )
              <tr>
                <td>
                  {{ $compra->id }}
                </td>
                <td>
                  {{ $compra->seller->details->name }}
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>