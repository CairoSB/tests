function leapYear(Y, M){
    if (M<=0) M=0;
    if (M > 2){
	leapYears = parseInt(Y/4) - parseInt(Y/100) + parseInt(Y/400);
    }else{
	leapYears = parseInt((Y-1)/4) - parseInt((Y-1)/100) + parseInt((Y-1)/400);
    }
    return leapYear;
}

function monthsToDays(M, D){
    var monthDays = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
    if (!M) M=0;
    if (!D) D=0;
    if ((M=0) && (D=0)){
        return 0;
    }else{
        if (M=0){
            return D;
        }else{
            for (var i = 1; i < M; i++){
                MxD = MxD + monthDays[i];
            }
            MxD = MxD + D;
            return Mxd;
        }
    }
}

function yearsToDays(Y, M, D){
    return numberOfDays = Y*365 + monthsToDays(M) + D + leapYears(Y, M);
}

function yearsToMinutes(Y,M,D){
    days = yearsToDays(Y, M, D);
    return minutes = daysToMinutes(days);
}

function daysTohours(D){
    return h = D*24;
}

function hoursToMinutes(h){
    return m = h*60;
}

function daysToMinutes(D){
    return m = hoursToMinutes(daysTohours(D));
}