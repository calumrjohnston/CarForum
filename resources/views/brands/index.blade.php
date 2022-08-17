<link type="text/css" rel="stylesheet" href="{{ URL::asset('index.css')}}">
<!doctype html>
<html lang = "en">

@extends('layouts.app')

@section('title','ModelCars')

@section('content')
<head>
  <title>Brands</title>
</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <div class="card-header">
    <p>The brands of Swamse Foreign Cars</p>
  </div>
  <div class="card-body">
    <div id = "root">
      <ul>
        <li v-for="brand in brands">@{{brand.name}}</li>
      </ul>
      <h2>New Brand</h2>
      Brand name: <input type="text" id="input" v-model="newBrandName"><br>
      Headquarters: <input type="text" id="input" v-model="newBrandHeadquarters"><br>
      Founder: <input type="text" id="input" v-model="newBrandFounder"><br>
      Phonenumber: <input type="text" id="input" v-model="newBrandPhonenumber"><br>
      Email: <input type="text" id="input" v-model="newBrandEmail"><br>
      <button @click="createBrand">Create</button>
    </div>
    <script>
      var app = new Vue({
        el:"#root",
        data: {
          brands: [],
          newBrandName: '',
          newBrandHeadquarters: '',
          newBrandFounder: '',
          newBrandPhonenumber: '',
          newBrandEmail: '',
        },
        mounted(){
          axios.get("{{ route ('api.brands.index') }}")
          .then(response=>{
            this.brands = response.data;
          })
          .catch(response=>{
            console.log(response);
          })
        },
      methods: {
        createBrand: function(){
          axios.post("{{ route('api.brands.store')}}", {
            name: this.newBrandName,
            headquarters: this.newBrandHeadquarters,
            founder: this.founder,
            phonenumber: this.newBrandPhonenumber,
            email: this.newBrandEmail
          })
          .then(response=>{
            this.brands.push(response.data);
            this.newBrandName = '';
            this.newBrandHeadquarters = '';
            this.newBrandFounder = '';
            this.newBrandPhonenumber = '';
            this.newBrandEmail = '';
          })
          .catch(response=>{
            console.log(response);
          })
        }
      }
    });
    </script>
  </div>
</body>

</html>
@endsection
