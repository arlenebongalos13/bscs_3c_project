<?php
  
namespace App\Livewire\Auth;
  
use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Livewire\Auth\Register;
use App\Models\Baranggay;
 
class Register extends Auth
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $baranggay = Baranggay::orderBy('created_at', 'DESC')->get();
  
        return view('baranggay.index', compact('baranggay'));
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('baranggay.create');
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Baranggay::create($request->all());
 
        return redirect()->route('baranggay')->with('success', 'added successfully');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $baranggay = Baranggay::findOrFail($id);
  
        return view('baranggay.show', compact('baranggay'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $baranggay = Baranggay::findOrFail($id);
  
        return view('baranggay.edit', compact('baranggay'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $baranggay = Baranggay::findOrFail($id);

        $baranggay->update($request->all());
  
        return redirect()->route('baranggay')->with('success', 'updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $baranggay = Baranggay::findOrFail($id);
  
        $baranggay->delete();
  
        return redirect()->route('baranggay')->with('success', 'deleted successfully');
    }
}