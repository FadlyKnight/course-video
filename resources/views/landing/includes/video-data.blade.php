
						@php
                            $thumbnail = $item->url;
                            $thumbnail_fix = str_replace("https://youtu.be/", "https://img.youtube.com/vi/", $thumbnail );
                        @endphp

                        <div class="col-md-3 col-sm-6 col-xs-6 animate-box">
                            <div class="services">
                                <div class="col">
                                    <div  class="text-center small-img-row">
                                        <div class="small-img" style="background-image: url({{$thumbnail_fix}}/0.jpg);
                                                                        background-position: center;
                                                                        background-size: contain;
                                                                        background-repeat: no-repeat;">
                                            <div style="padding: 2em">
                                                <a href="{{ route('landing.video', encrypt($item->id)) }}" style="">
                                                <div class="icon play-btn">
                                                    <i class="icon-play4"></i>
                                                </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>	
                                <div class="desc">
                                    <h3 class="text-center"><a href="{{ route('landing.video', encrypt($item->id)) }}">{{ Str::limit($item->title, 10, ' ...') }}</a></h3>
                                    <p>Narasumber : {{ $item->name }} <br/> Kategori : {{ $item->category }}<br/>5 comments <i class="icon-messages"> </i></p>
                                </div>
                            </div>
                        </div>	
                        