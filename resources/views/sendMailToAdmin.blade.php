<html>
<head></head>
<body >
<p>
 Ad title : {{$title}} </p>
 <p> Category : {{$category}} </p>
 <p> Seller's name: {{$userName}} </p>
 <p> Seller email address: {{$email}} </p>
 <p> Seller's phone number: {{$phonenumber}}</p>
 @if($promotionPlan != null)
 <p> Promotion plan: {{$promotionPlan}}	</p>
 @endif
 @if($pin != null)
 <p> Pin: {{$pin}} </p>
 @endif

<p>Description: </br>
{{$msg}}
</p>
<hr>


</body>
</html>