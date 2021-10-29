@extends('master')

@section('title', 'Nosotros')

@section('content')
<div class="mtop16">
    <div class="mtop16">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                    aria-label="Slide 4"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4"
                    aria-label="Slide 5"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src={{ url('/static/images/cheese1.jpg') }} class="d-block w-100" width="500" height="500">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Especialidades de la casa</h5>
                        <p>Chessecake de café y chocolate.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src={{ url('/static/images/cheese2.jpg') }} class="d-block w-100" width="500" height="500">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Especialidades de la casa</h5>
                        <p>Deliciosos Chessecakes con nuestro toque secreto.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src={{ url('/static/images/cheese3.jpg') }} class="d-block w-100" width="500" height="500">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Especialidades de la casa</h5>
                        <p>Los mejores chessecakes del mercado.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src={{ url('/static/images/cheese4.jpeg') }} class="d-block w-100" width="500" height="500">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Especialidades de la casa</h5>
                        <p>Animate a probarlo.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src={{ url('/static/images/frappe.jpg') }} class="d-block w-100" width="500" height="500">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Especialidades de la casa</h5>
                        <p>Refrescantes Chessecakes que te endulzaran el día.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>
<div class="mtop16">
    <article class="about-us">
        <div>
            <h4>Vive la experiencia Monka</h4>
            <h5>¿Quienes somos?</h5>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap
                into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the
                release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing
                software like Aldus PageMaker including versions of Lorem Ipsum. </p>
            <p>El precio se olvida, la calidad se recuerda.</p>
        </div>
    </article>
    <article class="about-us">
        <img src={{ url('/static/images/logo-nav.png') }}>
    </article>
</div>
<div>
    <a href={{ url('/') }}>
        <button class="btn btn-color" type="button">Ver más de nuestros productos</button>
    </a>
</div>
@endsection