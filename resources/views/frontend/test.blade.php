            @php
            $category_lists=DB::table('categories')->where('status','active')->limit(3)->get();
            @endphp
            <div class="categories-slider owl-carousel owl-theme show-nav-hover nav-outer">
                
                @if($category_lists)
                    @foreach($category_lists as $cat)
                        @if($cat->is_parent==1)

                            <div class="product-category appear-animate" data-animation-name="fadeInUpShorter">
                                <a href="{{route('product-cat',$cat->slug)}}">
                                    @if($cat->photo)
                                        <img src="{{$cat->photo}}" alt="{{$cat->photo}}">
                                        <figure>                                            
                                            <img src="assets/images/demoes/demo4/products/categories/category-1.jpg" alt="category" width="280" height="240" />
                                        </figure>
                                    @else
                                        <figure>                                            
                                            <img src="https://via.placeholder.com/600x370" alt="#">
                                        </figure>
                                    @endif


                                    <div class="category-content">
                                        <h3>Dress</h3>
                                        <span><mark class="count">3</mark> products</span>
                                    </div>
                                </a>
                            </div>
                        @endif
                        <!-- /End Single Category  -->
                    @endforeach
               
                
            </div>
            @endif