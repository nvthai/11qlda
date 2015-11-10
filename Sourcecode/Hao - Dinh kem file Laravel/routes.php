<?php

//thêm route này vào routers.php

Route::post('upload', function(){
	$image = Input::file('image');
	$filename = $image->getClientOriginalName();
	Image::make($image->getRealPath())->save('public/img'. $filename);
});