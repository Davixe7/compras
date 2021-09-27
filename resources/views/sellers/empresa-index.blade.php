@extends('templates.app')
@section('content')
<div class="row">
  <div class="col-lg-6 mx-auto">
    <div class="card">
      <div class="card-header">
        Vendedores
      </div>
      <div class="card-body">
        <table class="table">
          <thead>
            <th>
              ID
            </th>
            <th>
              RUC
            </th>
            <th>
              Nombre
            </th>
            <th>
              Contacto
            </th>
            <th>
              Teléfono
            </th>
          </thead>
          <tbody>
            @foreach( $sellers as $seller )
              <tr>
                <td>
                  {{ $seller->id }}
                </td>
                <td>
                  {{ $seller->details->ruc }}
                </td>
                <td>
                  {{ $seller->details->name }}
                </td>
                <td>
                  {{ $seller->details->contact }}
                </td>
                <td>
                  {{ $seller->details->phone }}
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>