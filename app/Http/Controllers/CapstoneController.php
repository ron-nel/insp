<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Collection;
use \App\Profile;
use \App\Board;
use \App\User;
use \App\Journal;
use \App\Status;
use Auth;

class CapstoneController extends Controller
{
    public function showHome(){
        $collections = Collection::inRandomOrder()->get();
        return view("home", compact('collections'));
    }

    public function showCollection(){
    	$collections = Collection::inRandomOrder()->get();
        // dd($collections);
        // $collection = $collections-inRandomOrder()->limit(25)->get();
    	return view("collection", compact('collections'));
    }

    public function showAddCollectionForm() {
        $collections = Collection::orderBy('updated_at', 'desc')->get();
        // dd($collections);
    	return view("add_collection", compact('collections'));
    }

    public function saveNewCollection(Request $request) {
        // $collections = Collection::all();

    	$rules = array(
    		"name" => "required",
    		"description" => "required",
    		"image" => "required|image|mimes:jpeg,png,jpg,gif,bmp,svg|max:2048"
    	);

    	$this->validate($request, $rules);

    	$new_collection = new Collection;
    	$new_collection->name = $request->name;
    	$new_collection->description = $request->description;
    	$new_collection->category_id = $request->category_id;

    	$image = $request->file('image');
        $image_name = time() . "." . $image->getClientOriginalExtension();
        $imagefinal = $image->storeAs('photos',$image_name, 's3');
        Storage::disk('s3')->setVisibility($imagefinal, 'public');
        
    	$new_collection->img_path = $imagefinal;

    	$new_collection->save();

    	return redirect('/admin/add_collection');

    }

    public function deleteCollection($id) {
    	$collectionToDelete = Collection::find($id);
    	$collectionToDelete->delete();
    	return redirect('/collection');
    }

    public function editCollection($id) {
    	$collectionToEdit = Collection::find($id);
    	return view('collection_to_edit', compact('collectionToEdit', 'id'));
    }

    public function saveEdit($id, Request $request) {
    	$item = Collection::find($id);
    	// dd($item);

    	$rules = array(
    		"name" => "required",
    		"description" => "required",
    		"image" => "required|image|mimes:jpeg,png,jpg,gif,bmp,svg|max:2048"
    	);

    	$this->validate($request, $rules);

    	$item->name = $request->name;
    	$item->description = $request->description;
    	$item->category_id = $request->category_id;

    	if ($request->file('image') != null) {
    		$image = $request->file('image');
    		$image_name = time() . "." . $image->getClientOriginalExtension();
    		$destination = "images/";
    		$image->move($destination, $image_name);
    		$item->img_path = $destination.$image_name;
    	}

    	$item->save();

    	return redirect('/home');
    }

    public function showCreateProfileForm() {
    	$user_id = Auth::user()->id;
        $new_profile = Profile::where('user_id', $user_id)->first();
    	// compact('profile')

    	return view('create_profile', compact('new_profile'));
    }

    public function saveNewProfile($id, Request $request) {
        // dd($id);
    	$new_profile = Profile::where('user_id', $id)->first();
    	$rules = array(
    		"name" => "required",
    		"image" => "required|image|mimes:jpeg,png,jpg,gif,bmp,svg|max:2048",
    	);

    	$this->validate($request, $rules);
        // dd($id);
    	// $new_profile = Profile::where('user_id', $id);
    	$new_profile->name = $request->name;
        $new_profile->description = $request->description;
        if ($new_profile->request==="professional") {
            $new_profile->professional_title = $request->professional_title;
            $new_profile->tel_number = $request->tel_number;
            $new_profile->location = $request->location;
        }
        
    	// $new_profile->user_id = $id;


    	$image = $request->file('image');
    	$image_name = time() . "." . $image->getClientOriginalExtension();
    	$destination = "images/";
    	$image->move($destination, $image_name);

    	$new_profile->img_path = $destination.$image_name;

    	$new_profile->save();

    	return redirect('/collection');
    }

    public function showProfile() {

    	$user_id = Auth::user()->id;
        // try{
        $profiles = Profile::where("user_id", $user_id )->first();
        $test = $profiles->id;
        $boards = Board::where("profile_id", $test) -> get();
        $newboard = $boards->pluck('collection_id');
        $collections = Collection::whereIn('id',$newboard)->get();
        // }catch{}

    	return view('profile', compact('profiles', 'boards', 'collections', 'user_id'));
    }

    public function addToBoard($id) {
    	$user_id = Auth::user()->id;
    	$profile_id = Profile::where("user_id", $user_id )->first();
    	$new_board = new Board;
    	$new_board->collection_id = $id;
    	$new_board->profile_id = $profile_id->id;
    	$new_board->save();

    	return redirect('/collection');
    }

    public function deleteFromBoard($id) {
        $user_id = Auth::user()->id;
        $profiles = Profile::where("user_id", $user_id )->first();
        $test = $profiles->id;
        $boards = Board::where("profile_id", $test)->where("collection_id", $id);
        $boards->delete();
        return redirect("/profile");
    }

    public function viewProfiles() {
        $users = User::all();
        return view ('view_profiles', compact('users'));
    }

    public function deleteUser($id) {
        $deleteUser = User::find($id);
        $deleteUser->delete();
        // dd($id);
        return redirect('/admin/view_profiles');
    }

    public function applyProfessionalForm() {
        return view('apply_professional_form');
    }

    public function applyProffesionalAcct($id, Request $request) {
        $profile = Profile::where('user_id', $id)->first();
        // dd($profile);

        $rules = array (
            "professional_id" => "required",
            "professional_title" => "required",
            "tel_number" => "required",
            "location" => "required"
        );

        $this->validate($request, $rules);

        $profile->professional_id = $request->professional_id;
        $profile->professional_title = $request->professional_title;
        $profile->tel_number = $request->tel_number;
        $profile->location = $request->location;
        $profile->request = "requested";
        $profile->save();

        return redirect('/profile');
    }

    public function needVisit() {

        return view('needVisitForm');
    }

    public function sendJournal($id, Request $request){
        $user_id = Auth::user()->id;
        $profile = Profile::where('user_id', $id)->first();
        // dd($profile->id);
        $rules = array(
        "message" => "required"
        );

        $this->validate($request, $rules);

        $journal = new Journal;
        $journal->profile_id = $profile->id;
        $journal->message = $request->message;
        $journal->status_id = 1;
        $journal->recommendation = "no recommendations yet";
        $journal->save();
        return redirect('/profile');
    }

    public function viewJournal(){
        $user_id = Auth::user()->id;
        $profile = Profile::where('user_id', $user_id)->first();
        $profile_id = $profile->id;
        $journal = Journal::where('profile_id', $profile_id)->get();
        // dd($journal->message);
        return view('journal', compact('journal'));
    }

    public function deleteJournal($id){
        $deleteJournal = Journal::find($id);
        $deleteJournal->delete();
        // dd($deleteJournal);
        return redirect('/viewJournal');
    }

    public function editJournalForm($id){
        $journal = Journal::where('id', $id)->first();
        $message = $journal->message;
        $id_journal = $journal->id;
        // dd($id_journal);
        return view('edit_journal', compact('message', 'id_journal'));
    }

    public function editJournal($id, Request $request){
        $journal = Journal::find($id);
        $rules = array(
        "message" => "required"
        );

        $journal->message = $request->message;
        $journal->save();
        return redirect('/viewJournal');
    }

    public function viewJournals() {
        $journals = Journal::orderBy('updated_at', 'desc')->get();
        $status = Status::all();
        // dd($status);
        // dd($journals);
        return view('view_journals', compact('journals', 'status'));
    }

    public function deleteJournals($id) {
        $deleteJournal = Journal::find($id);
        $deleteJournal->delete();
        return redirect('/admin/view_journals');
    }

    public function editJournals($id, Request $request) {
        $journal = Journal::find($id);
        // dd($request->status);
        $rules = array(
            "status" => "required",
            "recommendation" => "required"
        );
        $journal->status_id = $request->status; 
        $journal->recommendation = $request->recommendation;
        $journal->save();
        return redirect('/admin/view_journals');
    }

    public function viewApplications() {
        $profiles = Profile::orderBy('updated_at', 'desc')
        ->where('request', "requested")->get();
        // dd($profiles);
        return view('applications', compact('profiles'));
    }

    public function deleteApplications($id) {
        $deleteApplications = Profile::where('id', $id)->first();
        // dd($null);
        $deleteApplications->professional_id = null;
        $deleteApplications->professional_title = null;
        $deleteApplications->tel_number = null;
        $deleteApplications->location = null;
        $deleteApplications->request = null;
        $deleteApplications->save();
        return redirect('/admin/view_applications');
    }

    public function approveApplications($id) {
        $approveApplications = Profile::where('id', $id)->first();
        $user_id = User::where('id', $approveApplications->user_id)->first();
        $user_id->role_id = 2;
        $user_id->save();
        $approveApplications->request = "professional";
        $approveApplications->save();
        // dd($user_id->role_id);
        return redirect('/admin/view_applications');
    }

    public function professionals() {
        $professionals = Profile::where('request', "professional")->get();
 
        return view('professionals', compact('professionals'));
    }
}
