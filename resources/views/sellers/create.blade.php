@extends('templates.app')
@section('content')
<div class="row">
  <div class="col-lg-6 mx-auto">
    <div class="card">
      <div class="card-header">
        Registrar Vendedor
      </div>
      <div class="card-body">
        <div class="form-group mb-3">
          <div class="form-check form-check-inline" onclick="toggleForm('#persona-form')" data-type="persona">
            <input class="form-check-input" type="radio" name="seller_type_" id="inlineRadio1" value="persona">
            <label class="form-check-label" for="inlineRadio1">Persona</label>
          </div>
          <div class="form-check form-check-inline" onclick="toggleForm('#empresa-form')" data-type="empresa">
            <input class="form-check-input" type="radio" name="seller_type_" id="inlineRadio2" value="empresa">
            <label class="form-check-label" for="inlineRadio2">Empresa</label>
          </div>
        </div>

        <form action="{{ route('sellers.store') }}" method="POST">
          @csrf
          <div id="persona-form" class="toggleable-form">
            <div class="form-group mb-3">
              <label for="#">Nombres</label>
              <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group mb-3">
              <label for="#">Apellidos</label>
              <input type="text" class="form-control" name="surname">
            </div>
            <div class="form-group mb-3">
              <label for="#">Edad</label>
              <input type="text" class="form-control" name="age">
            </div>
            <div class="form-group mb-3">
              <label for="#">Género</label>
              <select class="form-control" name="gender">
                <option value="m">Masculino</option>
                <option value="f">Femenino</option>
              </select>
            </div>
            <input type="hidden" name="seller_type" value="persona">
            <div class="form-group mb-3 text-right">
              <button type="submit" class="btn btn-primary ml-auto">
                Guardar
              </button>
            </div>
          </div>
        </form>

        <form action="{{ route('sellers.store') }}" method="POST">
          @csrf
          <div id="empresa-form" class="toggleable-form d-none">
            <div class="form-group mb-3">
              <label for="#">RUC</label>
              <input type="text" class="form-control" name="ruc" value="12345">
            </div>
            <div class="form-group mb-3">
              <label for="#">Nombre</label>
              <input type="text" class="form-control" name="name" value="Empresa 0">
            </div>
            <div class="form-group mb-3">
              <label for="#">Contacto</label>
              <input type="text" class="form-control" name="contact" value="John Doe">
            </div>
            <div class="form-group mb-3">
              <label for="#">Teléfono</label>
              <input type="tel" class="form-control" name="phone" value="3211231234">
            </div>
            <div class="form-group mb-3">
              <label for="#">Email</label>
              <input type="email" class="form-control" name="email" value="empresa@mail.com">
            </div>
            <div class="form-group mb-3">
              <label for="#">Dirección</label>
              <input type="text" class="form-control" name="address" value="lorem ipsum">
            </div>
            <input type="hidden" name="seller_type" value="empresa">
            <div class="form-group mb-3 text-right">
              <button type="submit" class="btn btn-primary ml-auto">
                Guardar
              </button>
            </div>
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