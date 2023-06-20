<?php

namespace App\Http\Controllers;

use App\Models\Output;
use App\Models\Outcome;
use App\Models\Periode;
use App\Models\ActivityLog;
use App\Models\UseOfOutput;
use Illuminate\Http\Request;
use App\Models\IndikatorOutput;
use App\Models\GeneralObjective;
use App\Models\IndikatorGeneral;
use App\Models\IndikatorOutcome;
use App\Models\IndikatorUltimate;
use App\Models\UltimateObjective;
use App\Models\IndikatorUseOfOutput;
use App\Models\IndikatorIntermediate;
use App\Models\IntermediateObjective;
use App\Http\Requests\StoreOutputRequest;
use App\Http\Requests\StoreOutcomeRequest;
use App\Http\Requests\StorePeriodeRequest;
use App\Http\Requests\StoreUseOfOutputRequest;
use App\Http\Requests\StoreIndikatorOutputRequest;
use App\Http\Requests\StoreGeneralObjectiveRequest;
use App\Http\Requests\StoreIndikatorGeneralRequest;
use App\Http\Requests\StoreIndikatorOutcomeRequest;
use App\Http\Requests\StoreIndikatorUltimateRequest;
use App\Http\Requests\StoreUltimateObjectiveRequest;
use App\Http\Requests\StoreIndikatorUseOfOutputRequest;
use App\Http\Requests\StoreIndikatorIntermediateRequest;
use App\Http\Requests\StoreIntermediateObjectiveRequest;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $periodes = Periode::all();
        return view('home',[
            'periodes' => $periodes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $periodes = Periode::all();
        $generals = GeneralObjective::all();
        $ultimates = UltimateObjective::all();
        $intermediates = IntermediateObjective::all();
        $outcomes = Outcome::all();
        $use_of_outputs = UseOfOutput::all();
        $outputs = Output::all();
        return view('Renstra.create',[
            'generals' => $generals,
            'ultimates' => $ultimates,
            'intermediates' => $intermediates,
            'outcomes' => $outcomes,
            'use_of_outputs' => $use_of_outputs,
            'outputs' => $outputs,
            'periodes' => $periodes,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function addPeriode(StorePeriodeRequest $request){
        Periode::create([
            'roadmap' => $request -> inputRoadmap,
            'tahun_awal' => $request -> tahunAwal,
            'tahun_akhir' => $request -> tahunAkhir,
            'flag_column_keterangan' => $request -> flag_keterangan
        ]) -> save();
        ActivityLog::create([
            'tipe_log' => 'insert',
            'details_log' => $request-> inputRoadmap,
            'locations_log' => 'Periode Renstra'
        ]) -> save();
        return redirect('/home') -> with('success', 'Periode has been stored successfully');
    }
    
    public function addGeneral(StoreGeneralObjectiveRequest $request){
        GeneralObjective::create([
            'id_periode' => $request -> selectPeriode,
            'strategi_general' => $request -> input_general
        ])->save();
        ActivityLog::create([
            'tipe_log' => 'insert',
            'details_log' => $request-> input_general,
            'locations_log' => 'General Objective'
        ]) -> save();
        return redirect('/home') -> with('success', 'General Objective has been stored successfully');
    }

    public function addUltimate(StoreUltimateObjectiveRequest $request){
        UltimateObjective::create([
            'id_general' => $request -> selectGeneral,
            'id_periode' => $request -> selectPeriode,
            'strategi_ultimate' => $request -> input_ultimate,
        ])->save();
        ActivityLog::create([
            'tipe_log' => 'insert',
            'details_log' => $request-> input_ultimate,
            'locations_log' => 'Ultimate Objective'
        ]) -> save();
        return redirect('/home') -> with('success', 'Ultimate Objective has been stored successfully');
    }

    public function addIntermediate(StoreIntermediateObjectiveRequest $request){
        IntermediateObjective::create([
            'id_ultimate' => $request -> selectUltimate,
            'id_periode' => $request -> selectPeriode,
            'strategi_intermediate' => $request -> input_intermediate,
        ]) -> save();
        ActivityLog::create([
            'tipe_log' => 'insert',
            'details_log' => $request-> input_intermediate,
            'locations_log' => 'Intermediate Objective'
        ]) -> save();
        return redirect('/home') -> with('success', 'Intermediate Objective has been stored successfully');
    }

    public function addOutcome(StoreOutcomeRequest $request){
        Outcome::create([
            'id_intermediate' => $request -> selectIntermediate,
            'id_periode' => $request -> selectPeriode,
            'strategi_outcome' => $request -> input_outcome,
        ]) -> save();
        ActivityLog::create([
            'tipe_log' => 'insert',
            'details_log' => $request-> input_outcome,
            'locations_log' => 'Outcome'
        ]) -> save();
        return redirect('/home') -> with('success', 'Outcome has been stored successfully');
    }

    public function addUseOfOutput(StoreUseOfOutputRequest $request){
        UseOfOutput::create([
            'id_outcome' => $request -> selectOutcome,
            'id_periode' => $request -> selectPeriode,
            'strategi_use_of_output' => $request -> input_useofoutput,
        ])->save();
        ActivityLog::create([
            'tipe_log' => 'insert',
            'details_log' => $request-> input_useOfoutput,
            'locations_log' => 'Use of Output'
        ]) -> save();
        return redirect('/home') -> with('success', 'Use of Output has been stored successfully');
    }

    public function addOutput(StoreOutputRequest $request){
        Output::create([
            'id_use_of_output' => $request -> selectUseofoutput,
            'id_outcome' => $request -> selectOutcome,
            'id_periode' => $request -> selectPeriode,
            'strategi_output' => $request -> input_output,
        ]) -> save();
        ActivityLog::create([
            'tipe_log' => 'insert',
            'details_log' => $request-> input_output,
            'locations_log' => 'Output'
        ]) -> save();
        return redirect('/home') -> with('success', 'Output has been stored successfully');
    }

    public function addIndGeneral(StoreIndikatorGeneralRequest $request){
        return $request;
        IndikatorGeneral::create([
            'id_general' => $request -> selectGeneral,
            'deskripsi_indikator_general' => $request -> input_indikator_general
        ])->save();
        ActivityLog::create([
            'tipe_log' => 'insert',
            'details_log' => $request-> input_indikator_general,
            'locations_log' => 'Indikator General Objective'
        ]) -> save();
        return redirect('/home') -> with('success', 'Indikator for General Objective has been stored successfully');
    }

    public function addIndUltimate(StoreIndikatorUltimateRequest $request){
        return $request;
        IndikatorUltimate::create([
            'id_ultimate' => $request -> selectUltimate,
            'deskripsi_indikator_ultimate' => $request -> input_indikator_ultimate
        ]) -> save();
        ActivityLog::create([
            'tipe_log' => 'insert',
            'details_log' => $request-> input_indikator_ultimate,
            'locations_log' => 'Indikator Ultimate Objective'
        ]) -> save();
        return redirect('/home') -> with('success', 'Indikator for Ultimate Objective been stored successfully');
    }

    public function addIndIntermediate(StoreIndikatorIntermediateRequest $request){
        return $request;
        IndikatorIntermediate::create([
            'id_intermediate' => $request -> selectIntermediate,  
            'deskripsi_indikator_intermediate' => $request -> input_indikator_intermediate
        ]) -> save();
        ActivityLog::create([
            'tipe_log' => 'insert',
            'details_log' => $request-> input_indikator_intermediate,
            'locations_log' => 'Indikator Intermediate Objective'
        ]) -> save();
        return redirect('/home') -> with('success', 'Indikator for Intermediate Objective has been stored successfully');
    }

    public function addIndOutcome(StoreIndikatorOutcomeRequest $request){
        return $request;
        IndikatorOutcome::create([
            'id_outcome' => $request-> selectOutcome,
            'deskripsi_indikator_outcome' => $request-> input_indikator_outcome
        ]) -> save();
        ActivityLog::create([
            'tipe_log' => 'insert',
            'details_log' => $request-> input_indikator_outcome,
            'locations_log' => 'Indikator Outcome'
        ]) -> save();
        return redirect('/home') -> with('success', 'Indikator for Output has been stored successfully');
    }

    public function addIndUseOfOutput(StoreIndikatorUseOfOutputRequest $request){
        return $request;
        IndikatorUseOfOutput::create([
            'id_use_of_output' => $request-> selectUseofoutput,
            'deskripsi_indikator_use_of_output' => $request-> input_indikator_useofoutput
        ])->save();
        ActivityLog::create([
            'tipe_log' => 'insert',
            'details_log' => $request-> input_indikator_useofoutput,
            'locations_log' => 'Indikator Use of Output'
        ]) -> save();
        return redirect('/home') -> with('success', 'Indikator for Use Of Output has been stored successfully');
    }

    public function addIndOutput(StoreIndikatorOutputRequest $request){
        return $request;
        IndikatorOutput::create([
            'id_output' => $request -> selectOutput,
            'deskripsi_indikator_output' => $request -> input_indikator_output
        ])->save();
        ActivityLog::create([
            'tipe_log' => 'insert',
            'details_log' => $request-> input_indikator_output,
            'locations_log' => 'Indikator Output'
        ]) -> save();
        return redirect('/home') -> with('success', 'Indikator for Output has been stored successfully');
    }
}
