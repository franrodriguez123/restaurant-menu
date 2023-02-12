<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Services\UploadLogoService;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('admin.company.edit', ['company' => Company::first()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UploadLogoService $uploadLogoService)
    {
        $company = Company::first();

        $request->validate([
            'name' => 'required',
            'logo' => 'mimes:png',
        ]);

        if($_logo = $request->file('_logo'))
        {
            if($logo = $uploadLogoService->upload($_logo))
            {
                $uploadLogoService->delete($company->logo);
                $request->request->add(['logo' => $logo]);
            }
        }
        
        $company->update($request->all());

        return redirect()->route('company.edit')->with('success', 'Elemento actualizado correctamente');
    }
}
