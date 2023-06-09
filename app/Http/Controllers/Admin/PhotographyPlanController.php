<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Admin\PhotographyPlan;
use App\Models\Admin\PhotographyFeature;
use App\Models\Admin\PhotographyCategory;

class PhotographyPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = PhotographyCategory::with('plans', 'plans.features')->get();

        $categoriesOutput = $categories->map(function ($cat) {
            return [
                'title' => $cat->title,
                'plans' => $cat->plans,
            ];
        });

        return view('admin.photography.plans', compact('categoriesOutput'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $categoryValue = $request->category;
        $categories = PhotographyCategory::withCount('plans')->get(['id', 'title']);

        return view('admin.photography.plans-create', compact('categories', 'categoryValue'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $planData = [
            'photography_category_id' => $request->photography_category_id,
            'title' => $request->title_plan,
            'price' => $request->price,
            'description' => $request->description_plan
        ];

        // create new plan and associate features
        $plan = PhotographyPlan::create($planData);

        $featuresData = [];

        // loop through the text inputs
        foreach ($request->text as $key => $value) {
            $featuresData[] = [
                'plan_id' => $plan->id,
                'text' => $value,
                'description' => $request->description[$key] ?? null
            ];
        }

        // create features associated with the plan
        $plan->features()->createMany($featuresData);

        // redirect back with success message
        return to_route('photography-plan.index')->with('success', 'Plan and features have been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PhotographyPlan $photographyPlan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PhotographyPlan $photographyPlan)
    {
        $plan = $photographyPlan->load('features');
        return view('admin.photography.plans-edit', compact('plan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PhotographyPlan $photographyPlan)
    {
        // Mulai database transaksi
        DB::beginTransaction();

        try {
            // Proses edit Plan
            $data = [
                'title' => request('title_plan'),
                'price' => request('price'),
                'description' => request('description_plan'),
            ];

            $photographyPlan->update($data);

            // Proses data input dari form
            $plan_ids = $request->id;
            $edits = $request->edit;
            $deletes = $request->delete;
            $texts = $request->text;
            $descriptions = $request->description;

            // Proses operasi update
            foreach ($edits ?? [] as $id => $data) {
                PhotographyFeature::where('id', $id)->update(['text' => $data['text'], 'description' => $data['description']]);
            };

            // Proses operasi create
            if ($texts) {
                $dataToInsert = array_map(function ($plan_id, $text, $description) {
                    return [
                        'photography_plan_id' => $plan_id,
                        'text' => $text,
                        'description' => $description ?? null
                    ];
                }, $plan_ids, $texts, $descriptions);

                PhotographyFeature::insert($dataToInsert);
            }

            // Proses operasi delete
            if ($deletes) {
                PhotographyFeature::destroy($deletes);
            }

            // Commit database transaksi
            DB::commit();

            return to_route('photography-plan.index')->with('success', 'Changes have been saved successfully');
        } catch (\Exception $e) {
            // Rollback database transaksi jika terjadi error
            DB::rollback();

            return back()->with('error', 'Failed to save changes: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PhotographyPlan $photographyPlan)
    {
        $photographyPlan->delete();

        return to_route('photography-plan.index')->with('success', 'Successfully to Deleted the Data');
    }
}
