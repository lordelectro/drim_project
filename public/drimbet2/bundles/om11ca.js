function SetBetslip(n)
{var t="betslipStorage";
lsTest()===!0?localStorage.setItem(t,JSON.stringify(n)):setCookie(t,JSON.stringify(n),.01)
}
function GetBetslip(){
var n="betslipStorage";
return lsTest()===!0?localStorage.getItem(n)==null?"":localStorage.getItem(n):getCookie(n)
}




function SendToBetslip(n,t,i,r,u,f,e,o)
{
var h=buildBet(n,t,i,r,u,f,e,o),s,a=GetBetslip(),c,v,l;
if(a===""||a==="{}"?(s=[h],c=document.getElementById(h.OutcomeId),c!=null&&(c.className+=" selected")):(s=JSON.parse(a),RemoveSelected(s,"OutcomeId",n)||RemoveOtherOutcomesForEvent(s,"EventId",h.EventId,h.OutcomeId)||(s.push(h),c=document.getElementById(h.OutcomeId),c!=null&&(c.className+=" selected"))),s.length>-1)
	for(v=s.length,l=0;l<slips.length;l++)
		document.getElementsByClassName("slip-counter")[l].innerHTML=v;s.length===0?SetBetslip({}):SetBetslip(s);SetOutcomeButtons()
}
			function toggleMultimixmarket(n){
			document.getElementById(n).style.display=document.getElementById(n).style.display=="none"?"block":"none"
			}
		function OMtoggleAllMarkets()
		{
			var t=document.getElementsByClassName("multimixtable"),n;
			if(document.getElementsByClassName("toggleMarketBtnText")[0].textContent.toLowerCase()=="expand all")
			{
				for(n=0;n<t.length;n++)t[n].style.display="block";
				document.getElementsByClassName("toggleMarketBtnText")[0].textContent="Collapse All"
				
			}
			
			else
			{
				for(n=0;n<t.length;n++)t[n].style.display="none";
				document.getElementsByClassName("toggleMarketBtnText")[0].textContent="Expand All"
				}
		}
		
	function UpdateBetCount(n)
	{
		var i="",r,t,u;
	
	if(n!=null||(i=GetBetslip(),i!==""))
		if(n=i,r=JSON.parse(n),r.length>0)
			for(u=r.length,t=0;t<slips.length;t++)
				document.getElementsByClassName("slip-counter")[t].innerHTML=u;
			else for(t=0;t<slips.length;t++)
			document.getElementsByClassName("slip-counter")[t].innerHTML=0
			
	}
	


	function SetOutcomeButtons()
	{
		var n,r,t,i;
		if(removeClassEverywhere(" selected"),DistributeChildWidths("bettingtr"),DistributeChildWidths("bettingdiv"),n=GetBetslip(),n!==""&&n!=="{}")
		{
			for(r=JSON.parse(n),t=0;t<r.length;t++)
				i=document.getElementById(r[t].OutcomeId),i==null||hasClass(i,"selected")||(i.className+=" selected");
			UpdateDropdownsFromSelectedClass()
			
		}
		
	}
	function removeClassEverywhere(n){
	
		for(var i=document.getElementsByClassName(n),t=i.length-1;t>-1;t--)
			i[t]!=null&&(i[t].className=i[t].className.replace(n,""))
		}
		
	function UpdateDropdownsFromSelectedClass()
	{
		for(var i,t=document.getElementsByTagName("select"),n=0;n<t.length;n++)
			for(t[n].selectedIndex=0,i=0;i<t[n].options.length;i++)
				if(hasClass(t[n].options[i],"selected"))
				{
					t[n].selectedIndex=i;break
				}
	}
	function hasClass(n,t)
	{
		
	return(" "+n.className+" ").indexOf(" "+t)>-1
	
	}
	function buildBet(n,t,i,r,u,f,e,o)
	{
		var s={};
		return s.Title=t,s.OutcomeId=n,s.PriceDecimal=i,s.Sport=r,s.MarketTitle=u,s.EventTitle=f,s.StartDate=e,s.EventId=o,s
	}
		
		
	function RemoveSelected(n,t,i)
	{
		
	for(var u,f=!1,r=0;r<n.length;r++)if(n[r][t]===i)
	{
		
		f=!0;u=document.getElementById(n[r][t]);
		u!=null&&removeSelected(u);
		removeFromArray(n,r);
		SetOutcomeButtons();
		break
	}
	
	return f
	}
	
	function RemoveAllOutcomesForEventId(n){
		var r=GetBetslip(),t,i;
		if(r!==""&&r!=="{}"){
			for(t=JSON.parse(r),i=0;i<t.length;i++)t[i].EventId===n&&removeFromArray(t,i);SetBetslip(t);UpdateBetCount()
				}
			}
			
			
	function RemoveOtherOutcomesForEvent(n,t,i,r){
		
	 for(var f,u=0;u<n.length;u++)
		 n[u][t]===i&&n[u].OutcomeId!==r&&(f=document.getElementById(n[u].OutcomeId),f!=null&&removeSelected(f),removeFromArray(n,u))
	 }
	 
	 function removeSelected(n)
	 {
		 n.className=n.className.replace(/(?:^|\s)selected(?!\S)/g,"")
	 }
	 function removeFromArray(n,t)
	 {
		 
		t!==-1&&n.splice(t,1)
	 }
		
	function setCookie(n,t,i)
	{
		
		var r=new Date,u;r.setTime(r.getTime()+i*864e5);
		u="expires="+r.toUTCString();
		document.cookie=n+"="+t.replace(/"/g,"'")+";"+u+";path=/"
	}
	function getCookie(n){
		for(var t,r=n+"=",u=document.cookie.split(";"),i=0;i<u.length;i++)
		{
			for(t=u[i];t.charAt(0)===" ";)t=t.substring(1);if(t.indexOf(r)===0)return t.substring(r.length,t.length).replace(/'/g,'"')
		}
	
		return""
	}
	
	function lsTest()
	{
		
		var n="test";
		try{
			
			return localStorage.setItem(n,n),localStorage.removeItem(n),!0
			
		}
		catch(t){
			return!1
			}
	}
	function post_to_url(n,t,i)
	{
		var r,f,u;i=i||"post";
	r=document.createElement("form");
	r.setAttribute("method",i);
	r.setAttribute("action",n);
	for(f in t)t.hasOwnProperty(f)&&(u=document.createElement("input"),u.setAttribute("type","hidden"),u.setAttribute("name",f),u.setAttribute("value",t[f]),r.appendChild(u));
	
	document.body.appendChild(r);r.submit()
	}
	
	function cacheOrCall(n,t,i,r,u,f)
	{
		var e=n+t,o=findCacheItem(e);
		if(o!=null)console.log("cache hit"),r(o);
		else
			return console.log("server call"),i.toLowerCase()==="post"?ajax.post(n,t,r,u):ajax.get(n,t,r,u),setCacheValue(e,window.LastResponse,f),window.LastResponse;return window.LastResponse
	}
	function setCacheValue(n,t,i){
		var r=new Date,u;i==null&&(i=10);
		r.setSeconds(r.getSeconds()+i);
		u={
			key:n,value:t,expiry:r
		};
		cache.push(u);
		cache.length>MAX_CACHE_SIZE&&cache.shift()
	}
	
	function findCacheItem(n){
		purgeExpiredItems();
	for(var t=0,i=cache.length;t<i;t++)if(cache[t].key===n)return cache[t].value;return null
	
	}
	
	function purgeExpiredItems(){
		for(var t=new Date,n=0,i=cache.length;n<i;n++)cache[n].expiry<t&&cache.splice(n,1)
	}
   
   function GetAccountOption(n){
	   window.location.href=n
	   }
   function getMenuContentOpera()
   {
	   var n=document.getElementById("hamb-menu");n!=null&&(
	   removeOptions(n),cacheOrCall("/Lite/SideMenuOperaMini",null,"GET",function(t)
	   {
		   var i=JSON.parse(t);Object.keys(i).forEach(function(t){addSelectOption(n,t,i[t])})
		   
	   },!0,300
	   
	   
	   ),n.onchange=function(){},n.onclick=function(){console.log("already loaded")}
	   
	   )
	   
	}
	
 function addSelectOption(n,t,i)
 {
	 var r=document.createElement("option");
	 r.text=t;i==="/"&&(i="/Home");r.value=i;n.add(r)
	 
 }
 
 function removeOptions(n){
	 for(var t=n.options.length-2;t>=0;t--)n.remove(t)
		 
 }
 function filterSportsLite(n,t,i)
 {
	
	return window.runningAjax!=null&&window.runningAjax===!0?(console.log("preventing additional query"),!1):(n.toUpperCase()==="00000000-0000-0000-DA7A-000000550031"?window.location="/Casino":n.toUpperCase()==="00000000-0000-0000-DA7A-000000550032"?window.location="/Jackpots/Index":(window.runningAjax=!0,ajax.get("/Event/GetEventsBySportIdLite",{sportConfigId:n,marketTypeCategoryId:t},function(){i==null||i==""?window.location.reload():window.location.href=i})),!1)
 }
	
 function resetFilter(n,t)
 {
		return window.runningAjax!=null&&window.runningAjax===!0?(console.log("preventing additional query"),!1):(window.runningAjax=!0,n==="League"?ajax.post("/Lite/FilterEventsLite",{reset:n},function(){t?window.location.href=t:location.reload()}):n==="MarketType"&&ajax.post("/Lite/FilterEventsLite",{reset:n},function(){t?window.location.href=t:location.reload()}),!1)
 }
		
 function filterLeaguesByRegionId(n,t,i){
			ajax.post("/Event/FilterEventsByRegionId",{regionId:n,marketTypeCategoryId:i},function(){window.location.href=i==="00000000-0000-0000-da7a-000000580003"?"/event/inplay":"/"},!0)
 }
		

function filterLeaguesLite(n,t,i,r)
{
			var u,f,e;return window.runningAjax!=null&&window.runningAjax===!0?(console.log("preventing additional query"),!1):(window.runningAjax=!0,u=document.getElementById("filtermarket-button"),f=[],u!=null&&(e=u.selectedIndex,f.push(u.options[e].id)),t!==undefined&&t!==null&&(f=t),ajax.post("/Lite/FilterEventsLite",{leagueIds:JSON.stringify(n),couponTypeId:f,reset:r},function(){i?window.location.href=i:location.reload()}),!1)

}
			
			
function genderChanged(n)
{
				for(var i=document.getElementsByName(n.name),t=0;t<i.length;t++)i[t].checked=i[t].value==n.value?n.checked:!n.checked
				
}
function filterBetTypeLite(n,t)
{
	
	return window.runningAjax!=null&&window.runningAjax===!0?(console.log("preventing additional query"),!1):(window.runningAjax=!0,ajax.post("/Lite/FilterEventsLite",{couponTypeIds:JSON.stringify(n)},function(){t?window.location.href=t:location.reload()}),!1)
	
	
}


function onUpdate(){var n=document.getElementById("leagueFilterOptions"),r=[],i,t;if(n!=null){if(i=n.selectedIndex,n.options[i].getAttribute("data-isRegion")!=null&&n.options[i].getAttribute("data-isRegion")==="true")for(t=i+1;t<n.options.length;t++){if(n.options[t].getAttribute("data-isRegion")!=null&&n.options[t].getAttribute("data-isRegion")==="true")break;r.push(n.options[t].value)}else r.push(n.options[i].value);filterLeaguesLite(r)}}function SetInlineOptions(){var i=document.getElementById("guests"),n,t;getCookie("AccountId")!=null&&getCookie("AccountId")!==""&&(i=document.getElementById("authed"),getCookie("CurrentBalance")==null||getCookie("CurrentBalance")===""?RefreshCashBalanceLite():(n=document.getElementById("accountCashBalance"),t=document.getElementById("accountFreeBetAmount"),n!=null&&(n.innerText=getCookie("CurrentBalance")),t!=null&&(t.innerText=getCookie("CurrentFreeBetAmount"))));i.style.display="block"}function RefreshCashBalanceLite(){ajax.get("/Account/_GetCashBalanceOnly?_="+(new Date).getTime(),"",function(n){var t=document.getElementById("accountCashBalance");t!=null&&(t.innerText=n);setCookie("CurrentBalance",n,.001)},!0);ajax.get("/Account/_FreeBetBalanceOnly?_="+(new Date).getTime(),"",function(n){var t=document.getElementById("accountFreeBetAmount");t!=null&&(t.innerText=n);setCookie("CurrentFreeBetAmount",n,.001)},!0)}function ValidateSearch(){var n=document.getElementById("txtSearchKeyword");return n!=null?n.value.length>3:!1}function DistributeChildWidths(n){for(var r,i=document.getElementsByClassName(n),t=0;t<i.length;t++){var u=i[t].children.length,f=i[t].clientWidth,e=f/u;for(r=0;r<i[t].children.length;r++)i[t].children[r].style.width=e+"px"}}function GetWithdrawalOptionLite(n,t){ajax.post("/Lite/_WithdrawalOption",{withdrawalOption:n},function(n){document.getElementById(t).innerHTML=n});var i=document.querySelectorAll(".wd-buttons button");[].forEach.call(i,function(n){n.className=n.className.replace(/\bselected\b/,"")})}function onWithdrawClick(n,t){var i=document.getElementById("Confirmed");i.value="true";ajax.post(n,t).done(function(n){document.getElementById("withdrawalType").innerHTML=n})}function RedirectifChanged(n){var t=n.value;if(t!=null){if(window.location.href!=null&&window.location.pathname!=null&&window.location.href.toLowerCase()===t.toLowerCase()||window.location.pathname.toLowerCase()===t.toLowerCase())return;setTimeout(function(){window.location.href=t},0)}}function AddSelectedItemToBetslip(theDropdown){var selectedElement,jsToRun;theDropdown!=null&&(selectedElement=theDropdown.options[theDropdown.selectedIndex],selectedElement!=null&&(selectedElement.value!="EMPTY"?(jsToRun=selectedElement.getAttribute("data-js"),eval(jsToRun),theDropdown.value=selectedElement.value):removeOutcomeForEventId(theDropdown.getAttribute("data-eventId"))))}function removeOutcomeForEventId(n){RemoveAllOutcomesForEventId(n)}function ConfirmWithdrawal(n){n.preventDefault();$("#Confirmed").val(!0);$("form").submit()}function setAmountLite(n,t,i){var r=document.getElementById(t+i);r!=null&&(r.value="",r.value=n)}function onBetConfirmationModalClick(n,t,i,r){n.preventDefault();showOverlay();pat.post(t,i).done(function(n){$("#confirmOddsChangeDialog").html(n).find(".modal-body").css({"-webkit-transform":"translate(-50%, -50%)",padding:"15px"});$("#confirmOddsChangeDialog").on("hidden.bs.modal",function(){$("html").removeClass("modal-open")});$("#modal-container-bet-confirmation").html(n).find(".modal-body").css({"-webkit-transform":"translate(-50%, -50%)",padding:"15px"});$("#modal-container-bet-confirmation").on("hidden.bs.modal",function(){$("html").removeClass("modal-open")});if(r&&($("#modal-container-bet-confirmation").modal(),$("#confirmOddsChangeDialog").modal()),applyLiveInPlayColourScheme(),useGoogleAnalytics=="true"&&n.toLowerCase().indexOf("bet failed")<0&&gax.ConfirmBet(),RefreshCashBalance(),closeOverlay(),anchorToTop(),$("#footerMobile").is(":visible")&&$("#modal-container-bet-confirmation").find(".error-message").length===0){$("#mobileBetslipCount").html("(0)");$("#mobileBetslipCount").length>0?$("#mobileBetslipCount").html("(0)"):$("#betslipCountBadge").length>0&&$(".betslipCountBadgeCount").html("0");$("#modal-container-bet-confirmation").on("hide.bs.modal",function(){window.location="/"})}})}var slips=document.getElementsByClassName("slip-counter"),ajax={},cache,MAX_CACHE_SIZE;ajax.x=function(){var t,i,n;if(typeof XMLHttpRequest!="undefined")return new XMLHttpRequest;for(t=["MSXML2.XmlHttp.6.0","MSXML2.XmlHttp.5.0","MSXML2.XmlHttp.4.0","MSXML2.XmlHttp.3.0","MSXML2.XmlHttp.2.0","Microsoft.XmlHttp"],i=null,n=0;n<t.length;n++)try{i=new ActiveXObject(t[n]);break}catch(r){}return i};ajax.send=function(n,t,i,r,u){u===undefined&&(u=!0);var f=ajax.x();f.open(i,n,u);f.onreadystatechange=function(){f.readyState===4&&t(f.responseText)};i==="POST"&&f.setRequestHeader("Content-type","application/x-www-form-urlencoded");f.send(r);window.LastResponse=f.responseText};ajax.get=function(n,t,i,r){var u=[];for(var f in t)t.hasOwnProperty(f)&&u.push(encodeURIComponent(f)+"="+encodeURIComponent(t[f]));ajax.send(n+(u.length?"?"+u.join("&"):""),i,"GET",null,r)};ajax.post=function(n,t,i,r){var f=[];for(var u in t)t.hasOwnProperty(u)&&f.push(encodeURIComponent(u)+"="+encodeURIComponent(t[u]));ajax.send(n,i,"POST",f.join("&"),r)};cache=[];MAX_CACHE_SIZE=10