function OnPasswordResetRedirect(){$("#confirmPasswordReset").prop("disabled",!0);var n=3,t=setInterval(function(){$("#redirectMessage").html("Redirecting in "+n+" seconds");n===0&&(clearInterval(t),$("#redirectMessage").html(""),showOverlay(),window.location="/");n--},1e3)}function ResetPassword(n,t){n.preventDefault();showOverlay();pat.post("/Account/ResetPassword",t,{dataType:"html"}).done(function(n){$("#subsection").html(n);$("#subsection").show();closeOverlay()})}function ConfirmResetPassword(n){var t=$("#ConfirmResetPassword").serializeArray();n.preventDefault();showOverlay();pat.post("/Account/ConfirmPasswordReset",t).done(function(n){$("#subsection").length>0?($("#subsection").html(n),$("#subsection").show()):$("#resetP")!=null&&$("#resetP").html(n);closeOverlay()})}function setActiveOption(n,t){var r=JSON.parse(t.replace(/&quot;/g,'"'));for(i=0;i<r.length;i++)n===r[i]?($("#"+r[i]).removeClass(r[i]+"-icon"),$("#"+r[i]).addClass(r[i]+"-icon-active"),$("#"+r[i]).addClass("selectedOption")):($("#"+r[i]).removeClass(r[i]+"-icon-active"),$("#"+r[i]).removeClass("selectedOption"),$("#"+r[i]).addClass(r[i]+"-icon"))}function GetAccountOption(n){showOverlay();window.location.href=n}function GetTransactions(n,t){var i=parseInt($("#CurrentPage").val()),r;i++;$("#CurrentPage").val(i);typeof t!="undefined"&&typeof n!="undefined"&&(SelectedTransactionTypeSourceId=n,i=1,$("#transactionSummary > tbody").html(""),r=$("#Source_"+n).text().trim()+" Transactions",$("#filtertransaction-button").html(r+'<span class="glyphicon glyphicon-menu-down fade-a-bit"><\/span>'));pat.post("/Account/_TransactionSummaryPage",{model:{TransactionTypeSourceId:SelectedTransactionTypeSourceId,isSourceChange:t,currentPage:i,recordTotal:$("#RecordTotal").val(),pageSize:$("#PageSize").val()}},{dataType:"html"}).done(function(n){var t=jQuery.parseJSON(n);$("#transactionSummary > tbody:last-child").append(t.data);$("#RecordTotal").val(t.modelData.RecordTotal);isShowMoreVisible(i,$("#PageSize").val(),$("#RecordTotal").val())})}function showHideDepositWithdrawalDiv(n){jQuery("div.deposit-type-detail").hide();var t=jQuery("div#"+n.replace(/\//g,"_"));jQuery("div#"+n).show()}function isShowMoreVisible(n,t,i){var r=parseInt(n),u=parseInt(t),f=parseInt(i);r*u<i?showHideShowMore("show"):showHideShowMore("hide")}function showHideShowMore(n){n==="hide"?$("#showMore").hide():$("#showMore").show()}function onWithdrawClick(n,t){showOverlay();pat.post(n,t).done(function(n){$("#withdrawalType").html(n);$("#withdrawalType").show();closeOverlay()})}function onUpdateDetailsClick(n,t){showOverlay();pat.post(n,t).done(function(n){$("#subsection").html(n);$("#subsection").show();closeOverlay()})}function onVoucherClick(n){showOverlay();pat.post("/Account/Deposit",n,{dataType:"html"}).done(function(n){n.indexOf("voucherPartial")>=0?($("#voucherPartial").html(""),$("#voucherPartial").html(n)):($("#deposit-form").html(""),$("#deposit-form").html(n));closeOverlay()})}function onOTTVoucherClick(n){showOverlay();pat.post("/Account/OTTVoucherDeposit",n,{dataType:"html"}).done(function(n){var t=JSON.parse(n);$("#errorDiv").html("");$("#successDiv").html("");t.Error?$("#errorDiv").html(t.Message):(RefreshCashBalance(),$("#successDiv").html(t.Message));closeOverlay()})}function onVoucherDepositClick(n){showOverlay();pat.post("/Account/DepositVoucher",n,{dataType:"html"}).done(function(n){n.indexOf("voucherPartial")>=0?($("#voucherPartial").html(""),$("#voucherPartial").html(n)):($("#deposit-form").html(""),$("#deposit-form").html(n));closeOverlay()})}function onRegisterDepositConfirmation(){showOverlay();pat.post("/Account/RegisterDepositConfirmation",null,{dataType:"html"}).done(function(n){n.indexOf("voucherPartial")>=0?($("#voucherPartial").html(""),$("#voucherPartial").html(n)):($("#deposit-form").html(""),$("#deposit-form").html(n));closeOverlay()})}function GetWithdrawalOption(n){showOverlay();pat.post("/Account/_WithdrawalOption",{withDrawalOption:n}).done(function(n){$("#withdrawalType").html(n);$("#withdrawalType").show();closeOverlay()})}function GetBetslipSearchResults(){showOverlay();pat.post("/Account/GetBetslips",{numberToReturn:"10",alreadyLoaded:"0",settlementType:"0",betslipSequenceId:"2333"}).done(function(n){$("#OpenBets").html(n);$("#OpenBets").show();closeOverlay()})}function GetBetslipDetail(n,t,i){var r;t==1?(r="#Settled_"+n,label=$(".stldBtn_"+n),$(".betView").not(r).hide(),$(".betDetailsBtn").not(label).html("Details")):(r="#Open_"+n,label=$(".opnBtn_"+n),$(".betView").not(r).hide(),$(".betDetailsBtn").not(label).html("Details"));$(r).toggle();i?$(".btnRoundArrow-"+n).hasClass("glyphicon-triangle-bottom")?($(".btnRoundDownArrow").removeClass("glyphicon-triangle-top").addClass("glyphicon-triangle-bottom"),$(".btnRoundArrow-"+n).addClass("glyphicon-triangle-top").removeClass("glyphicon-triangle-bottom")):$(".btnRoundArrow-"+n).addClass("glyphicon-triangle-bottom").removeClass("glyphicon-triangle-top"):(console.log("HTML:::: ",$(".opnBtn_"+n).html()),$(".opnBtn_"+n).html()=="Details"?$(".opnBtn_"+n).html("Close"):$(".opnBtn_"+n).html("Details"),$(".stldBtn_"+n).html()=="Details"?$(".stldBtn_"+n).html("Close"):$(".stldBtn_"+n).html("Details"))}function togglePagerBtns(n){n=="settled"?$("#betsContainerSettled .betSrcCont").length<=10?$(".pageBtns").hide():$(".pageBtns").show():($("#openTab").hasClass("active")||n=="open")&&($("#betsContainer .betSrcCont").length<=10?$(".pageBtns").hide():$(".pageBtns").show());$("#bgBtn").hasClass("active")&&$(".pageBtns").hide()}function checkFltr(n){$(".srcError").hide();var t=$(".fltrBtns label");n=="open"?(t.css("pointer-events","none"),$(".fltrBtns").hide()):(t.css("pointer-events","auto"),t.removeAttr("disabled"),$("#dfBtn").hasClass("active")?$(".fltrBtns").show():$(".fltrBtns").hide());$(".fltrBtns label").removeClass("active");$(".fltrBtns #All").parent().addClass("active");togglePagerBtns(n)}function fltrOutcomes(n){$(".settledBets").hide();$("#page_navigation_settled").hide();n=="won"?($('div[outcome="2"], div[outcome="3"], div[outcome="7"]').show(),$(".settledBets:visible").length>=1?$(".srcError").hide():$(".srcError").show(),$(".pageBtns").hide()):n=="lost"?($('div[outcome="4"], div[outcome="5"]').show(),$(".settledBets:visible").length>=1?$(".srcError").hide():$(".srcError").show(),$(".pageBtns").hide()):($(".settledBets").show(),$(".settledBets:visible").length>=1?$(".srcError").hide():$(".srcError").show(),pagerSettled(),togglePagerBtns("settled"))}function betSort(n,t){var c,i,e,r,h,o,l=0,s,u,f;for(c=$("#betsContainer"),e=!0,o=t==""||t==null?"asc":t,s=".bet-"+n;e;){for(e=!1,r=c.children(".betSrcCont"),i=0;i<r.length-1;i++)if(h=!1,n=="date"?(u=$(r[i]).find(s).find("p").html().toLowerCase(),f=$(r[i+1]).find(s).find("p").html().toLowerCase()):(u=$(r[i]).find(s).find("span").html().toLowerCase(),f=$(r[i+1]).find(s).find("span").html().toLowerCase()),(n!="date"||n!="id")&&(u=parseFloat(u.replace(/\D/g,"")),f=parseFloat(f.replace(/\D/g,""))),o=="asc"){if(u>f){h=!0;break}}else if(o=="desc"&&u<f){h=!0;break}h?(r[i].parentNode.insertBefore(r[i+1],r[i]),e=!0,l++):l==0&&o=="asc"&&(o="desc",e=!0)}}function betSortSet(n,t){var c,i,e,r,h,o,l=0,s,u,f;for(c=$("#betsContainerSettled"),e=!0,o=t==""||t==null?"asc":t,s=".bet-"+n;e;){for(e=!1,r=c.children(".settledBets"),i=0;i<r.length-1;i++)if(h=!1,n=="date"?(u=$(r[i]).find(s).find("p").html().toLowerCase(),f=$(r[i+1]).find(s).find("p").html().toLowerCase()):(u=$(r[i]).find(s).find("span").html().toLowerCase(),f=$(r[i+1]).find(s).find("span").html().toLowerCase()),(n!="date"||n!="id")&&(u=parseFloat(u.replace(/\D/g,"")),f=parseFloat(f.replace(/\D/g,""))),o=="asc"){if(u>f){h=!0;break}}else if(o=="desc"&&u<f){h=!0;break}h?(r[i].parentNode.insertBefore(r[i+1],r[i]),e=!0,l++):l==0&&o=="asc"&&(o="desc",e=!0)}}function betSortSetLiveGames(n,t){var c,i,e,r,h,o,l=0,s,u,f;for(c=t=="settled"?$("#LiveNumbersSettledBetsList"):$("#LiveNumbersOpenBetsList"),e=!0,o="asc",s=".live-"+n;e;){for(e=!1,r=t=="open"?c.children(".openBets"):c.children(".settledBets"),i=0;i<r.length-1;i++)if(h=!1,n=="wagerAmount"||n=="actualReturn"?(u=$(r[i]).find(s).html().toLowerCase().trim().replace(/\D/g,""),f=$(r[i+1]).find(s).html().toLowerCase().trim().replace(/\D/g,"")):(u=$(r[i]).find(s).html().toLowerCase(),f=$(r[i+1]).find(s).html().toLowerCase()),n!="date"&&(u=parseFloat(u.replace(/\D/g,"")),f=parseFloat(f.replace(/\D/g,""))),o=="asc"){if(u>f){h=!0;break}}else if(o=="desc"&&u<f){h=!0;break}h?(r[i].parentNode.insertBefore(r[i+1],r[i]),e=!0,l++):l==0&&o=="asc"&&(o="desc",e=!0)}}function pagerSettled(){var i=10,r=$("#betsContainerSettled").children().length,t,n;for(number_of_pages_settled=Math.ceil(r/i),$("#current_page_settled").val(0),$("#show_per_page_settled").val(i),t='<a class="previous_link btn btn-primary" href="javascript:previousStld();">Prev<\/a>',n=0;number_of_pages_settled>n;)t+='<a class="page_link btn btn-primary" href="javascript:go_to_pageStld('+n+')" longdesc="'+n+'">'+(n+1)+"<\/a>",n++;t+='<a class="next_link btn btn-primary" href="javascript:nextStld();">Next<\/a>';$("#page_navigation_settled").html(t);$("#page_navigation_settled .page_link:first").addClass("active_page");$("#betsContainerSettled").children().css("display","none");$("#betsContainerSettled").children().slice(0,i).css("display","block");pageNoSettled()}function previousStld(){new_page=parseInt($("#current_page_settled").val())-1;$("#page_navigation_settled .active_page").prev(".page_link").length==!0&&go_to_pageStld(new_page);pageNoSettled()}function nextStld(){new_page=parseInt($("#current_page_settled").val())+1;$("#page_navigation_settled .active_page").next(".page_link").length==!0&&go_to_pageStld(new_page);pageNoSettled()}function go_to_pageStld(n){var t=parseInt($("#show_per_page_settled").val());start_from=n*t;end_on=start_from+t;$("#betsContainerSettled").children().css("display","none").slice(start_from,end_on).css("display","block");$("#page_navigation_settled .page_link[longdesc="+n+"]").addClass("active_page").siblings(".active_page").removeClass("active_page");$("#current_page_settled").val(n);pageNoSettled()}function pageNoSettled(){$("#current_page_settled").val()==0?($("#page_navigation_settled .previous_link").css("pointer-events","none"),$("#page_navigation_settled .previous_link").attr("disabled","disabled"),$("#page_navigation_settled .next_link").css("pointer-events","all"),$("#page_navigation_settled .next_link").removeAttr("disabled")):$("#current_page_settled").val()==number_of_pages_settled-1?($("#page_navigation_settled .next_link").css("pointer-events","none"),$("#page_navigation_settled .next_link").attr("disabled","disabled"),$("#page_navigation_settled .previous_link").css("pointer-events","all"),$("#page_navigation_settled .previous_link").removeAttr("disabled")):($("#page_navigation_settled .previous_link, #page_navigation_settled .next_link").css("pointer-events","all"),$("#page_navigation_settled .previous_link, #page_navigation_settled .next_link").removeAttr("disabled"));number_of_pages_settled<=1&&($("#page_navigation_settled .previous_link").css("pointer-events","none"),$("#page_navigation_settled .previous_link").attr("disabled","disabled"),$("#page_navigation_settled .next_link").css("pointer-events","none"),$("#page_navigation_settled .next_link").attr("disabled","disabled"))}function pager(){var i=10,r=$("#betsContainer").children().length,t,n;for(number_of_pages=Math.ceil(r/i),$("#current_page").val(0),$("#show_per_page").val(i),t='<a class="previous_link btn btn-primary" href="javascript:previous();">Prev<\/a>',n=0;number_of_pages>n;)t+='<a class="page_link btn btn-primary" href="javascript:go_to_page('+n+')" longdesc="'+n+'">'+(n+1)+"<\/a>",n++;t+='<a class="next_link btn btn-primary" href="javascript:next();">Next<\/a>';$("#page_navigation_open").html(t);$("#page_navigation_open .page_link:first").addClass("active_page");$("#betsContainer").children().css("display","none");$("#betsContainer").children().slice(0,i).css("display","block");pageNo()}function previous(){new_page=parseInt($("#current_page").val())-1;$("#page_navigation_open .active_page").prev(".page_link").length==!0&&go_to_page(new_page);pageNo()}function next(){new_page=parseInt($("#current_page").val())+1;$("#page_navigation_open .active_page").next(".page_link").length==!0&&go_to_page(new_page);pageNo()}function go_to_page(n){var t=parseInt($("#show_per_page").val());start_from=n*t;end_on=start_from+t;$("#betsContainer").children().css("display","none").slice(start_from,end_on).css("display","block");$("#page_navigation_open .page_link[longdesc="+n+"]").addClass("active_page").siblings(".active_page").removeClass("active_page");$("#current_page").val(n);pageNo()}function pageNo(){$("#current_page").val()==0?($(".previous_link").css("pointer-events","none"),$(".previous_link").attr("disabled","disabled"),$(".next_link").css("pointer-events","all"),$(".next_link").removeAttr("disabled")):$("#current_page").val()==number_of_pages-1?($(".next_link").css("pointer-events","none"),$(".next_link").attr("disabled","disabled"),$(".previous_link").css("pointer-events","all"),$(".previous_link").removeAttr("disabled")):($(".previous_link, .next_link").css("pointer-events","all"),$(".previous_link, .next_link").removeAttr("disabled"));number_of_pages<=1&&($(".previous_link").css("pointer-events","none"),$(".previous_link").attr("disabled","disabled"),$(".next_link").css("pointer-events","none"),$(".next_link").attr("disabled","disabled"))}function PrepopulateBranchCode(n){$("#BranchCode").prop("readOnly",!0);$("#BranchCode").val(n);$("#BranchCode").val()===""&&$("#BranchCode").prop("readOnly",!1);$("#BranchCodeInput").prop("readOnly",!0);$("#BranchCodeInput").val(n);$("#BranchCodeInput").val()===""&&$("#BranchCodeInput").prop("readOnly",!1)}function PrepopulateBranchCodeNg(n){document.getElementById("BranchCode").value=n.value}function PrepopulateBankAccount(){var n=$("#bankAccountNumberdId option:selected").val();n==="Select New Account"||n===""?(document.getElementById("accountNumberSectiontId").style.display="block",document.getElementById("AccountNumberId").value="",ResetListOfBanks()):(document.getElementById("accountNumberSectiontId").style.display="none",FilterBankByAccount(n),document.getElementById("AccountNumberId").value=n)}function ResetListOfBanks(){$("#BankId").val($("#BankId option:first").val())}function FilterBankByAccount(n){var t="";$("#accountAttributesId > option").each(function(){this.value===n&&(t=this.text,SetSelectedBank(t))})}function SetSelectedBank(n){$("#BankId option").prop("selected",!1).filter(function(){if(n!==""&&$(this).text()===n)return PrepopulateBranchCodeNg(this),$(this).text()===n}).prop("selected",!0)}function getBankNameAfterSave(){var n=document.getElementById("bankNameId").value,i=$("#bankAccountNumberdId option:selected").val(),r=document.getElementById("AccountNumberId").value,t=i===""||i==="Select New Account";n!==""&&t&&(SetSelectedBank(n),document.getElementById("accountNumberSectiontId").style.display="block");r===""&&t&&(ResetListOfBanks(),document.getElementById("accountNumberSectiontId").style.display="block");n===""||t||(SetSelectedBank(n),document.getElementById("accountNumberSectiontId").style.display="none")}function OnDeleteAccount(){var n=$("#BankId option:selected").text(),t=document.getElementById("AccountNumberId").value;$("#accountGroupId > option").each(function(){var u=this.text,i=u.split("|"),r=i[0],f=i[1];f===n&&r===t&&(RemoveAccountAttribute(this.value),ResetListOfBanks(),document.getElementById("AccountNumberId").value="",$("#bankAccountNumberdId option[value="+r+"]").remove())});location.reload()}function depositButtonOrPopup(){pat.post("/Account/DepositText").done(function(n){console.log("hehe",n)})}function ReadOnlyEmptyDropdown(n){var t=document.getElementById(n);t!=null&&(t.options.length===1&&t.setAttribute("readonly",!0),t.setAttribute("onclick","return false;"))}function ValidatePayment(n,t,i){var f=t,a,u,v;f===0&&(f=10);var s=i,r=document.getElementById(n+"errorDiv"),e=document.getElementById(n+"PaygatePaymentRequest_FirstName"),h=document.getElementById(n+"PaygatePaymentRequest_LastName"),c=document.getElementById(n+"PaygatePaymentRequest_Email"),l=document.getElementById(n+"PaygatePaymentRequest_Line1"),o=document.getElementById(n+"PaygatePaymentRequest_Amount").value;if(o!=null){if(f>0&&o<f)return r.innerHTML="This amount is below the minimum limit of R"+f+".",!1;if(s>0&&o>s)return console.log("This amount is above the configured max limit of "+s),!1;if(n=="BT"&&e.value.length+h.value.length>21)return r.innerHTML="The maximum amount of characters on EFT payments for First Name and Last Name is 21",document.getElementById(n+"_lastNamefield").style.display="",e.focus(),document.getElementById(n+"_firstNamefield").style.display="",!1;if(a=parseInt(o),u=!0,a>0)if(n=="BT"&&(c.value.length<=0&&(r.innerHTML="Please complete email",c.focus(),document.getElementById(n+"_emailfield").style.display="",u=!1),e.value.length<=0&&(r.innerHTML="Please complete first name",e.focus(),document.getElementById(n+"_firstNamefield").style.display="",u=!1),h.value.length<=0&&(r.innerHTML="Please complete last name",h.focus(),document.getElementById(n+"_lastNamefield").style.display="",u=!1),l.value.length<=0&&(r.innerHTML="Please complete address line 1",document.getElementById(n+"_line1field").style.display="",l.focus(),u=!1)),u){window.location.hash="#"+n+"_payframeInfo";switch(n){case"iPay_":InitIPay(n);break;default:InitPaygate(n)}}else return!1;else return v=document.getElementById(n+"errorDiv"),v.innerHTML="Please enter an amount",!1;return showOverlay(),!0}return!1}function ValidatePaymentStack(n,t,i){var u=t,o,s,h;u===0&&(u=10);var f=i,e=document.getElementById(n+"errorDiv"),r=document.getElementById(n+"PaystackPaymentRequest_Amount").value,c=parseFloat(document.getElementById(n+"PaystackPaymentRequest_Amount").value).toPrecision(21);if(!r.match(/^\d+$/))return e.innerHTML="This amount is invalid. Please provide a valid amount",!1;if(parseFloat(r).toPrecision(21)>f)return e.innerHTML="This amount is greater than the maximum limit allowed",!1;if(r!=null){if(u>0&&r<u)return e.innerHTML="This amount is below the minimum limit of NGN"+u+".",!1;if(f>0&&Number(r)>f)return console.log("This amount is above the configured max limit of "+f),alert("error  2"),!1;if(o=parseInt(r),s=!0,o>0)s&&(window.location.hash="#"+n+"_payframeInfo",InitPaystack(n));else return!1}else return h=document.getElementById(n+"errorDiv"),h.innerHTML="Please enter an amount",!1;return showOverlay(),!0}function ValidatePaymentMTN(n,t,i){var r=t,e,o,s;r===0&&(r=10);var h=i,f=document.getElementById(n+"errorDiv"),u=document.getElementById(n+"MTNPaymentRequest_Amount").value,c=parseFloat(document.getElementById(n+"MTNPaymentRequest_Amount").value).toPrecision(21);if(!u.match(/^\d+$/))return f.innerHTML="This amount is invalid. Please provide a valid amount",!1;if(parseFloat(u).toPrecision(21)>h)return f.innerHTML="This amount is greater than the maximum limit allowed",!1;if(u!=null){if(r>0&&u<r)return f.innerHTML="This amount is below the minimum limit of ZMW"+r+".",!1;if(e=parseInt(u),o=!0,e>0)o&&(window.location.hash="#"+n+"_payframeInfo",InitMTN(n));else return!1}else return s=document.getElementById(n+"errorDiv"),s.innerHTML="Please enter an amount",!1;return showOverlay(),!0}function setAmount(n,t,i,r){var u=document.getElementById(t+r);u!=null&&(u.value="",u.value=n);i!=null&&($(".isSelected").removeClass("isSelected"),i.className+=" isSelected")}function formatMoney(n){n.value=Number(n.value).toFixed(0)}function InitPaygate(n){document.body.contains(document.getElementById("frmPayDetails"))&&document.getElementById("frmPayDetails").remove();document.body.contains(document.getElementById("PayGateFramed_"+n))&&document.getElementById("PayGateFramed_"+n).remove();pat.post("/account/Init_Paygate?PaymentMethod="+n,$("#"+n+"_paymentInit").serializeArray()).done(function(t){$("#"+n+"PaygateContainer")[0].innerHTML=t}).done(function(){document.getElementById("frmPayDetails")!=null&&document.getElementById("frmPayDetails").submit();closeOverlay()})}function InitPaystack(n){document.body.contains(document.getElementById("frmPayDetails"))&&document.getElementById("frmPayDetails").remove();document.body.contains(document.getElementById("PayStackFramed_"+n))&&document.getElementById("PayStackFramed_"+n).remove();pat.post("/account/Init_Paystack?PaymentMethod="+n,$("#"+n+"_paymentInit").serializeArray()).done(function(t){$("#"+n+"PaystackContainer")[0].innerHTML=t}).done(function(){document.getElementById("frmPayDetails")!=null&&document.getElementById("frmPayDetails").submit();closeOverlay()})}function InitIPay(n){pat.post("/account/Init_ipay?",$("#"+n+"_paymentInit").serializeArray()).done(function(t){$("#"+n+"IpayContainer")[0].innerHTML=t}).done(function(){document.getElementById("frmPayDetails")!=null&&document.getElementById("frmPayDetails").submit();closeOverlay()})}function InitMTN(n){pat.post("/account/Init_MTN?PaymentMethod="+n,$("#"+n+"_paymentInit").serializeArray()).done(function(t){$("#"+n+"MTNContainer")[0].innerHTML=t}).done(function(){document.getElementById("frmPayDetails")!=null&&document.getElementById("frmPayDetails").submit();closeOverlay()})}function ToggleRemoveButton(){document.getElementById("selSavedtoken")!=null&&document.getElementById("selSavedtoken").selectedIndex>0?(document.getElementById("removeCardButton").style.display="",document.getElementById("SaveCardDiv").style.display="none"):(document.getElementById("removeCardButton").style.display="none",document.getElementById("SaveCardDiv").style.display="")}function ToggleRemoveButton(n){var i=n.id,t=i.substring(0,2),r="CC",u="DC";document.getElementById("cardTokenId").value=n.value;t===r&&n.value!==""?(document.getElementById(t+" removeCardButton").style.display="block",document.getElementById(u+" removeCardButton").style.display="none",document.getElementById("removedTokenId").value=i):t===u&&n.value!==""?(document.getElementById(t+" removeCardButton").style.display="block",document.getElementById(r+" removeCardButton").style.display="none",document.getElementById("removedTokenId").value=i):(document.getElementById(r+" removeCardButton").style.display="none",document.getElementById(u+" removeCardButton").style.display="none")}function RemoveNGSelectedCard(){var n=document.getElementById("cardTokenId").value;confirm("Are you sure you want to remove this card?")&&RemoveSavedPaymentToken(n)}function RemoveSelectedCard(){var n=document.getElementById("selSavedtoken").value;confirm("Are you sure you want to remove this card?")&&RemoveSavedPaymentToken(n)}function RemoveSavedPaymentToken(n){pat.post("/Account/RemoveSavedPaymenToken",{tokenIdentifier:n}).done(function(t){var i,r;if(t.result===!0){for(i=document.getElementById(document.getElementById("removedTokenId").value),r=0;r<=i.length;r++)i[r].value===n&&(i.removeChild(i[r]),window.location.href="/Account/DepositFunds");document.getElementById("removedTokenId").value=""}})}function RemoveAccountAttribute(n){pat.post("/Account/DeleteAccountAttribute",{groupId:n}).done(function(){})}function onRegSuccess(n){n.url&&(window.location.href=n.url)}function showPwd(){$(".passwordToggle").attr("psswd-shown")=="true"?($(".passwordToggle").removeAttr("type"),$(".passwordToggle").attr("type","password"),$(".passwordToggle").removeAttr("psswd-shown"),$(".passwordToggle").attr("psswd-shown","false"),$("#showPassword").removeClass("glyphicon-eye-close"),$("#showPassword").addClass("glyphicon-eye-open")):($(".passwordToggle").removeAttr("type"),$(".passwordToggle").attr("type","text"),$(".passwordToggle").removeAttr("psswd-shown"),$(".passwordToggle").attr("psswd-shown","true"),$("#showPassword").removeClass("glyphicon-eye-open"),$("#showPassword").addClass("glyphicon-eye-close"))}function GetInputValue(n,t,i){var r=$("#Amount").val();document.getElementById("withdrawalLimit").innerHTML=r>t?"<p>Amount greater than allowed daily limit<\/p>":r<n?"<p>Amount less than withdrawal daily limit<\/p>":r>i?"<p>Amount Greater than remaining limit<\/p>":"<p><\/p>"}function toggleFICAUploadActive(){var n=!1,t=document.getElementById("proofIdFile").innerHTML,i=document.getElementById("proofIdFileMobile").innerHTML;t!==""&&t!==noFileSelectedText&&(n=!0);i!==""&&i!==noFileSelectedText&&(n=!0);n&&proofIdMobileSize&&fileTypeValid?(document.getElementById("fica-submission-button-mobile").disabled=!1,document.getElementById("fileuploads").className="fica-subheading"):(document.getElementById("fica-submission-button-mobile").disabled=!0,document.getElementById("fileuploads").className="fica-subheading-disabled");n&&proofIdSize&&fileTypeValid?(document.getElementById("fica-submission-button").disabled=!1,document.getElementById("fileuploads").className="fica-subheading"):(document.getElementById("fica-submission-button").disabled=!0,document.getElementById("fileuploads").className="fica-subheading-disabled")}function setDisplay(n,t){if(t.length===0)document.getElementById(n).innerHTML=noFileSelectedText;else{var i=t.split("\\");i.length>0&&i.constructor===Array&&(t=i[i.length-1],document.getElementById(n).innerHTML=t)}toggleFICAUploadActive()}function showFICAPopup(){BindFileUploads();$("#fica-popup-modal").modal({backdrop:"static",keyboard:!1})}function submitFicaDetailsAsync(n,t){var u,r,i;event.preventDefault();r="";i="";i=n=="true"?$("#ficaProofMobile"):$("#ficaProof");r=i.attr("action");showOverlay();i.attr("enctype")=="multipart/form-data"&&(u=new FormData(i.get(0)),contentType=!1,processData=!1);$.ajax({type:"POST",url:r,data:u,dataType:"html",contentType:contentType,processData:processData,success:function(n){t.toLowerCase()=="true"?window.location.href="/Account/MyAccount":($(".modal-backdrop.fade.in").remove(),$("#fica-modal-upload-items").html(n),$("#fica-modal-upload-items").hide(),$("#modal-container-ficauploadresult").show(),closeOverlay())},error:function(n,t,i){$("#subsection").innerHTML=i;$("#subsection").show();closeOverlay()}})}function showFicaComplete(){$("#modal-container-ficauploadresult").modal();$("#modal-container-ficauploadresult").show();$("#modal-container-ficastatus-upload").hide()}function submitFicaDetailsAsyncMobile(){var n,t,i;event.preventDefault();t=$("#ficaProofMobile").attr("action");showOverlay();$("#ficaProofMobile").attr("enctype")=="multipart/form-data"&&(i=new FormData($("#ficaProofMobile")),n=new FormData($("#ficaProofMobile").get(0)),contentType=!1,processData=!1);$.ajax({type:"POST",url:t,data:n,dataType:"html",contentType:contentType,processData:processData,success:function(){$(".modal-backdrop.fade.in").remove();$("#modal-container-ficauploadresult").modal();$("#modal-container-ficauploadresult").show();$("#modal-container-ficastatus-upload").hide();closeOverlay()},error:function(n,t,i){$("subsection").innerHTML=i;$("#subsection").show();closeOverlay()}})}function clearFICAValidationError(n){if(n!==null){$("#"+n).remove();var t=$("#fica-errors ul li").length;t===0&&($("#fica-errors div").removeClass("validation-summary-errors"),$("#fica-errors div").addClass("validation-summary-valid"))}else $("#fica-errors").find("ul").find("li").remove(),$("#fica-errors div").removeClass("validation-summary-errors"),$("#fica-errors div").addClass("validation-summary-valid")}function setFICAValidationError(n,t){$("#fica-errors div").removeClass("validation-summary-valid");$("#fica-errors div").addClass("validation-summary-errors");$("#fica-errors").find("ul").append("<li id='"+t+"'>"+n+"<\/li>")}function BindFileUploads(){$("#proofId").bind("change",function(){validateUpload("proofId",this)});$("#proofIdMobile").bind("change",function(){validateUpload("proofIdMobile",this)})}function validateUpload(n,t){var f=document.getElementById(n),r,i,u;proofIdSize=!0;clearFICAValidationError("proof-of-id-error");clearFICAValidationError("file-type-error");t.files!==null&&t.files.length>0&&(r=t.files[0].size/1024,r>4096&&(setFICAValidationError("The ID proof document is too large.","proof-of-id-error"),proofIdSize=!1),i=$(t).attr("accept").toLowerCase().split(","),u="."+t.files[0].name.split(".").pop(),i!=null&&i!=undefined&&i.includes(u)?fileTypeValid=!0:(fileTypeValid=!1,setFICAValidationError("The selected document format/file-type is not supported. Please see below for acceptable file types","file-type-error")));toggleFICAUploadActive()}var SelectedTransactionTypeSourceId="00000000-0000-0000-0000-000000000000";$("#Amount").keyup(function(){var n=$("#Amount").val();document.getElementById("withdrawalLimit").innerHTML="<p>"+n+"<\/p>"});var noFileSelectedText="No file selected.",proofIdSize=!0,proofResidenceSize=!0,proofIdMobileSize=!0,fileTypeValid=!1,proofResidenceMobileSize=!0