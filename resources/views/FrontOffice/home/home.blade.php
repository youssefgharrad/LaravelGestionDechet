@extends('FrontOffice.LayoutFront.layout')
@section('content')
    <!-- Choose a container from these -->

    <!-- Carousel Start -->
    <div class="header-carousel owl-carousel">
        <div class="header-carousel-item bg-primary">
            <div class="carousel-caption">
                <div class="container">
                    <div class="row gy-4 gy-lg-0 gx-0 gx-lg-5 align-items-center">
                        <!-- Image on the left -->
                        <div class="col-lg-5 animated fadeInLeft">
                            <div class="carousel-img">
                                <blockquote class="imgur-embed-pub" lang="en" data-id="a/tMOC497" data-context="false" ><a href="//imgur.com/a/tMOC497"></a></blockquote><script async src="//s.imgur.com/min/embed.js" charset="utf-8"></script>                            </div>
                        </div>
                        <!-- Text on the right -->
                        <div class="col-lg-7 animated fadeInRight">
                            <div class="text-sm-center text-md-end">
                                <h4 class="text-white text-uppercase fw-bold mb-4">Bienvenue sur EcoAct</h4>
                                <h1 class="display-1 text-white mb-4">Trouvez les Centres de Recyclage près de Chez Vous
                                </h1>
                                <p class="mb-5 fs-5">
                                    Apprenez les meilleures pratiques pour réduire vos déchets et engagez-vous dans des
                                    collectes de déchets communautaires.
                                    Ensemble, faisons un pas vers un avenir plus durable.
                                </p>
                                <div class="d-flex justify-content-center justify-content-md-end flex-shrink-0 mb-4">
                                    <a class="btn btn-light rounded-pill py-3 px-4 px-md-5 me-2" href="#"><i
                                            class="fas fa-play-circle me-2"></i> Regarder la vidéo</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Carousel End -->

    <!-- Feature Start -->
    <div class="container-fluid feature bg-light py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Notre Annonce</h4>
                <h1 class="display-4 mb-4">Les meilleurs annonces pour cette semaine</h1>
                <p class="mb-0">
                    Choisissez une annonce puis effectuez le paiement avec votre carte bancaire. Assurez-vous d'être
                    connecté avant de procéder.
                </p>
            </div>

            <div class="row g-4">
                @foreach ($annonces as $annonce)
                    <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.{{ $loop->index * 2 }}s">
                        <div class="card h-100">
                            <!-- Card image with status -->
                            <div class="position-relative">
                                <img src="{{ $annonce->image ? asset('storage/' . $annonce->image) : 'https://jolymome.fr/storage/articles/2022-03-f7bc5c6e88d5a711e303ba18ccf474c8.webp' }}"
                                    class="card-img-top" alt="Image de l'annonce"
                                    style="height: 200px; object-fit: cover; border-radius: 15px 15px 0 0;">

                                <!-- Status Badge -->
                                <span
                                    class="badge {{ $annonce->status == 'disponible' ? 'bg-success' : 'bg-danger' }} position-absolute top-0 start-0 m-2 p-2"
                                    style="border-radius: 10px;">
                                    {{ $annonce->status == 'disponible' ? 'disponible' : 'indisponible' }}
                                </span>
                            </div>

                            <!-- Card body -->
                            <div class="card-body">
                                <h5 class="card-title">{{ $annonce->type_dechet }}</h5>
                                <p class="card-text">{{ Str::limit($annonce->description, 100) }}</p>
                                <p><strong>Adresse:</strong> {{ $annonce->adresse_collecte }}</p>
                                <p><strong>Quantité:</strong> {{ $annonce->quantite_totale }} kg</p>
                                <p><strong>Prix:</strong> {{ $annonce->price }} DT</p>
                            </div>

                            <!-- Card footer -->
                            <div class="card-footer d-flex justify-content-between">
                                <a href="{{ route('annoncedechets.show', $annonce->id) }}"
                                    class="btn btn-primary rounded-pill py-2 px-4">Voir</a>
                                <a href="{{ route('AnnonceDechet.checkout', $annonce->id) }}"
                                    class="btn btn-warning rounded-pill py-2 px-4 {{ $annonce->status == 'indisponible' ? 'disabled' : '' }}"
                                    {{ $annonce->status == 'Non disponible' ? 'aria-disabled="true"' : '' }}>
                                    Acheter
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    <!-- Feature End -->

    <!-- About Start -->

    <!-- About End -->

    <!-- Service Start -->
    <div class="container-fluid service py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Nos Services</h4>
                <h1 class="display-4 mb-4">Nous Offrons les Meilleurs Services Écoresponsables</h1>
                <p class="mb-0">
                    Découvrez comment vous pouvez contribuer à un environnement plus propre grâce à nos services de
                    recyclage, d'éducation et d'engagement communautaire.
                </p>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="service-item">
                        <div class="service-img">
                            <img src="http://www.anged.nat.tn/images/maptunisie.jpg" class="img-fluid rounded-top w-100"
                                alt="Centre de recyclage">
                            <div class="service-icon p-3">
                                <i class="fa fa-recycle fa-2x"></i>
                            </div>
                        </div>
                        <div class="service-content p-4">
                            <div class="service-content-inner">
                                <a href="#" class="d-inline-block h4 mb-4">Localiser des Centres de Recyclage</a>
                                <p class="mb-4">Trouvez les centres de recyclage les plus proches et apprenez à mieux
                                    gérer vos déchets.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="service-item">
                        <div class="service-img">
                            <img src="https://www.cercle-recyclage.asso.fr/images/stories/mediatheque/reductiondechets.png"
                                class="img-fluid rounded-top w-100" alt="Réduction des déchets">
                            <div class="service-icon p-3">
                                <i class="fa fa-leaf fa-2x"></i>
                            </div>
                        </div>
                        <div class="service-content p-4">
                            <div class="service-content-inner">
                                <a href="#" class="d-inline-block h4 mb-4">Éducation à la Réduction des Déchets</a>
                                <p class="mb-4">Apprenez les meilleures pratiques pour réduire votre impact
                                    environnemental.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="service-item">
                        <div class="service-img">
                            <img src="https://static.vecteezy.com/ti/photos-gratuite/p1/44422526-communaute-un-service-benevole-reduit-dechets-et-nettoie-en-haut-foret-parametre-collecte-des-ordures-dans-bleu-poubelle-sacs-jeune-enfant-aide-environnement-preservation-par-disposer-de-plastique-dechets-photo.jpg"
                                class="img-fluid rounded-top w-100" alt="Collecte communautaire">
                            <div class="service-icon p-3">
                                <i class="fa fa-hand-holding-heart fa-2x"></i>
                            </div>
                        </div>
                        <div class="service-content p-4">
                            <div class="service-content-inner">
                                <a href="#" class="d-inline-block h4 mb-4">Organiser des Collectes Communautaires</a>
                                <p class="mb-4">Rejoignez ou organisez des collectes de déchets dans votre communauté.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.8s">
                    <div class="service-item">
                        <div class="service-img">
                            <img src="https://lumihome-france.com/cdn/shop/articles/6-conseils-pour-creer-un-jardin-ecoresponsable-570724.jpg?v=1712335025"
                                class="img-fluid rounded-top w-100" alt="Conseils écoresponsables">
                            <div class="service-icon p-3">
                                <i class="fa fa-lightbulb fa-2x"></i>
                            </div>
                        </div>
                        <div class="service-content p-4">
                            <div class="service-content-inner">
                                <a href="#" class="d-inline-block h4 mb-4">Conseils Écoresponsables</a>
                                <p class="mb-4">Des astuces simples pour réduire, réutiliser et recycler efficacement.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
