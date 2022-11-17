<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminTeamController extends Controller
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
     * show all team order by desc
     */
    public function index()
    {
        if (is_null($this->user) || !$this->user->can('team.all')) {
            abort(403, 'Unauthorized access');
        }
        $teams = Team::with(['createdBy', 'editedBy'])->latest()->get();
        return view('admin.pages.team.index', [
            'teams' => $teams
        ]);
    }

    /**
     * show a create form for creating new team
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('team.create')) {
            abort(403, 'Unauthorized access');
        }
        return view('admin.pages.team.create');
    }
    /**
     * store into specific database
     */
    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('team.create')) {
            abort(403, 'Unauthorized access');
        }
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'status' => 'required',
            'image' => 'image|required'
        ]);

        $team = new Team();
        if ($request->hasFile('image')) {
            $team->image = $request->file('image')->store('photo/team');
        }
        $team->name = $request->name;
        $team->designation = $request->designation;
        $team->status = $request->status;
        $team->created_by = Auth::guard('admin')->User()->id;
        $team->save();
        return back()->with('team_created_successfully', 'Team Created Successfully');
    }
    /**
     * show  a form for editing
     */
    public function edit($id)
    {
        if (is_null($this->user) || !$this->user->can('team.edit')) {
            abort(403, 'Unauthorized access');
        }
        $team = $this->specificItem($id);
        return view('admin.pages.team.edit', [
            'team' => $team
        ]);
    }
    /**
     * update a specific item
     */
    public function update(Request $request, $id)
    {
        if (is_null($this->user) || !$this->user->can('team.edit')) {
            abort(403, 'Unauthorized access');
        }
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'status' => 'required'

        ]);
        $team = $this->specificItem($id);

        if ($request->hasFile('image')) {
            Storage::delete($team->image);
            $team->image = $request->file('image')->store('photo/team');
        }
        $team->name = $request->name;
        $team->designation = $request->designation;
        $team->status = $request->status;
        $team->edited_by = Auth::guard('admin')->User()->id;
        $team->save();

        return back()->with('team_update_success', 'Team Updated Successfully');
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
     * destroy a specific slider
     */
    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('team.delete')) {
            abort(403, 'Unauthorized access');
        }
        try {
            $team = $this->specificItem($id);
            $team->delete();
            Storage::delete($team->image);

            return back()->with('team_deleted_successfully', 'Team Deleted Successfully');
        } catch (Exception $e) {

            if ($e->errorInfo[1] == 1451) {
                return back()->with('please_delete_everything_all_relatedted_resource_first', 'First Delete Everything, which is under this Team!!!');
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
        return Team::with(['createdBy', 'editedBy'])->findOrFail($id);
    }
}
