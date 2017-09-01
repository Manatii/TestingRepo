<div id = "locations">
<div class="col-md-12 col-xs-12 suburbs-desktop" id = "location-link">
    <div class = "col-xs-4 col-sm-4 col-md-4  column1">
        <ul>
            <?php  
                $i = 0;
                $route = "";                        

            ?>
            @foreach($suburbs as $suburb)
               <?php 
                $location = strtolower($suburb->location);
                $route =  "ads/location/".$location;                                                      
                $location = ucfirst($location);  
                $firstLetter = substr($location,0,1 );
                $location =   substr($location,1 );


               ?>
               <?php if($i == 0) { ?>
                    <li class='location-li' style = 'padding-bottom: 6px;'>
                        <a style ='color: #4e575d;font-size: 14.60px;font-style: normal;line-height: normal;transition: all 0.1s ease 0s;'class='info_link' href='#' title="All locations"><strong>A</strong>ll locations</a>
                    </li>
                <?php }  ?>
                <?php  if($i <=11){ ?>                                
                    <li class='location-li' style = 'padding-bottom: 6px;'>
                        <a style ='color: #4e575d;font-size: 14.60px;font-style: normal;line-height: normal;transition: all 0.1s ease 0s;'class='info_link' href='#' title='"{{$location}}"'><strong>{{$firstLetter}}</strong>{{$location}}</a>
                    </li>
                <?php if($i == 11) {?>
        </ul>  
    </div>
     <div class = "col-xs-4 col-sm-4 col-md-4 column2">
        <ul> 
            <?php } }
                 else if($i > 11 && $i <= 24){ ?>

                    <li class='location-li' style = 'padding-bottom: 6px;'>
                        <a style ='color: #4e575d;font-size: 14.60px;font-style: normal;line-height: normal;transition: all 0.1s ease 0s;'class='info_link' href='#' title='"{{ $location }}"'><strong>{{$firstLetter}}</strong>{{$location}}</a>
                    </li>
                      
            <?php } if($i == 24){ ?>
        </ul>  
    </div>
    <div class = "col-xs-4 col-sm-4 col-md-4 column3">
        <ul>
            <?php  } else if($i > 24){ ?>
                <li class='location-li' style = 'padding-bottom: 6px;'>
                    <a style ='color: #4e575d;font-size: 14.60px;font-style: normal;line-height: normal;transition: all 0.1s ease 0s;'class='info_link' href='#' title='"{{ $location }}"'><strong>{{$firstLetter}}</strong>{{$location}}</a>
                </li>
            <?php } $i++;?>
            @endforeach               
        </ul>  
    </div>          
</div>
  <div class="col-md-12 col-xs-12 townships-desktop" style = "display:none" id = "location-link">
    <div class = "col-xs-4 col-sm-4 col-md-4  column1">
        <ul>
            <?php  
                $i = 0;
                $route = "";                        

            ?>
            @foreach($townships as $township)
               <?php 
               $location = strtolower($township->location);

                                                                        
                $location = ucfirst($location);  
               $firstLetter = substr($location,0,1 );
               $location =   substr($location,1 );
               ?>
                <?php  if($i <=12){ ?>                                
                    <li class='location-li' style = 'padding-bottom: 6px;'>
                        <a style ='color: #4e575d;font-size: 14.60px;font-style: normal;line-height: normal;transition: all 0.1s ease 0s;'class='info_link' href='#' title='"{{$location}}"'><strong>{{$firstLetter}}</strong>{{$location}}</a>
                    </li>
                <?php if($i == 12) {?>
        </ul>  
    </div>
     <div class = "col-xs-4 col-sm-4 col-md-4 column2">
        <ul> 
            <?php } }
                 else if($i > 12 && $i <= 25){ ?>

                    <li class='location-li' style = 'padding-bottom: 6px;'>
                        <a style ='color: #4e575d;font-size: 14.60px;font-style: normal;line-height: normal;transition: all 0.1s ease 0s;'class='info_link' href='#' title='"{{ $location }}"'><strong>{{$firstLetter}}</strong>{{$location}}</a>
                    </li>
                      
            <?php } if($i == 25){ ?>
        </ul>  
    </div>
    <div class = "col-xs-4 col-sm-4 col-md-4 column3">
        <ul>
            <?php  } else if($i > 25){ ?>
                <li class='location-li' style = 'padding-bottom: 6px;'>
                    <a style ='color: #4e575d;font-size: 14.60px;font-style: normal;line-height: normal;transition: all 0.1s ease 0s;'class='info_link' href='#' title='"{{ $location }}"'><strong>{{$firstLetter}}</strong>{{$location}}</a>
                </li>
            <?php } $i++;?>
            @endforeach               
        </ul>  
    </div>          
</div>  
<div class="col-md-12 col-xs-12 suburbs-mobile" style = "display:none" id = "location-link">
    <div class = "col-xs-6 col-sm-4 col-md-4  column1">
        <ul>
            <?php  
                $i = 0;
                $route = "";                        

            ?>
            @foreach($suburbs as $suburb)
              <?php 
                    $location = strtolower($suburb->location);
                    $route =  "ads/location/".$location;                                                      
                    $location = ucfirst($location);  
                    $firstLetter = substr($location,0,1 );
                    $location =   substr($location,1 );
               ?>
                <?php  if($i <=19){ ?>                                
                    <li class='location-li' style = 'padding-bottom: 6px;'>
                        <a style ='color: #4e575d;font-size: 14.60px;font-style: normal;line-height: normal;transition: all 0.1s ease 0s;'class='info_link' href='#' title='"{{$location}}"'><strong>{{$firstLetter}}</strong>{{$location}}</a>
                    </li>
            <?php if($i == 19) {?>
        </ul>  
    </div>
     <div class = "col-xs-6 col-sm-4 col-md-4 column2">
        <ul> 
            <?php } }
                 else if($i > 19){ ?>

                    <li class='location-li' style = 'padding-bottom: 6px;'>
                        <a style ='color: #4e575d;font-size: 14.60px;font-style: normal;line-height: normal;transition: all 0.1s ease 0s;'class='info_link' href='#' title='"{{ $location }}"'><strong>{{$firstLetter}}</strong>{{$location}}</a>
                    </li>
                      
             <?php } $i++;?>
        @endforeach  
        </ul>  
    </div>                            
</div>
  <div class="col-md-12 col-xs-12 townships-mobile" style="display:none"  id = "location-link">
    <div class = "col-xs-6 col-sm-4 col-md-4  column1">
        <ul>
            <?php  
                $i = 0;
                $route = "";                        

            ?>

            @foreach($townships as $township)
               <?php 
               $location = strtolower($township->location);

               if(isset($storedMainCategory)){  

                    $storedMainCategory =  strtolower($storedMainCategory);
                    $keyword  = $storedMainCategory;
                    $storedProvince = "all-locations";                                        
                    $route = "search-item-loc-main-cat-prov"."/".$keyword."/".$location."/".$storedMainCategory."/".$storedProvince;
                
                }else if (isset($storedCategory)){ 
                    $storedCategory = strtolower($storedCategory);    

                    $keyword  = $storedCategory;                                       
                    $storedProvince  = "all-locations"; 
                    $route = "search-item-loc-cat-prov/".$keyword."/".$location."/".$storedCategory."/".$storedProvince;  
                }
                else if(isset($searchItem)){
                    $route = "/ads/loc-search-item?city=".$location."&searchItem=".$searchItem;
                }
                else{
                   $route =  "ads/location/".$location;

                }

                $location = ucfirst($location);       
                $firstLetter = substr($location,0,1 );
                $location =   substr($location,1 );
               
                ?>
                <?php  if($i <=16){ ?>                                
                    <li class='location-li' style = 'padding-bottom: 6px;'>
                        <a style ='color: #4e575d;font-size: 14.60px;font-style: normal;line-height: normal;transition: all 0.1s ease 0s;'class='info_link' href='#' title='"{{$location}}"'><strong>{{$firstLetter}}</strong>{{$location}}</a>
                    </li>
            <?php if($i == 16) {?>
        </ul>  
    </div>
     <div class = "col-xs-6 col-sm-4 col-md-4 column2">
        <ul> 
            <?php } }
                 else if($i > 16){ ?>

                    <li class='location-li' style = 'padding-bottom: 6px;'>
                        <a style ='color: #4e575d;font-size: 14.60px;font-style: normal;line-height: normal;transition: all 0.1s ease 0s;'class='info_link' href='#' title='"{{ $location }}"'><strong>{{$firstLetter}}</strong>{{$location}}</a>
                    </li>
                      
             <?php } $i++;?>
        @endforeach  
        </ul>  
    </div>                            
</div>
</div>