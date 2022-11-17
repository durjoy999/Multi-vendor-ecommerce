<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Repositories\CouponRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class AdminCouponController extends Controller
{
    /**
     * Construct method
     */
    public $user,$couponRepository;
    public function __construct(CouponRepository $couponRepository)
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->User();
            return $next($request);
        });
        $this->couponRepository = $couponRepository;
    }

    /**
     * show all coupon order by desc
     */
    public function index()
    {
        if (is_null($this->user) || !$this->user->can('coupon.all')) {
            abort(403, 'Unauthorized access');
        }
        $coupons = Coupon::with(['createdBy', 'editedBy'])->latest()->get();
        return view('admin.pages.coupon.index', [
            'coupons' => $coupons
        ]);
    }

    /**
     * show a create form for creating new coupon
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('coupon.create')) {
            abort(403, 'Unauthorized access');
        }
        return view('admin.pages.coupon.create');
    }
    /**
     * store into specific database
     */
    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('coupon.create')) {
            abort(403, 'Unauthorized access');
        }
        $request->validate([
            'title' => 'required|unique:coupons,title',
            'coupon_code' => 'required|unique:coupons,coupon_code',
            'number_of_times' => 'required|numeric|min:0',
            'discount_type' => 'required|in:Flat,Percent',
            'discount_amount' =>'required|numeric',
            'expiration_date' => 'required',
            'status' => 'required|in:Active,Deactive'
        ]);

        $coupon = new Coupon();

        $coupon->title = $request->title;
        $coupon->coupon_code = $request->coupon_code;
        $coupon->number_of_times = $request->number_of_times;
        $coupon->number_of_times_remaining = $request->number_of_times;
        $coupon->discount_type = $request->discount_type;
        $coupon->discount_amount = $request->discount_amount;
        $coupon->expiration_date = $request->expiration_date;
        $coupon->status = $request->status;
        $coupon->created_by = Auth::guard('admin')->User()->id;
        $coupon->save();
        return back()->with('coupon_created_successfully', 'Coupon Created Successfully');
    }

    /**
     * show  a form for editing
     */
    public function edit($id)
    {
        if (is_null($this->user) || !$this->user->can('coupon.edit')) {
            abort(403, 'Unauthorized access');
        }
        $coupon = $this->specificItem($id);
        return view('admin.pages.coupon.edit', [
            'coupon' => $coupon
        ]);
    }

    /**
     * update a specific item
     */
    public function update(Request $request, $id)
    {

        if (is_null($this->user) || !$this->user->can('coupon.edit')) {
            abort(403, 'Unauthorized access');
        }
        $request->validate([
            'title' => 'required|unique:coupons,title,'.$id,
            'coupon_code' => 'required|numeric|unique:coupons,coupon_code,'.$id,
            'number_of_times' => 'required|numeric|min:0',
            'discount_type' =>'required|in:Flat,Percent',
            'discount_amount' =>'required|numeric',
            'status' => 'required|in:Active,Deactive'
        ]);

        $this->couponRepository->edit($request,$id);

        return back()->with('coupon_update_success', 'Coupon Updated Successfully');
    }

    /**
     * statusupdate
     */
    public function statusUpdate($id)
    {
        if (is_null($this->user) || !$this->user->can('coupon.edit')) {
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
     * discount type update
     */
    public function typeUpdate($id)
    {
        if (is_null($this->user) || !$this->user->can('coupon.edit')) {
            abort(403, 'Unauthorized access');
        }
        $data = $this->specificItem($id);
        if ($data->discount_type == $data->isFlat()) {
            $data->discount_type = $data->getPercent();
        } else {
            $data->discount_type = $data->getFlat();
        }
        $data->edited_by = Auth::guard('admin')->User()->id;
        $data->save();
        return back()->with('discount_type_updated_successfully', 'Discount Type Updated Successfully');
    }

    /**
     * show a specific coupon
     */
    public function show($id)
    {
        if (is_null($this->user) || !$this->user->can('coupon.all')) {
            abort(403, 'Unauthorized access');
        }
        $coupon = $this->specificItem($id);
        return view('admin.pages.coupon.show', [
            'coupon' => $coupon
        ]);
    }

    /**
     * destroy a specific coupon
     */
    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('coupon.delete')) {
            abort(403, 'Unauthorized access');
        }
        try {
            $category = $this->specificItem($id);
            $category->delete();
            return back()->with('coupon_deleted_successfully', 'Coupon Deleted Successfully');
        } catch (Exception $e) {

            if ($e->errorInfo[1] == 1451) {
                return back()->with('please_delete_everything_all_relatedted_resource_first', 'First Delete Everything, which is under this coupon!!!');
            } else {
                return back()->with('someting_wrong', 'Something Worng!!');
            }
        }
    }

    /**
     * return a specific coupon
     */
    public function specificItem($id)
    {
        return Coupon::with(['createdBy', 'editedby'])->findOrFail($id);
    }
}
