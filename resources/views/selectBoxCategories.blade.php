<select class="form-control" name="category" id="search-category">
    <?php $i = 0; ?>
    @foreach($categories as $cat)
        <option value="{{$cat->category}}" style="background-color:#E9E9E9;font-weight:bold;" disabled="disabled" >
        - {{$cat->category}} -
        </option>
        @foreach($subCategories as $subCat)
            @if($subCat->category_id == $cat->cat_id)
                <option value="{{$subCat->subcategory_name}}">    
                {{$subCat->subcategory_name}}</option>
            @endif
        @endforeach
    @endforeach
</select>