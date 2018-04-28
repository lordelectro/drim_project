@extends('backend.layouts.app')


@section('content')

<!--
<head>
 
    
    <link href='../../drimbet/bundles/Content/om5b81.css?v=q6pq1uKy-SzWVMXdO3kyTa4E-ZLo666dHGqsIqpIggQ1' rel='stylesheet'/>

    <script src='../../drimbet2/bundles/om11ca.js?v=26sXOsfxk_KdIrFeehJbzdZNaXIcJ1jrnQPWQb_FprA1'></script>

</head>
<body id="opera-mini">
-->
    
    <div id="main">
        


<script>    var emptyBetslip = false;</script>
<section id="betslip">
    <div class="header bg-secondary clearfix">
      
    </div>
    <div class="panel highlights" id="betslipItems">
    	  <h2 >Betslip</h2>
        <script>
            var betslip = JSON.parse(GetBetslip());
            var totalPriceDecimal = parseFloat(0);
            if (betslip.length == null) {
                emptyBetslip = true;
                document.write('<div class="betslip-panel spacing-bottom clearfix">');
                document.write('<p>Your betslip is currently empty</p>');
            } else {
                for (var i = 0; i < betslip.length; i++) {
                    var bet = betslip[i];

                    if (totalPriceDecimal == 0) {
                        totalPriceDecimal = parseFloat(bet.PriceDecimal).toFixed(2);
                    } else {
                        totalPriceDecimal *= parseFloat(bet.PriceDecimal).toFixed(2);
                    }
                    document.write('<div class="betslip-panel spacing-bottom clearfix">');
                    document.write('  <span href="#" onclick="RemoveBet(\'' + bet.OutcomeId + '\')" class="pull-left delete">X</span>');
                    document.write(' <div class="betslip-panel-inner spacing-bottom">');
                    document.write('<b class="outcome-title pull-left">' + bet.Title + '</b>');
                    document.write(' <span class="pull-right"> ' + parseFloat(bet.PriceDecimal).toFixed(2) + '</span>');
                    document.write(' <span class="clearfix outcome-result"> ' + bet.MarketTitle + '</span>');
                    document.write(' <span class="clearfix outcome-eventTitle"> ' + bet.EventTitle + '</span>');
                    document.write(' </div>');
                    document.write(' </div>');
                }
            }
            var potentialReturn = totalPriceDecimal * 10;
        </script>
        <div id="showEmptyOptions" style="display: none">
            <p>Search for a game</p>
            <div id="searchContainer" class="srch-wrapper">
                <form action="" method="get">
                    <div class="input-group theFont clearfix spacing-bottom">
                        <table class="table" border="0" cellspacing="0" cellpadding="0">
                            <tbody>
                                <tr>
                                    <td>
                                        <input class="form-control" id="txtSearchKeyword" name="keyword" placeholder="Search" type="text" value="">
                                    </td>
                                    <td>
                                        <input type="submit" name="SearchButton" value="Search" class="btn btn-primary btn-full" onclick="return ValidateSearch();">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
        <div id="nonEmptyContainer">
            <div class="clearfix spacing-bottom">
                <button type="button" onclick="ClearBetslip();" name="button" class="btn btn-primary pull-left">Remove All</button>
                <span class="pull-right betslip-total-odds betslip-total-odds">
                    Total Odds:
                    <script>document.write(parseFloat(totalPriceDecimal).toFixed(2))</script>
                </span>
            </div>
            <div class="clearfix spacing-bottom betslip-total bet-amount">
                <p class="pull-left">Bet Amount<label class="clearfix "></label></p>
                    <label style="text-align: right" class="pull-right">
                        SSP
                            <input type="text" id="wagerAmount" value="50.00" class="betslip-total-input" onchange="UpdatePotentialReturn()" />
                    </label>
                    <span id="bet-amount-val" class="hidden error" style="display: block"></span>
            </div>
            <div class="clearfix spacing-bottom betslip-total potenial-return">
                <p class="pull-left" onclick="UpdatePotentialReturn();">Potential Return</p>
                <div class="pull-right">
                    <div style="text-align: left">
                        SSP
                        <input type="text" id="potentialReturn" name="" value="0" class="betslip-total-input" disabled="" />
                    </div>
                    </div>
                    <btn class="btn btn-primary pull-right clearfix" href="javascript:UpdatePotentialReturn();">Calculate Return</btn>
                </div>
        </div>

        <div class="clearfix spacing-bottom betslip-total potenial-return">
            <p>
                Limits may be applicable on your winnings. <a href="../terms-and-conditions.html">Click here</a> for more details.
            </p>
            <button type="button" onclick="PlaceBet('SSP ', 50.00);" name="button" class="btn btn-primary btn-full">Place Bet</button>
            <br /><br />
            <button type="button" onclick="PlaceFreeBet();" class="btn btn-primary btn-full" style="display:none">Use My Free Bet 0.00</button>
        </div>
    </div>
    </div>
</section>
<div class="betslip-footer">
</div>
<form action="" method="post" id="Back" name="Back"></form>
<script>
    if (emptyBetslip)
        showEmptyOptions();
    function UpdatePotentialReturn() {
        if (document.getElementById("wagerAmount") != null) {
            var wagerAmount = document.getElementById("wagerAmount").value;
            document.getElementById("potentialReturn").value = (wagerAmount * totalPriceDecimal).toFixed(2);
        }
    }
    function showEmptyOptions() {
        var ele = document.getElementById("showEmptyOptions");
        if (ele != null)
            ele.style.display = "inline-block";

        document.getElementById("nonEmptyContainer").style.display = "none";
    }
    function RemoveBet(outcome) {
        if (confirm("Are you sure you want to remove this bet?")) {
            SendToBetslip(outcome, '', '', '', '', '', '', '');
        }
        window.location.reload();
    }
    function ClearBetslip() {
        SetBetslip(new Object());
        window.location.reload();
    }
    function PlaceBet(sign, minBet) {
        var betModel = completeBetslip();
        var betAmountVal = document.getElementById("bet-amount-val");
        betAmountVal.className = "error hidden";
        betAmountVal.innerText = "";
        if (!betModel.WagerAmount) {
            betAmountVal.innerText = "Bet Amount cannot be empty or 0.";
            betAmountVal.className = "error";
            return;
        }
        if (betModel.WagerAmount < minBet) {
            betAmountVal.innerText = "A minimum bet of " + sign + "" + minBet.toFixed(2) + " is required";
            betAmountVal.className = "error";
        return;
        }
        post_to_url('placebetslip',
            { outcomes: betModel.Outcomes, WagerAmount: betModel.WagerAmount, TotalOdds: betModel.TotalOdds },
            'post');
    }
    function PlaceFreeBet() {
        var betModel = completeBetslip();
        var PossibleAmount = document.getElementById("potentialReturn").value;
        post_to_url('admin/PlaceBetslip',
            { outcomes: betModel.Outcomes,title:betModel.Title, WagerAmount: betModel.WagerAmount,
             TotalOdds: betModel.TotalOdds, possibleWin:PossibleAmount,IsFreeBet: true },
            'post');
    }

    completeBetslip = function () {
        var returnObject = new Object();
        returnObject.Outcomes = GetBetslip();
        returnObject.WagerAmount = document.getElementById("wagerAmount").value;
      //  returnObject.PossibleAmount = document.getElementById("potentialReturn").value;
        returnObject.TotalOdds = totalPriceDecimal;
        return returnObject;
    };
    UpdatePotentialReturn();
</script>
    </div>

    <script>SetOutcomeButtons(); SetInlineOptions(); UpdateBetCount();</script>

    <!--
</body>


</html>
-->

@endsection