function validate_radios(radios) {
    var flag = false;

    var i = 0;
    while(i<radios.length) {
        //if(document.getElementById(radios[i]).checked) {
        if(document.getElementsByName(radios[i]).checked) {
            flag = true;
        }
        else {
            flag = false;
        }
        i++;
    }

    if(!flag) {
        alert("Por favor verifique que no quede ninguna selección vacía");
        return false;
    }
}
