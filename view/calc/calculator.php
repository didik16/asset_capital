<?php include 'config/base_url.php'; ?>
<!DOCTYPE html>
<html lang="en" class="no-js">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Retirement Planner </title>

    <link href="<?php echo ASSET_URL ?>css/calc/ej-main.css" rel="stylesheet" type="text/css">

    <script src="<?php echo ASSET_URL ?>js/calc/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="<?php echo ASSET_URL ?>js/calc/jquery.cookie.js" type="text/javascript"></script>
    <script src="<?php echo ASSET_URL ?>js/calc/jquery.nouislider.all.js" type="text/javascript"></script>
    <script src="<?php echo ASSET_URL ?>js/calc/calc-retirement-en.js" type="text/javascript"></script>
    <script src="<?php echo ASSET_URL ?>js/calc/calc-nav.js" type="text/javascript"></script>

</head>

<body data-locale="US-en">

    <!-- Calculators -->
    <div class="ej-calculator">
        <!-- Retirement Planner -->
        <div id="calculatorID" formName="retirementPlanning" class="ej-calculator--header">
            <h2>Retirement Planner</h2>
            <p></p>
        </div>
        <!-- Results -->
        <!-- NOTE this block should not be shown until a result is calculated -->
        <div style="display:none;" class="ej-calculator--results" aria-live="polite" aria-hidden="false" role="presentation">
            <!-- Scenario 1 (Default) -->
            <div class="ej-calculator--results--scenario">
                <!-- NOTE Only show "Scenario 1: " if there is more than one scenario calculated -->
                <p id="minimumScenarioHeader" class="scenario--header"></p>
                <div class="scenario--bar-graph" aria-hidden="true" role="presentation">
                    <div id="minPotentialRetirementAmount" style="position: absolute; z-index: 25; right: 0px; color: #ffffff;">$0.00</div>
                    <div id="deferredMinimum" style="width: 30%;" class="scenario--bar-graph--estimated">$0.00</div>
                    <div id="minimumValueAtRetirement" class="scenario--bar-graph--potential"></div>
                </div>
                <p id="minimumScenarioFooter" class="scenario--footer"></p>
            </div>
            <!-- Scenario 2 -->
            <div class="ej-calculator--results--scenario">
                <p id="maximumScenarioHeader" class="scenario--header"></p>
                <div class="scenario--bar-graph" aria-hidden="true" role="presentation">
                    <div id="maxPotentialRetirementAmount" style="position: absolute; z-index: 25; right: 0px; color: #ffffff;">$0.00</div>
                    <div id="deferredMaximum" style="width: 24%;" class="scenario--bar-graph--estimated" data-value="384058">$0.00</div>
                    <div id="maximumValueAtRetirement" class="scenario--bar-graph--potential">$0.00</div>
                </div>
                <p id="maximumScenarioFooter" class="scenario--footer"></p>
            </div>
        </div>
        <!-- END results -->
        <!-- Calculator - Retirement Planner -->
        <div class="ej-calculator--form">
            <form>
                <div class="ej-calculator--slider-group">
                    <label for="CurrentAge"><span class="helper__reader">Enter your </span>Current Age<span class="helper__reader"> in years</span></label>
                    <input type="text" id="CurrentAge" value="0">
                    <div id="currentAgeRetirementSlider" class="ej-ui-nouislider" aria-hidden="true" role="presentation" data-slider-type="currentAge"></div>
                </div>
                <div class="ej-calculator--slider-group">
                    <label for="RetirementAge"><span class="helper__reader">Enter your </span>Age Of Retirement</label>
                    <input type="text" id="RetirementAge" value="55">
                    <div id="enrollmentRetirementAgeSlider" class="ej-ui-nouislider" aria-hidden="true" role="presentation" data-slider-type="retirementYears"></div>
                </div>
                <div class="ej-calculator--slider-group">
                    <label for="BeginningContributionAge"><span class="helper__reader">Enter your </span>Starting Retirement Plan Age</label>
                    <input type="text" id="BeginningContributionAge" value="0">
                    <div id="beginningContributionAgeSlider" class="ej-ui-nouislider" aria-hidden="true" role="presentation" data-slider-type="contributionAgeSlider"></div>
                </div>
                <div class="ej-calculator--slider-group">
                    <label for="RateOfReturn"><span class="helper__reader">Enter your expected </span>Average Annual ROI </label>
                    <input type="text" id="RateOfReturn" value="0">
                    <div id="retirementRateSlider" class="ej-ui-nouislider" aria-hidden="true" role="presentation" data-slider-type="retirementRateSliderRange"></div>
                </div>
                <div class="ej-calculator--slider-group">
                    <label for="minAnnualContribution">Minimum Yearly Contributions</label>
                    <input type="text" id="minAnnualContribution" value="0">
                    <div id="minimumAnnualSlider" class="ej-ui-nouislider" aria-hidden="true" role="presentation" data-slider-type="dollarAmountSlider"></div>
                </div>
                <div class="ej-calculator--slider-group">
                    <label for="maxAnnualContribution">Maximum Yearly Contributions</label>
                    <input type="text" id="maxAnnualContribution" value="0">
                    <div id="maximumAnnualSlider" class="ej-ui-nouislider" aria-hidden="true" role="presentation" data-slider-type="dollarAmountSlider"></div>
                </div>
                <div class="ej-calculator--slider-group">
                    <label for="CurrentPlanValue"><span class="helper__reader">What is your </span>Initial Investment</label>
                    <input type="text" id="CurrentPlanValue" value="0">
                    <div id="currentPlanValueSlider" class="ej-ui-nouislider" aria-hidden="true" role="presentation" data-slider-type="dollarAmountSlider"></div>
                </div>
                <div class="ej-calculator--footer">
                    <button id="calculateRetirement" type="submit" class="button-button button__red">Calculate</button>
                    <!-- NOTE If this is a recalculation - where the visitor has changed value after a previous submit, or after a guided form - change the button text to read "Recalculate" -->
                </div>
            </form>
        </div>
        <!-- END calculator form -->

    </div>
    <!-- END calculator -->

</body>

</html>