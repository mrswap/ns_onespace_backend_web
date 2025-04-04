  @php
  $version = $basicInfo->theme_version;
  @endphp


  @section('og:tag')
  <meta property="og:title" content="{{ $propertyContent->title }}">
  <meta property="og:image" content="{{ asset('assets/img/property/featureds/' . $propertyContent->featured_image) }}">
  <meta property="og:url" content="{{ route('frontend.property.details', $propertyContent->slug) }}">
  @endsection
  @extends("frontend.layouts.layout-v$version")
  @section('metaKeywords')
  @if ($propertyContent)
  {{ $propertyContent->meta_keyword }}
  @endif
  @endsection

  @section('metaDescription')
  @if ($propertyContent)
  {{ $propertyContent->meta_description }}
  @endif
  @endsection
  <!-- social icon start-->
  <div class="profile-icons align-items-center position-fixed left-social-icon">
      <a class="link" target="_blank" href="https://api.whatsapp.com/send?phone=9752777721&text=Hi">
          <span><i id="whatsapp_click" class="fa-regular fa-whatsapp"></i></span>
      </a>
      <a class="link" href="tel:+4733378901">
          <span><i id="phone_click" class="fa-regular fa-phone"></i></span>
      </a>
  </div>
  <!-- social icon end -->
  @section('content')
  <main>
      <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
      <input type="hidden" name="user_id" id="user_id" value="{{ isset($user->id) ? $user->id : '' }}">

      {{-- @if (Session::has('success'))
      <div class="alert alert-success">{{ __(Session::get('success')) }}</div>
      @endif
      @if (Session::has('warning'))
      <div class="alert alert-warning">{{ __(Session::get('warning')) }}</div>
      @endif
      @if (Session::has('error'))
      <div class="alert alert-error">{{ __(Session::get('error')) }}</div>
      @endif --}}
      <!-- property slider area start -->
      <div class="bd-property-details-area fix pt-30">
          <div class="container">
              <div class="row">
                  <div class="col-12">
                      <div class="property-details-wrapper">
                          <div class="bd-tab signleproperty-category">
                              <ul class="nav nav-tabs" id="myTab" role="tablist">
                                  <li class="nav-item" role="presentation">
                                      <button class="nav-link active" id="all-tab" data-bs-toggle="tab"
                                          data-bs-target="#all-tab-pane" type="button" role="tab"
                                          aria-controls="all-tab-pane" aria-selected="true">All</button>
                                  </li>
                                  <li class="nav-item" role="presentation">
                                      <button class="nav-link " id="outdoor-tab" data-bs-toggle="tab"
                                          data-bs-target="#outdoor-tab-pane" type="button" role="tab"
                                          aria-controls="outdoor-tab-pane" aria-selected="true">Outdoor</button>
                                  </li>
                                  <li class="nav-item" role="presentation">
                                      <button class="nav-link" id="livingRoom-tab" data-bs-toggle="tab"
                                          data-bs-target="#livingRoom-tab-pane" type="button" role="tab"
                                          aria-controls="livingRoom-tab-pane" aria-selected="false">Living Room</button>
                                  </li>
                                  <li class="nav-item" role="presentation">
                                      <button class="nav-link" id="bedroom -tab" data-bs-toggle="tab"
                                          data-bs-target="#bedroom-tab-pane" type="button" role="tab"
                                          aria-controls="bedroom-tab-pane" aria-selected="false">Bedroom</button>
                                  </li>
                                  <li class="nav-item" role="presentation">
                                      <button class="nav-link" id="kitchen-tab" data-bs-toggle="tab"
                                          data-bs-target="#kitchen-tab-pane" type="button" role="tab"
                                          aria-controls="kitchen-tab-pane" aria-selected="false"> Kitchen</button>
                                  </li>
                                  <li class="nav-item" role="presentation">
                                      <button class="nav-link" id="washroom-tab" data-bs-toggle="tab"
                                          data-bs-target="#washroom-tab-pane" type="button" role="tab"
                                          aria-controls="washroom-tab-pane" aria-selected="false">Washroom</button>
                                  </li>
                                  <li class="nav-item" role="presentation">
                                      <button class="nav-link" id="balcony-tab" data-bs-toggle="tab"
                                          data-bs-target="#balcony-tab-pane" type="button" role="tab"
                                          aria-controls="balcony-tab-pane" aria-selected="false">Balcony</button>
                                  </li>
                                  <li class="nav-item" role="presentation">
                                      <button class="nav-link" id="terrace-tab" data-bs-toggle="tab"
                                          data-bs-target="#terrace-tab-pane" type="button" role="tab"
                                          aria-controls="terrace-tab-pane" aria-selected="false">Terrace</button>
                                  </li>
                                  <li class="nav-item" role="presentation">
                                      <button class="nav-link" id="stairs-tab" data-bs-toggle="tab"
                                          data-bs-target="#stairs-tab-pane" type="button" role="tab"
                                          aria-controls="stairs-tab-pane" aria-selected="false">Stairs </button>
                                  </li>
                                  <li class="nav-item" role="presentation">
                                      <button class="nav-link" id="other-tab" data-bs-toggle="tab"
                                          data-bs-target="#other-tab-pane" type="button" role="tab"
                                          aria-controls="other-tab-pane" aria-selected="false">Other</button>
                                  </li>
                              </ul>
                          </div>
                          <div class="tab-content" id="myTabContent1">


                              <div class="tab-pane fade show active" id="all-tab-pane" role="tabpanel"
                                  aria-labelledby="all-tab" tabindex="0">
                                  <div class="swiper property-details-active">
                                      <div class="swiper-wrapper">
                                          @foreach ($outdoorgalleryImages as $item)
                                          <div class="swiper-slide">
                                              <div class=" property-details-item">
                                                  <div class="property-details-item-thumb">
                                                      <img src="{{ asset('assets/img/property/slider-images/outdoor/' . $item->image) }}"
                                                          alt="">
                                                  </div>
                                              </div>
                                          </div>
                                          @endforeach
                                          @foreach ($livingroomgalleryImages as $item)
                                          <div class="swiper-slide">
                                              <div class=" property-details-item">
                                                  <div class="property-details-item-thumb">
                                                      <img src="{{ asset('assets/img/property/slider-images/livingroom/' . $item->image) }}"
                                                          alt="">
                                                  </div>
                                              </div>
                                          </div>
                                          @endforeach
                                          @foreach ($bedroomgalleryImages as $item)
                                          <div class="swiper-slide">
                                              <div class=" property-details-item">
                                                  <div class="property-details-item-thumb">
                                                      <img src="{{ asset('assets/img/property/slider-images/bedroom/' . $item->image) }}"
                                                          alt="">
                                                  </div>
                                              </div>
                                          </div>
                                          @endforeach
                                          @foreach ($kitchengalleryImages as $item)
                                          <div class="swiper-slide">
                                              <div class=" property-details-item">
                                                  <div class="property-details-item-thumb">
                                                      <img src="{{ asset('assets/img/property/slider-images/kitchen/' . $item->image) }}"
                                                          alt="">
                                                  </div>
                                              </div>
                                          </div>
                                          @endforeach
                                          @foreach ($washroomgalleryImages as $item)
                                          <div class="swiper-slide">
                                              <div class=" property-details-item">
                                                  <div class="property-details-item-thumb">
                                                      <img src="{{ asset('assets/img/property/slider-images/washroom/' . $item->image) }}"
                                                          alt="">
                                                  </div>
                                              </div>
                                          </div>
                                          @endforeach
                                          @foreach ($balconygalleryImages as $item)
                                          <div class="swiper-slide">
                                              <div class=" property-details-item">
                                                  <div class="property-details-item-thumb">
                                                      <img src="{{ asset('assets/img/property/slider-images/balcony/' . $item->image) }}"
                                                          alt="">
                                                  </div>
                                              </div>
                                          </div>
                                          @endforeach
                                          @foreach ($terracegalleryImages as $item)
                                          <div class="swiper-slide">
                                              <div class=" property-details-item">
                                                  <div class="property-details-item-thumb">
                                                      <img src="{{ asset('assets/img/property/slider-images/terrace/' . $item->image) }}"
                                                          alt="">
                                                  </div>
                                              </div>
                                          </div>
                                          @endforeach
                                          @foreach ($stairsgalleryImages as $item)
                                          <div class="swiper-slide">
                                              <div class=" property-details-item">
                                                  <div class="property-details-item-thumb">
                                                      <img src="{{ asset('assets/img/property/slider-images/stairs/' . $item->image) }}"
                                                          alt="">
                                                  </div>
                                              </div>
                                          </div>
                                          @endforeach
                                          @foreach ($othergalleryImages as $item)
                                          <div class="swiper-slide">
                                              <div class=" property-details-item">
                                                  <div class="property-details-item-thumb">
                                                      <img src="{{ asset('assets/img/property/slider-images/other/' . $item->image) }}"
                                                          alt="">
                                                  </div>
                                              </div>
                                          </div>
                                          @endforeach
                                      </div>
                                      <!-- If we need navigation buttons -->
                                      <div class="property-details-navigation d-none d-sm-block">
                                          <button class="property-details-button-prev circle-btn is-bg-white"><i
                                                  class="fa-regular fa-arrow-left-long"></i></button>
                                          <button class="property-details-button-next circle-btn is-bg-white"><i
                                                  class="fa-regular fa-arrow-right-long"></i></button>
                                      </div>
                                      <!-- If we need pagination -->
                                      <div class="pagination-wrapper d-block d-sm-none">
                                          <div class="bd-swiper-dot text-center"></div>
                                      </div>
                                  </div>
                              </div>

                              <!-- All end  -->
                              <div class="tab-pane fade " id="outdoor-tab-pane" role="tabpanel"
                                  aria-labelledby="outdoor-tab" tabindex="0">
                                  <div class="swiper property-details-active">
                                      <div class="swiper-wrapper">
                                          @foreach ($outdoorgalleryImages as $item)
                                          <div class="swiper-slide">
                                              <div class=" property-details-item">
                                                  <div class="property-details-item-thumb">
                                                      <img src="{{ asset('assets/img/property/slider-images/outdoor/' . $item->image) }}"
                                                          alt="">
                                                  </div>
                                              </div>
                                          </div>
                                          @endforeach
                                      </div>
                                      <!-- If we need navigation buttons -->
                                      <div class="property-details-navigation d-none d-sm-block">
                                          <button class="property-details-button-prev circle-btn is-bg-white"><i
                                                  class="fa-regular fa-arrow-left-long"></i></button>
                                          <button class="property-details-button-next circle-btn is-bg-white"><i
                                                  class="fa-regular fa-arrow-right-long"></i></button>
                                      </div>
                                      <!-- If we need pagination -->
                                      <div class="pagination-wrapper d-block d-sm-none">
                                          <div class="bd-swiper-dot text-center"></div>
                                      </div>
                                  </div>
                              </div>

                              <!-- outdoor end  -->
                              <div class="tab-pane fade" id="livingRoom-tab-pane" role="tabpanel"
                                  aria-labelledby="livingRoom-tab" tabindex="0">
                                  <div class="swiper property-details-active">
                                      <div class="swiper-wrapper">
                                          @foreach ($livingroomgalleryImages as $item)
                                          <div class="swiper-slide">
                                              <div class=" property-details-item">
                                                  <div class="property-details-item-thumb">
                                                      <img src="{{ asset('assets/img/property/slider-images/livingroom/' . $item->image) }}"
                                                          alt="">
                                                  </div>
                                              </div>
                                          </div>
                                          @endforeach
                                      </div>
                                      <!-- If we need navigation buttons -->
                                      <div class="property-details-navigation d-none d-sm-block">
                                          <button class="property-details-button-prev circle-btn is-bg-white"><i
                                                  class="fa-regular fa-arrow-left-long"></i></button>
                                          <button class="property-details-button-next circle-btn is-bg-white"><i
                                                  class="fa-regular fa-arrow-right-long"></i></button>
                                      </div>
                                      <!-- If we need pagination -->
                                      <div class="pagination-wrapper d-block d-sm-none">
                                          <div class="bd-swiper-dot text-center"></div>
                                      </div>
                                  </div>
                              </div>
                              <!-- livingRoom end  -->
                              <div class="tab-pane fade" id="bedroom-tab-pane" role="tabpanel"
                                  aria-labelledby="bedroom-tab" tabindex="0">
                                  <div class="swiper property-details-active">
                                      <div class="swiper-wrapper">
                                          @foreach ($bedroomgalleryImages as $item)
                                          <div class="swiper-slide">
                                              <div class=" property-details-item">
                                                  <div class="property-details-item-thumb">
                                                      <img src="{{ asset('assets/img/property/slider-images/bedroom/' . $item->image) }}"
                                                          alt="">
                                                  </div>
                                              </div>
                                          </div>
                                          @endforeach
                                      </div>
                                      <!-- If we need navigation buttons -->
                                      <div class="property-details-navigation d-none d-sm-block">
                                          <button class="property-details-button-prev circle-btn is-bg-white"><i
                                                  class="fa-regular fa-arrow-left-long"></i></button>
                                          <button class="property-details-button-next circle-btn is-bg-white"><i
                                                  class="fa-regular fa-arrow-right-long"></i></button>
                                      </div>
                                      <!-- If we need pagination -->
                                      <div class="pagination-wrapper d-block d-sm-none">
                                          <div class="bd-swiper-dot text-center"></div>
                                      </div>
                                  </div>
                              </div>
                              <!-- Bedroom end  -->
                              <div class="tab-pane fade" id="kitchen-tab-pane" role="tabpanel"
                                  aria-labelledby="kitchen-tab" tabindex="0">
                                  <div class="swiper property-details-active">
                                      <div class="swiper-wrapper">
                                          @foreach ($kitchengalleryImages as $item)
                                          <div class="swiper-slide">
                                              <div class=" property-details-item">
                                                  <div class="property-details-item-thumb">
                                                      <img src="{{ asset('assets/img/property/slider-images/kitchen/' . $item->image) }}"
                                                          alt="">
                                                  </div>
                                              </div>
                                          </div>
                                          @endforeach
                                      </div>
                                      <!-- If we need navigation buttons -->
                                      <div class="property-details-navigation d-none d-sm-block">
                                          <button class="property-details-button-prev circle-btn is-bg-white"><i
                                                  class="fa-regular fa-arrow-left-long"></i></button>
                                          <button class="property-details-button-next circle-btn is-bg-white"><i
                                                  class="fa-regular fa-arrow-right-long"></i></button>
                                      </div>
                                      <!-- If we need pagination -->
                                      <div class="pagination-wrapper d-block d-sm-none">
                                          <div class="bd-swiper-dot text-center"></div>
                                      </div>
                                  </div>
                              </div>
                              <!-- Kitchen end  -->
                              <div class="tab-pane fade" id="washroom-tab-pane" role="tabpanel"
                                  aria-labelledby="washroom-tab" tabindex="0">
                                  <div class="swiper property-details-active">
                                      <div class="swiper-wrapper">
                                          @foreach ($washroomgalleryImages as $item)
                                          <div class="swiper-slide">
                                              <div class=" property-details-item">
                                                  <div class="property-details-item-thumb">
                                                      <img src="{{ asset('assets/img/property/slider-images/washroom/' . $item->image) }}"
                                                          alt="">
                                                  </div>
                                              </div>
                                          </div>
                                          @endforeach
                                      </div>
                                      <!-- If we need navigation buttons -->
                                      <div class="property-details-navigation d-none d-sm-block">
                                          <button class="property-details-button-prev circle-btn is-bg-white"><i
                                                  class="fa-regular fa-arrow-left-long"></i></button>
                                          <button class="property-details-button-next circle-btn is-bg-white"><i
                                                  class="fa-regular fa-arrow-right-long"></i></button>
                                      </div>
                                      <!-- If we need pagination -->
                                      <div class="pagination-wrapper d-block d-sm-none">
                                          <div class="bd-swiper-dot text-center"></div>
                                      </div>
                                  </div>
                              </div>
                              <!-- Washroom end  -->
                              <div class="tab-pane fade" id="balcony-tab-pane" role="tabpanel"
                                  aria-labelledby="balcony-tab" tabindex="0">
                                  <div class="swiper property-details-active">
                                      <div class="swiper-wrapper">
                                          @foreach ($balconygalleryImages as $item)
                                          <div class="swiper-slide">
                                              <div class=" property-details-item">
                                                  <div class="property-details-item-thumb">
                                                      <img src="{{ asset('assets/img/property/slider-images/balcony/' . $item->image) }}"
                                                          alt="">
                                                  </div>
                                              </div>
                                          </div>
                                          @endforeach
                                      </div>
                                      <!-- If we need navigation buttons -->
                                      <div class="property-details-navigation d-none d-sm-block">
                                          <button class="property-details-button-prev circle-btn is-bg-white"><i
                                                  class="fa-regular fa-arrow-left-long"></i></button>
                                          <button class="property-details-button-next circle-btn is-bg-white"><i
                                                  class="fa-regular fa-arrow-right-long"></i></button>
                                      </div>
                                      <!-- If we need pagination -->
                                      <div class="pagination-wrapper d-block d-sm-none">
                                          <div class="bd-swiper-dot text-center"></div>
                                      </div>
                                  </div>
                              </div>
                              <!-- Balcony end  -->
                              <div class="tab-pane fade" id="terrace-tab-pane" role="tabpanel"
                                  aria-labelledby="terrace-tab" tabindex="0">
                                  <div class="swiper property-details-active">
                                      <div class="swiper-wrapper">
                                          @foreach ($terracegalleryImages as $item)
                                          <div class="swiper-slide">
                                              <div class=" property-details-item">
                                                  <div class="property-details-item-thumb">
                                                      <img src="{{ asset('assets/img/property/slider-images/terrace/' . $item->image) }}"
                                                          alt="">
                                                  </div>
                                              </div>
                                          </div>
                                          @endforeach
                                      </div>
                                      <!-- If we need navigation buttons -->
                                      <div class="property-details-navigation d-none d-sm-block">
                                          <button class="property-details-button-prev circle-btn is-bg-white"><i
                                                  class="fa-regular fa-arrow-left-long"></i></button>
                                          <button class="property-details-button-next circle-btn is-bg-white"><i
                                                  class="fa-regular fa-arrow-right-long"></i></button>
                                      </div>
                                      <!-- If we need pagination -->
                                      <div class="pagination-wrapper d-block d-sm-none">
                                          <div class="bd-swiper-dot text-center"></div>
                                      </div>
                                  </div>
                              </div>
                              <!-- Terrace end  -->
                              <div class="tab-pane fade" id="stairs-tab-pane" role="tabpanel"
                                  aria-labelledby="stairs-tab" tabindex="0">
                                  <div class="swiper property-details-active">
                                      <div class="swiper-wrapper">
                                          @foreach ($stairsgalleryImages as $item)
                                          <div class="swiper-slide">
                                              <div class=" property-details-item">
                                                  <div class="property-details-item-thumb">
                                                      <img src="{{ asset('assets/img/property/slider-images/stairs/' . $item->image) }}"
                                                          alt="">
                                                  </div>
                                              </div>
                                          </div>
                                          @endforeach
                                      </div>
                                      <!-- If we need navigation buttons -->
                                      <div class="property-details-navigation d-none d-sm-block">
                                          <button class="property-details-button-prev circle-btn is-bg-white"><i
                                                  class="fa-regular fa-arrow-left-long"></i></button>
                                          <button class="property-details-button-next circle-btn is-bg-white"><i
                                                  class="fa-regular fa-arrow-right-long"></i></button>
                                      </div>
                                      <!-- If we need pagination -->
                                      <div class="pagination-wrapper d-block d-sm-none">
                                          <div class="bd-swiper-dot text-center"></div>
                                      </div>
                                  </div>
                              </div>
                              <!-- Stairs end  -->
                              <div class="tab-pane fade" id="other-tab-pane" role="tabpanel" aria-labelledby="other-tab"
                                  tabindex="0">
                                  <div class="swiper property-details-active">
                                      <div class="swiper-wrapper">
                                          @foreach ($othergalleryImages as $item)
                                          <div class="swiper-slide">
                                              <div class=" property-details-item">
                                                  <div class="property-details-item-thumb">
                                                      <img src="{{ asset('assets/img/property/slider-images/other/' . $item->image) }}"
                                                          alt="">
                                                  </div>
                                              </div>
                                          </div>
                                          @endforeach
                                      </div>
                                      <!-- If we need navigation buttons -->
                                      <div class="property-details-navigation d-none d-sm-block">
                                          <button class="property-details-button-prev circle-btn is-bg-white"><i
                                                  class="fa-regular fa-arrow-left-long"></i></button>
                                          <button class="property-details-button-next circle-btn is-bg-white"><i
                                                  class="fa-regular fa-arrow-right-long"></i></button>
                                      </div>
                                      <!-- If we need pagination -->
                                      <div class="pagination-wrapper d-block d-sm-none">
                                          <div class="bd-swiper-dot text-center"></div>
                                      </div>
                                  </div>
                              </div>
                              <!-- Other end  -->
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- property slider area end -->

      <!-- property details content start -->
      <section class="bd-property-details-area section-space-medium">
          <div class="container">
              <div class="row g-5">
                  <div class="col-xl-8 col-lg-8">
                      <div class="property-details-content-inner">
                          <div class="property-details-meta">
                              <ul>
                                  <li class="property-details-category">
                                      <a class="is-bg-orange" href="#">Featured</a>
                                  </li>
                                  <li class="property-details-category">
                                      <a class="is-bg-transparent" href="#">For {{$propertyContent->purpose}}</a>
                                  </li>
                                  <li class="property-details-date">
                                      <i class="fa-regular fa-calendar-days"></i>
                                      {{$propertyContent->created_at}}
                                  </li>
                              </ul>
                          </div>
                          <h2 class="property-details-title">{{$propertyContent->title}}</h2>
                          <span class="property-details-location">
                              <i class="fa-regular fa-location-dot"></i>
                              {{$propertyContent->address}}
                          </span>
                          <h4 class="property-details-title-two">Description</h4>
                          <div class="property-details-descrip-text">
                              {!!$propertyContent->propertycontent!!}
                          </div>
                          <h4 class="property-details-title-two">Property Details</h4>
                          <div class="property-details-info-list wow bdFadeInUp" data-wow-delay=".3s"
                              data-wow-duration="1s">
                              <ul>
                                  <li><label>Property ID:</label> <span>{{$propertyContent->propertyid}}</span></li>
                                  <li><label>Home Area: </label> <span>{{$propertyContent->homearea}}</span></li>
                                  <li><label>Rooms:</label> <span>{{$propertyContent->rooms}}</span></li>
                                  <li><label>Baths:</label> <span>{{$propertyContent->bath}}</span></li>
                                  <li><label>Year built:</label> <span>{{$propertyContent->builtyear}}</span></li>
                              </ul>
                              <ul>
                                  <li><label>Lot Area:</label> <span>{{$propertyContent->lotarea}} </span></li>
                                  <li><label>Lot dimensions:</label> <span>{{$propertyContent->lotdimensions}}
                                          sqft</span></li>
                                  <li><label>Beds:</label> <span>{{$propertyContent->beds}}</span></li>
                                  <li><label>Price:</label> <span>{{$propertyContent->expectedPrice}}</span></li>
                                  <li><label>Property Status:</label> <span>For
                                          {{$propertyContent->propertystatus}}</span></li>
                              </ul>
                          </div>
                          <h4 class="property-details-title-two">Property Features</h4>
                          <div class="property-details-feature wow bdFadeInUp" data-wow-delay=".3s"
                              data-wow-duration="1s">
                              <ul>
                                  <li>
                                      <div class="property-details-feature-list-item">
                                          <span class="icon">
                                              <i class="icon-modern-living"></i>
                                          </span>
                                          <div>
                                              <h6>Living Room</h6>
                                              <span class="descrip">{{$propertyContent->livingroom}}sq feet</span>
                                          </div>
                                      </div>
                                  </li>
                                  <li>
                                      <div class="property-details-feature-list-item">
                                          <span class="icon">
                                              <i class="icon-garage"></i>
                                          </span>
                                          <div>
                                              <h6>Garage</h6>
                                              <span class="descrip">{{$propertyContent->garage}}sq feet</span>
                                          </div>
                                      </div>
                                  </li>
                                  <li>
                                      <div class="property-details-feature-list-item">
                                          <span class="icon">
                                              <i class="icon-dining-area"></i>
                                          </span>
                                          <div>
                                              <h6>Dining Area</h6>
                                              <span class="descrip">{{$propertyContent->diningarea}}sq feet</span>
                                          </div>
                                      </div>
                                  </li>
                                  <li>
                                      <div class="property-details-feature-list-item">
                                          <span class="icon">
                                              <i class="icon-bedroom"></i>
                                          </span>
                                          <div>
                                              <h6>Bedroom</h6>
                                              <span class="descrip">{{$propertyContent->bedroom}} sq feet</span>
                                          </div>
                                      </div>
                                  </li>
                                  <li>
                                      <div class="property-details-feature-list-item">
                                          <span class="icon">
                                              <i class="icon-bathroom"></i>
                                          </span>
                                          <div>
                                              <h6>Bathroom</h6>
                                              <span class="descrip">{{$propertyContent->bathroom}} sq feet</span>
                                          </div>
                                      </div>
                                  </li>
                                  <li>
                                      <div class="property-details-feature-list-item">
                                          <span class="icon">
                                              <i class="icon-gym-area"></i>
                                          </span>
                                          <div>
                                              <h6>Gym Area</h6>
                                              <span class="descrip">{{$propertyContent->gymarea}} sq feet</span>
                                          </div>
                                      </div>
                                  </li>
                                  <li>
                                      <div class="property-details-feature-list-item">
                                          <span class="icon">
                                              <i class="icon-garden"></i>
                                          </span>
                                          <div>
                                              <h6>Garden</h6>
                                              <span class="descrip">{{$propertyContent->garden}} sq feet</span>
                                          </div>
                                      </div>
                                  </li>
                                  <li>
                                      <div class="property-details-feature-list-item">
                                          <span class="icon">
                                              <i class="icon-parking-area"></i>
                                          </span>
                                          <div>
                                              <h6>Parking</h6>
                                              <span class="descrip">{{$propertyContent->parking}} sq feet</span>
                                          </div>
                                      </div>
                                  </li>
                              </ul>
                          </div>
                          <h4 class="property-details-title-two"> Our Property Gallery</h4>
                          <div class="property-details-gallery wow bdFadeInUp" data-wow-delay=".3s"
                              data-wow-duration="1s">
                              <div class="row g-5">
                                  @php
                                  $slider_images= \DB::table('property_slider_images') ->where('property_id',
                                  $propertyContent->property_id)->get();
                                  @endphp
                                  @foreach($slider_images as $key => $slider_image)
                                  <div class="col-md-6">
                                      <div class="property-details-gallery-thumb">
                                          <img src="{{asset("assets/img/property/slider-images/$slider_image->image")}}"
                                              alt="image not found">
                                      </div>
                                  </div>
                                  @endforeach

                              </div>
                          </div>
                          <h4 class="property-details-title-two"> Benefits </h4>
                          <div class="property-details-benefits wow bdFadeInUp" data-wow-delay=".3s"
                              data-wow-duration="1s">
                              <div class="property-details-benefits-list">
                                  <ul>
                                      @foreach($amenities as $key => $amenitie)
                                      @php
                                      $slider_images= \DB::table('property_slider_images') ->where('property_id',
                                      $propertyContent->property_id)->get();
                                      @endphp
                                      <li>
                                          <span class="list-icon">
                                              <i class="fa-solid fa-check"></i>
                                          </span>
                                          {{$amenitie->amenityContent->name}}
                                      </li>
                                      @endforeach
                                  </ul>
                              </div>

                          </div>
                          <h4 class="property-details-title-two"> Location</h4>
                          <div class="property-details-google-map wow bdFadeInUp" data-wow-delay=".3s"
                              data-wow-duration="1s">
                              <div id="property-map" style="width: 100%; height: 450px;"></div>
                          </div>
                          <div id="property-map" style="width: 100%; height: 450px;"></div>
                          <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCWCfqnOzQVhONMaKbh7CAjga3pdhxMxg"></script>
                          <script type="text/javascript">
                              $(document).ready(function () {
                                  // Alert to check if script is running
                                  //alert("jQuery Loaded");

                                  // Dynamic latitude and longitude from PHP
                                  const latitude = parseFloat("<?= !empty($propertyContent->latitude) ? $propertyContent->latitude : '0'; ?>");
                                  const longitude = parseFloat("<?= !empty($propertyContent->longitude) ? $propertyContent->longitude : '0'; ?>");

                                  // Debugging values
                                  //alert(`Latitude: ${latitude}, Longitude: ${longitude}`);

                                  if (latitude === 0 || longitude === 0) {
                                      console.error("Invalid latitude or longitude values.");
                                      return;
                                  }

                                  // Initialize Google Map
                                  function initMap() {
                                      const propertyLocation = { lat: latitude, lng: longitude };
                                      const customIcon = {
                                          url: "https://netswaptech.com/onespace-development/public/assets/images/onespace-map-marker.png",
                                          scaledSize: new google.maps.Size(96, 96), // Custom marker size
                                          origin: new google.maps.Point(0, 0), // Top-left corner
                                          anchor: new google.maps.Point(48, 96), // Bottom-center
                                      };

                                      const map = new google.maps.Map(document.getElementById("property-map"), {
                                          zoom: 12,
                                          center: propertyLocation,
                                      });

                                      // Add the custom marker
                                      new google.maps.Marker({
                                          position: propertyLocation,
                                          map: map,
                                          icon: customIcon,
                                      });

                                      //alert("Map loaded successfully!");
                                  }

                                  // Call the initMap function
                                  initMap();
                              });
                          </script>

     <!--                      <h4 class="property-details-title-two"> Apartment Video</h4>
                          <div class="property-details-video">
                              <div class="bd-video-area style-one position-relative">
                                  <div class="video-bg-thumb include-bg"
                                      data-background="{{asset("assets/images/bg/video-bg-01.png")}}">
                                  </div>
                                  <div class="container">
                                      <div class="row justify-content-center">
                                          <div class="col-xl-7 col-lg-8 col-md-10">
                                              <div class="video-content text-center">
                                                  <div class="video-play">
                                                      <a href="https://www.youtube.com/watch?v=go7QYaQR494"
                                                          class="bd-play-btn popup-video"><i
                                                              class="fa-duotone fa-play"></i></a>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div> -->
                          <!-- <h4 class="property-details-title-two">Clients Reviews</h4>
                            <div class="property-details-reviews wow bdFadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                                <div class="bd-postbox-details-comment-inner">
                                    <ul>
                                        <li>
                                            <div class="bd-postbox-details-comment-box d-sm-flex align-items-start">
                                                <div class="bd-postbox-details-comment-thumb">
                                                    <img src="{{asset("assets/images/user/user-thumb-04.png")}}" alt="">
                                                </div>
                                                <div class="bd-postbox-details-comment-content">
                                                    <div class="bd-postbox-details-comment-top d-flex justify-content-between align-items-start">
                                                        <div class="bd-postbox-details-comment-avater">
                                                            <h4 class="bd-postbox-details-comment-avater-title">Lance Bogrol</h4>
                                                            <span class="bd-postbox-details-avater-meta">12 April, 2023 at
                                                3.50pm</span>
                                                        </div>
                                                        <div class="bd-postbox-details-comment-reply">
                                                            <a href="#">Reply</a>
                                                        </div>
                                                    </div>
                                                    <p>By defining and following internal and external processes, your team will
                                                        have clarity on resources to <br> attract and retain customers for your
                                          business.</p>
                                                </div>
                                            </div>
                                            <ul class="children">
                                                <li>
                                                    <div class="bd-postbox-details-comment-box d-sm-flex align-items-start">
                                                        <div class="bd-postbox-details-comment-thumb">
                                                            <img src="{{asset("assets/images/user/user-thumb-05.png")}}" alt="">
                                                        </div>
                                                        <div class="bd-postbox-details-comment-content">
                                                            <div class="bd-postbox-details-comment-top d-flex justify-content-between align-items-start">
                                                                <div class="bd-postbox-details-comment-avater">
                                                                    <h4 class="bd-postbox-details-comment-avater-title">Dasy Lily</h4>
                                                                    <span class="bd-postbox-details-avater-meta">12 April, 2023 at
                                                      3.50pm</span>
                                                                </div>
                                                                <div class="bd-postbox-details-comment-reply">
                                                                    <a href="#">Reply</a>
                                                                </div>
                                                            </div>
                                                            <p>By defining and following internal and external processes, your team
                                                                will have clarity on resources to <br> attract and retain customers
                                                for your business.</p>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <div class="bd-postbox-details-comment-box d-sm-flex align-items-start">
                                                <div class="bd-postbox-details-comment-thumb">
                                                    <img src="{{asset("assets/images/user/user-thumb-06.png")}}" alt="">
                                                </div>
                                                <div class="bd-postbox-details-comment-content">
                                                    <div class="bd-postbox-details-comment-top d-flex justify-content-between align-items-start">
                                                        <div class="bd-postbox-details-comment-avater">
                                                            <h4 class="bd-postbox-details-comment-avater-title">Jeremy C. Irizarry</h4>
                                                            <span class="bd-postbox-details-avater-meta">12 April, 2023 at
                                                3.50pm</span>
                                                        </div>
                                                        <div class="bd-postbox-details-comment-reply">
                                                            <a href="#">Reply</a>
                                                        </div>
                                                    </div>
                                                    <p>By defining and following internal and external processes, your team will
                                                        have clarity on resources to <br> attract and retain customers for your
                                          business.</p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="post-comment-form">
                                    <div class="post-comments-title">
                                        <h4 class="mb-15">Leave a Comment</h4>
                                    </div>
                                    <form>
                                        <div class="row gy-20">
                                            <div class="col-xl-6">
                                                <div class="input-box">
                                                    <input required type="text" placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="input-box">
                                                    <div class="input-box">
                                                        <input required type="email" placeholder="Email">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="input-box">
                                                    <textarea cols="30" rows="10" placeholder="Type Comment here"></textarea>
                                                </div>
                                            </div>
                                            <div class="bd-postbox-details-suggetions mb-20">
                                                <div class="bd-postbox-details-remeber">
                                                    <input id="remeber" type="checkbox">
                                                    <label for="remeber">Save my name, email, and website in this browser for the
                                                        next time I comment.</label>
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="submit-btn">
                                                    <button class="bd-btn btn-style btn-hover-x btn-black" type="submit">Post
                                                        Comment</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div> -->
                      </div>
                  </div>
                  <div class="col-xl-4 col-lg-4">
                      <div class="agent-sidebar-wrapper bd-sidebar-sticky">
                          <div class="agent-details-widget mb-35">
                              <h3 class="sidebar-widget-title">Contact</h3>
                              <form class="form" enctype="multipart/form-data" action="{{ route('contact_enquiry')}}"
                                  method="POST">
                                  @csrf
                                  <input required type="hidden" name="property_id"
                                      value="{{$propertyContent->property_id}}" placeholder="Name">
                                  <div class="row g-3">
                                      <div class="col-xl-12">
                                          <div class="input-box">

                                              <input required type="text" name="name" placeholder="Name">

                                          </div>
                                      </div>
                                      <div class="col-xl-12">
                                          <div class="input-box">
                                              <div class="input-box">
                                                  <input required type="email" name="email" placeholder="Email">
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-xl-12">
                                          <div class="input-box">
                                              <input required type="text" name="phone" placeholder="Phone">
                                          </div>
                                      </div>
                                      <div class="col-xl-12">
                                          <div class="input-box">
                                              <textarea required cols="30" rows="10" name="message"
                                                  placeholder="Write Message"></textarea>
                                          </div>
                                      </div>
                                      <div class="col-xl-12">
                                          <div class="agent-details-btn">
                                              <button class="bd-btn btn-style btn-hover-x w-100 btn-black"
                                                  type="submit">Send
                                                  Email</button>
                                          </div>
                                      </div>
                                  </div>
                              </form>
                          </div>
                          <!-- featured properties start -->
                          <div class="sidebar-properties-wrapper">
                              <div class="swiper featured__properties">
                                  <div class="swiper-wrapper">
                                      @foreach ($featured_properties as $property)

                                      @php
                                      $property_content = $property->getContent($language->id);
                                      if (is_null($property_content)) {
                                      $property_content = $property
                                      ->propertyContents()
                                      ->first();
                                      }
                                      @endphp
                                      <div class="swiper-slide">
                                          <div class="sidebar-widget mb-25">
                                              <h3 class="sidebar-widget-title">Featured Properties</h3>
                                              <div class="sidebar-slider">
                                                  <div class="sidebar-thumb-wrapper">
                                                      <div class="sidebar-thumb">
                                                          <figure><img
                                                                  src="{{asset('assets/img/property/featureds/' . $property->featured_image) }}"
                                                                  alt="agent-sidebar thumb not found"></figure>
                                                      </div>
                                                      <div class="sidebar-content-inner">
                                                          <div class="content">
                                                              <span
                                                                  class="price">${{$property->expectedPrice}}/mo</span>
                                                              <h3 class="title"><a href="#">Renovated Apartment</a></h3>
                                                          </div>
                                                      </div>
                                                      <div class="badge-wrap agent-badge">
                                                          <a href="#" class="bd-badge">Featured</a>
                                                          <a href="#" class="bd-badge">For {{$property->purpose}}</a>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                      @endforeach
                                  </div>
                                  <div class="agent-nav-pag mb-20">
                                      <!-- If we need navigation buttons -->
                                      <div class="common-navigation">
                                          @php
                                           if (count($featured_properties)) {
                                           @endphp
                                          <button class="properties-slider-button-prev"><i
                                                  class="fa-regular fa-arrow-left"></i></button>
                                          <button class="properties-slider-button-next"><i
                                                  class="fa-regular fa-arrow-right"></i></button>
                                           @php  
                                           }
                                             @endphp      
                                      </div>
                                      <!-- If we need pagination -->
                                      <div class="properties-pagination">
                                          <div class="bd-swiper-dot text-center"></div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <!-- featured properties end -->
                          <!-- latest post start -->
                          <div class="sidebar-widget mb-35">
                              <h3 class="sidebar-widget-title">Latest Posts</h3>
                              <div class="sidebar-widget-content">
                                  <div class="sidebar-blog-item-wrapper">
                                      @foreach ($featured_properties as $row=> $property)

                                      @php
                                      if($row==3){
                                      break;
                                      }
                                      $property_content = $property->getContent($language->id);
                                      if (is_null($property_content)) {
                                      $property_content = $property
                                      ->propertyContents()
                                      ->first();
                                      }
                                      @endphp
                                      <div class="sidebar-blog-item">
                                          <div class="sidebar-blog-thumb">
                                              <a href="blog-details.html">
                                                  <img src="{{asset('assets/img/property/featureds/' . $property->featured_image) }}"
                                                      alt="image">
                                              </a>
                                          </div>
                                          <div class="sidebar-blog-content">
                                              <div class="sidebar-blog-meta">
                                                  <span>{{$property->created_at}}</span>
                                              </div>
                                              <h3 class="sidebar-blog-title">
                                                  <a href="blog-details.html">{{$property_content->title}}</a>
                                              </h3>
                                          </div>
                                      </div>
                                      @endforeach
                                  </div>
                              </div>
                          </div>
                          <!-- latest post end -->
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <!-- property details content end -->

      <!-- Your page content here -->

      <!-- Modal (Bootstrap example) -->

      <div class="modal fade" {{-- id="aboutUs"  --}} data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
          aria-labelledby="aboutUsLabel" aria-hidden="true" {{-- class="modal "  --}} id="sessionModal"
          {{-- tabindex="-1" --}}>
          <div class="modal-dialog">
              <div class="modal-content">


                  <div class="modal-header">
                      <h5 class="modal-title">Signup Required</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>

                  <div class="modal-body">
                      <form class="form" enctype="multipart/form-data" action="{{ route('user.signup_submit') }}"
                          method="POST">
                          @csrf
                          <input required type="hidden" name="property_id" value="{{$propertyContent->property_id}}"
                              placeholder="Name">
                          <div class="row g-3">
                              <div class="col-xl-12">
                                  <div class="input-box">

                                      <input required type="text" name="name" placeholder="Name">
                                  </div>
                              </div>

                              <div class="col-xl-12">
                                  <div class="input-box">

                                      <input required type="text" name="username" placeholder="username">
                                  </div>
                              </div>

                              <div class="col-xl-12">
                                  <div class="input-box">

                                      <input required type="password" name="password" placeholder="Password">
                                  </div>
                              </div>

                              <div class="col-xl-12">
                                  <div class="input-box">

                                      <input required type="password" name="password_confirmation"
                                          placeholder="Confirm Password">
                                  </div>
                              </div>
                              <div class="col-xl-12">
                                  <div class="input-box">
                                      <div class="input-box">
                                          <input required type="email" name="email" placeholder="Email">
                                      </div>
                                  </div>
                              </div>
                              <div class="col-xl-12">
                                  <div class="input-box">
                                      <input required type="text" name="phone" placeholder="Phone">
                                  </div>
                              </div>



                              <div class="col-xl-12">
                                  <div class="input-box">
                                      <select name="country_id" class="form-control country js-example-basic-single3">
                                          <option disabled selected>{{ __('Select Country') }}
                                          </option>

                                          @foreach ($propertyCountries as $country)
                                          <option value="{{ $country->id }}">
                                              {{ $country->countryContent->name }}</option>
                                          @endforeach
                                      </select>
                                  </div>
                              </div>

                              <div class="col-xl-12">
                                  <div class="input-box">
                                      <select onchange="getCities(event)" name="state_id"
                                          class="form-control state_id states js-example-basic-single3">
                                          <option selected disabled>{{ __('Select State') }}
                                          </option>
                                          @foreach ($states as $state)
                                          <option value="{{ $state->id }}">
                                              {{ $state->stateContent->name }}</option>
                                          @endforeach

                                      </select>
                                  </div>
                              </div>

                              <div class="col-xl-12">
                                  <div class="input-box">
                                      <select name="city_id" class="form-control city_id js-example-basic-single3">
                                          <option selected disabled>{{ __('Select City') }}
                                          </option>
                                          @if ($propertySettings->property_state_status == 0 &&
                                          $propertySettings->property_country_status == 0)
                                          @foreach ($cities as $city)
                                          <option value="{{ $city->id }}">
                                              {{ $city->cityContent->name }}</option>
                                          @endforeach
                                          @endif
                                      </select>
                                  </div>
                              </div>
                              <div class="col-xl-12">
                                  <div class="input-box">
                                      <div class="input-box">
                                          <input required type="text" name="address" placeholder="address">
                                      </div>
                                  </div>
                              </div>
                              <div class="col-xl-12">
                                  <div class="input-box">
                                      <input required type="text" name="zip_code" placeholder="zip_code">
                                  </div>
                              </div>

                              <div class="col-xl-12">
                                  <div class="agent-details-btn">
                                      <button class="bd-btn btn-style btn-hover-x w-100 btn-black"
                                          type="submit">Submit</button>
                                  </div>
                              </div>
                          </div>
                      </form>
                  </div>

              </div>
          </div>
      </div>


      <div id="otpSignupModal" class="modal fade" {{-- id="aboutUs"  --}} data-bs-backdrop="static"
          data-bs-keyboard="false" tabindex="-1" aria-labelledby="aboutUsLabel" aria-hidden="true"
          {{-- class="modal "  --}} id="sessionModal" {{-- tabindex="-1" --}}>
          <div class="modal-dialog">
              <div class="modal-content">


                  <div class="modal-header">
                      <h5 class="modal-title">OTP Signup</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>

                  <div class="modal-body">
                      <!-- Send OTP Form -->
                      <form id="sendOtpForm">
                          <div class="form-group">
                              <label for="phone">Phone Number</label>
                              <input type="text" class="form-control" id="phone" name="phone"
                                  placeholder="Enter Phone number" required>
                          </div>
                          <div class="col-xl-12">
                              <div class="agent-details-btn">
                                  <button class="bd-btn btn-style btn-hover-x w-100 btn-black" type="submit">Send
                                      OTP</button>
                              </div>
                          </div>
                          <!-- <button type="submit" class="btn btn-primary">Send OTP</button> -->
                      </form>

                      <!-- Verify OTP Form -->
                      <form id="verifyOtpForm" style="display: none;">
                          <input required type="hidden" name="property_id" id="property_id1"
                              value="{{$propertyContent->property_id}}" placeholder="Name">
                          <div class="form-group">
                              <label for="otp">OTP</label>
                              <input type="text" class="form-control" id="otp" name="otp" placeholder="Enter OTP"
                                  required>
                          </div>
                          <div class="form-group">
                              <label for="name">Name</label>
                              <input type="text" class="form-control" id="name" name="name"
                                  placeholder="Enter your name" required>
                          </div>
                          <div class="form-group">
                              <label for="name">Username</label>
                              <input type="text" class="form-control" id="username" name="username"
                                  placeholder="Enter your username" required>
                          </div>
                          <div class="form-group">
                              <label for="name">Email</label>
                              <input type="text" class="form-control" id="email" name="email"
                                  placeholder="Enter your email" required>
                          </div>
                          <div class="form-group">
                              <label for="password">Password</label>
                              <input type="password" class="form-control" id="password" name="password"
                                  placeholder="Enter password" required>
                          </div>
                          <div class="form-group">
                              <label for="password_confirmation">Confirm Password</label>
                              <input type="password" class="form-control" id="password_confirmation"
                                  name="password_confirmation" placeholder="Confirm password" required>
                          </div>
                          <div class="col-xl-12">
                              <div class="agent-details-btn">
                                  <button class="bd-btn btn-style btn-hover-x w-100 btn-black" type="submit">Verify
                                      OTP</button>
                              </div>
                          </div>
                          <!-- <button type="submit" class="btn btn-success">Verify OTP</button> -->
                      </form>
                  </div>

              </div>
          </div>
      </div>




  </main>


  @endsection
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
var stateUrl = "{{ route('agent.property_specification.get_state_cities') }}";
let cityUrl = "{{ route('agent.property_specification.get_cities') }}";

$(document).ready(function() {
    $.ajax({
       url: '{{ route('check-session')}}',
        method: 'GET',
        success: function(response) {
            console.log(response);
            // Check if the session value is null or empty
            if (response.sessionValue === null || response.sessionValue === '') {
                // Perform actions if the session value is null
                //   $('#sessionModal').modal('show'); // Example: Open a modal
                $('#otpSignupModal').modal('show'); // Example: Open a modal
            }
        },
        error: function(error) {
            console.log('Error fetching session value:', error);
        }
    });


    $('#whatsapp_click').on('click', function(e) {
        var url = "{{ route('contact_enquiry')}}";
        var user_id = $("#user_id").val();
        if (user_id > 0) {
            $.ajax({
                url: url,
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('#token').val()
                },

                data: JSON.stringify({
                    "user_id": "{{isset($user->id) ? $user->id : 0}}",
                    "name": "{{isset($user->name) ? $user->name : "" }}",
                    "email": "{{isset($user->email) ? $user->email :""}}",
                    "phone": "{{isset($user->phone) ? $user->phone : ""}}",
                    "enquiry_mode": "whatsapp",
                    "property_id": "{{$propertyContent->property_id}}",

                }),
                dataType: 'json',
                contentType: "application/json; charset=utf-8",
                cache: false,
                processData: false,
                success: function(response) {
                    $(form).trigger("reset");
                    alert(response.success)
                },
                error: function(response) {}
            });
        }
    });


    $('#phone_click').on('click', function(e) {
        var url = "{{ route('contact_enquiry')}}";
        var user_id = $("#user_id").val();
        if (user_id > 0) {
            $.ajax({
                url: url,
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('#token').val()
                },

                data: JSON.stringify({
                    "user_id": "{{isset($user->id) ? $user->id : 0}}",
                    "name": "{{isset($user->name) ? $user->name : "" }}",
                    "email": "{{isset($user->email) ? $user->email :""}}",
                    "phone": "{{isset($user->phone) ? $user->phone : ""}}",
                    "enquiry_mode": "phone",
                    "property_id": "{{$propertyContent->property_id}}",

                }),
                dataType: 'json',
                contentType: "application/json; charset=utf-8",
                cache: false,
                processData: false,
                success: function(response) {
                    $(form).trigger("reset");
                    alert(response.success)
                },
                error: function(response) {}
            });
        }

    });




});

$(document).ready(function() {
    $('#sendOtpForm').submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: "{{ route('otp.signup.send') }}",
            method: "POST",
            data: {
                phone: $('#phone').val(),
                _token: "{{ csrf_token() }}"
            },
            success: function(response) {
                alert(response.success);
                $('#sendOtpForm').hide();
                $('#verifyOtpForm').show();
            },
            error: function(xhr) {
                alert(xhr.responseJSON.error);
            }
        });
    });

    $('#verifyOtpForm').submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: "{{ route('otp.signup.verify') }}",
            method: "POST",
            data: {
                property_id: $('#property_id1').val(),
                phone: $('#phone').val(),
                otp: $('#otp').val(),
                name: $('#name').val(),
                username: $('#username').val(),
                email: $('#email').val(),
                password: $('#password').val(),
                password_confirmation: $('#password_confirmation').val(),
                _token: "{{ csrf_token() }}"
            },
            success: function(response) {
                alert(response.success);
                location.reload("/user/dashboard"); // Redirect to a new page or reload
            },
            error: function(xhr) {
                alert(xhr.responseJSON.error);
            }
        });
    });
});
  </script>