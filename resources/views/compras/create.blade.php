@extends('templates.app')
@section('content')
<div class="row">
  <div class="col-lg-6 mx-auto">
    <div class="card">
      <div class="card-header">
        Registrar Compra
      </div>
      <div class="card-body">
        <div class="form-group mb-3">
          <div class="form-check form-check-inline" onclick="toggleForm('#persona-form')">
            <input class="form-check-input" type="radio" name="seller_type_" id="inlineRadio1" value="persona">
            <label class="form-check-label" for="inlineRadio1">Persona</label>
          </div>
          <div class="form-check form-check-inline" onclick="toggleForm('#empresa-form')">
            <input class="form-check-input" type="radio" name="seller_type_" id="inlineRadio2" value="empresa">
            <label class="form-check-label" for="inlineRadio2">Empresa</label>
          </div>
        </div>

        <form action="{{ route('compras.store') }}" method="POST" class="toggleable-form mb-3" id="persona-form">
          @csrf
          <div class="form-group mb-3">
            <label for="#">Seleccione Persona</label>
            <select name="seller_id" class="form-control">
              @foreach($personas as $seller)
              <option value="{{ $seller->id }}">
                {{ $seller->details->name }}
              </option>
              @endforeach
            </select>
          </div>
          <div class="form-group text-right">
            <button class="btn btn-primary ml-auto">
              Guardar
            </button>
          </div>
        </form>

        <form action="{{ route('compras.store') }}" method="POST" class="toggleable-form d-none" id="empresa-form">
          @csrf
          <div class="form-group mb-3">
            <label for="#">Seleccione Empresa</label>
            <select name="seller_id" class="form-control">
              @foreach($empresas as $seller)
              <option value="{{ $seller->id }}">
                {{ $seller->details->name }}
              </option>
              @endforeach
            </select>
          </div>
          <div class="form-group text-right">
            <button class="btn btn-primary ml-auto">
              Guardar
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  function toggleForm(target) {
    document.querySelectorAll('.toggleable-form').forEach(form => form.classList.add('d-none'))
    document.querySelector(target).classList.remove('d-none')
  }
</script>