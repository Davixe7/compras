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
              Nombre
            </th>
            <th>
              Apellidos
            </th>
            <th>
              Edad
            </th>
            <th>
              Genero
            </th>
          </thead>
          <tbody>
            @foreach( $sellers as $seller )
              <tr>
                <td>
                  {{ $seller->id }}
                </td>
                <td>
                  {{ $seller->details->name }}
                </td>
                <td>
                  {{ $seller->details->surname }}
                </td>
                <td>
                  {{ $seller->details->age }}
                </td>
                <td>
                  {{ $seller->details->gender }}
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>