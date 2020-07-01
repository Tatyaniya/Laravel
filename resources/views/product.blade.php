@extends('app')

@section('content')

          <div class="content-top">
            <div class="content-top__text">Купить игры неборого без регистрации смс с торента, получить компкт диск, скачать Steam игры после оплаты</div>
            <div class="image-container"><img src="/img/slider.png" alt="Image" class="image-main"></div>
          </div>
          <div class="content-middle">
            <div class="content-head__container">
              <div class="content-head__title-wrap">
                <div class="content-head__title-wrap__title bcg-title">The Witcher 3: Wild Hunt в разделе action</div>
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
              <div class="product-container">
                  <?php /** @var \App\Product $product */ ?>
                <div class="product-container__image-wrap"><img src="/img/cover/game-{{ $img }}.jpg" class="image-wrap__image-product"></div>
                <div class="product-container__content-text">
                  <div class="product-container__content-text__title">{{ $name  }}</div>
                  <div class="product-container__content-text__price">
                    <div class="product-container__content-text__price__value">
                      Цена: <b>{{  $price }}</b>
                      руб
                    </div><a href="{{ route('buy', ['id' => $id]) }}" class="btn btn-blue">Купить</a>
                  </div>
                  <div class="product-container__content-text__description">
                      {{ $desc  }}
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="content-bottom">
            <div class="line"></div>
            <div class="content-head__container">
              <div class="content-head__title-wrap">
                <div class="content-head__title-wrap__title bcg-title">Посмотрите наши товары</div>
              </div>
            </div>
            <div class="content-main__container">
              <div class="products-columns">

                  @foreach($other as $item)

                    <div class="products-columns__item">
                      <div class="products-columns__item__title-product">
                          <a href="{{ route('product', ['id' => $item->id]) }}" class="products-columns__item__title-product__link">
                              {{ $item->name  }}
                          </a>
                      </div>
                      <div class="products-columns__item__thumbnail">
                          <a href="{{ route('product', ['id' => $item->id]) }}" class="products-columns__item__thumbnail__link">
                              <img src="/img/cover/game-{{ $item->getImageId() }}.jpg" alt="Preview-image" class="products-columns__item__thumbnail__img">
                          </a>
                      </div>
                      <div class="products-columns__item__description">
                          <span class="products-price">{{ $item->price  }} руб</span>
                          <a href="{{ route('buy', ['id' => $item->id]) }}" class="btn btn-blue">Купить</a>
                      </div>
                    </div>

                  @endforeach
              </div>
            </div>
          </div>

@endsection
