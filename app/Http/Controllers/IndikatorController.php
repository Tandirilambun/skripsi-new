<?php

namespace App\Http\Controllers;

use App\Models\Outcome;
use App\Models\Periode;
use App\Models\ActivityLog;
use App\Models\UseOfOutput;
use Illuminate\Http\Request;
use App\Models\IndikatorOutput;
use App\Models\IndikatorGeneral;
use App\Models\IndikatorOutcome;
use App\Models\IndikatorUltimate;
use App\Models\UltimateObjective;
use App\Models\IndikatorUseOfOutput;
use App\Models\IndikatorIntermediate;
use App\Models\IntermediateObjective;
use App\Models\CapaianIndikatorOutput;
use App\Models\CapaianIndikatorGeneral;
use App\Models\CapaianIndikatorOutcome;
use App\Models\CapaianIndikatorUltimate;
use App\Models\CapaianIndikatorUseOfOutput;
use App\Models\CapaianIndikatorIntermediate;
use App\Http\Requests\StoreCapaianIndikatorOutputRequest;
use App\Http\Requests\StoreCapaianIndikatorGeneralRequest;
use App\Http\Requests\StoreCapaianIndikatorOutcomeRequest;
use App\Http\Requests\UpdateCapaianIndikatorOutputRequest;
use App\Http\Requests\StoreCapaianIndikatorUltimateRequest;
use App\Http\Requests\UpdateCapaianIndikatorGeneralRequest;
use App\Http\Requests\UpdateCapaianIndikatorOutcomeRequest;
use App\Http\Requests\UpdateCapaianIndikatorUltimateRequest;
use App\Http\Requests\StoreCapaianIndikatorUseOfOutputRequest;
use App\Http\Requests\StoreCapaianIndikatorIntermediateRequest;
use App\Http\Requests\UpdateCapaianIndikatorUseOfOutputRequest;
use App\Http\Requests\UpdateCapaianIndikatorIntermediateRequest;

class IndikatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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

    public function showCapaianGeneral(IndikatorGeneral $indikatorGeneral){
        $parent_general = IndikatorGeneral::find($indikatorGeneral -> id_general) -> general_objective;
        $parent_periode = Periode::find($parent_general -> id_general) -> periode -> roadmap ?? 'null';
        $capaians_general = IndikatorGeneral::find($indikatorGeneral -> id_indikator_general) -> capaian_general -> sortBy(['id_capaian_general', 'asc']);
        $avg_capaians_general = round($capaians_general -> avg('capaian_general'));
        session() -> put('indikator general', 'indikator general');
        return view('Renstra.indikator',[
            'indikatorGeneral' => $indikatorGeneral,
            'parent_general' => $parent_general,
            'parent_periode' => $parent_periode,
            'capaians_general' => $capaians_general,
            'avg_capaians_general' => $avg_capaians_general
        ]);
    }

    public function showCapaianUltimate(IndikatorUltimate $indikatorUltimate){
        $parent_ultimate = IndikatorUltimate::find($indikatorUltimate -> id_ultimate) -> ultimate_objective;
        $parent_general = UltimateObjective::find($parent_ultimate -> id_general) -> general_objective -> strategi_general ?? 'null';
        $capaians_ultimate = IndikatorUltimate::find($indikatorUltimate -> id_indikator_ultimate) -> capaian_ultimate -> sortBy(['id_capaian_ultimate', 'asc']);
        $avg_capaians_ultimate = round($capaians_ultimate -> avg('capaian_ultimate'));
        session() -> put('indikator ultimate', 'indikator ultimate');
        return view('Renstra.indikator',[
            'indikatorUltimate' => $indikatorUltimate,
            'parent_ultimate' => $parent_ultimate,
            'parent_general' => $parent_general,
            'avg_capaians_ultimate' => $avg_capaians_ultimate,
            'capaians_ultimate' => $capaians_ultimate,
        ]);
    }

    public function showCapaianIntermediate(IndikatorIntermediate $indikatorIntermediate){
        $parent_intermediate = IndikatorIntermediate::find($indikatorIntermediate -> id_intermediate) -> intermediate_objective;
        $parent_ultimate = IntermediateObjective::find($parent_intermediate -> id_ultimate) -> ultimate_objective -> strategi_ultimate ?? 'null';
        $capaians_intermediate = IndikatorIntermediate::find($indikatorIntermediate -> id_indikator_intermediate) -> capaian_intermediate -> sortBy(['id_capaian_intermediate', 'asc']);
        $avg_capaians_intermediate = round($capaians_intermediate -> avg('capaian_intermediate'));
        session() -> put('indikator intermediate', 'indikator intermediate');
        return view('Renstra.indikator',[
            'indikatorIntermediate' => $indikatorIntermediate,
            'parent_intermediate' => $parent_intermediate,
            'parent_ultimate' => $parent_ultimate,
            'capaians_intermediate' => $capaians_intermediate,
            'avg_capaians_intermediate' => $avg_capaians_intermediate
        ]);
    }

    public function showCapaianOutcome (IndikatorOutcome $indikatorOutcome){
        $parent_outcome = IndikatorOutcome::find($indikatorOutcome -> id_outcome) -> outcome;
        $parent_intermediate = Outcome::find($parent_outcome -> id_intermediate) -> intermediate_objective -> strategi_intermediate ?? 'null';
        $capaians_outcome = IndikatorOutcome::find($indikatorOutcome -> id_indikator_outcome) -> capaian_outcome -> sortBy(['id_capaian_outcome', 'asc']);
        $avg_capaians_outcome = round($capaians_outcome -> avg('capaian_outcome'));
        session() -> put('indikator outcome', 'indikator outcome');
        return view('Renstra.indikator',[
            'parent_intermediate' => $parent_intermediate,
            'parent_outcome' => $parent_outcome,
            'capaians_outcome' => $capaians_outcome,
            'avg_capaians_outcome' => $avg_capaians_outcome,
            'indikatorOutcome' => $indikatorOutcome
        ]);
    }

    public function showCapaianUseOfOutput(IndikatorUseOfOutput $indikatorUseOfOutput){
        $parent_use_of_output = IndikatorUseOfOutput::find($indikatorUseOfOutput -> id_use_of_output) -> use_of_output;
        $parent_outcome = UseOfOutput::find($parent_use_of_output -> id_outcome) -> outcome -> strategi_outcome ?? 'null';
        $capaians_use_of_output = IndikatorUseOfOutput::find($indikatorUseOfOutput -> id_indikator_use_of_output) -> capaian_use_of_output -> sortBy(['id_capaian_use_of_output', 'asc']);
        $avg_capaians_use_of_output = round($capaians_use_of_output -> avg('capaian_use_of_output'));
        session() -> put('indikator use of output', 'indikator use of output');
        return view('Renstra.indikator',[
            'indikatorUseOfOutput' => $indikatorUseOfOutput,
            'parent_use_of_output' => $parent_use_of_output,
            'parent_outcome' => $parent_outcome,
            'capaians_use_of_output' => $capaians_use_of_output,
            'avg_capaians_use_of_output' => $avg_capaians_use_of_output
        ]);
    }

    public function showCapaianOutput (IndikatorOutput $indikatorOutput){
        $parent_output = IndikatorOutput::find($indikatorOutput -> id_output) -> output;
        $capaians_output = IndikatorOutput::find($indikatorOutput -> id_indikator_output) -> capaian_output -> sortBy(['id_capaian_output', 'asc']);
        $avg_capaians_output = round($capaians_output -> avg('capaian_output'));
        session() -> put('indikator output', 'indikator output');
        return view('Renstra.indikator',[
            'parent_output' => $parent_output,
            'capaians_output' => $capaians_output,
            'avg_capaians_output' => $avg_capaians_output,
            'indikatorOutput' => $indikatorOutput
        ]);
    }

    public function addCapaianGeneral(StoreCapaianIndikatorGeneralRequest $request){
        CapaianIndikatorGeneral::create([
            'id_indikator_general' => $request->desc_indikator,
            'tahun_general' => $request->tahun_capaian,
            'keterangan_hasil_general' => $request->input_hasil,
            'capaian_general' => $request->hasil_capaian
        ]) -> save();
        return redirect()->back()->with('success', 'Capaian for General Objective Indikator has been added successfully');
    }

    public function addCapaianUltimate(StoreCapaianIndikatorUltimateRequest $request){
        CapaianIndikatorUltimate::create([
            'id_indikator_ultimate' => $request->desc_indikator,
            'tahun_ultimate' => $request->tahun_capaian,
            'keterangan_hasil_ultimate'=> $request->input_hasil,
            'capaian_ultimate' => $request->hasil_capaian
        ]) -> save();
        return redirect()->back()->with('success', 'Capaian for Ultimate Objective Indikator has been added successfully');

    }

    public function addCapaianIntermediate(StoreCapaianIndikatorIntermediateRequest $request){
        CapaianIndikatorIntermediate::create([
            'id_indikator_intermediate' => $request->desc_indikator,
            'tahun_intermediate'  => $request->tahun_capaian,
            'keterangan_hasil_intermediate' => $request->input_hasil,
            'capaian_intermediate' => $request->hasil_capaian
        ]) -> save();
        return redirect()->back()->with('success', 'Capaian for Intermediate Objective Indikator has been added successfully');
    }

    public function addCapaianOutcome(StoreCapaianIndikatorOutcomeRequest $request){
        CapaianIndikatorOutcome::create([
            'id_indikator_outcome' => $request->desc_indikator,
            'tahun_outcome'  => $request->tahun_capaian,
            'keterangan_hasil_outcome' => $request->input_hasil,
            'capaian_outcome' => $request->hasil_capaian
        ]) -> save();
        return redirect()->back()->with('success', 'Capaian for Outcome Indikator has been added successfully');
    }

    public function addCapaianUseOfOutput(StoreCapaianIndikatorUseOfOutputRequest $request){
        CapaianIndikatorUseOfOutput::create([
            'id_indikator_use_of_output' => $request->desc_indikator,
            'tahun_use_of_output'  => $request->tahun_capaian,
            'keterangan_hasil_use_of_output' => $request->input_hasil,
            'capaian_use_of_output' => $request->hasil_capaian
        ]) -> save();
        return redirect()->back()->with('success', 'Capaian for Use Of Output Indikator has been added successfully');
    }

    public function addCapaianOutput(StoreCapaianIndikatorOutputRequest $request){
        CapaianIndikatorOutput::create([
            'id_indikator_output'=> $request->desc_indikator,
            'tahun_output' => $request->tahun_capaian,
            'keterangan_hasil_output'=> $request->input_hasil,
            'capaian_output' => $request->hasil_capaian
        ]) -> save();
        return redirect()->back()->with('success', 'Capaian for Output Indikator has been added successfully');
    }

    //delete method
    public function delCapaianGeneral(CapaianIndikatorGeneral $capaianIndikatorGeneral){
        CapaianIndikatorGeneral::destroy($capaianIndikatorGeneral -> id_capaian_general);
        ActivityLog::create([
            'details_log' => $capaianIndikatorGeneral -> tahun_general,
            'tipe_log' => 'delete',
            'locations_log' => 'Capaian Indikator General Objective'
        ])->save();
        return redirect()->back()->with('success', 'Capaian for General Objective Indikator has been deleted successfully');
    }

    public function delCapaianUltimate(CapaianIndikatorUltimate $capaianIndikatorUltimate){
        CapaianIndikatorUltimate::destroy($capaianIndikatorUltimate -> id_capaian_ultimate);
        ActivityLog::create([
            'details_log' => $capaianIndikatorUltimate -> tahun_ultimate,
            'tipe_log' => 'delete',
            'locations_log' => 'Capaian Indikator Ultimate Objective'
        ])->save();
        return redirect()->back()->with('success', 'Capaian for Ultimate Objective Indikator has been deleted successfully');
    }

    public function delCapaianIntermediate(CapaianIndikatorIntermediate $capaianIndikatorIntermediate){
        CapaianIndikatorIntermediate::destroy($capaianIndikatorIntermediate -> id_capaian_intermediate);
        ActivityLog::create([
            'details_log' => $capaianIndikatorIntermediate -> tahun_intermediate,
            'tipe_log' => 'delete',
            'locations_log' => 'Capaian Indikator Intermediate Objective'
        ])->save();
        return redirect()->back()->with('success', 'Capaian for Intermediate Objective Indikator has been deleted successfully');
    }

    public function delCapaianOutcome(CapaianIndikatorOutcome $capaianIndikatorOutcome){
        CapaianIndikatorOutcome::destroy($capaianIndikatorOutcome -> id_capaian_outcome);
        ActivityLog::create([
            'details_log' => $capaianIndikatorOutcome -> tahun_outcome,
            'tipe_log' => 'delete',
            'locations_log' => 'Capaian Indikator Outcome'
        ])->save();
        return redirect()->back()->with('success', 'Capaian for Outcome Indikator has been deleted successfully');
    }

    public function delCapaianUseOfOutput(CapaianIndikatorUseOfOutput $capaianIndikatorUseOfOutput){
        CapaianIndikatorUseOfOutput::destroy($capaianIndikatorUseOfOutput -> id_capaian_use_of_output);
        ActivityLog::create([
            'details_log' => $capaianIndikatorUseOfOutput -> tahun_use_of_output,
            'tipe_log' => 'delete',
            'locations_log' => 'Capaian Indikator Use of Output'
        ])->save();
        return redirect()->back()->with('success', 'Capaian for Use Of Output Indikator has been deleted successfully');
    }

    public function delCapaianOutput(CapaianIndikatorOutput $capaianIndikatorOutput){
        CapaianIndikatorOutput::destroy($capaianIndikatorOutput -> id_capaian_output);
        ActivityLog::create([
            'details_log' => $capaianIndikatorOutput -> tahun_output,
            'tipe_log' => 'delete',
            'locations_log' => 'Capaian Indikator Output'
        ])->save();
        return redirect()->back()->with('success', 'Capaian for Output Indikator has been deleted successfully');
    }

    //update Method
    public function updateCapaianGeneral(UpdateCapaianIndikatorGeneralRequest $request, CapaianIndikatorGeneral $capaianIndikatorGeneral){
        CapaianIndikatorGeneral::where('id_capaian_general', $capaianIndikatorGeneral->id_capaian_general)->update([
            'tahun_general' => $request->tahun_capaian,
            'keterangan_hasil_general' => $request->input_hasil,
            'capaian_general' => $request->hasil_capaian
        ]);
        // ActivityLog::create([
        //     'tipe_log' => 'update',
        //     'details_log' => $capaianIndikatorGeneral -> tahun_general,
        //     'after_change' => $request -> input_indikator_general,
        //     'locations_log' => 'Indikator General Objective'
        // ])->save();
        return redirect()->back()->with('success', 'Capaian for General Objective Indikator has been updated successfully');
    }
    public function updateCapaianUltimate(UpdateCapaianIndikatorUltimateRequest $request, CapaianIndikatorUltimate $capaianIndikatorUltimate){
        CapaianIndikatorUltimate::where('id_capaian_ultimate', $capaianIndikatorUltimate->id_capaian_ultimate)->update([
            'tahun_ultimate' => $request->tahun_capaian,
            'keterangan_hasil_ultimate'=> $request->input_hasil,
            'capaian_ultimate' => $request->hasil_capaian
        ]);
        return redirect()->back()->with('success', 'Capaian for Ultimate Objective Indikator has been updated successfully');
    }
    public function updateCapaianIntermediate(UpdateCapaianIndikatorIntermediateRequest $request, CapaianIndikatorIntermediate $capaianIndikatorIntermediate){
        CapaianIndikatorIntermediate::where('id_capaian_intermediate', $capaianIndikatorIntermediate->id_capaian_intermediate)->update([
            'tahun_intermediate'  => $request->tahun_capaian,
            'keterangan_hasil_intermediate' => $request->input_hasil,
            'capaian_intermediate' => $request->hasil_capaian
        ]);
        return redirect()->back()->with('success', 'Capaian for Intermediate Objective Indikator has been updated successfully');
    }
    public function updateCapaianOutcome(UpdateCapaianIndikatorOutcomeRequest $request, CapaianIndikatorOutcome $capaianIndikatorOutcome){
        CapaianIndikatorOutcome::where('id_capaian_outcome', $capaianIndikatorOutcome->id_capaian_outcome)->update([
            'tahun_outcome'  => $request->tahun_capaian,
            'keterangan_hasil_outcome' => $request->input_hasil,
            'capaian_outcome' => $request->hasil_capaian
        ]);
        return redirect()->back()->with('success', 'Capaian for Outcome Indikator has been updated successfully');
    }
    public function updateCapaianUseOfOutput(UpdateCapaianIndikatorUseOfOutputRequest $request, CapaianIndikatorUseOfOutput $capaianIndikatorUseOfOutput){
        CapaianIndikatorUseOfOutput::where('id_capaian_use_of_output', $capaianIndikatorUseOfOutput->id_capaian_use_of_output)->update([
            'tahun_use_of_output'  => $request->tahun_capaian,
            'keterangan_hasil_use_of_output' => $request->input_hasil,
            'capaian_use_of_output' => $request->hasil_capaian
        ]);
        return redirect()->back()->with('success', 'Capaian for Use Of Output Indikator has been updated successfully');
    }
    public function updateCapaianOutput(UpdateCapaianIndikatorOutputRequest $request, CapaianIndikatorOutput $capaianIndikatorOutput){
        CapaianIndikatorOutput::where('id_capaian_output', $capaianIndikatorOutput->id_capaian_output)->update([
            'tahun_output' => $request->tahun_capaian,
            'keterangan_hasil_output'=> $request->input_hasil,
            'capaian_output' => $request->hasil_capaian
        ]);
        return redirect()->back()->with('success', 'Capaian for Output Indikator has been updated successfully');
    }
}
