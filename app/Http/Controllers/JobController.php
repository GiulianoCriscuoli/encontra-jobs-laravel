<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    public function index()
    {  
        $search = request('search');

        if($search) {

            $jobs = Job::where([
                ['title', 'like', '%'.$search.'%']
            ])->get();

        } else {

            $jobs = Job::orderBy('id', 'desc')->get();
        }

        return view('pages.home', ['jobs' => $jobs, 'search' => $search]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store(Request $request)
    {
        $createJob = new Job;
        $createJob->title = $request->title;
        $createJob->description = $request->description;
        $createJob->nameCompany = $request->nameCompany;
        $createJob->email = $request->email;
        $createJob->salary = $request->salary;

        $validate = [
            'title' => 'string|required',
            'description' => 'required|max:255',
            'nameCompany' => 'required|max:255',
            'email' => 'email|required' 
        ];

        $messages = [
            'title.required' => 'Você precisa informar um título da vaga',
            'description.required' => 'O campo de descrição da vaga de emprego não pode ser vazia',
            'description.max' => 'O limite é de 255 caracteres',
            'nameCompany.required' => 'Informe o nome da empresa',
            'email.required' => 'O campo de email não pode ser vazio',
            'email.email' => 'Informe um formato de email válido',
        ];

        if(empty($createJob->title) || isset($createJob->title)) {
            $messages += ['title.string' => 'O Campo de título da vaga não pode ser vazio'];
        }

        $credentials =  $request->validate($validate, $messages);

        if(!$credentials) {
            return redirect()->back()
                             ->withInput()
                             ->withErrors($credentials);
        } else {
            $createJob->save();

            return redirect('/');
        }
    }

    public function show($id) {

        $job = Job::findOrfail($id)->firstOrFail();

        if(isset($job) && $job) {

            return view('jobs.show', ['job' => $job]);
        } else {

            return redirect()->route('home');
        }
    }
}
