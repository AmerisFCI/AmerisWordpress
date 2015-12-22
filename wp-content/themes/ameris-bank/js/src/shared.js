// JScript File
Number.prototype.formatMoney = function(c, d, t){
var n = this, 
    c = isNaN(c = Math.abs(c)) ? 2 : c, 
    d = d == undefined ? "." : d, 
    t = t == undefined ? "," : t, 
    s = n < 0 ? "-" : "", 
    i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", 
    j = (j = i.length) > 3 ? j % 3 : 0;
   return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
 };

function numberWithCommas(x) {
    var parts = x.toString().split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return parts.join(".");
}
 
function calcTotals() {
    var A = document.getElementById('txtMP').value.replace(/,/g,'');
    var B = document.getElementById('txtALS').value.replace(/,/g,'');
    var C = document.getElementById('txtADT').value;
    var D = document.getElementById('txtINT').value;
    var E = document.getElementById('txtTC').value;
    var F = document.getElementById('txtWF').value;
    var G = document.getElementById('txtOF1').value;
    var H = document.getElementById('txtOF2').value;
    
    var A_NEW = numberWithCommas(A);
    document.getElementById('txtMP').value = A_NEW;
    var B_NEW = numberWithCommas(B);
    document.getElementById('txtALS').value = B_NEW;

    if (isNaN(A) == true || isNaN(B) == true || isNaN(C) == true || isNaN(D) == true || isNaN(E) == true || isNaN(F) == true || isNaN(G) == true || isNaN(H) == true) {
        alert('Please enter numeric values only. All fields are required.');
    } else {
        D = D/100;
        //GET OTHER BANK VALUES
        var V = ((A/30)*C)*D;
        var W = ((A*12)/B)*E;
        var X = ((A*12)/B)*F;
        var Y = ((A*12)/B)*G;
        var Z = ((A*12)/B)*H;        
        var T = V+W+X+Y+Z;
        var U = (T/((A/30)*C)) * 100;
        if (V=='NaN' || V=='Infinity') { V = 0; }
        if (W=='NaN' || W=='Infinity') { W = 0; }
        if (X=='NaN' || X=='Infinity') { X = 0; }
        if (Y=='NaN' || Y=='Infinity') { Y = 0; }
        if (Z=='NaN' || Z=='Infinity') { Z = 0; }
        if (T=='NaN' || T=='Infinity') { T = 0; }
        if (U=='NaN' || U=='Infinity') { U = 0; }
        //GET AMERIS VALUES
        var VV = ((A/30)*C)*0.06;
        var WW = ((A*12)/B)*150;
        var XX = ((A*12)/B)*25;
        var YY = ((A*12)/B)*0;
        var ZZ = ((A*12)/B)*0;        
        var TT = VV+WW+XX+YY+ZZ;
        var UU = (TT/((A/30)*C)) * 100;
        if (VV=='NaN' || VV=='Infinity') { VV = 0; }
        if (WW=='NaN' || WW=='Infinity') { WW = 0; }
        if (XX=='NaN' || XX=='Infinity') { XX = 0; }
        if (YY=='NaN' || YY=='Infinity') { YY = 0; }
        if (ZZ=='NaN' || ZZ=='Infinity') { ZZ = 0; }
        if (TT=='NaN' || TT=='Infinity') { TT = 0; }
        if (UU=='NaN' || UU=='Infinity') { UU = 0; }
        //GET TOTAL VALUES
        var TotalSavings = parseFloat(T.formatMoney(0,'.','')) - parseFloat(TT.formatMoney(0,'.',''));
        var AllYield = -((UU/U)-1) * 100;
        if (TotalSavings=='NaN' || TotalSavings=='Infinity') { TotalSavings = 0; }
        if (AllYield=='NaN' || AllYield=='Infinity' || AllYield=='-NaN' || AllYield=='-Infinity') { AllYield = 0; }
        //FILL IN OTHER BANK VALUES
        document.getElementById('divOB_INT').innerHTML = "$" + V.formatMoney(0,'.',',');
        document.getElementById('divOB_TC').innerHTML = "$" + W.formatMoney(0,'.',',');
        document.getElementById('divOB_WF').innerHTML = "$" + X.formatMoney(0,'.',',');
        document.getElementById('divOB_OF1').innerHTML = "$" + Y.formatMoney(0,'.',',');
        document.getElementById('divOB_OF2').innerHTML = "$" + Z.formatMoney(0,'.',',');
        document.getElementById('divOB_Total').innerHTML = "$" + T.formatMoney(0,'.',',');
        document.getElementById('divOB_Yield').innerHTML = U.formatMoney(2,'.',',') + '%';
        //FILL IN AMERIS BANK VALUES
        document.getElementById('divAB_INT').innerHTML = "$" + VV.formatMoney(0,'.',',');
        document.getElementById('divAB_TC').innerHTML = "$" + WW.formatMoney(0,'.',',');
        document.getElementById('divAB_WF').innerHTML = "$" + XX.formatMoney(0,'.',',');
        document.getElementById('divAB_OF1').innerHTML = "$" + YY.formatMoney(0,'.',',');
        document.getElementById('divAB_OF2').innerHTML = "$" + ZZ.formatMoney(0,'.',',');
        document.getElementById('divAB_Total').innerHTML = "$" + TT.formatMoney(0,'.',',');
        document.getElementById('divAB_Yield').innerHTML = UU.formatMoney(2,'.',',') + '%';
        //FILL IN AMERIS BANK VALUES
        document.getElementById('divTotalSavings').innerHTML = "$" + TotalSavings.formatMoney(0,'.',',');
        document.getElementById('divLowerYield').innerHTML = AllYield.formatMoney(2,'.',',') + '%';
        //GET MIN/MAX GRAPH VALUES
        var minValue = 0;
        var maxValue = 0;
        if (T < TT) {
            var minValue = parseInt(T/2);
            var maxValue = parseInt(TT) + parseInt(TT/4);
        } else {
            var minValue = parseInt(TT/2);
            var maxValue = parseInt(T) + parseInt(T/4);        
        }
        if (parseInt((maxValue - minValue)/10) > 1000) { 
            var strMin = parseInt(minValue).toString();
            if (strMin.length > 6) {
                minValue = parseInt(strMin.substring(0,strMin.length-6) + "000000")
            } else if (strMin.length > 3) {
                minValue = parseInt(strMin.substring(0,strMin.length-3) + "000")
            }
            var strMax = parseInt(maxValue).toString();
            if (strMax.length > 6) {
                maxValue = parseInt(strMax.substring(0,strMax.length-6) + "000000")
            } else if (strMin.length > 3) {
                maxValue = parseInt(strMax.substring(0,strMax.length-3) + "000")
            }
        }
        var incr = parseInt((maxValue - minValue)/10);
        var currValue = maxValue;
        var newStr = '';
        for (var i = 1; i <= 10; i++) {
            if (incr >= 1000) {
                if (i > 1) {
                    currValue = currValue - incr;
                    newStr = currValue.toString();
                    if (newStr.length > 6) {                    
                        newStr = newStr.substring(0,newStr.length-4);
                        newStr = newStr.substring(0,newStr.length-2) + '.' + newStr.substring(newStr.length-2,newStr.length) + 'm';
                    } else if (newStr.length > 3) { 
                        newStr = newStr.substring(0,newStr.length-3) + 'k';
                    }
                } else {
                    newStr = maxValue.toString();
                    if (newStr.length > 6) {                    
                        newStr = newStr.substring(0,newStr.length-4);
                        newStr = newStr.substring(0,newStr.length-2) + '.' + newStr.substring(newStr.length-2,newStr.length) + 'm';
                    } else if (newStr.length > 3) { 
                        newStr = newStr.substring(0,newStr.length-3) + 'k';
                    }
                }
            } else {
                if (i > 1) {
                    currValue = currValue - incr;
                    newStr = currValue.toString();
                } else {
                    newStr = maxValue.toString();
                }
            }
            if (newStr == 'NaN' || incr < 0) { newStr = '0'; }
            document.getElementById('divCost' + i.toString()).innerHTML = newStr;
        }
        minValue = currValue;
        //SHOW BAR GRAPH
        if (incr > 0) {
            var obHt = parseInt(286 * ((parseInt(T)-minValue)/(maxValue-minValue)));
            if (obHt < 286 && obHt > 0) { 
                document.getElementById('Calc_OB_Bar_Top').style.height = (286 - obHt) + 'px';
                document.getElementById('Calc_OB_Bar_Btm').style.height = obHt + 'px';
            } else {
                document.getElementById('Calc_OB_Bar_Top').style.height = '285px';
                document.getElementById('Calc_OB_Bar_Btm').style.height = '1px';
            }
            var abHt = parseInt(286 * ((parseInt(TT)-minValue)/(maxValue-minValue)));
            if (abHt < 286 && abHt > 0) { 
                document.getElementById('Calc_AB_Bar_Top').style.height = (286 - abHt) + 'px';
                document.getElementById('Calc_AB_Bar_Btm').style.height = abHt + 'px';
            } else {
                document.getElementById('Calc_AB_Bar_Top').style.height = '285px';
                document.getElementById('Calc_AB_Bar_Btm').style.height = '1px';
            }
        } else { 
            document.getElementById('Calc_OB_Bar_Top').style.height = '285px';
            document.getElementById('Calc_OB_Bar_Btm').style.height = '1px';
            document.getElementById('Calc_AB_Bar_Top').style.height = '285px';
            document.getElementById('Calc_AB_Bar_Btm').style.height = '1px';
        }
    }
        
}

function chgImg(divID,imgSrc) {
    if (document.getElementById(divID)) {
        document.getElementById(divID).src = imgSrc;
    }
}