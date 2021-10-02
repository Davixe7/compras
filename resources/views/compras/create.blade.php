@extends('templates.app')
@section('content')
<style>
    table.table tr td {
      vertical-align: middle;
    }
  </style>
<div id="app">  
  <div class="row">
    <div class="col-lg-7 mx-auto">
      <div class="card">
        <div class="card-header">
          Registrar Compra
        </div>

        <div class="card-body">
          <div class="form-group mb-3">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" v-model="mode" name="mode" id="radio1" value="personas">
              <label class="form-check-label" for="radio1">Persona</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" v-model="mode" name="mode" id="radio2" value="empresas">
              <label class="form-check-label" for="radio2">Empresa</label>
            </div>
          </div>

          <form>
            <div class="form-group mb-3">
              <div v-if="mode == 'personas'">
                <v-select
                  :options="personas"
                  v-model="seller"
                  :clear-search-on-select="true"
                  :placeholder="'Seleccione persona'"
                  :label="'name'">
                </v-select>
              </div>
              <div v-else>
                <v-select
                  :options="empresas"
                  :clear-search-on-select="true"
                  :placeholder="'Seleccione empresa'"
                  v-model="seller"
                  :label="'name'">
                </v-select>
              </div>
            </div>
          </form>

          <div class="form-group">
            <v-select
              :options="available"
              @option:selected="addProduct"
              v-model="selectProduct"
              :label="'name'"
              :clear-search-on-select="true"
              :placeholder="'Seleccione producto'">
            </v-select>
          </div>

          <table class="table mt-3">
            <thead>
              <th>Nombre</th>
              <th>Unidad</th>
              <th>Precio</th>
              <th>Cantidad</th>
              <th>Subtotal</th>
              <th>Acciones</th>
            </thead>
            <tbody>
              <tr v-for="product in selection">
                <td>
                  @{{ product.name }}
                </td>
                <td>
                  <select
                    v-model="selection[ selection.indexOf(product) ].unit"
                    class="form-select">
                    <option value="g" selected>Gramo</option>
                    <option value="kg">Kilogramo</option>
                  </select>
                </td>
                <td>
                  <input
                    v-model="selection[ selection.indexOf(product) ].price"                  
                    style="max-width: 5em;"
                    class="form-control"
                    type="number"
                    min="0">
                </td>
                <td>
                  <input
                    style="max-width: 5em;"
                    class="form-control"
                    type="number"
                    v-model="selection[ selection.indexOf(product) ].qty"
                    min="1">
                </td>
                <td>
                  @{{ product.qty * product.price }}
                </td>
                <td>
                  <button
                    class="btn btn-danger btn-sm"
                    style="margin-left: auto;"
                    @click="removeProduct(product)">
                    Eliminar
                  </button>
                </td>
              </tr>
              <tr>
                <td colspan="4">Total</td>
                <td>
                  @{{ total }}
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="card-footer text-right">
          <button
            @click="storeCompra"
            class="btn btn-primary ml-auto"
            :disabled="!seller || !selection || !selection.length">
            <span v-if="!saving">Guardar</span>
            <div v-else class="spinner-border spinner-border-sm" role="status">
              <span class="visually-hidden">Loading...</span>
            </div>
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
<script src="https://unpkg.com/vue-select@latest"></script>
<link rel="stylesheet" href="https://unpkg.com/vue-select@latest/dist/vue-select.css">
<script>
  Vue.component('v-select', VueSelect.VueSelect);
  const app = new Vue({
    el: '#app',
    data(){return{
      saving: false,
      selectProduct: null,
      
      personas: [],
      empresas: [],
      products: [],

      mode: 'personas',
      seller: null,
      selection: [],
      
    }},
    computed:{
      available(){
        return this.products.filter(p => this.selection.indexOf(p) == -1)
      },
      total(){
        if( !this.selection || !this.selection.length ){ return 0 }
        return this.selection.reduce((total, p) => {
          return total + (p.price * p.qty)
        }, 0)
      }
    },
    methods:{
      storeCompra(){
        this.saving = true;
        fetch('/compras',{
          method: 'POST',
          body: JSON.stringify({
            seller_id: this.seller.id,
            selection: this.selection
          }),
          headers: {
            "Content-Type": "application/json",     
            "Accept": "application/json, text-plain, */*",     
            "X-Requested-With": "XMLHttpRequest",
            'X-CSRF-TOKEN': window.CSRF_TOKEN
          },
          credentials: 'same-origin'
        })
        .then(response => response.json())
        .then(json => {
          this.saving = false
          console.log(json)
        })
      },
      addProduct(){
        if( this.selectProduct ){
          this.selection.push( this.selectProduct )
        }
      },
      removeProduct(product){
        this.selection.splice( this.selection.indexOf(product), 1)
      }
    },
    mounted(){
      this.personas = {!! json_encode($personas) !!}
      this.empresas = {!! json_encode($empresas) !!}
      this.products = {!! json_encode($products) !!}.map(p=>({...p, qty: 1, unit: 'g', product_id: p.id}))
    }
  })
</script>
@endsection
