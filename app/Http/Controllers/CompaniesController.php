<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('companies.index', ['companies' => Companies::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //show create form
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCompaniesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:4',
            'website' => 'required',
            'email' => 'email',
            'logo' => 'required|image|mimes:jpeg,png,jpg|max:2048|dimensions:max_width=100,max_height=100',
        ]);
        $companies = new Companies();
        $companies->name = $request->name;
        $companies->email = $request->email;
        $companies->website = $request->website;
        if($request->hasFile('logo')){
            $fileName = time().'.'.$request->logo->extension();
            $request->file('logo')->storeAs('public/',  $fileName);
            $companies->logo = $fileName;
        }
        $companies->save();
        return redirect()->route('companies.index')->with('success', 'Company created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function show(Companies $company)
    {
        // dd();
        return view('companies.show', ['company' => $company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function edit(Companies $company)
    {
        // dd($company);
        return view('companies.edit', ['company' => $company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCompaniesRequest  $request
     * @param  \App\Models\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Companies $company)
    {
        // dd($company);
        $company->update($request->all());
        if($request->hasFile('logo')){
            //ramdom name
            $fileName = time().'.'.$request->logo->extension();
            $request->file('logo')->storeAs('public/',  $fileName);
            $company->logo = $fileName;
            $company->save();
        }

        return redirect()->route('companies.index')->with('success', 'Company updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function destroy(Companies $companies)
    {
        //destroy company
        $companies->delete();
        return redirect()->route('companies.index')->with('success', 'Company deleted successfully');
    }
}
