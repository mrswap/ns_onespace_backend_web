 
 
 <div {{ $attributes }}>
     
                                                @if ($property)
                                                    @php

                                                        $property_content = $property->getContent(22);
                                                        if (is_null($property_content)) {
                                                            $property_content = $property->propertyContents()->first();
                                                        }
                                                    @endphp
                                                    <!--<div class="col-xl-6 col-md-6">-->
                                                        <div class="featured-item style-three wow bdFadeInUp"
                                                            data-wow-delay=".3s" data-wow-duration="1s">
                                                            <div class="thumb-wrapper">
                                                                <div class="badge-wrap">
                                                                    <span class="bd-badge">Featured</span>
                                                                </div>
                                                                <div class="price">
                                                                    <span>{{ $property->price }}/mo</span>
                                                                </div>
                                                                <div class="thumb">
                                                                    <a
                                                                        href="{{ route('frontend.property.propertydetails', ['id' => $property->id]) }}">
                                                                        <figure>
                                                                            <img src="{{ asset('assets/front/v5/images/featured/featured-thumb-15.png') }}"
                                                                                alt="image" />
                                                                        </figure>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="content">
                                                                <h3 class="title">
                                                                    <a
                                                                        href="{{ route('frontend.property.propertydetails', ['id' => $property->id]) }}">{{ $property_content->title }}</a>
                                                                </h3>
                                                                <span
                                                                    class="info">{{ $property_content->address }}</span>
                                                                <div class="bd-meta">
                                                                    <div class="meta-item">
                                                                        <span class="icon"><i
                                                                                class="fa-regular fa-bed-front"></i></span><span
                                                                            class="title">{{ $property->beds }}
                                                                            bad</span>
                                                                    </div>
                                                                    <div class="meta-item">
                                                                        <span class="icon"><i
                                                                                class="fa-duotone fa-shower"></i></span><span
                                                                            class="title">{{ $property->bath }}
                                                                            bath</span>
                                                                    </div>
                                                                    <div class="meta-item">
                                                                        <span class="icon"><i
                                                                                class="fa-regular fa-arrows-maximize"></i></span><span
                                                                            class="title">{{ $property->area }}
                                                                            sqft</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="bd-meta-profile">
                                                                <div class="bd-profile-info">
                                                                    <h6 class="profile-title text-black"><span>Contact
                                                                            Us</span>
                                                                    </h6>
                                                                </div>
                                                                <div class="profile-icons d-flex align-items-center">
                                                                    <a class="link" target="_blank"
                                                                        href="https://api.whatsapp.com/send?phone=9752777721&text=Hi">
                                                                    <span><i class="fa-regular fa-whatsapp"></i></span>
                                                                </a>
                                                                <a class="link" href="tel:+4733378901">
                                                                    <span><i class="fa-regular fa-phone"></i></span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <!--</div>-->
                                         @endif
                                                
 </div>
