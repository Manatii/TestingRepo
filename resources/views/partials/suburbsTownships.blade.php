<div id = "locations">
<div class="col-md-12 col-xs-12 suburbs-desktop" id = "location-link">
    <div class = "col-xs-4 col-sm-4 col-md-4  column1">
        <ul>
            <?php  
                $i = 0;                

            ?>
            @foreach($suburbs as $suburb)
               <?php 
               $location = strtolower($suburb->location);
               $route = "";
               $allLocations = "all-locations-suburbs";

                if(isset($storedMainCategory)){  
                    
                    $storedMainCategory =  strtolower($storedMainCategory);
                    $allLocationRoute = "main-cat-loc/".$storedMainCategory."/".$allLocations;
                    $route = "main-cat-loc/".$storedMainCategory."/".$location;                   
                
                }else if(isset($storedCategory)){ 

                    $storedCategory = strtolower($storedCategory);
                    $storedCategory = str_replace(" ", "-", $storedCategory);

                    $keyword  = $storedCategory;                                       
                    $storedProvince  = "all-locations"; 
                    $allLocationRoute = "cat-loc/".$storedCategory."/".$allLocations;
                    $route = "cat-loc/".$storedCategory."/".$location;
                    
                }
                else if(isset($_GET['searchItem']) || isset($searchItem)){ 

                    $sItem = "";
                    if(isset($_GET['searchItem'])){
                        $sItem = $_GET['searchItem'];
                    }
                    else if(isset($searchItem)){
                        $sItem = $searchItem;
                    }                 

                    $searchItem = str_replace(" ", "-", $searchItem);
                    $routeLocation = str_replace(" ", "-", $location);
                    $allLocationRoute = $route = "/ads/loc-modal-search-item/".$allLocations."/".$sItem; 
                    $route = "/ads/loc-modal-search-item/".$routeLocation."/".$sItem;
                }
                else{
                   $allLocationRoute ="ads/location/".$allLocations; 
                   $route =  "ads/location/".$location;                  
                }

                $location = ucfirst($location);  
                $firstLetter = substr($location,0,1 );
                $location =   substr($location,1 );

               ?>
                <?php if($i== 0){ ?>
                    <li class='location-li' style = 'padding-bottom: 6px;'>
                        <a style ='color: #4e575d;font-size: 14.60px;font-style: normal;line-height: normal;transition: all 0.1s ease 0s;'class='info_link' href='{{ asset("$allLocationRoute")}}' title='All location'><strong>A</strong>ll locations</a>
                    </li>
                <?php } ?>
                <?php  if($i <=11){ ?>                                
                    <li class='location-li' style = 'padding-bottom: 6px;'>
                        <a style ='color: #4e575d;font-size: 14.60px;font-style: normal;line-height: normal;transition: all 0.1s ease 0s;'class='info_link' href='{{ asset("$route")}}' title='"{{$location}}"'><strong>{{$firstLetter}}</strong>{{$location}}</a>
                    </li>
                <?php if($i == 11) {?>
        </ul>  
    </div>
     <div class = "col-xs-4 col-sm-4 col-md-4 column2">
        <ul> 
            <?php } }
                 else if($i > 11 && $i <= 24){ ?>

                    <li class='location-li' style = 'padding-bottom: 6px;'>
                        <a style ='color: #4e575d;font-size: 14.60px;font-style: normal;line-height: normal;transition: all 0.1s ease 0s;'class='info_link' href='{{ asset("$route")}}' title='"{{ $location }}"'><strong>{{$firstLetter}}</strong>{{$location}}</a>
                    </li>
                      
            <?php } if($i == 24){ ?>
        </ul>  
    </div>
    <div class = "col-xs-4 col-sm-4 col-md-4 column3">
        <ul>
            <?php  } else if($i > 24){ ?>
                <li class='location-li' style = 'padding-bottom: 6px;'>
                    <a style ='color: #4e575d;font-size: 14.60px;font-style: normal;line-height: normal;transition: all 0.1s ease 0s;'class='info_link' href='{{ asset("$route")}}' title='"{{ $location }}"'><strong>{{$firstLetter}}</strong>{{$location}}</a>
                </li>
            <?php } $i++;?>
            @endforeach               
        </ul>  
    </div>          
</div>
  <div class="col-md-12 col-xs-12 townships-desktop" style="display:none" id = "location-link">
    <div class = "col-xs-4 col-sm-4 col-md-4  column1">
        <ul>
            <?php  
                $i = 0;
                $route = "";                        

            ?>
            @foreach($townships as $township)
               <?php 
               $location = strtolower($township->location);
               $route = "";
               $allLocations = "all-locations-townships";

               if(isset($storedMainCategory)){  
                    
                    $storedMainCategory =  strtolower($storedMainCategory);

                    $allLocationRoute = "main-cat-loc/".$storedMainCategory."/".$allLocations;
                    $route = "main-cat-loc/".$storedMainCategory."/".$location;
                
                }else if(isset($storedCategory)){ 

                    $storedCategory = strtolower($storedCategory);
                    $storedCategory = str_replace(" ", "-", $storedCategory);

                    $keyword  = $storedCategory;                                       
                    $storedProvince  = "all-locations"; 

                    $allLocationRoute = "cat-loc/".$storedCategory."/".$allLocations;
                    $route = "cat-loc/".$storedCategory."/".$location;  
                    
                }
                else if(isset($_GET['searchItem']) || isset($searchItem)){ 

                    $sItem = "";
                    if(isset($_GET['searchItem'])){
                        $sItem = $_GET['searchItem'];
                    }
                    else if(isset($searchItem)){
                        $sItem = $searchItem;
                    }                 

                    $searchItem = str_replace(" ", "-", $searchItem);
                    $routeLocation = str_replace(" ", "-", $location);

                    $allLocationRoute = "/ads/loc-modal-search-item/".$allLocations."/".$sItem;
                    $route = "/ads/loc-modal-search-item/".$routeLocation."/".$sItem;
                }
                else{
                    $allLocationRoute = "ads/location/".$allLocations;
                    $route =  "ads/location/".$location;
                }       

                    $location = ucfirst($location);  
                    $firstLetter = substr($location,0,1 );
                    $location =   substr($location,1 );
               ?>

                <?php if($i== 0){ ?>
                    <li class='location-li' style = 'padding-bottom: 6px;'>
                        <a style ='color: #4e575d;font-size: 14.60px;font-style: normal;line-height: normal;transition: all 0.1s ease 0s;'class='info_link' href='{{ asset("$allLocationRoute")}}' title='All location'><strong>A</strong>ll locations</a>
                    </li>
                <?php } ?>
                <?php  if($i <=11){ ?>                                
                    <li class='location-li' style = 'padding-bottom: 6px;'>
                        <a style ='color: #4e575d;font-size: 14.60px;font-style: normal;line-height: normal;transition: all 0.1s ease 0s;'class='info_link' href='{{ asset("$route")}}' title='"{{$location}}"'><strong>{{$firstLetter}}</strong>{{$location}}</a>
                    </li>
                <?php if($i == 11) {?>
        </ul>  
    </div>
     <div class = "col-xs-4 col-sm-4 col-md-4 column2">
        <ul> 
            <?php } }
                 else if($i > 11 && $i <= 24){ ?>

                    <li class='location-li' style = 'padding-bottom: 6px;'>
                        <a style ='color: #4e575d;font-size: 14.60px;font-style: normal;line-height: normal;transition: all 0.1s ease 0s;'class='info_link' href='{{ asset("$route")}}' title='"{{ $location }}"'><strong>{{$firstLetter}}</strong>{{$location}}</a>
                    </li>
                      
            <?php } if($i == 24){ ?>
        </ul>  
    </div>
    <div class = "col-xs-4 col-sm-4 col-md-4 column3">
        <ul>
            <?php  } else if($i > 24){ ?>
                <li class='location-li' style = 'padding-bottom: 6px;'>
                    <a style ='color: #4e575d;font-size: 14.60px;font-style: normal;line-height: normal;transition: all 0.1s ease 0s;'class='info_link' href='{{ asset("$route")}}' title='"{{ $location }}"'><strong>{{$firstLetter}}</strong>{{$location}}</a>
                </li>
            <?php } $i++;?>
            @endforeach               
        </ul>  
    </div>          
</div>  
<div class="col-md-12 col-xs-12 suburbs-mobile" style=""  id = "location-link">
    <div class = "col-xs-6 col-sm-4 col-md-4  column1">
        <ul>
            <?php  
                $i = 0;
                $route = "";                        

            ?>

            @foreach($suburbs as $suburb)
               <?php 
                $location = strtolower($suburb->location);
                $route = "";
                $allLocations = "all-locations-suburbs";

                if(isset($storedMainCategory)){  
                    
                    $storedMainCategory =  strtolower($storedMainCategory);
                    $route = "main-cat-loc/".$storedMainCategory."/".$location;
                    $allLocationRoute = "main-cat-loc/".$storedMainCategory."/".$allLocations;
                }else if(isset($storedCategory)){ 

                    $storedCategory = strtolower($storedCategory);
                    $storedCategory = str_replace(" ", "-", $storedCategory);

                    $keyword  = $storedCategory;                                       
                    $storedProvince  = "all-locations"; 
                    $route = "cat-loc/".$storedCategory."/".$location; 
                    $allLocationRoute = "cat-loc/".$storedCategory."/".$allLocations; 
                }
                else if(isset($_GET['searchItem']) || isset($searchItem)){ 

                    $sItem = "";
                    if(isset($_GET['searchItem'])){
                        $sItem = $_GET['searchItem'];
                    }
                    else if(isset($searchItem)){
                        $sItem = $searchItem;
                    }                 

                    $searchItem = str_replace(" ", "-", $searchItem);
                    $routeLocation = str_replace(" ", "-", $location);

                    $route = "/ads/loc-modal-search-item/".$routeLocation."/".$sItem;
                    $allLocationRoute = "/ads/loc-modal-search-item/".$allLocations."/".$sItem;
                }
                else{
                   $route = "ads/location/".$location;
                   $allLocationRoute = "ads/location/".$allLocations;
                }         

                $location = ucfirst($location);  
                $firstLetter = substr($location,0,1 );
                $location =   substr($location,1 );
                ?>
                 <?php if($i== 0){ ?>
                    <li class='location-li' style = 'padding-bottom: 6px;'>
                        <a style ='color: #4e575d;font-size: 14.60px;font-style: normal;line-height: normal;transition: all 0.1s ease 0s;'class='info_link' href='{{ asset("$allLocationRoute")}}' title='All location'><strong>A</strong>ll locations</a>
                    </li>
                <?php } ?>
                <?php  if($i <=18){ ?>                                
                    <li class='location-li' style = 'padding-bottom: 6px;'>
                        <a style ='color: #4e575d;font-size: 14.60px;font-style: normal;line-height: normal;transition: all 0.1s ease 0s;'class='info_link' href='{{ asset("$route")}}' title='"{{$location}}"'><strong>{{$firstLetter}}</strong>{{$location}}</a>
                    </li>
            <?php if($i == 18) {?>
        </ul>  
    </div>
     <div class = "col-xs-6 col-sm-4 col-md-4 column2">
        <ul> 
            <?php } }
                 else if($i > 18){ ?>

                    <li class='location-li' style = 'padding-bottom: 6px;'>
                        <a style ='color: #4e575d;font-size: 14.60px;font-style: normal;line-height: normal;transition: all 0.1s ease 0s;'class='info_link' href='{{ asset("$route")}}' title='"{{ $location }}"'><strong>{{$firstLetter}}</strong>{{$location}}</a>
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
                $allLocations = "all-locations-townships";

                if(isset($storedMainCategory)){  
                    
                    $storedMainCategory =  strtolower($storedMainCategory);
                    $allLocationRoute = "main-cat-loc/".$storedMainCategory."/".$allLocations;
                    $route = "main-cat-loc/".$storedMainCategory."/".$location;
                
                }else if(isset($storedCategory)){ 

                    $storedCategory = strtolower($storedCategory);
                    $storedCategory = str_replace(" ", "-", $storedCategory);

                    $keyword  = $storedCategory;                                       
                    $storedProvince  = "all-locations"; 
                    $route = "cat-loc/".$storedCategory."/".$location; 
                    $allLocationRoute = "cat-loc/".$storedCategory."/".$allLocations;
                }
                else if(isset($_GET['searchItem']) || isset($searchItem)){ 

                    $sItem = "";
                    if(isset($_GET['searchItem'])){
                        $sItem = $_GET['searchItem'];
                    }
                    else if(isset($searchItem)){
                        $sItem = $searchItem;
                    }                 

                    $searchItem = str_replace(" ", "-", $searchItem);
                    $routeLocation = str_replace(" ", "-", $location);
                    $allLocationRoute = "/ads/loc-modal-search-item/".$allLocations."/".$sItem;
                    $route = "/ads/loc-modal-search-item/".$routeLocation."/".$sItem;
                }
                else{
                   $route =  "ads/location/".$location;
                   $allLocationRoute = "ads/location/".$allLocations;
                }         

                $location = ucfirst($location);       
                $firstLetter = substr($location,0,1 );
                $location =   substr($location,1 );
               
                ?>

                 <?php if($i== 0){ ?>
                    <li class='location-li' style = 'padding-bottom: 6px;'>
                        <a style ='color: #4e575d;font-size: 14.60px;font-style: normal;line-height: normal;transition: all 0.1s ease 0s;'class='info_link' href='{{ asset("$allLocationRoute")}}' title='All location'><strong>A</strong>ll locations</a>
                    </li>
                <?php } ?>

                <?php  if($i <=15){ ?>                                
                    <li class='location-li' style = 'padding-bottom: 6px;'>
                        <a style ='color: #4e575d;font-size: 14.60px;font-style: normal;line-height: normal;transition: all 0.1s ease 0s;'class='info_link' href='{{ asset("$route")}}' title='"{{$location}}"'><strong>{{$firstLetter}}</strong>{{$location}}</a>
                    </li>
            <?php if($i == 15) {?>
        </ul>  
    </div>
     <div class = "col-xs-6 col-sm-4 col-md-4 column2">
        <ul> 
            <?php } }
                 else if($i > 15){ ?>

                    <li class='location-li' style = 'padding-bottom: 6px;'>
                        <a style ='color: #4e575d;font-size: 14.60px;font-style: normal;line-height: normal;transition: all 0.1s ease 0s;'class='info_link' href='{{ asset("$route")}}' title='"{{ $location }}"'><strong>{{$firstLetter}}</strong>{{$location}}</a>
                    </li>
                      
             <?php } $i++;?>
        @endforeach  
        </ul>  
    </div>                            
</div>
</div>