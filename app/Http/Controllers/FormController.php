<?php

namespace App\Http\Controllers;

use App\Models\Form;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index()
    {
        $forms = Form::all();
        return view("admin.listform", compact("forms"));
    }
    public function indexStudent($id)
    {
        $user = $id;
        $forms = Form::where('user_id', $id)->get();
        return view("admin.listform", compact("forms", 'user'));
    }

    public function add(Request $request)
    {

        $form = new Form();
        $form->user_id = $request->input('user_id');
        $form->title = $request->input('title');
        $form->attachment = '';
        $form->description = $request->input('description');
        $form->status = 'Pending';
        $form->save();

        if ($request->hasFile('attachment')) {
            $form_id = $form->id;
            $imageExtension = $request->file('attachment')->extension();
            $docName = $form_id . '.' . $imageExtension;
            $request->file('attachment')->move(public_path('attachment'), $docName);

            $form->attachment = 'attachment/' . $docName;
            $form->save();
        }

        return redirect()->route('form.index.student', ['id' => $form->user_id])->with('success', 'Form submitted successfully!');
    }

    public function details(Request $request, $f_id)
    {

        $form = Form::findOrFail($f_id);

        return view('admin.applicationDetails', compact('form'));
    }


    public function update(Request $request, $f_id)
    {

        $form = Form::findOrFail($f_id);
        $form->status = $request->input('status');
        $form->save();

        return redirect()->route('form.index')->with('success', 'Form updated successfully!');
    }

    public function updateStudent(Request $request, $f_id, $id)
    {
        
        $form = Form::findOrFail($f_id);
        $form->title = $request->input('title');
        $form->description = $request->input('description');


        if ($request->hasFile('attachment')) {
            $imageExtension = $request->file('attachment')->extension();
            $docName = $f_id . '.' . $imageExtension;
            $leavePath = public_path($form->attachment);
            if (file_exists($leavePath)) {
                unlink($leavePath);
            }
            $request->file('attachment')->move(public_path('attachment'), $docName);

            $form->attachment = 'attachment/' . $docName;
            $form->save();
        }

        $form->save();

        return redirect()->route('form.index.student', compact('id'))->with('success', 'Form updated successfully!');
    }



    public function delete($id)
    {
        $form = Form::findOrFail($id);

        if (!empty($form->attachment)) {
            $leavePath = public_path($form->attachment);

            if (file_exists($leavePath)) {
                unlink($leavePath);
            }
        }

        $form->delete();
        $form = Form::all();
        return redirect()->back()->with('success', 'Form successfully deleted');
    }

}
