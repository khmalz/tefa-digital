<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\DesignPlan;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Admin\DesignCategory;
use App\Models\Admin\DesignFeature;

class DesignPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = DesignCategory::with('plans', 'plans.features')->get();

        $categoriesOutput = $categories->map(function ($category) {
            return [
                'title' => $category->title,
                'plans' => $category->plans,
            ];
        });

        return view('admin.design.plans', compact('categoriesOutput'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $categoryValue = $request->category;
        $categories = DesignCategory::withCount('plans')->get(['id', 'title']);

        return view('admin.design.plans-create', compact('categories', 'categoryValue'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $planData = [
                'design_category_id' => $request->design_category_id,
                'title' => $request->title_plan,
                'price' => $request->price,
                'description' => $request->description_plan
            ];

            // create new plan and associate features
            $plan = DesignPlan::create($planData);

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

            DB::commit();

            return to_route('design-plan.index')->with('success', 'Plan and features have been created successfully.');
        } catch (\Exception $e) {
            // Rollback database transaksi jika terjadi error
            DB::rollback();

            return back()->with('error', 'Failed to save changes: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DesignPlan $designPlan)
    {
        $plan = $designPlan->load('features');
        return view('admin.design.plans-edit', compact('plan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DesignPlan $designPlan)
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

            $designPlan->update($data);

            // Proses data input dari form
            $plan_ids = $request->id;
            $edits = $request->edit;
            $deletes = $request->delete;
            $texts = $request->text;
            $descriptions = $request->description;

            // Proses operasi update
            foreach ($edits ?? [] as $id => $data) {
                DesignFeature::where('id', $id)->update(['text' => $data['text'], 'description' => $data['description']]);
            };

            // Proses operasi create
            if ($texts) {
                $dataToInsert = array_map(function ($plan_id, $text, $description) {
                    return [
                        'design_plan_id' => $plan_id,
                        'text' => $text,
                        'description' => $description ?? null
                    ];
                }, $plan_ids, $texts, $descriptions);

                DesignFeature::insert($dataToInsert);
            }

            // Proses operasi delete
            if ($deletes) {
                DesignFeature::destroy($deletes);
            }

            // Commit database transaksi
            DB::commit();

            return to_route('design-plan.index')->with('success', 'Changes have been saved successfully');
        } catch (\Exception $e) {
            // Rollback database transaksi jika terjadi error
            DB::rollback();

            return back()->with('error', 'Failed to save changes: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DesignPlan $designPlan)
    {
        $designPlan->delete();

        return to_route('design-plan.index')->with('success', 'Successfully to Deleted the Data');
    }
}
