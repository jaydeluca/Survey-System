<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Survey;
use JavaScript;
use Analytics;
use Spatie\Analytics\Period;

class SurveyController extends Controller
{

    /**
     * Public facing welcome page with list of recent surveys
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $surveys = Survey::with(['submissions', 'questions'])->get();
        return view('pages.surveys')->with(compact('surveys'));
    }

    /**
     * Show individual Survey
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Survey $id)
    {
        JavaScript::put([
            'survey' => $id,
        ]);

        return view('pages.take-survey')->with(['survey' => $id]);
    }

    public function store(Request $request)
    {
        $survey = Survey::create($request->all());

        return redirect('/surveys/'.$survey->id);
    }

    /**
     * Show the Results of a Survey
     * - Most of this page is handled in Vue
     * - See Results.vue
     *
     * @param Survey $survey
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function resultsPage(Survey $survey)
    {
        JavaScript::put([
            'survey' => $survey,
            'submissions' => $survey->submissions()->count(),
            'referrers' => Analytics::fetchTopReferrers(Period::days(90))
        ]);

        return view('results');
    }

    /**
     * Form for creating a new form
     * - Most of the heavy lifting is done in Vue
     * - See CreateSurvey.vue
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createSurveyPage()
    {
        return view('pages.create-survey');
    }
}
