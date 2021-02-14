@extends('master')

@section('title','Proizvod')

<style>
@import 'https://fonts.googleapis.com/css?family=Baloo+Tamma|Raleway|Lato';
body {
  font: 15px/1.25 "Raleway";
  font-weight: 400;
}

h1,
h2,
h3,
button {
  font-family: "Baloo Tamma";
}

.wrapper {
  height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background: #5dac48;
  position: relative;
}

.product-single {
  background: #fff;
  border-radius: 5px;
  box-shadow: 0 2px 15px rgba(0, 0, 0, 0.25);
  overflow: hidden;
  min-width: 761px;
  font-size: 16px;
  z-index: 1;
}
.product-single .product-gallery {
  margin-bottom: -4px;
  overflow: hidden;
  float: left;
  width: 380px;
  height: 380px;
  border-right: 1px solid #d0ddcb;
  position: relative;
}
.product-single .product-gallery:hover .slider-arrows {
  opacity: 1;
  height: 30px;
}
.product-single .product-gallery ul,
.product-single .product-gallery li {
  margin: 0;
  padding: 0;
  list-style: none;
}
.product-single .product-gallery .slider-arrows {
  position: absolute;
  top: 0;
  right: 0;
  left: 0;
  bottom: 0;
  margin: auto;
  height: 0;
  font-size: 30px;
  color: #fff;
  padding: 0 10px;
  opacity: 0;
  transition: all 0.2s ease-in;
  z-index: 1;
}
.product-single .product-gallery .slider-arrows i {
  text-shadow: 0 0 7px rgba(0, 0, 0, 0.4);
  cursor: pointer;
  color: rgba(255, 255, 255, 0.8);
  transition: all 0.2s ease-in-out;
}
.product-single .product-gallery .slider-arrows i:hover {
  color: #fff;
}
.product-single .product-gallery .slider-arrows i:first-child {
  float: left;
}
.product-single .product-gallery .slider-arrows i:last-child {
  float: right;
}
.product-single .product-gallery #slider-wrap {
  position: relative;
  background: #999;
  overflow: hidden;
  height: 380px;
  width: 380px;
}
.product-single .product-gallery #slider-wrap .slides {
  width: 100%;
  height: 100%;
  position: absolute;
  top: 0;
  left: 0;
  transition: all 0.2s 0.1s ease-out;
}
.product-single .product-gallery #slider-wrap .slides li {
  float: left;
  width: 380px;
  height: 380px;
  position: relative;
}
.product-single .product-gallery #slider-wrap .slides img {
  max-width: 100%;
}
.product-single .product-gallery .nav-dots {
  display: block;
  margin: auto;
  text-align: center;
  position: absolute;
  left: 0;
  right: 0;
  bottom: 12px;
}
.product-single .product-gallery .nav-dots li {
  height: 8px;
  width: 8px;
  border-radius: 50%;
  margin-right: 10px;
  position: relative;
  display: inline-block;
  background: transparent;
}
.product-single .product-gallery .nav-dots li:before {
  content: "";
  position: absolute;
  background: transparent;
  top: -50%;
  bottom: -50%;
  right: -50%;
  left: -50%;
  border-radius: 50%;
  border: 3px solid #fff;
  box-shadow: 0 0 7px -2px #000;
}
.product-single .product-gallery .nav-dots li.active {
  background: #d75229;
  transition: all 0.1s 0.1s linear;
}
.product-single .product-gallery .nav-dots li:last-child {
  margin-right: 0;
}
.product-single .product-details {
  padding: 20px;
  width: 380px;
  height: 380px;
  float: left;
  box-sizing: border-box;
  font-size: 14px;
  position: relative;
}
.product-single .product-details .product-title {
  margin-top: 0;
  line-height: 1;
  color: #d75229;
}
.product-single .product-details .product-cost {
  font-size: 20px;
  margin-bottom: 10px;
  color: #5dac48;
}
.product-single .product-details .product-rating .product-reviews {
  font-family: "Lato";
  margin-left: 15px;
  font-size: 12px;
}
.product-single .product-details .product-rating .product-reviews a {
  color: #999;
  text-transform: uppercase;
  text-decoration: none;
  transition: color 0.05s ease;
}
.product-single .product-details .product-rating .product-reviews a:hover {
  text-decoration: underline;
  color: #d75229;
}
.product-single .product-details .product-rating ul {
  display: inline-block;
}
.product-single .product-details .product-rating ul,
.product-single .product-details .product-rating li {
  padding: 0;
  margin: 0;
  list-style: none;
}
.product-single .product-details .product-rating li {
  color: #fcd000;
}
.product-single .product-details .product-description {
  font-size: 15px;
  line-height: 1.1;
  overflow: hidden;
  max-height: 150px;
  margin: 10px 0;
}
.product-single .product-details .product-cta {
  text-align: center;
  margin: 13px 0;
  position: absolute;
  left: 0;
  right: 0;
  bottom: 40px;
}
.product-single .product-details .product-atc,
.product-single .product-details .product-atw {
  font-size: 16px;
  padding: 10px 22px;
  color: #fff;
  border: none;
  margin: auto;
  border-radius: 20px;
  transition: all 0.1s ease;
  margin-right: 10px;
}
.product-single .product-details .product-atc:last-child,
.product-single .product-details .product-atw:last-child {
  margin: 0;
}
.product-single .product-details .product-atc:focus,
.product-single .product-details .product-atw:focus {
  outline: none;
}
.product-single .product-details .product-atc:hover,
.product-single .product-details .product-atw:hover {
  background: #d75229;
}
.product-single .product-details .product-atc {
  background: #5dac48;
}
.product-single .product-details .product-atw {
  color: #999;
}
.product-single .product-details .product-atw:hover {
  color: #fff;
}
.product-single .product-details .product-info {
  font-size: 11px;
  font-family: "Lato";
  position: absolute;
  bottom: 20px;
  margin-top: 10px;
  color: #999;
}
.product-single .product-details .product-info span {
  display: inline-block;
  margin-right: 10px;
}

body {
   overflow-y: hidden;
}
</style>

@section('content')

    <div class="wrapper" style=" background-color: #f7f7f7;">
    <div class="product-single">
      <div class="product-gallery">
        <div id="slider-wrap">
          <ul class="slides">
            <li><img style="height: 380px;" src="{{$proizvod->url}}" alt=""/></li>
          </ul>

        </div>
      </div>
      <div class="product-details">
        <h1 class="product-title">{{$proizvod->naslov}}</h1>
        <h3 class="product-cost">{{$proizvod->cena}}</h3>

        <div class="product-description">
          <p>{{$proizvod->opis}}</p>
          <p>by {{$proizvod->korisnik}}</p>
          <p>Kontakt Telefon: {{$proizvod->broj_telefona}}</p>
        </div>
        <div class="product-cta">
        </div>
      </div>
    </div>
  </div>
@endsection
