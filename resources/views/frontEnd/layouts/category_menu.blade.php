<div class="left-sidebar shadow p-3 mb-5 bg-white rounded">
    <?php
    // $categories=DB::table('categories')->where([['status',1],['parent_id',0]])->get();
    ?>
    <h2>Category</h2>
    <div class="panel-group category-products" id="accordian">
        <!--category-productsr-->
        @foreach($categories as $category)
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordian" href="#sportswear{{$category->id}}">
                        @if(count($category->children)>0)
                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                        @endif
                    </a>
                    <a href="{{route('cats',$category->id)}}">{{$category->name}}</a>

                </h4>
            </div>
            @if(count($category->children)>0)
            <div id="sportswear{{$category->id}}" class="panel-collapse collapse">
                <div class="panel-body">
                    <ul>
                        @foreach($category->children as $sub_category)
                        <li><a href="{{route('cats',$sub_category->id)}}">{{$sub_category->name}} </a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif
        </div>
        @endforeach
    </div>
    <!--/category-products-->

</div>