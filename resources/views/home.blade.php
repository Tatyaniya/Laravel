@extends('app')

@section('content')

          <div class="content-top">
            <div class="content-top__text">Купить игры неборого без регистрации смс с торента, получить компкт диск, скачать Steam игры после оплаты</div>
            <div class="slider"><img src="/img/slider.png" alt="Image" class="image-main"></div>
          </div>
          <div class="content-middle">
            <div class="content-head__container">
              <div class="content-head__title-wrap">
                <div class="content-head__title-wrap__title bcg-title">Последние товары</div>
              </div>
              <div class="content-head__search-block">
                <div class="search-container">
                  <form class="search-container__form">
                    <input type="text" class="search-container__form__input">
                    <button class="search-container__form__btn">search</button>
                  </form>
                </div>
              </div>
            </div>
            <div class="content-main__container">
                @if ($is_admin)
                    <div class="controls controls__home">
                        <a href="{{route('create')}}">Добавить игру</a>
                        <a href="{{route('catlist')}}">Перейти к списку категорий</a>
                    </div>
                @endif
              <div class="products-columns">


                  <?php /** @var \App\Product $product */ ?>
                  <?php /** @var Illuminate\Pagination\LengthAwarePaginator $products */ ?>

                      @foreach($products as $product)
                          <div class="products-columns__item">
                              <div class="products-columns__item__title-product">
                                  <a href="{{ route('product', ['id' => $product->id]) }}" class="products-columns__item__title-product__link">{{ $product->name  }}</a>
                               </div>
                              <div class="products-columns__item__thumbnail">
                                  <a href="{{ route('product', ['id' => $product->id]) }}" class="products-columns__item__thumbnail__link">
                                      <img src="/img/cover/game-{{ $product->getImageId() }}.jpg" alt="Preview-image" class="products-columns__item__thumbnail__img">
                                  </a></div>
                              <div class="products-columns__item__description">
                                  <span class="products-price">{{  $product->price }} руб</span>
                                  <a href="{{ route('buy', ['id' => $product->id]) }}" class="btn btn-blue">Купить</a>
                              </div>
                          </div>
                      @endforeach
                </div>
              </div>

            <div class="content-footer__container">

                {{ $products->links('pagination') }}

            </div>
          </div>
          <div class="content-bottom"></div>


@endsection


