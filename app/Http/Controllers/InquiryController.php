<?php

namespace App\Http\Controllers;

use App\Http\Requests\InquiryRequest;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    private const FORM_DATA_KEY = 'inquiry.form';

    public function show()
    {
        return view('inquiry.index');
    }

    public function confirm(InquiryRequest $request)
    {
        $form_data = $request->validated();
        $request->session()->put(self::FORM_DATA_KEY, $form_data);

        return view('inquiry.confirm', $form_data);
    }

    public function finish(Request $request)
    {
        if (!$request->session()->has(self::FORM_DATA_KEY)) {
            return redirect()->route('inquiry');
        }

        $form_data = $request->session()->get(self::FORM_DATA_KEY);

        // ここで$form_dataを送信する

        return view('inquiry.finish');
    }
}
