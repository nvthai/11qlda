<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>DEMO  </h1>
	@foreach ($demos as $demo)  
                              
      <h3>
        {{ $demo->class_id }}
      </h3>
                            
    @endforeach
</body>
</html>