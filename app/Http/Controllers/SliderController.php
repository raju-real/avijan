<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\SliderView;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function sliders() {
        $data = SliderView::query();
        $data->when(request()->get('title'),function($query) {
            $title = request()->get('title');
            $query->where('title',"LIKE","%{$title}%");
        });
        $sliders = $data->orderBy("updated_at",'desc')->paginate(50);
        return view('admin.sliders.slider_list',compact('sliders'));
    }
}
