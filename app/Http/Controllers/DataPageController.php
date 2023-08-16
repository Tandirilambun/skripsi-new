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
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\IndikatorUseOfOutput;
use Illuminate\Support\Facades\Auth;
use App\Models\IndikatorIntermediate;
use App\Models\IntermediateObjective;
use App\Http\Requests\UpdateOutputRequest;
use App\Http\Requests\UpdateOutcomeRequest;
use App\Http\Requests\UpdateUseOfOutputRequest;
use App\Http\Requests\UpdateIndikatorOutputRequest;
use App\Http\Requests\UpdateGeneralObjectiveRequest;
use App\Http\Requests\UpdateIndikatorGeneralRequest;
use App\Http\Requests\UpdateIndikatorOutcomeRequest;
use App\Http\Requests\UpdateIndikatorUltimateRequest;
use App\Http\Requests\UpdateUltimateObjectiveRequest;
use App\Http\Requests\UpdateIndikatorUseOfOutputRequest;
use App\Http\Requests\UpdateIndikatorIntermediateRequest;
use App\Http\Requests\UpdateIntermediateObjectiveRequest;

class DataPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $periodes = Periode::all();
        $generals = GeneralObjective::all();
        $ultimates = UltimateObjective::all();
        $intermediates = IntermediateObjective::all();
        $outcomes = Outcome::all();
        $use_of_outputs = UseOfOutput::all();
        $outputs = Output::all();
        $general_strategi_query = DB::table('periode')
            ->select(
                'periode.*',
                'general_objective.*',
            )
            ->join('general_objective', 'general_objective.id_periode', '=', 'periode.id_periode')
            ->get();
        $ultimate_strategi_query = DB::table('periode')
            ->select(
                'periode.*',
                'ultimate_objective.*',
            )
            ->join('ultimate_objective', 'ultimate_objective.id_periode', '=', 'periode.id_periode')
            ->get();
        $intermediate_strategi_query = DB::table('periode')
            ->select(
                'periode.*',
                'intermediate_objective.*'
            )
            ->join('intermediate_objective', 'intermediate_objective.id_periode', '=', 'periode.id_periode')
            ->get();
        $outcome_strategi_query = DB::table('periode')
            ->select(
                'periode.id_periode',
                'periode.roadmap',
                'periode.tahun_awal',
                'periode.tahun_akhir',
                'outcome.id_outcome',
                'outcome.id_intermediate',
                'outcome.strategi_outcome'
            )
            ->join('outcome', 'outcome.id_periode', '=', 'periode.id_periode')
            ->get();
        $use_of_output_strategi_query = DB::table('periode')
            ->select(
                'periode.id_periode',
                'periode.roadmap',
                'periode.tahun_awal',
                'periode.tahun_akhir',
                'use_of_output.id_use_of_output',
                'use_of_output.id_outcome',
                'use_of_output.strategi_use_of_output'
            )
            ->join('use_of_output', 'use_of_output.id_periode', '=', 'periode.id_periode')
            ->get();

        $output_strategi_query = DB::table('periode')
            ->select(
                'periode.id_periode',
                'periode.roadmap',
                'periode.tahun_awal',
                'periode.tahun_akhir',
                'output.id_output',
                'output.id_outcome',
                'output.id_use_of_output',
                'output.strategi_output'
            )
            ->join('output', 'output.id_periode', '=', 'periode.id_periode')
            ->get();

        $general_indikator_query = DB::table('general_objective')
            ->select(
                'general_objective.*',
                'indikator_general.*',
            )
            ->join('indikator_general', 'general_objective.id_general', '=', 'indikator_general.id_general')
            ->orderBy('indikator_general.id_indikator_general', 'asc')
            ->get();
        $ultimate_indikator_query = DB::table('ultimate_objective')
            ->select(
                'ultimate_objective.*',
                'indikator_ultimate.*'
            )
            ->join('indikator_ultimate', 'ultimate_objective.id_ultimate', '=', 'indikator_ultimate.id_ultimate')
            ->orderBy('indikator_ultimate.id_indikator_ultimate', 'asc')
            ->get();
        $intermediate_indikator_query = DB::table('intermediate_objective')
            ->select(
                'intermediate_objective.*',
                'indikator_intermediate.*'
            )
            ->join('indikator_intermediate', 'intermediate_objective.id_intermediate', '=', 'indikator_intermediate.id_intermediate')
            ->orderBy('indikator_intermediate.id_indikator_intermediate', 'asc')
            ->get();
        $outcome_indikator_query = DB::table('outcome')
            ->select(
                'outcome.*',
                'indikator_outcome.*'
            )
            ->join('indikator_outcome', 'outcome.id_outcome', '=', 'indikator_outcome.id_outcome')
            ->orderBy('indikator_outcome.id_indikator_outcome', 'asc')
            ->get();
        $use_of_output_indikator_query = DB::table('use_of_output')
            ->select(
                'use_of_output.*',
                'indikator_use_of_output.*'
            )
            ->join('indikator_use_of_output', 'use_of_output.id_use_of_output', '=', 'indikator_use_of_output.id_use_of_output')
            ->orderBy('indikator_use_of_output.id_indikator_use_of_output', 'asc')
            ->get();
        $output_indikator_query = DB::table('output')
            ->select(
                'output.*',
                'indikator_output.*'
            )
            ->join('indikator_output', 'output.id_output', '=', 'indikator_output.id_output')
            ->orderBy('indikator_output.id_indikator_output', 'asc')
            ->get();
        return view('Renstra.data-page', [
            'periodes' => $periodes,
            'generals' => $generals,
            'ultimates' => $ultimates,
            'intermediates' => $intermediates,
            'outcomes' => $outcomes,
            'use_of_outputs' => $use_of_outputs,
            'outputs' => $outputs,
            'general_strategi_query' => $general_strategi_query,
            'ultimate_strategi_query' => $ultimate_strategi_query,
            'intermediate_strategi_query' => $intermediate_strategi_query,
            'outcome_strategi_query' => $outcome_strategi_query,
            'use_of_output_strategi_query' => $use_of_output_strategi_query,
            'output_strategi_query' => $output_strategi_query,
            'general_indikator_query' => $general_indikator_query,
            'ultimate_indikator_query' => $ultimate_indikator_query,
            'intermediate_indikator_query' => $intermediate_indikator_query,
            'outcome_indikator_query' => $outcome_indikator_query,
            'use_of_output_indikator_query' => $use_of_output_indikator_query,
            'output_indikator_query' => $output_indikator_query,
        ]);
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

    //delete strategi method
    public function delGeneral(GeneralObjective $generalObjective)
    {
        GeneralObjective::destroy($generalObjective->id_general);
        ActivityLog::create([
            'details_log' => $generalObjective->strategi_general,
            'tipe_log' => 'delete',
            'locations_log' => 'General Objective',
            'id_user' => Auth::user() -> id_user,
        ])->save();
        return redirect('/home')->with('success', 'Strategi for General Objective has been deleted successfully');
    }

    public function delUltimate(UltimateObjective $ultimateObjective)
    {
        UltimateObjective::destroy($ultimateObjective->id_ultimate);
        ActivityLog::create([
            'details_log' => $ultimateObjective->strategi_ultimate,
            'tipe_log' => 'delete',
            'locations_log' => 'Ultimate Objective',
            'id_user' => Auth::user() -> id_user,
        ])->save();
        return redirect('/home')->with('success', 'Strategi for Ultimate Objective has been deleted successfully');
    }

    public function delIntermediate(IntermediateObjective $intermediateObjective)
    {
        IntermediateObjective::destroy($intermediateObjective->id_intermediate);
        ActivityLog::create([
            'details_log' => $intermediateObjective->strategi_intermediate,
            'tipe_log' => 'delete',
            'locations_log' => 'Intermediate Objective',
            'id_user' => Auth::user() -> id_user,
        ])->save();
        return redirect('/home')->with('success', 'Strategi for Intermediate Objective has been deleted successfully');
    }

    public function delOutcome(Outcome $outcome)
    {
        Outcome::destroy($outcome->id_outcome);
        ActivityLog::create([
            'details_log' => $outcome->strategi_outcome,
            'tipe_log' => 'delete',
            'locations_log' => 'Outcome',
            'id_user' => Auth::user() -> id_user,
        ])->save();
        return redirect('/home')->with('success', 'Strategi for Outcome has been deleted successfully');
    }

    public function delUseofoutput(UseOfOutput $useOfOutput)
    {
        UseOfOutput::destroy($useOfOutput->id_use_of_output);
        ActivityLog::create([
            'details_log' => $useOfOutput->strategi_use_of_output,
            'tipe_log' => 'delete',
            'locations_log' => 'Use of Output',
            'id_user' => Auth::user() -> id_user,
        ])->save();
        return redirect('/home')->with('success', 'Strategi for Use of Output has been deleted successfully');
    }

    public function delOutput(Output $output)
    {
        Output::destroy($output->id_output);
        ActivityLog::create([
            'details_log' => $output->strategi_output,
            'tipe_log' => 'delete',
            'locations_log' =>  'Output',
            'id_user' => Auth::user() -> id_user,
        ])->save();
        return redirect('/home')->with('success', 'Strategi for Output has been deleted successfully');
    }

    //update strategi methods
    public function updateGeneral(UpdateGeneralObjectiveRequest $request, GeneralObjective $generalObjective)
    {
        GeneralObjective::where('id_general', $generalObjective->id_general)
            ->update([
                'id_periode' => $request->selectPeriode,
                'strategi_general' => $request->input_general
            ]);
        ActivityLog::create([
            'tipe_log' => 'update',
            'details_log' => $generalObjective->strategi_general,
            'after_change' => $request->input_general,
            'locations_log' => 'Strategi General Objective',
            'id_user' => Auth::user() -> id_user,
        ])->save();
        return redirect('/home')->with('success', 'Strategi for General Objective has been Updated successfully');
    }

    public function updateUltimate(UpdateUltimateObjectiveRequest $request, UltimateObjective $ultimateObjective)
    {
        UltimateObjective::where('id_ultimate', $ultimateObjective->id_ultimate)
            ->update([
                'id_periode' => $request->selectPeriode,
                'id_general' => $request->selectGeneral,
                'strategi_ultimate' => $request->input_ultimate
            ]);
        ActivityLog::create([
            'tipe_log' => 'update',
            'details_log' => $ultimateObjective->strategi_ultimate,
            'after_change' => $request->input_ultimate,
            'locations_log' => 'Strategi Ultimate Objective',
            'id_user' => Auth::user() -> id_user,
        ])->save();
        return redirect('/home')->with('success', 'Strategi for Ultimate Objective has been Updated successfully');
    }

    public function updateIntermediate(UpdateIntermediateObjectiveRequest $request, IntermediateObjective $intermediateObjective)
    {
        IntermediateObjective::where('id_intermediate', $intermediateObjective->id_intermediate)
            ->update([
                'id_periode' => $request->selectPeriode,
                'id_ultimate' => $request->selectUltimate,
                'strategi_intermediate' => $request->input_intermediate
            ]);
        ActivityLog::create([
            'tipe_log' => 'update',
            'details_log' => $intermediateObjective->strategi_intermediate,
            'after_change' => $request->input_intermediate,
            'locations_log' => 'Strategi Intermediate Objective',
            'id_user' => Auth::user() -> id_user,
        ])->save();
        return redirect('/home')->with('success', 'Strategi for Intermediate Objective has been Updated successfully');
    }

    public function updateOutcome(UpdateOutcomeRequest $request, Outcome $outcome)
    {
        Outcome::where('id_outcome', $outcome->id_outcome)
            ->update([
                'id_periode' => $request->selectPeriode,
                'id_ultimate' => $request->selectUltimate,
                'strategi_outcome' => $request->input_outcome
            ]);
        ActivityLog::create([
            'tipe_log' => 'update',
            'details_log' => $outcome->strategi_outcome,
            'after_change' => $request->input_outcome,
            'locations_log' => 'Strategi Outcome',
            'id_user' => Auth::user() -> id_user,
        ])->save();
        return redirect('/home')->with('success', 'Strategi for Outcome has been Updated successfully');
    }

    public function updateUseofoutput(UpdateUseOfOutputRequest $request, UseOfOutput $useOfOutput)
    {
        UseOfOutput::where('id_use_of_output', $useOfOutput->id_use_of_output)
            ->update([
                'id_periode' => $request->selectPeriode,
                'id_outcome' => $request->selectOutcome,
                'strategi_use_of_output' => $request->input_use_of_output
            ]);
        ActivityLog::create([
            'tipe_log' => 'update',
            'details_log' => $useOfOutput->strategi_use_of_output,
            'after_change' => $request->input_useofoutput,
            'locations_log' => 'Strategi Use of Output',
            'id_user' => Auth::user() -> id_user,
        ])->save();
        return redirect('/home')->with('success', 'Strategi for Use of Output has been Updated successfully');
    }

    public function updateOutput(UpdateOutputRequest $request, Output $output)
    {
        Output::where('id_output', $output->id_output)
            ->update([
                'id_periode' => $request->selectPeriode,
                'id_outcome' => $request->selectOutcome,
                'id_use_of_output' => $request->selectUseofoutput,
                'strategi_output' => $request->input_output
            ]);
        ActivityLog::create([
            'tipe_log' => 'update',
            'details_log' => $output->strategi_output,
            'after_change' => $request->input_output,
            'locations_log' => 'Strategi Output',
            'id_user' => Auth::user() -> id_user,
        ])->save();
        return redirect('/home')->with('success', 'Strategi for Output has been Updated successfully');
    }


    //delete indikator method
    public function delIndGeneral(IndikatorGeneral $indikatorGeneral)
    {
        IndikatorGeneral::destroy($indikatorGeneral->id_indikator_general);
        ActivityLog::create([
            'details_log' => $indikatorGeneral->deskripsi_indikator_general,
            'tipe_log' => 'delete',
            'locations_log' => 'Indikator General Objective',
            'id_user' => Auth::user() -> id_user,
        ])->save();
        return redirect('/home')->with('success', 'Indikator for Output has been deleted successfully');
    }

    public function delIndUltimate(IndikatorUltimate $indikatorUltimate)
    {
        IndikatorUltimate::destroy($indikatorUltimate->id_indikator_ultimate);
        ActivityLog::create([
            'details_log' => $indikatorUltimate->deskripsi_indikator_ultimate,
            'tipe_log' => 'delete',
            'locations_log' => 'Indikator Ultimate Objective',
            'id_user' => Auth::user() -> id_user,
        ])->save();
        return redirect('/home')->with('success', 'Indikator for Output has been deleted successfully');
    }

    public function delIndIntermediate(IndikatorIntermediate $indikatorIntermediate)
    {
        IndikatorIntermediate::destroy($indikatorIntermediate->id_indikator_intermediate);
        ActivityLog::create([
            'details_log' => $indikatorIntermediate->deskripsi_indikator_Intermediate,
            'tipe_log' => 'delete',
            'locations_log' => 'Indikator Intermediate Objective',
            'id_user' => Auth::user() -> id_user,
        ])->save();
        return redirect('/home')->with('success', 'Indikator for Output has been deleted successfully');
    }

    public function delIndOutcome(IndikatorOutcome $indikatorOutcome)
    {
        IndikatorOutcome::destroy($indikatorOutcome->id_indikator_outcome);
        ActivityLog::create([
            'details_log' => $indikatorOutcome->deskripsi_indikator_outcome,
            'tipe_log' => 'delete',
            'locations_log' => 'Indikator Outcome',
            'id_user' => Auth::user() -> id_user,
        ])->save();
        return redirect('/home')->with('success', 'Indikator for Output has been deleted successfully');
    }

    public function delIndUseOfOutput(IndikatorUseOfOutput $indikatorUseOfOutput)
    {
        IndikatorUseOfOutput::destroy($$indikatorUseOfOutput->id_indikator_use_of_output);
        ActivityLog::create([
            'details_log' => $indikatorUseOfOutput->deskripsi_indikator_use_of_output,
            'tipe_log' => 'delete',
            'locations_log' => 'Indikator Use Of Output',
            'id_user' => Auth::user() -> id_user,
        ])->save();
        return redirect('/home')->with('success', 'Indikator for Output has been deleted successfully');
    }

    public function delIndOutput(IndikatorOutput $indikatorOutput)
    {
        IndikatorOutput::destroy($indikatorOutput->id_indikator_output);
        ActivityLog::create([
            'details_log' => $indikatorOutput->deskripsi_indikator_output,
            'tipe_log' => 'delete',
            'locations_log' => 'Indikator Output',
            'id_user' => Auth::user() -> id_user,
        ])->save();
        return redirect('/home')->with('success', 'Indikator for Output has been deleted successfully');
    }

    //update indikator method
    public function updateIndGeneral(UpdateIndikatorGeneralRequest $request, IndikatorGeneral $indikatorGeneral)
    {
        IndikatorGeneral::where('id_indikator_general', $indikatorGeneral->id_indikator_general)->update([
            'id_general' => $request->selectGeneral,
            'deskripsi_indikator_general' => $request->input_indikator_general
        ]);
        ActivityLog::create([
            'tipe_log' => 'update',
            'details_log' => $indikatorGeneral->deskripsi_indikator_general,
            'after_change' => $request->input_indikator_general,
            'locations_log' => 'Indikator General Objective',
            'id_user' => Auth::user() -> id_user,
        ])->save();
        return redirect()->back()->with('success', 'Indikator for Output has been updated successfully');
    }

    public function updateIndUltimate(UpdateIndikatorUltimateRequest $request, IndikatorUltimate $indikatorUltimate)
    {
        IndikatorUltimate::where('id_indikator_ultimate', $indikatorUltimate->id_indikator_ultimate)->update([
            'id_ultimate' => $request->selectUltimate,
            'deskripsi_indikator_ultimate' => $request->input_indikator_ultimate
        ]);
        ActivityLog::create([
            'tipe_log' => 'update',
            'details_log' => $indikatorUltimate->deskripsi_indikator_ultimate,
            'after_change' => $request->input_indikator_ultimate,
            'locations_log' => 'Indikator Ultimate Objective',
            'id_user' => Auth::user() -> id_user,
        ])->save();
        return redirect()->back()->with('success', 'Indikator for Output has been updated successfully');
    }

    public function updateIndIntermediate(UpdateIndikatorIntermediateRequest $request, IndikatorIntermediate $indikatorIntermediate)
    {
        IndikatorIntermediate::where('id_indikator_intermediate', $indikatorIntermediate->id_indikator_intermediate)->update([
            'id_intermediate' => $request->selectIntermediate,
            'deskripsi_indikator_intermediate' => $request->input_indikator_intermediate
        ]);
        ActivityLog::create([
            'tipe_log' => 'update',
            'details_log' => $indikatorIntermediate->deskripsi_indikator_intermediate,
            'after_change' => $request->input_indikator_intermediate,
            'locations_log' => 'Indikator Intermediate Objective',
            'id_user' => Auth::user() -> id_user,
        ])->save();
        return redirect()->back()->with('success', 'Indikator for Output has been updated successfully');
    }

    public function updateIndOutcome(UpdateIndikatorOutcomeRequest $request, IndikatorOutcome $indikatorOutcome)
    {
        IndikatorOutcome::where('id_indikator_outcome', $indikatorOutcome->id_indikator_outcome)->update([
            'id_outcome' => $request->selectOutcome,
            'deskripsi_indikator_outcome' => $request->input_indikator_outcome
        ]);
        ActivityLog::create([
            'tipe_log' => 'update',
            'details_log' => $indikatorOutcome->deskripsi_indikator_outcome,
            'after_change' => $request->input_indikator_outcome,
            'locations_log' => 'Indikator Outcome',
            'id_user' => Auth::user() -> id_user,
        ])->save();
        return redirect()->back()->with('success', 'Indikator for Output has been updated successfully');
    }

    public function updateIndUseOfOutput(UpdateIndikatorUseOfOutputRequest $request, IndikatorUseOfOutput $indikatorUseOfOutput)
    {
        IndikatorUseOfOutput::where('id_indikator_use_of_output', $indikatorUseOfOutput->id_indikator_use_of_output)->update([
            'id_use_of_output' => $request->selectUseofoutput,
            'deskripsi_indikator_use_of_output' => $request->input_indikator_useofoutput
        ]);
        ActivityLog::create([
            'tipe_log' => 'update',
            'details_log' => $indikatorUseOfOutput->deskripsi_indikator_use_of_output,
            'after_change' => $request->input_indikator_useofoutput,
            'locations_log' => 'Indikator Use Of Output',
            'id_user' => Auth::user() -> id_user,
        ])->save();
        return redirect()->back()->with('success', 'Indikator for Output has been updated successfully');
    }

    public function updateIndOutput(UpdateIndikatorOutputRequest $request, IndikatorOutput $indikatorOutput)
    {
        IndikatorOutput::where('id_indikator_output', $indikatorOutput->id_indikator_output)->update([
            'id_output' => $request->selectOutput,
            'deskripsi_indikator_output' => $request->input_indikator_output
        ]);
        ActivityLog::create([
            'tipe_log' => 'update',
            'details_log' => $indikatorOutput->deskripsi_indikator_output,
            'after_change' => $request->input_indikator_output,
            'locations_log' => 'Indikator Use Of Output',
            'id_user' => Auth::user() -> id_user,
        ])->save();
        return redirect()->back()->with('success', 'Indikator for Output has been updated successfully');
    }

}
