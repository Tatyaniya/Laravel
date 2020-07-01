@extends('app')

@section('content')

          <div class="content-top">
            <div class="content-top__text">Купить игры неборого без регистрации смс с торента, получить компкт диск, скачать Steam игры после оплаты</div>
            <div class="slider"><img src="{{ URL::asset('img/slider.png')}}" alt="Image" class="image-main"></div>
          </div>
          <div class="content-middle">
            <div class="content-head__container">
              <div class="content-head__title-wrap">
                  <?php /** @var \App\Category $categories */ ?>
                <div class="content-head__title-wrap__title bcg-title"></div>
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
              <div class="products-category__list">

                  <?php /** @var \App\Product $product */ ?>

                  @foreach($products as $product)

                        <div class="products-category__list__item">
                          <div class="products-category__list__item__title-product">
                              <a href="#">{{ $product->name  }}</a>
                          </div>
                          <div class="products-category__list__item__thumbnail">
                              <a href="#" class="products-category__list__item__thumbnail__link">
                                  <img src="/img/cover/game-{{ $product->getImageId() }}.jpg" alt="Preview-image">
                              </a>
                          </div>
                          <div class="products-category__list__item__description">
                              <span class="products-price">{{  $product->price }} руб.</span>
                              <a href="{{ route('buy', ['id' => $product->id])  }}" class="btn btn-blue">Купить</a>
                          </div>
                        </div>

                  @endforeach
              </div>
            </div>
          </div>
          <div class="content-bottom"></div>

@endsection
