<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;
use App\Models\User;

class EventController extends Controller
{
    public function index() {

        $event = Event::all();

        $events = Event::orderBy('created_at', 'desc')->paginate(9);

        return view('index', ['events' => $events]);

    }

    public function menu() {
        $events = Event::all();

        $search = request('search');

        if($search) {

            $events = Event::where([
                ['name', 'like', '%'.$search.'%']
            ])->get();

        } else {
            $events = Event::all();
        }

        return view('events.menu', ['events' => $events, 'search' => $search]);
    }

    public function create() {
        return view('events.create-product');
    }

    public function store(Request $request) {

        $event = new Event;

        $event->name = $request->name;
        $event->qty = $request->qty;
        $event->price = $request->price;
        $event->description = $request->description;

        if(
            $event->name !== null AND $event->qty !== null AND $event->price !== null AND $event->description !== null
            ) {

            // Image Upload
            if($request->hasFile('image') && $request->file('image')->isValid()) {

                $requestImage = $request->image;

                $extension = $requestImage->extension();

                $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

                $requestImage->move(public_path('img/products'), $imageName);

                $event->image = $imageName;

            }

            $user = auth()->user();
            $event->user_id = $user->id;


            $event->save();

            return redirect('/')->with('msg', 'Produto criado com sucesso!');

        } else {

            return back();

        }

    }

    public function show($id) {

        $event = Event::findOrFail($id);

        $user = auth()->user();
        $hasUserJoined = false;

        if($user) {

            $userEvents = $user->productsAsParticipant->toArray();

            foreach($userEvents as $userEvent) {
                if($userEvent['id'] == $id) {
                    $hasUserJoined = true;
                }
            }

        }

        $eventOwner = User::where('id', $event->user_id)->first()->toArray();

        return view('events.show-products', [
            'event' => $event, 
            'eventOwner' => $eventOwner,
            'hasUserJoined' => $hasUserJoined
        ]);
        
    }

    public function dashboard() {

        $user = auth()->user();

        $events = $user->events;

        return view('events.dashboard', ['events' => $events]);

    }

    public function destroy($id) {

        Event::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg', 'Seu Produto foi Excluído com Sucesso!');

    }

    public function edit($id) {

        $user = auth()->user();

        $event = Event::findOrFail($id);

        if($user->id != $event->user_id) {
            return back();
        }

        return view('events.edit', ['event' => $event]);

    }

    public function update(Request $request) {

        $data = $request->all();

        // Image Upload
        if($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/products'), $imageName);

            $data['image'] = $imageName;

        }

        Event::findOrFail($request->id)->update($data);

        return redirect('/dashboard')->with('msg', 'Produto editado com sucesso!');

    }

    public function joinProduct($id) {

        $user = auth()->user();

        $user->productsAsParticipant()->attach($id);

        $event = Event::findOrFail($id);

        return redirect('/')->with('msg', 'Você comprou com sucesso o produto: ' . $event->name);

    }

    public function leaveProduct($id) {

        $user = auth()->user();

        $user->productsAsParticipant()->detach($id);

        $event = Event::findOrFail($id);

        return redirect('/')->with('msg', 'Você retirou com sucesso o produto: ' . $event->name);

    }

    public function shop() {

        $user = auth()->user();

        $events = $user->events;
        
        $productsAsParticipant = $user->productsAsParticipant;

        $total = $productsAsParticipant->sum('price');
        
        /*
        {{-- c = 0 --}}
        {{-- c = c + produto.valor --}}
        */

        return view('events.shopping', [
            'events' => $events, 
            'productsAsParticipant' => $productsAsParticipant,
            'total' => $total,
        ]);

    }

    /*----------------------------------------------------------*/

    public function add(Request $request) {

        $rating = $request->input('product_rating');

    }

}
