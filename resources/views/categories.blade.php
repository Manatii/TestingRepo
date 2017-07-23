 <div class="categories-list list-filter">
   <h5 class="list-title"><strong><a href="#"> All Categories</a></strong></h5>
    <ul class="browse-list list-unstyled long-list">
      <?php $i =0;
      		 //echo $adsPerCategory[2];
       ?>

        @foreach($categories as $category)                                 
            <li id = '{{$category->cat_id}}' title = '{{$category->category }}' style="cursor:pointer;padding: 2px 15px 2px 5px;">{{$category->category }} <span class="count">({{$adsPerCategory[$i]}})</span>
            </li>

            <?php   $i++ ?>
       @endforeach
    </ul>
</div>