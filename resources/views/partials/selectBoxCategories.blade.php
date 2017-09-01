<?php 
   
      


?>


<select class="form-control selecter" name="category" id="search-category">
    <option value="all categories">All categories</option>  
    @foreach($categories as $cat)
        <option value="{{$cat->category}}" style="background-color:#E9E9E9;color:16A085;font-weight:bold;">
        - {{$cat->category}} -
        </option>
        @foreach($subCategories as $subCat)
            @if($subCat->category_id == $cat->cat_id)
                 <?php $i = 0;  $selectedCat = "";
                        if(isset($_GET['category'])){
                            $selectedCat = strtolower($_GET['category']);
                        }else if(isset($category)){
                             $selectedCat = strtolower($category);
                        }
                ?>
                @if(strtolower($subCat->subcategory_name) == $selectedCat)

                    <option selected value="{{$subCat->subcategory_name}}">    
                    {{$subCat->subcategory_name}}</option>
                @else
                <option value="{{$subCat->subcategory_name}}">    
                    {{$subCat->subcategory_name}}</option>
                @endif
            @endif
        @endforeach
    @endforeach
</select>