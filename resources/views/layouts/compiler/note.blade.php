@php
    $hasDatabaseChanges = false;
    $hasInfraChanges = false;

    $instructions = $instructionsPerRelease[$release->id];
    $tickets = $ticketsPerRelease[$release->id];

    if ($instructions->isNotEmpty()) {
        $databaseTeamID = $supportTeams->firstWhere('name', 'DIT')->id;

        if ($instructions->contains('support_team_id', $databaseTeamID)) {
            $hasDatabaseChanges = true;
            $databaseTables = $instructions->filter(function($item){
                    return $item['db_affected_core_table'] !== null;
                })->pluck('db_affected_core_table');
            $databaseRevisionNums = $instructions->filter(function($item){
                    return $item['db_revision_num'] !== null;
                })->pluck('db_revision_num');
            $databaseCodeReviewLinks = $instructions->filter(function($item){
                    return $item['db_code_review_link'] !== null;
                })->pluck('db_code_review_link');
        }

        $infraTeamID = $supportTeams->firstWhere('name', 'GHS')->id;

        if ($instructions->contains('support_team_id', $infraTeamID)) {
            $hasInfraChanges =  true;
        }

    }

@endphp
 
&lt;div&gt;
    &lt;table class="MsoNormalTable" width="0" cellspacing="0" cellpadding="0" align="left"&gt;
        &lt;tbody&gt;
            &lt;tr style="height: 11.65pt; mso-yfti-irow: 0; mso-yfti-firstrow: yes;"&gt;
                &lt;td style="background: black; border-width: 1pt medium 1pt 1pt; border-color: windowtext currentColor windowtext windowtext; padding: 0in 5.4pt; width: 238.25pt; height: 11.65pt; border-right-style: none;" width="318" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="text-align: center; line-height: normal; margin-bottom: 0pt; mso-element: frame; mso-element-frame-hspace: 9.0pt; mso-element-wrap: around; mso-element-anchor-horizontal: page; mso-element-left: center; mso-height-rule: exactly; mso-element-top: -10.5pt;" align="center"&gt;
                        &lt;b&gt;
                            &lt;span style="color: white; font-family: &<code>quot</code>;Arial&<code>quot</code>;,sans-serif; font-size: 10pt; mso-fareast-font-family: &<code>quot</code>;Times New Roman&<code>quot</code>;; mso-fareast-language: EN-PH;"&gt;
                                Risk & Impact Questionnaire
                                &lt;o:p&gt;&lt;/o:p&gt;
                            &lt;/span&gt;
                        &lt;/b&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="background: black; border-width: 1pt medium 1pt 1pt; border-color: windowtext currentColor windowtext windowtext; padding: 0in 5.4pt; width: 5.75in; height: 11.65pt; border-right-style: none;" colspan="3" width="552" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="text-align: center; line-height: normal; margin-bottom: 0pt; mso-element: frame; mso-element-frame-hspace: 9.0pt; mso-element-wrap: around; mso-element-anchor-horizontal: page; mso-element-left: center; mso-height-rule: exactly; mso-element-top: -10.5pt;" align="center"&gt;
                        &lt;b&gt;
                            &lt;span style="color: white; font-family: &<code>quot</code>;Arial&<code>quot</code>;,sans-serif; font-size: 10pt; mso-fareast-font-family: &<code>quot</code>;Times New Roman&<code>quot</code>;; mso-fareast-language: EN-PH;"&gt;
                                Highlight the appropriate answer
                                &lt;o:p&gt;&lt;/o:p&gt;
                            &lt;/span&gt;
                        &lt;/b&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="background: black; border-width: 1pt 1pt 1pt medium; border-color: windowtext windowtext windowtext currentColor; padding: 0in 5.4pt; width: 117pt; height: 11.65pt; border-left-style: none;" width="156" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="text-align: center; line-height: normal; margin-bottom: 0pt; mso-element: frame; mso-element-frame-hspace: 9.0pt; mso-element-wrap: around; mso-element-anchor-horizontal: page; mso-element-left: center; mso-height-rule: exactly; mso-element-top: -10.5pt;" align="center"&gt;
                        &lt;b&gt;
                            &lt;span style="color: white; font-family: &<code>quot</code>;Arial&<code>quot</code>;,sans-serif; font-size: 10pt; mso-fareast-font-family: &<code>quot</code>;Times New Roman&<code>quot</code>;; mso-fareast-language: EN-PH;"&gt;
                                Additional details
                                &lt;o:p&gt;&lt;/o:p&gt;
                            &lt;/span&gt;
                        &lt;/b&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr style="height: 19.85pt; mso-yfti-irow: 1;"&gt;
                &lt;td style="background: rgb(221, 235, 247); border-width: medium medium 1pt 1pt; border-color: currentColor currentColor windowtext windowtext; padding: 0in 5.4pt; width: 238.25pt; height: 19.85pt; border-top-style: none; border-right-style: none;" width="318"&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt; mso-element: frame; mso-element-frame-hspace: 9.0pt; mso-element-wrap: around; mso-element-anchor-horizontal: page; mso-element-left: center; mso-height-rule: exactly; mso-element-top: -10.5pt;"&gt;
                        &lt;span style="font-family: &<code>quot</code>;Arial&<code>quot</code>;,sans-serif; font-size: 9pt; mso-fareast-font-family: &<code>quot</code>;Times New Roman&<code>quot</code>;; mso-fareast-language: EN-PH; mso-bidi-font-size: 10.0pt;"&gt;
                            What type of release will be introduced?
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: medium 1pt 1pt; border-color: currentColor windowtext windowtext; padding: 0in 5.4pt; width: 117pt; height: 19.85pt; border-top-style: none;" width="156"&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt; mso-element: frame; mso-element-frame-hspace: 9.0pt; mso-element-wrap: around; mso-element-anchor-horizontal: page; mso-element-left: center; mso-height-rule: exactly; mso-element-top: -10.5pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;
                            {{ $release->type_of_service === 'New service' ? '&lt;span style="background-color: #ffff00"&gt;New service&lt;/span&gt;' : 'New service' }}&lt;br&gt;
                            {{ $release->type_of_service === 'New functionality' ? '&lt;span style="background-color: #ffff00"&gt;New functionality&lt;/span&gt;' : 'New functionality' }}
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: medium 1pt 1pt medium; border-color: currentColor windowtext windowtext currentColor; padding: 0in 5.4pt; width: 1.75in; height: 19.85pt; border-top-style: none; border-left-style: none;" width="168"&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt; mso-element: frame; mso-element-frame-hspace: 9.0pt; mso-element-wrap: around; mso-element-anchor-horizontal: page; mso-element-left: center; mso-height-rule: exactly; mso-element-top: -10.5pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;
                            {{ $release->type_of_service === 'Bug fix' ? '&lt;span style="background-color: #ffff00"&gt;Bug fix&lt;/span&gt;' : 'Bug fix' }}&lt;br&gt;
                            {{ $release->type_of_service === 'Enhancements' ? '&lt;span style="background-color: #ffff00"&gt;Enhancements&lt;/span&gt;' : 'Enhancements' }}
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: medium 1pt 1pt medium; border-color: currentColor windowtext windowtext currentColor; padding: 0in 5.4pt; width: 171pt; height: 19.85pt; border-top-style: none; border-left-style: none;" width="228" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt; mso-element: frame; mso-element-frame-hspace: 9.0pt; mso-element-wrap: around; mso-element-anchor-horizontal: page; mso-element-left: center; mso-height-rule: exactly; mso-element-top: -10.5pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;
                            {{ $release->type_of_service === 'Decommission' ? '&lt;span style="background-color: #ffff00"&gt;Decommission&lt;/span&gt;' : 'Decommission' }}
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: medium 1pt 1pt medium; border-color: currentColor windowtext windowtext currentColor; padding: 0in 5.4pt; width: 117pt; height: 19.85pt; border-top-style: none; border-left-style: none;" width="156" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="text-align: center; line-height: normal; margin-bottom: 0pt; mso-element: frame; mso-element-frame-hspace: 9.0pt; mso-element-wrap: around; mso-element-anchor-horizontal: page; mso-element-left: center; mso-height-rule: exactly; mso-element-top: -10.5pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;
                            &<code>nbsp</code>;
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr style="height: 20.35pt; mso-yfti-irow: 2;"&gt;
                &lt;td style="background: rgb(221, 235, 247); border-width: medium medium 1pt 1pt; border-color: currentColor currentColor windowtext windowtext; padding: 0in 5.4pt; width: 238.25pt; height: 20.35pt; border-top-style: none; border-right-style: none;" width="318"&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt; mso-element: frame; mso-element-frame-hspace: 9.0pt; mso-element-wrap: around; mso-element-anchor-horizontal: page; mso-element-left: center; mso-height-rule: exactly; mso-element-top: -10.5pt;"&gt;
                        &lt;span style="font-family: &<code>quot</code>;Arial&<code>quot</code>;,sans-serif; font-size: 9pt; mso-fareast-font-family: &<code>quot</code>;Times New Roman&<code>quot</code>;; mso-fareast-language: EN-PH; mso-bidi-font-size: 10.0pt;"&gt;
                            Is there a test environment for testing?
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: medium 1pt 1pt; border-color: currentColor windowtext windowtext; padding: 0in 5.4pt; width: 117pt; height: 20.35pt; border-top-style: none;" width="156"&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt; mso-element: frame; mso-element-frame-hspace: 9.0pt; mso-element-wrap: around; mso-element-anchor-horizontal: page; mso-element-left: center; mso-height-rule: exactly; mso-element-top: -10.5pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;
                            &lt;span style="background-color: #ffff00"&gt;
                                Yes
                            &lt;/span&gt;
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: medium 1pt 1pt medium; border-color: currentColor windowtext windowtext currentColor; padding: 0in 5.4pt; width: 1.75in; height: 20.35pt; border-top-style: none; border-left-style: none;" width="168"&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt; mso-element: frame; mso-element-frame-hspace: 9.0pt; mso-element-wrap: around; mso-element-anchor-horizontal: page; mso-element-left: center; mso-height-rule: exactly; mso-element-top: -10.5pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;
                            No
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: medium 1pt 1pt medium; border-color: currentColor windowtext windowtext currentColor; padding: 0in 5.4pt; width: 171pt; height: 20.35pt; border-top-style: none; border-left-style: none;" width="228" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt; mso-element: frame; mso-element-frame-hspace: 9.0pt; mso-element-wrap: around; mso-element-anchor-horizontal: page; mso-element-left: center; mso-height-rule: exactly; mso-element-top: -10.5pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;
                            If no, provide risk acceptance
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: medium 1pt 1pt medium; border-color: currentColor windowtext windowtext currentColor; padding: 0in 5.4pt; width: 117pt; height: 20.35pt; border-top-style: none; border-left-style: none;" width="156" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt; mso-element: frame; mso-element-frame-hspace: 9.0pt; mso-element-wrap: around; mso-element-anchor-horizontal: page; mso-element-left: center; mso-height-rule: exactly; mso-element-top: -10.5pt;"&gt;&lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;
                        &<code>nbsp</code>;
                    &lt;/span&gt;
                &lt;/p&gt;
                &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr style="height: 17.65pt; mso-yfti-irow: 3;"&gt;
                &lt;td style="background: rgb(189, 215, 238); border-width: medium medium 1pt 1pt; padding: 0in 5.4pt; width: 238.25pt; height: 17.65pt; border-top-color: currentColor; border-right-color: currentColor; border-top-style: none; border-right-style: none;" width="318"&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt; mso-element: frame; mso-element-frame-hspace: 9.0pt; mso-element-wrap: around; mso-element-anchor-horizontal: page; mso-element-left: center; mso-height-rule: exactly; mso-element-top: -10.5pt;"&gt;
                        &lt;span style="font-family: &<code>quot</code>;Arial&<code>quot</code>;,sans-serif; font-size: 9pt; mso-fareast-font-family: &<code>quot</code>;Times New Roman&<code>quot</code>;; mso-fareast-language: EN-PH; mso-bidi-font-size: 10.0pt;"&gt;
                            Involves Core tables or Shared objects?
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: medium 1pt 1pt; border-color: currentColor windowtext windowtext; padding: 0in 5.4pt; width: 117pt; height: 17.65pt; border-top-style: none;" width="156" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt; mso-element: frame; mso-element-frame-hspace: 9.0pt; mso-element-wrap: around; mso-element-anchor-horizontal: page; mso-element-left: center; mso-height-rule: exactly; mso-element-top: -10.5pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;
                            {{ $hasDatabaseChanges  ? '&lt;span style="background-color: #ffff00"&gt;Yes&lt;/span&gt;' : 'Yes' }}
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: medium 1pt 1pt medium; border-color: currentColor windowtext windowtext currentColor; padding: 0in 5.4pt; width: 1.75in; height: 17.65pt; border-top-style: none; border-left-style: none;" width="168" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt; mso-element: frame; mso-element-frame-hspace: 9.0pt; mso-element-wrap: around; mso-element-anchor-horizontal: page; mso-element-left: center; mso-height-rule: exactly; mso-element-top: -10.5pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;
                            {{ !$hasDatabaseChanges  ? '&lt;span style="background-color: #ffff00"&gt;No&lt;/span&gt;' : 'No' }}
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: medium 1pt 1pt medium; border-color: currentColor windowtext windowtext currentColor; padding: 0in 5.4pt; width: 171pt; height: 17.65pt; border-top-style: none; border-left-style: none;" width="228" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt; mso-element: frame; mso-element-frame-hspace: 9.0pt; mso-element-wrap: around; mso-element-anchor-horizontal: page; mso-element-left: center; mso-height-rule: exactly; mso-element-top: -10.5pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;
                            If yes, identify object
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: medium 1pt 1pt medium; border-color: currentColor windowtext windowtext currentColor; padding: 0in 5.4pt; width: 117pt; height: 17.65pt; border-top-style: none; border-left-style: none;" width="156" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt; mso-element: frame; mso-element-frame-hspace: 9.0pt; mso-element-wrap: around; mso-element-anchor-horizontal: page; mso-element-left: center; mso-height-rule: exactly; mso-element-top: -10.5pt;" align="center"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;
                            @if ($hasDatabaseChanges)
                                {{ $databaseTables->implode(', ') }}
                            @endif
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr style="height: 17.65pt; mso-yfti-irow: 4;"&gt;
                &lt;td style="background: rgb(189, 215, 238); border-width: medium medium medium 1pt; padding: 0in 5.4pt; width: 238.25pt; height: 17.65pt; border-top-color: currentColor; border-right-color: currentColor; border-bottom-color: currentColor; border-top-style: none; border-right-style: none; border-bottom-style: none;" width="318"&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt; mso-element: frame; mso-element-frame-hspace: 9.0pt; mso-element-wrap: around; mso-element-anchor-horizontal: page; mso-element-left: center; mso-height-rule: exactly; mso-element-top: -10.5pt;"&gt;
                        &lt;span style="font-family: &<code>quot</code>;Arial&<code>quot</code>;,sans-serif; font-size: 9pt; mso-fareast-font-family: &<code>quot</code>;Times New Roman&<code>quot</code>;; mso-fareast-language: EN-PH; mso-bidi-font-size: 10.0pt;"&gt;
                            Passed Regression testing? 
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: medium 1pt 1pt; border-color: currentColor windowtext windowtext; padding: 0in 5.4pt; width: 117pt; height: 17.65pt; border-top-style: none;" width="156" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt; mso-element: frame; mso-element-frame-hspace: 9.0pt; mso-element-wrap: around; mso-element-anchor-horizontal: page; mso-element-left: center; mso-height-rule: exactly; mso-element-top: -10.5pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;
                            &lt;span style="background-color: #ffff00"&gt;Yes&lt;/span&gt;
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: medium 1pt 1pt medium; border-color: currentColor windowtext windowtext currentColor; padding: 0in 5.4pt; width: 1.75in; height: 17.65pt; border-top-style: none; border-left-style: none;" width="168" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt; mso-element: frame; mso-element-frame-hspace: 9.0pt; mso-element-wrap: around; mso-element-anchor-horizontal: page; mso-element-left: center; mso-height-rule: exactly; mso-element-top: -10.5pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;
                            No
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: medium 1pt 1pt medium; border-color: currentColor windowtext windowtext currentColor; padding: 0in 5.4pt; width: 171pt; height: 17.65pt; border-top-style: none; border-left-style: none;" width="228" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt; mso-element: frame; mso-element-frame-hspace: 9.0pt; mso-element-wrap: around; mso-element-anchor-horizontal: page; mso-element-left: center; mso-height-rule: exactly; mso-element-top: -10.5pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;
                            Not applicable
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: medium 1pt 1pt medium; border-color: currentColor windowtext windowtext currentColor; padding: 0in 5.4pt; width: 117pt; height: 17.65pt; border-top-style: none; border-left-style: none;" width="156" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt; mso-element: frame; mso-element-frame-hspace: 9.0pt; mso-element-wrap: around; mso-element-anchor-horizontal: page; mso-element-left: center; mso-height-rule: exactly; mso-element-top: -10.5pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;
                            &<code>nbsp</code>;
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr style="height: 17.65pt; mso-yfti-irow: 5;"&gt;
                &lt;td style="background: rgb(189, 214, 238); border-width: 1pt medium 1pt 1pt; padding: 0in 5.4pt; width: 238.25pt; height: 17.65pt; border-right-color: currentColor; border-right-style: none;" width="318"&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt; mso-element: frame; mso-element-frame-hspace: 9.0pt; mso-element-wrap: around; mso-element-anchor-horizontal: page; mso-element-left: center; mso-height-rule: exactly; mso-element-top: -10.5pt;"&gt;
                        &lt;span style="font-family: &<code>quot</code>;Arial&<code>quot</code>;,sans-serif; font-size: 9pt; mso-fareast-font-family: &<code>quot</code>;Times New Roman&<code>quot</code>;; mso-fareast-language: EN-PH; mso-bidi-font-size: 10.0pt;"&gt;
                            Will the deployment require downtime?
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: medium 1pt 1pt; border-color: currentColor windowtext windowtext; padding: 0in 5.4pt; width: 117pt; height: 17.65pt; border-top-style: none;" width="156" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt; mso-element: frame; mso-element-frame-hspace: 9.0pt; mso-element-wrap: around; mso-element-anchor-horizontal: page; mso-element-left: center; mso-height-rule: exactly; mso-element-top: -10.5pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;
                            {{ $release->downtime_req === 'Yes' ? '&lt;span style="background-color: #ffff00"&gt;Yes&lt;/span&gt;' : 'Yes' }}
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: medium 1pt 1pt medium; border-color: currentColor windowtext windowtext currentColor; padding: 0in 5.4pt; width: 1.75in; height: 17.65pt; border-top-style: none; border-left-style: none;" width="168" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt; mso-element: frame; mso-element-frame-hspace: 9.0pt; mso-element-wrap: around; mso-element-anchor-horizontal: page; mso-element-left: center; mso-height-rule: exactly; mso-element-top: -10.5pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;
                            {{ $release->downtime_req === 'No' ? '&lt;span style="background-color: #ffff00"&gt;No&lt;/span&gt;' : 'No' }}
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: medium 1pt 1pt medium; border-color: currentColor windowtext windowtext currentColor; padding: 0in 5.4pt; width: 171pt; height: 17.65pt; border-top-style: none; border-left-style: none;" width="228" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt; mso-element: frame; mso-element-frame-hspace: 9.0pt; mso-element-wrap: around; mso-element-anchor-horizontal: page; mso-element-left: center; mso-height-rule: exactly; mso-element-top: -10.5pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;
                            If yes, provide timing
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: medium 1pt 1pt medium; border-color: currentColor windowtext windowtext currentColor; padding: 0in 5.4pt; width: 117pt; height: 17.65pt; border-top-style: none; border-left-style: none;" width="156" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt; mso-element: frame; mso-element-frame-hspace: 9.0pt; mso-element-wrap: around; mso-element-anchor-horizontal: page; mso-element-left: center; mso-height-rule: exactly; mso-element-top: -10.5pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;
                            &<code>nbsp</code>;
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr style="height: 17.65pt; mso-yfti-irow: 6;"&gt;
                &lt;td style="background: rgb(155, 194, 230); border-width: medium medium 1pt 1pt; border-color: currentColor currentColor windowtext windowtext; padding: 0in 5.4pt; width: 238.25pt; height: 17.65pt; border-top-style: none; border-right-style: none;" width="318"&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt; mso-element: frame; mso-element-frame-hspace: 9.0pt; mso-element-wrap: around; mso-element-anchor-horizontal: page; mso-element-left: center; mso-height-rule: exactly; mso-element-top: -10.5pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;
                            Will it cause any performance impact? 
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: medium 1pt 1pt; border-color: currentColor windowtext windowtext; padding: 0in 5.4pt; width: 117pt; height: 17.65pt; border-top-style: none;" width="156" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt; mso-element: frame; mso-element-frame-hspace: 9.0pt; mso-element-wrap: around; mso-element-anchor-horizontal: page; mso-element-left: center; mso-height-rule: exactly; mso-element-top: -10.5pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;
                            Yes
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: medium 1pt 1pt medium; border-color: currentColor windowtext windowtext currentColor; padding: 0in 5.4pt; width: 1.75in; height: 17.65pt; border-top-style: none; border-left-style: none;" width="168" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt; mso-element: frame; mso-element-frame-hspace: 9.0pt; mso-element-wrap: around; mso-element-anchor-horizontal: page; mso-element-left: center; mso-height-rule: exactly; mso-element-top: -10.5pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;
                            &lt;span style="background-color: #ffff00"&gt;No&lt;/span&gt;
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: medium 1pt 1pt medium; border-color: currentColor windowtext windowtext currentColor; padding: 0in 5.4pt; width: 171pt; height: 17.65pt; border-top-style: none; border-left-style: none;" width="228" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt; mso-element: frame; mso-element-frame-hspace: 9.0pt; mso-element-wrap: around; mso-element-anchor-horizontal: page; mso-element-left: center; mso-height-rule: exactly; mso-element-top: -10.5pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;
                            If yes, provide time of impact
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: medium 1pt 1pt medium; border-color: currentColor windowtext windowtext currentColor; padding: 0in 5.4pt; width: 117pt; height: 17.65pt; border-top-style: none; border-left-style: none;" width="156" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt; mso-element: frame; mso-element-frame-hspace: 9.0pt; mso-element-wrap: around; mso-element-anchor-horizontal: page; mso-element-left: center; mso-height-rule: exactly; mso-element-top: -10.5pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;
                            &<code>nbsp</code>;
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr style="height: 17.65pt; mso-yfti-irow: 7;"&gt;
                &lt;td style="background: rgb(155, 194, 230); border-width: medium medium 1pt 1pt; border-color: currentColor currentColor windowtext windowtext; padding: 0in 5.4pt; width: 238.25pt; height: 17.65pt; border-top-style: none; border-right-style: none;" width="318"&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt; mso-element: frame; mso-element-frame-hspace: 9.0pt; mso-element-wrap: around; mso-element-anchor-horizontal: page; mso-element-left: center; mso-height-rule: exactly; mso-element-top: -10.5pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;
                            Implementation within business hours?
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: medium 1pt 1pt; border-color: currentColor windowtext windowtext; padding: 0in 5.4pt; width: 117pt; height: 17.65pt; border-top-style: none;" width="156" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt; mso-element: frame; mso-element-frame-hspace: 9.0pt; mso-element-wrap: around; mso-element-anchor-horizontal: page; mso-element-left: center; mso-height-rule: exactly; mso-element-top: -10.5pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;
                            {{ $release->business_hours === 'Yes' ? '&lt;span style="background-color: #ffff00"&gt;Yes&lt;/span&gt;' : 'Yes' }}
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: medium 1pt 1pt medium; border-color: currentColor windowtext windowtext currentColor; padding: 0in 5.4pt; width: 1.75in; height: 17.65pt; border-top-style: none; border-left-style: none;" width="168" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt; mso-element: frame; mso-element-frame-hspace: 9.0pt; mso-element-wrap: around; mso-element-anchor-horizontal: page; mso-element-left: center; mso-height-rule: exactly; mso-element-top: -10.5pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;
                            {{ $release->business_hours === 'No' ? '&lt;span style="background-color: #ffff00"&gt;No&lt;/span&gt;' : 'No' }}
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: medium 1pt 1pt medium; border-color: currentColor windowtext windowtext currentColor; padding: 0in 5.4pt; width: 171pt; height: 17.65pt; border-top-style: none; border-left-style: none;" width="228" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt; mso-element: frame; mso-element-frame-hspace: 9.0pt; mso-element-wrap: around; mso-element-anchor-horizontal: page; mso-element-left: center; mso-height-rule: exactly; mso-element-top: -10.5pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;
                            If yes, provide possible impact
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: medium 1pt 1pt medium; border-color: currentColor windowtext windowtext currentColor; padding: 0in 5.4pt; width: 117pt; height: 17.65pt; border-top-style: none; border-left-style: none;" width="156" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt; mso-element: frame; mso-element-frame-hspace: 9.0pt; mso-element-wrap: around; mso-element-anchor-horizontal: page; mso-element-left: center; mso-height-rule: exactly; mso-element-top: -10.5pt;"&gt;&lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;&<code>nbsp</code>;&lt;/span&gt;&lt;/p&gt;
                &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr style="height: 22.15pt; mso-yfti-irow: 8;"&gt;
                &lt;td style="background: rgb(156, 194, 229); border-width: medium medium 1pt 1pt; border-color: currentColor currentColor windowtext windowtext; padding: 0in 5.4pt; width: 238.25pt; height: 22.15pt; border-top-style: none; border-right-style: none;" width="318" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt; mso-element: frame; mso-element-frame-hspace: 9.0pt; mso-element-wrap: around; mso-element-anchor-horizontal: page; mso-element-left: center; mso-height-rule: exactly; mso-element-top: -10.5pt;"&gt;
                        &lt;span style="font-family: &<code>quot</code>;Arial&<code>quot</code>;,sans-serif; font-size: 9pt; mso-fareast-font-family: &<code>quot</code>;Times New Roman&<code>quot</code>;; mso-fareast-language: EN-PH; mso-bidi-font-size: 10.0pt;"&gt;
                            Will this require an Infra change?
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: medium 1pt 1pt; border-color: currentColor windowtext windowtext; padding: 0in 5.4pt; width: 117pt; height: 22.15pt; border-top-style: none;" width="156" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt; mso-element: frame; mso-element-frame-hspace: 9.0pt; mso-element-wrap: around; mso-element-anchor-horizontal: page; mso-element-left: center; mso-height-rule: exactly; mso-element-top: -10.5pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;
                            {{ $hasInfraChanges  ? '&lt;span style="background-color: #ffff00"&gt;Yes&lt;/span&gt;' : 'Yes' }}
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: medium 1pt 1pt medium; border-color: currentColor windowtext windowtext currentColor; padding: 0in 5.4pt; width: 1.75in; height: 22.15pt; border-top-style: none; border-left-style: none;" width="168" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt; mso-element: frame; mso-element-frame-hspace: 9.0pt; mso-element-wrap: around; mso-element-anchor-horizontal: page; mso-element-left: center; mso-height-rule: exactly; mso-element-top: -10.5pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;
                            {{ !$hasInfraChanges  ? '&lt;span style="background-color: #ffff00"&gt;No&lt;/span&gt;' : 'No' }}
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: medium 1pt 1pt medium; border-color: currentColor windowtext windowtext currentColor; padding: 0in 5.4pt; width: 171pt; height: 22.15pt; border-top-style: none; border-left-style: none;" width="228" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt; mso-element: frame; mso-element-frame-hspace: 9.0pt; mso-element-wrap: around; mso-element-anchor-horizontal: page; mso-element-left: center; mso-height-rule: exactly; mso-element-top: -10.5pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;
                            If yes, provide related CHG
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: medium 1pt 1pt medium; border-color: currentColor windowtext windowtext currentColor; padding: 0in 5.4pt; width: 117pt; height: 22.15pt; border-top-style: none; border-left-style: none;" width="156" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt; mso-element: frame; mso-element-frame-hspace: 9.0pt; mso-element-wrap: around; mso-element-anchor-horizontal: page; mso-element-left: center; mso-height-rule: exactly; mso-element-top: -10.5pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;
                            &<code>nbsp</code>;
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr style="height: 22.15pt; mso-yfti-irow: 9;"&gt;
                &lt;td style="background: rgb(91, 155, 213); border-width: medium medium 1pt 1pt; border-color: currentColor currentColor windowtext windowtext; padding: 0in 5.4pt; width: 238.25pt; height: 22.15pt; border-top-style: none; border-right-style: none;" width="318" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt; mso-element: frame; mso-element-frame-hspace: 9.0pt; mso-element-wrap: around; mso-element-anchor-horizontal: page; mso-element-left: center; mso-height-rule: exactly; mso-element-top: -10.5pt;"&gt;
                        &lt;span style="font-family: &<code>quot</code>;Arial&<code>quot</code>;,sans-serif; font-size: 9pt; mso-fareast-font-family: &<code>quot</code>;Times New Roman&<code>quot</code>;; mso-fareast-language: EN-PH; mso-bidi-font-size: 10.0pt;"&gt;
                            Will this require a SAP change?
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: medium 1pt 1pt; border-color: currentColor windowtext windowtext; padding: 0in 5.4pt; width: 117pt; height: 22.15pt; border-top-style: none;" width="156" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt; mso-element: frame; mso-element-frame-hspace: 9.0pt; mso-element-wrap: around; mso-element-anchor-horizontal: page; mso-element-left: center; mso-height-rule: exactly; mso-element-top: -10.5pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;
                            Yes
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: medium 1pt 1pt medium; border-color: currentColor windowtext windowtext currentColor; padding: 0in 5.4pt; width: 1.75in; height: 22.15pt; border-top-style: none; border-left-style: none;" width="168" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt; mso-element: frame; mso-element-frame-hspace: 9.0pt; mso-element-wrap: around; mso-element-anchor-horizontal: page; mso-element-left: center; mso-height-rule: exactly; mso-element-top: -10.5pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;
                            &lt;span style="background-color: #ffff00"&gt;No&lt;/span&gt;
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: medium 1pt 1pt medium; border-color: currentColor windowtext windowtext currentColor; padding: 0in 5.4pt; width: 171pt; height: 22.15pt; border-top-style: none; border-left-style: none;" width="228" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt; mso-element: frame; mso-element-frame-hspace: 9.0pt; mso-element-wrap: around; mso-element-anchor-horizontal: page; mso-element-left: center; mso-height-rule: exactly; mso-element-top: -10.5pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;
                            If yes, provide related CHG
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: medium 1pt 1pt medium; border-color: currentColor windowtext windowtext currentColor; padding: 0in 5.4pt; width: 117pt; height: 22.15pt; border-top-style: none; border-left-style: none;" width="156" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt; mso-element: frame; mso-element-frame-hspace: 9.0pt; mso-element-wrap: around; mso-element-anchor-horizontal: page; mso-element-left: center; mso-height-rule: exactly; mso-element-top: -10.5pt;"&gt;&lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;&<code>nbsp</code>;&lt;/span&gt;&lt;/p&gt;
                &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr style="height: 25.75pt; mso-yfti-irow: 10;"&gt;
                &lt;td style="background: rgb(91, 155, 213); border-width: medium medium medium 1pt; padding: 0in 5.4pt; width: 238.25pt; height: 25.75pt; border-top-color: currentColor; border-right-color: currentColor; border-bottom-color: currentColor; border-top-style: none; border-right-style: none; border-bottom-style: none;" width="318"&gt;
                    &lt;p class="MsoNormal" style="line-height: 115%; margin-bottom: 0pt; mso-element: frame; mso-element-frame-hspace: 9.0pt; mso-element-wrap: around; mso-element-anchor-horizontal: page; mso-element-left: center; mso-height-rule: exactly; mso-element-top: -10.5pt;"&gt;
                        &lt;span style="line-height: 115%; font-family: &<code>quot</code>;Arial&<code>quot</code>;,sans-serif; font-size: 9pt; mso-fareast-font-family: &<code>quot</code>;Times New Roman&<code>quot</code>;; mso-fareast-language: EN-PH; mso-bidi-font-size: 10.0pt;"&gt;
                            Follows an established procedure that’s been applied multiple times in the past
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: medium 1pt 1pt; border-color: currentColor windowtext windowtext; padding: 0in 5.4pt; width: 117pt; height: 25.75pt; border-top-style: none;" width="156" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt; mso-element: frame; mso-element-frame-hspace: 9.0pt; mso-element-wrap: around; mso-element-anchor-horizontal: page; mso-element-left: center; mso-height-rule: exactly; mso-element-top: -10.5pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;
                            &lt;span style="background-color: #ffff00"&gt;Yes&lt;/span&gt;
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: medium 1pt 1pt medium; border-color: currentColor windowtext windowtext currentColor; padding: 0in 5.4pt; width: 1.75in; height: 25.75pt; border-top-style: none; border-left-style: none;" width="168" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt; mso-element: frame; mso-element-frame-hspace: 9.0pt; mso-element-wrap: around; mso-element-anchor-horizontal: page; mso-element-left: center; mso-height-rule: exactly; mso-element-top: -10.5pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;
                            No
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: medium 1pt 1pt medium; border-color: currentColor windowtext windowtext currentColor; padding: 0in 5.4pt; width: 171pt; height: 25.75pt; border-top-style: none; border-left-style: none;" width="228" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt; mso-element: frame; mso-element-frame-hspace: 9.0pt; mso-element-wrap: around; mso-element-anchor-horizontal: page; mso-element-left: center; mso-height-rule: exactly; mso-element-top: -10.5pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;
                            If no, define potential risk
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: medium 1pt 1pt medium; border-color: currentColor windowtext windowtext currentColor; padding: 0in 5.4pt; width: 117pt; height: 25.75pt; border-top-style: none; border-left-style: none;" width="156" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt; mso-element: frame; mso-element-frame-hspace: 9.0pt; mso-element-wrap: around; mso-element-anchor-horizontal: page; mso-element-left: center; mso-height-rule: exactly; mso-element-top: -10.5pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;
                            &<code>nbsp</code>;
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr style="height: 22.15pt; mso-yfti-irow: 11; mso-yfti-lastrow: yes;"&gt;
                &lt;td style="background: rgb(91, 155, 213); border-width: 1pt medium medium 1pt; padding: 0in 5.4pt; width: 238.25pt; height: 22.15pt; border-right-color: currentColor; border-bottom-color: currentColor; border-right-style: none; border-bottom-style: none;" width="318"&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt; mso-element: frame; mso-element-frame-hspace: 9.0pt; mso-element-wrap: around; mso-element-anchor-horizontal: page; mso-element-left: center; mso-height-rule: exactly; mso-element-top: -10.5pt;"&gt;
                        &lt;span style="font-family: &<code>quot</code>;Arial&<code>quot</code>;,sans-serif; font-size: 9pt; mso-fareast-font-family: &<code>quot</code>;Times New Roman&<code>quot</code>;; mso-fareast-language: EN-PH; mso-bidi-font-size: 10.0pt;"&gt;
                            Failure can be detected after implementation
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: medium 1pt 1pt; border-color: currentColor windowtext windowtext; padding: 0in 5.4pt; width: 117pt; height: 22.15pt; border-top-style: none;" width="156" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt; mso-element: frame; mso-element-frame-hspace: 9.0pt; mso-element-wrap: around; mso-element-anchor-horizontal: page; mso-element-left: center; mso-height-rule: exactly; mso-element-top: -10.5pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;
                            &lt;span style="background-color: #ffff00"&gt;Less than 1 hour&lt;/span&gt;
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: medium 1pt 1pt medium; border-color: currentColor windowtext windowtext currentColor; padding: 0in 5.4pt; width: 1.75in; height: 22.15pt; border-top-style: none; border-left-style: none;" width="168" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt; mso-element: frame; mso-element-frame-hspace: 9.0pt; mso-element-wrap: around; mso-element-anchor-horizontal: page; mso-element-left: center; mso-height-rule: exactly; mso-element-top: -10.5pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;
                            Within 24 hours
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: medium 1pt 1pt medium; border-color: currentColor windowtext windowtext currentColor; padding: 0in 5.4pt; width: 171pt; height: 22.15pt; border-top-style: none; border-left-style: none;" width="228" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt; mso-element: frame; mso-element-frame-hspace: 9.0pt; mso-element-wrap: around; mso-element-anchor-horizontal: page; mso-element-left: center; mso-height-rule: exactly; mso-element-top: -10.5pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;
                            Longer than 24 hours
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: medium 1pt 1pt medium; border-color: currentColor windowtext windowtext currentColor; padding: 0in 5.4pt; width: 117pt; height: 22.15pt; border-top-style: none; border-left-style: none;" width="156" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt; mso-element: frame; mso-element-frame-hspace: 9.0pt; mso-element-wrap: around; mso-element-anchor-horizontal: page; mso-element-left: center; mso-height-rule: exactly; mso-element-top: -10.5pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;
                            &<code>nbsp</code>;
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
            &lt;/tr&gt;
        &lt;/tbody&gt;
    &lt;/table&gt;
&lt;/div&gt;
&lt;div&gt;&lt;br&gt;&lt;/div&gt;
&lt;div&gt;&lt;br&gt;&lt;/div&gt;
&lt;div&gt;&lt;br&gt;&lt;/div&gt;
&lt;div&gt;&lt;br&gt;&lt;/div&gt;
&lt;div&gt;&lt;br&gt;&lt;/div&gt;
&lt;div&gt;&lt;br&gt;&lt;/div&gt;
&lt;div&gt;&lt;br&gt;&lt;/div&gt;
&lt;div&gt;&lt;br&gt;&lt;/div&gt;
&lt;div&gt;&lt;br&gt;&lt;/div&gt;
&lt;div&gt;&lt;br&gt;&lt;/div&gt;
&lt;div&gt;&lt;br&gt;&lt;/div&gt;
&lt;div&gt;&lt;br&gt;&lt;/div&gt;
&lt;div&gt;&lt;br&gt;&lt;/div&gt;
&lt;div&gt;&lt;br&gt;&lt;/div&gt;
&lt;div&gt;&lt;br&gt;&lt;/div&gt;
&lt;div&gt;&lt;br&gt;&lt;/div&gt;
&lt;div&gt;&lt;br&gt;&lt;/div&gt;
&lt;div&gt;&lt;br&gt;&lt;/div&gt;
&lt;div&gt;&lt;br&gt;&lt;/div&gt;
&lt;div&gt;
    &lt;table class="MsoNormalTable" style="width: 598.5pt;" width="0" cellspacing="0" cellpadding="0"&gt;
        &lt;tbody&gt;
            &lt;tr style="height: 15.75pt;"&gt;
                &lt;td style="background: black; padding: 0in 5.4pt; width: 598.5pt; height: 15.75pt;" colspan="2" width="798" valign="bottom" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="text-align: center; line-height: normal; margin-bottom: 0pt;" align="center"&gt;&lt;b style="font-size: 1em;"&gt;&lt;span style="color: white; font-family: Arial, sans-serif; font-size: 12pt;"&gt;RELEASE DETAILS&lt;/span&gt;&lt;/b&gt;&lt;/p&gt;
                &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr style="height: 12.75pt;"&gt;
                &lt;td style="border-width: 1pt; border-color: windowtext; padding: 0in 5.4pt; width: 337.5pt; height: 12.75pt;" width="450" valign="middle" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;
                            Server(s) where packages are to be deployed:
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: 1pt 1pt 1pt medium; padding: 0in 5.4pt; width: 261pt; height: 12.75pt; border-top-color: windowtext; border-bottom-color: windowtext; border-left-color: currentColor; border-left-style: none;" width="348" valign="bottom" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="text-align: center; line-height: normal; margin-bottom: 0pt;" align="center"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 10pt; align="center""&gt;
                            FOR TNG PRODUCTION&lt;br&gt;
                            LIVE SERVER A - 13.54.244.98
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr style="height: 12.75pt;"&gt;
                &lt;td style="border-width: medium 1pt 1pt; border-color: currentColor windowtext windowtext; padding: 0in 5.4pt; width: 337.5pt; height: 12.75pt; border-top-style: none;" width="450" valign="bottom" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;
                            Server and Credentials (where tar files should be created):
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: medium 1pt 1pt medium; padding: 0in 5.4pt; width: 261pt; height: 12.75pt; border-top-color: currentColor; border-bottom-color: windowtext; border-left-color: currentColor; border-top-style: none; border-left-style: none;" width="348" valign="bottom" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="text-align: center; line-height: normal; margin-bottom: 0pt;" align="center"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 10pt;"&gt;
                            &<code>nbsp</code>;
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr style="height: 12.75pt;"&gt;
                &lt;td style="border-width: medium 1pt 1pt; border-color: currentColor windowtext windowtext; padding: 0in 5.4pt; width: 337.5pt; height: 12.75pt; border-top-style: none;" width="450" valign="middle"&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;
                            Business ticket(s) (JIRA):
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: medium 1pt 1pt medium; padding: 0in 5.4pt; width: 261pt; height: 12.75pt; border-top-color: currentColor; border-bottom-color: windowtext; border-left-color: currentColor; border-top-style: none; border-left-style: none;" width="348" valign="bottom" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="text-align: center; line-height: normal; margin-bottom: 0pt;" align="center"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 10pt;"&gt;
                            @foreach($tickets as $ticket)
                                {{ $ticket->code }} {{ $ticket->description }} &lt;br/&gt;
                            @endforeach
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr style="height: 12.75pt;"&gt;
                &lt;td style="border-width: medium 1pt 1pt; border-color: currentColor windowtext windowtext; padding: 0in 5.4pt; width: 337.5pt; height: 12.75pt; border-top-style: none;" width="450" valign="bottom"&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;
                            Release Package Version Number:
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: medium 1pt 1pt medium; padding: 0in 5.4pt; width: 261pt; height: 12.75pt; border-top-color: currentColor; border-bottom-color: windowtext; border-left-color: currentColor; border-top-style: none; border-left-style: none;" width="348" valign="bottom" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="text-align: center; line-height: normal; margin-bottom: 0pt;" align="center"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 10pt;"&gt;
                            {{  $project->name }}-{{ $release->name }} Point Release
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr style="height: 12.75pt;"&gt;
                &lt;td style="border-width: medium 1pt 1pt; border-color: currentColor windowtext windowtext; padding: 0in 5.4pt; width: 337.5pt; height: 12.75pt; border-top-style: none;" width="450" valign="bottom"&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;
                            Release Package Location (SVN):
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: medium 1pt 1pt medium; padding: 0in 5.4pt; width: 261pt; height: 12.75pt; border-top-color: currentColor; border-bottom-color: windowtext; border-left-color: currentColor; border-top-style: none; border-left-style: none;" width="348" valign="bottom" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="text-align: center; line-height: normal; margin-bottom: 0pt;" align="center"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 10pt;"&gt;
                            {{  $project->repo_link }}
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr style="height: 12.75pt;"&gt;
                &lt;td style="border-width: medium 1pt 1pt; border-color: currentColor windowtext windowtext; padding: 0in 5.4pt; width: 337.5pt; height: 12.75pt; border-top-style: none;" width="450" valign="bottom"&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;
                            New Files (not to be included in backup script):
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: medium 1pt 1pt medium; padding: 0in 5.4pt; width: 261pt; height: 12.75pt; border-top-color: currentColor; border-bottom-color: windowtext; border-left-color: currentColor; border-top-style: none; border-left-style: none;" width="348" valign="bottom" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="text-align: center; line-height: normal; margin-bottom: 0pt;" align="center"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 10pt;"&gt;
                            &<code>nbsp</code>;
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr style="height: 12.75pt;"&gt;
                &lt;td style="border-width: medium 1pt 1pt; border-color: currentColor windowtext windowtext; padding: 0in 5.4pt; width: 337.5pt; height: 12.75pt; border-top-style: none;" width="450" valign="bottom"&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;
                            Files to be included in the Tar file:
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: medium 1pt 1pt medium; padding: 0in 5.4pt; width: 261pt; height: 12.75pt; border-top-color: currentColor; border-bottom-color: windowtext; border-left-color: currentColor; border-top-style: none; border-left-style: none;" width="348" valign="bottom" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="text-align: center; line-height: normal; margin-bottom: 0pt;" align="center"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 10pt;"&gt;
                            &<code>nbsp</code>;
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr style="height: 12.75pt;"&gt;
                &lt;td style="border-width: medium 1pt 1pt; border-color: currentColor windowtext windowtext; padding: 0in 5.4pt; width: 337.5pt; height: 12.75pt; border-top-style: none;" width="450" valign="bottom"&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;
                            Release Package Filename(s):
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: medium 1pt 1pt medium; padding: 0in 5.4pt; width: 261pt; height: 12.75pt; border-top-color: currentColor; border-bottom-color: windowtext; border-left-color: currentColor; border-top-style: none; border-left-style: none;" width="348" valign="bottom" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="text-align: center; line-height: normal; margin-bottom: 0pt;" align="center"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 10pt;"&gt;
                            &<code>nbsp</code>;
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr style="height: 12.75pt;"&gt;
                &lt;td style="border-width: medium 1pt 1pt; border-color: currentColor windowtext windowtext; padding: 0in 5.4pt; width: 337.5pt; height: 12.75pt; border-top-style: none;" width="450" valign="middle"&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;
                            Developer Support Contact:
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: medium 1pt 1pt medium; padding: 0in 5.4pt; width: 261pt; height: 12.75pt; border-top-color: currentColor; border-bottom-color: windowtext; border-left-color: currentColor; border-top-style: none; border-left-style: none;" width="348" valign="bottom" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="text-align: center; line-height: normal; margin-bottom: 0pt;" align="center"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 10pt;"&gt;
                            {{ $developers->pluck('name')->implode(', ') }}
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr style="height: 12.75pt;"&gt;
                &lt;td style="border-width: medium 1pt 1pt; border-color: currentColor windowtext windowtext; padding: 0in 5.4pt; width: 337.5pt; height: 12.75pt; border-top-style: none;" width="450" valign="middle"&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;
                            Post Deployment Tester:
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: medium 1pt 1pt medium; padding: 0in 5.4pt; width: 261pt; height: 12.75pt; border-top-color: currentColor; border-bottom-color: windowtext; border-left-color: currentColor; border-top-style: none; border-left-style: none;" width="348" valign="bottom" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="text-align: center; line-height: normal; margin-bottom: 0pt;" align="center"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 10pt;"&gt;
                            {{ $testers->pluck('name')->implode(', ') }}
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
            &lt;/tr&gt;
        &lt;/tbody&gt;
    &lt;/table&gt;
&lt;/div&gt;
@if ($hasDatabaseChanges)
&lt;div&gt;&lt;br&gt;&lt;/div&gt;
&lt;div&gt;
    &lt;table class="MsoNormalTable" style="width: 598.5pt;" width="0" cellspacing="0" cellpadding="0"&gt;
        &lt;tbody&gt;
            &lt;tr style="height: 15.75pt; mso-yfti-irow: 0; mso-yfti-firstrow: yes;"&gt;
                &lt;td style="background: black; border-width: 1pt; border-color: windowtext; padding: 0in 5.4pt; width: 598.5pt; height: 15.75pt;" colspan="2" width="798" valign="bottom" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="text-align: center; line-height: normal; margin-bottom: 0pt;" align="center"&gt;
                        &lt;b&gt;
                            &lt;span style="color: white; font-family: &<code>quot</code>;Arial&<code>quot</code>;,sans-serif; font-size: 12pt; mso-fareast-font-family: &<code>quot</code>;Times New Roman&<code>quot</code>;; mso-fareast-language: EN-PH;"&gt;
                                DATABASE DETAILS
                                &lt;o:p&gt;&lt;/o:p&gt;
                            &lt;/span&gt;
                        &lt;/b&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr style="height: 12.75pt; mso-yfti-irow: 1;"&gt;
                &lt;td style="border-width: medium 1pt 1pt; border-color: currentColor windowtext windowtext; padding: 0in 5.4pt; width: 337.5pt; height: 12.75pt; border-top-style: none;" width="450" valign="bottom" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;
                            Database Release Package Location (SVN): 
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: medium 1pt 1pt medium; padding: 0in 5.4pt; width: 261pt; height: 12.75pt; border-top-color: currentColor; border-bottom-color: windowtext; border-left-color: currentColor; border-top-style: none; border-left-style: none;" width="348" valign="bottom" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt;" align="center"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 10pt;"&gt;
                            {{  $project->db_repo_link }}
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr style="height: 12.75pt; mso-yfti-irow: 2;"&gt;
                &lt;td style="border-width: medium 1pt 1pt; border-color: currentColor windowtext windowtext; padding: 0in 5.4pt; width: 337.5pt; height: 12.75pt; border-top-style: none;" width="450" valign="bottom" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;
                            Database Name: 
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: medium 1pt 1pt medium; border-color: currentColor windowtext windowtext currentColor; padding: 0in 5.4pt; width: 261pt; height: 12.75pt; border-top-style: none; border-left-style: none;" width="348" valign="bottom" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt;" align="center"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 10pt;"&gt;
                            {{  $project->db_name }}
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr style="height: 12.75pt; mso-yfti-irow: 3;"&gt;
                &lt;td style="border-width: medium 1pt 1pt; border-color: currentColor windowtext windowtext; padding: 0in 5.4pt; width: 337.5pt; height: 12.75pt; border-top-style: none;" width="450" valign="bottom"&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;
                            Revision number:
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: medium 1pt 1pt medium; border-color: currentColor windowtext windowtext currentColor; padding: 0in 5.4pt; width: 261pt; height: 12.75pt; border-top-style: none; border-left-style: none;" width="348" valign="bottom" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt;" align="center"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 10pt;"&gt;
                            {{ $databaseRevisionNums->implode(', ') }}
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr style="height: 12.75pt; mso-yfti-irow: 4;"&gt;
                &lt;td style="border-width: medium 1pt 1pt; border-color: currentColor windowtext windowtext; padding: 0in 5.4pt; width: 337.5pt; height: 12.75pt; border-top-style: none;" width="450" valign="bottom"&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;
                            Code review link (fecru):
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: medium 1pt 1pt medium; border-color: currentColor windowtext windowtext currentColor; padding: 0in 5.4pt; width: 261pt; height: 12.75pt; border-top-style: none; border-left-style: none;" width="348" valign="bottom" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt;" align="center"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 10pt;"&gt;
                            {{ $databaseCodeReviewLinks->implode(', ') }}
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr style="height: 12.75pt; mso-yfti-irow: 5;"&gt;
                &lt;td style="border-width: medium 1pt 1pt; border-color: currentColor windowtext windowtext; padding: 0in 5.4pt; width: 337.5pt; height: 12.75pt; border-top-style: none;" width="450" valign="bottom" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;
                            SQL Filenames for Database changes with version number:
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: medium 1pt 1pt medium; padding: 0in 5.4pt; width: 261pt; height: 12.75pt; border-top-color: currentColor; border-bottom-color: windowtext; border-left-color: currentColor; border-top-style: none; border-left-style: none;" width="348" valign="bottom" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt;" align="center"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 10pt;"&gt;
                            implement.sql
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr style="height: 12.75pt; mso-yfti-irow: 6;"&gt;
                &lt;td style="border-width: medium 1pt 1pt; border-color: currentColor windowtext windowtext; padding: 0in 5.4pt; width: 337.5pt; height: 12.75pt; border-top-style: none;" width="450" valign="bottom" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;
                            SQL Filename for Database rollback with version number:
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: medium 1pt 1pt medium; padding: 0in 5.4pt; width: 261pt; height: 12.75pt; border-top-color: currentColor; border-bottom-color: windowtext; border-left-color: currentColor; border-top-style: none; border-left-style: none;" width="348" valign="bottom" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt;" align="center"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 10pt;"&gt;
                            rollback.sql
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr style="height: 12.75pt; mso-yfti-irow: 7;"&gt;
                &lt;td style="border-width: medium 1pt 1pt; border-color: currentColor windowtext windowtext; padding: 0in 5.4pt; width: 337.5pt; height: 12.75pt; border-top-style: none;" width="450" valign="bottom" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;
                            Activebatch job location (source/destination)
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: medium 1pt 1pt medium; padding: 0in 5.4pt; width: 261pt; height: 12.75pt; border-top-color: currentColor; border-bottom-color: windowtext; border-left-color: currentColor; border-top-style: none; border-left-style: none;" width="348" valign="bottom" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 10pt;"&gt;
                            &<code>nbsp</code>;
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr style="height: 12.75pt; mso-yfti-irow: 8;"&gt;
                &lt;td style="border-width: medium 1pt 1pt; border-color: currentColor windowtext windowtext; padding: 0in 5.4pt; width: 337.5pt; height: 12.75pt; border-top-style: none;" width="450" valign="bottom" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;
                            (Configuration) File directories
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: medium 1pt 1pt medium; border-color: currentColor windowtext windowtext currentColor; padding: 0in 5.4pt; width: 261pt; height: 12.75pt; border-top-style: none; border-left-style: none;" width="348" valign="bottom" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 10pt;"&gt;
                            &<code>nbsp</code>;
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr style="height: 12.75pt; mso-yfti-irow: 9; mso-yfti-lastrow: yes;"&gt;
                &lt;td style="border-width: medium 1pt 1pt; border-color: currentColor windowtext windowtext; padding: 0in 5.4pt; width: 337.5pt; height: 12.75pt; border-top-style: none;" width="450" valign="bottom" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 9pt;"&gt;
                            Affected Core table or Shared Object (If applicable):
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: medium 1pt 1pt medium; padding: 0in 5.4pt; width: 261pt; height: 12.75pt; border-top-color: currentColor; border-bottom-color: windowtext; border-left-color: currentColor; border-top-style: none; border-left-style: none;" width="348" valign="bottom" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt;" align="center"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 10pt;"&gt;
                            {{ $databaseTables->implode(', ') }}
                            &lt;o:p&gt;&lt;/o:p&gt;
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
            &lt;/tr&gt;
        &lt;/tbody&gt;
    &lt;/table&gt;
&lt;/div&gt;
@endif
@if ($instructions->isNotEmpty())
&lt;div&gt;&lt;br&gt;&lt;/div&gt;
&lt;div&gt;
    &lt;table class="MsoNormalTable" style="width: 598.5pt;" width="0" cellspacing="0" cellpadding="0"&gt;
        &lt;tbody&gt;
            &lt;tr style="height: 35.05pt; mso-yfti-irow: 0; mso-yfti-firstrow: yes; mso-yfti-lastrow: yes;"&gt;
                &lt;td style="border-width: 1pt; border-color: windowtext; padding: 0in 5.4pt; width: 150pt; height: 35.05pt;" width="450" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="text-align: left; line-height: normal; margin-bottom: 0pt;"&gt;
                        &lt;b&gt;
                            &lt;span style="color: red; font-family: &<code>quot</code>;Arial&<code>quot</code>;,sans-serif; font-size: 10pt; mso-fareast-font-family: &<code>quot</code>;Times New Roman&<code>quot</code>;; mso-fareast-language: EN-PH;"&gt;
                                Special Instructions
                            &lt;/span&gt;
                        &lt;/b&gt;
                        &lt;b&gt;
                            &lt;span style="font-family: Arial, sans-serif; font-size: 10pt;"&gt;
                                &lt;o:p&gt;&lt;/o:p&gt;
                            &lt;/span&gt;
                        &lt;/b&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
                &lt;td style="border-width: 1pt; border-color: windowtext; padding: 0in 5.4pt; width: 448.5pt; height: 35.05pt;" width="450" nowrap=""&gt;
                    &lt;p class="MsoNormal" style="line-height: normal; margin-bottom: 0pt;"&gt;
                        &lt;span style="font-family: Arial, sans-serif; font-size: 10pt;"&gt;
                            @foreach ($tickets as $ticket)
                                &lt;b&gt;{{ $ticket->code }}&lt;/b&gt;&lt;br&gt;
                                @foreach ($instructions->where('ticket_id', $ticket->id) as $instruction)
                                    ({{ $environments[$instruction->environment_id]->name }}) For {{ $supportTeams[$instruction->support_team_id]->name }} Team:&lt;br&gt;
                                    {{ $instruction->instruction }}&lt;br&gt;
                                    &lt;br&gt;
                                @endforeach
                            @endforeach
                        &lt;/span&gt;
                    &lt;/p&gt;
                &lt;/td&gt;
            &lt;/tr&gt;
        &lt;/tbody&gt;
    &lt;/table&gt;
&lt;/div&gt;
@endif
