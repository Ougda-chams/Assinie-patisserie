@extends('layouts.appadmin')

@section('title')
    Produits
@endsection
{!!Form::hidden('', $increment =1)!!}

@section('contenu')
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Produits</h4>

           @if (Session::has('status'))
                        <div class="alert alert-success">
                            {{Session::get('status')}}
                        </div>
            @endif

          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table id="order-listing" class="table">
                  <thead>
                    <tr>
                        <th>Ordre</th>
                        <th>Image</th>
                        <th>Nom du produits</th>
                        <th>Catégories produits</th>
                        <th>Prix</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>

                  @foreach ($produits as $produit)
                      <tr>
                        <td>{{$increment}}</td>
                        <td><img class="img-fluid" src="/storage/product_images/{{$produit->product_image}}" alt=""></td>
                        <td>{{$produit->product_name}}</td>
                        <td>{{$produit->product_category}}</td>
                        <td>{{$produit->product_price}}</td>
                        <td>      
                          @if ($produit->status==1)
                              <label class="badge badge-success">Activé</label>            
                          @else
                            <label class="badge badge-danger">Desactivé</label> 
                          @endif
                        </td>
                        <td>
                          <button class="btn btn-outline-primary" onclick="window.location = '{{url('/edit_produit/'.$produit->id)}}'">Editer</button>
                          <button class="btn btn-outline-danger"><a href="{{url('/supprimerproduit/'.$produit->id)}}" id="delete">Supprimer</a></button>
                          @if ($produit->status==1)
                            <button class="btn btn-outline-warning" onclick="window.location = '{{url('/desactiver_produit/'.$produit->id)}}'">Desactiver</button>
                          @else
                              <button class="btn btn-outline-success" onclick="window.location = '{{url('/activer_produit/'.$produit->id)}}'">Activer</button>
                          @endif
                        </td>
                    </tr>
                    {!!Form::hidden('', $increment++)!!}
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection

@section('scripts')
    <script src="backend/js/data-table.js"></script>
@endsection