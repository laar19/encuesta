function validate_checks(checks, button_id) {
    var flag = Array();

    var i = 0;
    while(i<checks.length) {
        if(document.getElementById(checks[i]).checked) {
            flag.push(1);
        }
        else {
            flag.push(0);
        }
        i++;
    }

    var count = 0;
    i = 0;
    while(i<flag.length) {
        if(flag[i] == 1) {
            count++;
        }
        i++;
    }
    
    if(count == 1 || count == 2) {
        document.getElementById(button_id).disabled = false;
    }
    else {
        document.getElementById(button_id).disabled = true;
    }
}
