@extends('front.layouts.index')
@section('content')

     <!-- product section -->
     <section class="product_section layout_padding">
        <div class="container">
           <div class="heading_container heading_center">
              <h2>
                 Our <span>products</span>
              </h2>
           </div>
           <div class="row">
            @foreach ($products as $product)
            <div class="col-sm-6 col-md-4 col-lg-4">
                 <div class="box">
                    <div class="option_container">
                       <div class="options">
                          <a href="" class="option1">
                          {{$product->name}}
                          </a>
                          <a href="{{url('addtocart/'. $product->id)}}" class="option2">
                          Add To Cart
                          </a>
                       </div>
                    </div>
                    <div class="img-box">
                       <img src={{'storage/'.$product->image}} alt={{$product->name}}>
                    </div>
                    <div class="detail-box">
                       <h5>
                        {{$product->name}}
                       </h5>
                       <h6>
                        {{$product->price}}$
                       </h6>
                    </div>
                 </div>
              </div>
           @endforeach
        </div>
     </section>
     <!-- end product section -->

@endsection
