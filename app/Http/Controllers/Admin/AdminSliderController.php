<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminSliderController extends Controller
{
    /**
     * Construct method
     */
    public $user;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->User();
            return $next($request);
        });
    }

    /**
     * show all slider order by desc
     */
    public function index()
    {
        if (is_null($this->user) || !$this->user->can('slider.all')) {
            abort(403, 'Unauthorized access');
        }
        $sliders = Slider::with(['createdBy', 'editedBy'])->latest()->get();
        return view('admin.pages.slider.index', [
            'sliders' => $sliders
        ]);
    }

    /**
     * show a create form for creating new slider
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('slider.create')) {
            abort(403, 'Unauthorized access');
        }
        return view('admin.pages.slider.create');
    }
    /**
     * store into specific database
     */
    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('slider.create')) {
            abort(403, 'Unauthorized access');
        }
        $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'button_text' => 'required',
            'button_link' => 'required',
            'image' => 'image|required'
        ]);

        $slider = new Slider();
        if ($request->hasFile('image')) {
            $slider->image = $request->file('image')->store('photo/slider');
        }
        $slider->title = $request->title;
        $slider->sub_title = $request->sub_title;
        $slider->button_text = $request->button_text;
        $slider->button_link = $request->button_link;
        $slider->status = $request->status;
        $slider->created_by = Auth::guard('admin')->User()->id;
        $slider->save();
        return back()->with('slider_created_successfully', 'Slider Created Successfully');
    }
    /**
     * show  a form for editing
     */
    public function edit($id)
    {
        if (is_null($this->user) || !$this->user->can('slider.edit')) {
            abort(403, 'Unauthorized access');
        }
        $slider = $this->specificItem($id);
        // dd($slider);
        return view('admin.pages.slider.edit', [
            'slider' => $slider
        ]);
    }
    /**
     * update a specific item
     */
    public function update(Request $request, $id)
    {
        if (is_null($this->user) || !$this->user->can('slider.edit')) {
            abort(403, 'Unauthorized access');
        }
        $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'button_text' => 'required',
            'button_link' => 'required',
            'image' => 'image'
        ]);

        $slider = $this->specificItem($id);
        if ($request->hasFile('image')) {
            Storage::delete($slider->image);
            $slider->image = $request->file('image')->store('photo/slider');
        }
        $slider->title = $request->title;
        $slider->sub_title = $request->sub_title;
        $slider->button_text = $request->button_text;
        $slider->button_link = $request->button_link;
        $slider->status = $request->status;
        $slider->edited_by = Auth::guard('admin')->User()->id;
        $slider->save();

        return back()->with('slider_update_success', 'Slider Updated Successfully');
    }

    /**
     * statusupdate
     */
    public function statusUpdate($id)
    {
        if (is_null($this->user) || !$this->user->can('slider.edit')) {
            abort(403, 'Unauthorized access');
        }
        $data = $this->specificItem($id);
        if ($data->status == $data->isActive()) {
            $data->status = $data->getDeactive();
        } else {
            $data->status = $data->getActive();
        }
        $data->edited_by = Auth::guard('admin')->User()->id;
        $data->save();
        return back()->with('status_updated_successfully', 'Status Updated Successfully');
    }
    /**
     * show a specific category
     */
    public function show($id)
    {
        if (is_null($this->user) || !$this->user->can('slider.all')) {
            abort(403, 'Unauthorized access');
        }
        $slider = $this->specificItem($id);
        return view('admin.pages.slider.show', [
            'slider' => $slider
        ]);
    }
    /**
     * destroy a specific slider
     */
    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('slider.delete')) {
            abort(403, 'Unauthorized access');
        }
        try {
            $slider = $this->specificItem($id);
            $slider->delete();
            Storage::delete($slider->image);

            return back()->with('slider_deleted_successfully', 'Slider Deleted Successfully');
        } catch (Exception $e) {

            if ($e->errorInfo[1] == 1451) {
                return back()->with('please_delete_everything_all_relatedted_resource_first', 'First Delete Everything, which is under this category!!!');
            } else {
                return back()->with('someting_wrong', 'Something Worng!!');
            }
        }
    }
    /**
     * return a specific slider
     */
    public function specificItem($id)
    {
        return Slider::with(['createdBy', 'editedBy'])->findOrFail($id);
    }
}
