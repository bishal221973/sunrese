<div class="w-100 header-container" style="padding: 0;margin:0">
    <div class="row d-flex align-items-center justify-content-between w-100" style="padding: 0;margin:0">
        <div class="col-xl-4 col-lg-4 col-md-3 col-sm-12">
            <div class="header-logo">

                @if (App\Models\WebSetting::first())
                    <img src="{{ asset('storage') }}{{ '/' }}{{ App\Models\WebSetting::first()->app_logo }}" />
                @else
                    <img src="{{ asset('image/logo.png') }}">
                @endif
            </div>
            @php

                use Carbon\Carbon;

                use Nilambar\NepaliDate\NepaliDate;

                function ad_to_bs1($year, $month, $day)
                {
                    $obj = new NepaliDate();

                    // Convert BS to AD.
                    // $date = $obj->convertBsToAd('2077', '1', '1');

                    // Convert AD to BS.
                    $date = $obj->convertAdToBs($year, $month, $day);

                    return $date;
                    // Get Nepali date details by BS date.
                    $date = $obj->getDetails('2077', '1', '1', 'bs');

                    // Get Nepali date details by AD date.
                    $date = $obj->getDetails('2020', '1', '1', 'ad');
                }
                function ent_to_nepali_num_convert2($number)
                {
                    $eng_number = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
                    $nep_number = ['०', '१', '२', '३', '४', '५', '६', '७', '८', '९'];
                    return str_replace($eng_number, $nep_number, $number);
                }

                function todayDate1()
                {
                    $carbonInstance = Carbon::now();

                    $year = $carbonInstance->year; // Get the year as an integer
                    $month = $carbonInstance->month; // Get the month as an integer
                    $day = $carbonInstance->day;
                    $date = ad_to_bs1($year, $month, $day);

                    $month = $date['month'];
                    $week = $date['weekday'];
                    $year = $date['year'];
                    $day = $date['day'];

                    if ($month == 1) {
                        $data['month'] = 'बैशाख';
                    } elseif ($month == 2) {
                        $data['month'] = 'जेठ';
                    } elseif ($month == 3) {
                        $data['month'] = 'अषाढ';
                    } elseif ($month == 4) {
                        $data['month'] = 'श्रावण';
                    } elseif ($month == 5) {
                        $data['month'] = 'भाद्र';
                    } elseif ($month == 6) {
                        $data['month'] = 'आश्विन';
                    } elseif ($month == 7) {
                        $data['month'] = 'कार्तिक';
                    } elseif ($month == 8) {
                        $data['month'] = 'मङ्सिर';
                    } elseif ($month == 9) {
                        $data['month'] = 'पौष';
                    } elseif ($month == 10) {
                        $data['month'] = 'माघ';
                    } elseif ($month == 11) {
                        $data['month'] = 'फाल्गुन';
                    } elseif ($month == 12) {
                        $data['month'] = 'चैत्र';
                    }

                    if ($week == 1) {
                        $data['week'] = 'आइतवार';
                    } elseif ($week == 2) {
                        $data['week'] = 'सोमवार';
                    } elseif ($week == 3) {
                        $data['week'] = 'मङ्गलवार';
                    } elseif ($week == 4) {
                        $data['week'] = 'बुधवार';
                    } elseif ($week == 5) {
                        $data['week'] = 'बिहिवार';
                    } elseif ($week == 6) {
                        $data['week'] = 'शुक्रवार';
                    } elseif ($week == 7) {
                        $data['week'] = 'शनिवार';
                    }

                    $data['year'] = ent_to_nepali_num_convert2($date['year']);
                    $data['day'] = ent_to_nepali_num_convert2($date['day']);
                    // return
                    return $data;
                }
            @endphp
            <label class="pl-5"><span id="date" class="pl-4"
                    style="font-size: 13px">{{ todayDate1()['day'] }}&nbsp;{{ todayDate1()['month'] }}
                    &nbsp;{{ todayDate1()['year'] }}&nbsp;{{ todayDate1()['week'] }}</span></label>

        </div>
        {{-- </div> --}}
        <div class="col-xl-8 col-lg-8 col-md-9 col-sm-12 ads-container">


            <div class="container-fluid mb-1 mt-2 ">
                <div class="d-flex justify-content-end">
                    @if (App\Models\Ad::where('location', 'header')->first())
                        <a href="{{ App\Models\Ad::where('location', 'header')->first()->url }}"
                            class="auto-size-banner bg-warning">
                            {{-- <img src="{{ asset('image/ads1.gif') }}" alt="" > --}}
                            <img src="{{ asset('storage') }}{{ '/' }}{{ App\Models\Ad::where('location', 'header')->first()->image }}"
                                height="100%" width="100%" />
                        </a>
                    @endif
                </div>
            </div>
        </div>

    </div>

</div>
